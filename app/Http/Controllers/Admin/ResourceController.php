<?php

namespace App\Http\Controllers\Admin;

use HasinHayder\TyroDashboard\Http\Controllers\ResourceController as BaseResourceController;
use HasinHayder\TyroDashboard\Support\DashboardRoute;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResourceController extends BaseResourceController
{
    /**
     * Handle updating a resource, supporting explicit image/file removal
     * and preventing duplicate storage path issues.
     */
    public function update(Request $request, $resource, $id)
    {
        $config = $this->getResourceConfig($resource);

        if (! $this->hasAccess($config)) {
            abort(403, 'You do not have permission to view this resource.');
        }

        if ($this->isReadonly($config)) {
            abort(403, 'This resource is read-only for your role.');
        }

        $modelClass = $config['model'];
        $item = $modelClass::findOrFail($id);

        $rules = [];
        foreach ($config['fields'] as $field => $fieldConfig) {
            if (isset($fieldConfig['rules'])) {
                $fieldRules = $fieldConfig['rules'];

                // Helper to append ignore ID to unique rules
                $processRule = function ($rule) use ($field, $id) {
                    if (is_string($rule) && Str::startsWith($rule, 'unique:')) {
                        $parts = explode(',', substr($rule, 7));
                        if (count($parts) == 1) {
                            return "unique:{$parts[0]},{$field},{$id}";
                        } elseif (count($parts) == 2) {
                            return $rule . ",{$id}";
                        }
                    }

                    return $rule;
                };

                if (is_string($fieldRules)) {
                    $rulesList = explode('|', $fieldRules);
                    foreach ($rulesList as &$r) {
                        $r = $processRule($r);
                    }
                    $rules[$field] = implode('|', $rulesList);
                } elseif (is_array($fieldRules)) {
                    foreach ($fieldRules as &$r) {
                        $r = $processRule($r);
                    }
                    $rules[$field] = $fieldRules;
                } else {
                    $rules[$field] = $fieldRules;
                }
            }
        }

        $validated = $request->validate($rules);

        // Collect all fields defined in config
        $data = $request->only(array_keys($config['fields']));

        // Merge validated data
        $data = array_merge($data, $validated);

        // Handle booleans (checkboxes)
        foreach ($config['fields'] as $field => $fieldConfig) {
            if ($fieldConfig['type'] === 'boolean' && ! isset($data[$field])) {
                $data[$field] = false;
            }
            // Don't update password if empty
            if ($fieldConfig['type'] === 'password' && empty($data[$field])) {
                unset($data[$field]);
            }
        }

        // Handle file uploads & removals
        $uploadDisk = $config['upload_disk'] ?? config('tyro-dashboard.uploads.disk', 'public');
        $uploadDirectory = $config['upload_directory'] ?? config('tyro-dashboard.uploads.directory', 'uploads');

        foreach ($config['fields'] as $field => $fieldConfig) {
            if ($fieldConfig['type'] === 'file') {
                $removeKey = 'remove_' . $field;

                if ($request->boolean($removeKey) || $request->input($removeKey) === '1') {
                    // Explicitly remove existing file
                    $oldRaw = $item->getRawOriginal($field) ?? $item->$field;
                    if (! empty($oldRaw)) {
                        $oldPath = ltrim(str_replace('/storage/', '', $oldRaw), '/');
                        Storage::disk($uploadDisk)->delete($oldPath);
                    }
                    $data[$field] = null;
                } elseif ($request->hasFile($field)) {
                    // Delete old file if exists
                    $oldRaw = $item->getRawOriginal($field) ?? $item->$field;
                    if (! empty($oldRaw)) {
                        $oldPath = ltrim(str_replace('/storage/', '', $oldRaw), '/');
                        Storage::disk($uploadDisk)->delete($oldPath);
                    }
                    $path = $request->file($field)->store($uploadDirectory, $uploadDisk);
                    $data[$field] = $path;
                } else {
                    // Keep old file if not uploaded and not removed
                    unset($data[$field]);
                }
            }
        }

        // Separate relationship fields that need syncing
        $relationshipsToSync = [];
        foreach ($config['fields'] as $field => $fieldConfig) {
            $isMultipleRelationship = (
                $fieldConfig['type'] === 'multiselect' ||
                ($fieldConfig['type'] === 'checkbox' && isset($fieldConfig['relationship'])) ||
                ($fieldConfig['type'] === 'select' && ($fieldConfig['multiple'] ?? false))
            ) && isset($fieldConfig['relationship']);

            if ($isMultipleRelationship) {
                if (isset($data[$field])) {
                    $relationshipsToSync[$field] = $data[$field];
                } else {
                    $relationshipsToSync[$field] = [];
                }
                unset($data[$field]);
            }
        }

        try {
            $item->update($data);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1] ?? 0;
            $errorMessage = $e->getMessage();
            $field = null;

            if ($errorCode == 1048 && preg_match("/Column '([^']+)' cannot be null/", $errorMessage, $matches)) {
                $field = $matches[1];
            } elseif ($errorCode == 1364 && preg_match("/Field '([^']+)' doesn't have a default value/", $errorMessage, $matches)) {
                $field = $matches[1];
            } elseif (strpos($errorMessage, 'NOT NULL constraint failed') !== false) {
                if (preg_match("/NOT NULL constraint failed: .+\.([^\s]+)/", $errorMessage, $matches)) {
                    $field = $matches[1];
                }
            } elseif (strpos($errorMessage, 'violates not-null constraint') !== false) {
                if (preg_match('/null value in column "([^"]+)"/', $errorMessage, $matches)) {
                    $field = $matches[1];
                }
            }

            if ($field) {
                return back()->withInput()->withErrors([$field => "The {$field} field is required."]);
            }

            if ($errorCode == 1048 || $errorCode == 1364 || strpos($errorMessage, 'constraint') !== false) {
                return back()->withInput()->with('error', 'Database error: Missing required fields.');
            }

            throw $e;
        }

        // Sync relationships
        foreach ($relationshipsToSync as $field => $values) {
            $fieldConfig = $config['fields'][$field];
            if (method_exists($item, $fieldConfig['relationship'])) {
                $item->{$fieldConfig['relationship']}()->sync($values);
            }
        }

        return redirect()->route(DashboardRoute::name('resources.index'), $resource)
            ->with('success', $config['title'] . ' updated successfully.');
    }
}
