@extends('tyro-dashboard::layouts.app')

@section('title', 'Create ' . Str::singular($config['title']))

@section('breadcrumb')
<a href="{{ route($dashboardRoute::name('index')) }}">Dashboard</a>
<span class="breadcrumb-separator">/</span>
<a href="{{ route($dashboardRoute::name('resources.index'), $resource) }}">{{ $config['title'] }}</a>
<span class="breadcrumb-separator">/</span>
<span>Create</span>
@endsection

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($config['fields'] as $key => $field)
        @if (($field['type'] ?? '') === 'richtext')
            (function () {
                var key = '{{ $key }}';
                if (document.getElementById('editor-' + key)) {
                    var quill = new Quill('#editor-' + key, {
                        theme: 'snow'
                    });
                    var textarea = document.getElementById(key);

                    // Set initial content
                    if (textarea.value) {
                        quill.root.innerHTML = textarea.value;
                    }

                    quill.on('text-change', function () {
                        textarea.value = quill.root.innerHTML;
                    });
                }
            })();
        @endif
        @endforeach
    });

    function handleImageFileSelect(input, key) {
        const file = input.files && input.files[0];
        if (!file) return;

        const previewCard = document.getElementById('preview-card-' + key);
        const previewImg = document.getElementById('preview-' + key);
        const previewName = document.getElementById('preview-name-' + key);
        const previewSize = document.getElementById('preview-size-' + key);
        const dropzoneLabel = document.getElementById('dropzone-label-' + key);

        if (previewName) previewName.textContent = file.name;
        if (previewSize) {
            const kb = (file.size / 1024).toFixed(1);
            previewSize.textContent = kb > 1024 ? (kb / 1024).toFixed(2) + ' MB' : kb + ' KB';
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            if (previewImg) previewImg.src = e.target.result;
            if (previewCard) previewCard.style.display = 'block';
            if (dropzoneLabel) dropzoneLabel.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    function clearSelectedImage(key) {
        const input = document.getElementById(key);
        if (input) input.value = '';

        const previewCard = document.getElementById('preview-card-' + key);
        if (previewCard) previewCard.style.display = 'none';

        const dropzoneLabel = document.getElementById('dropzone-label-' + key);
        if (dropzoneLabel) dropzoneLabel.style.display = 'block';

        const previewImg = document.getElementById('preview-' + key);
        if (previewImg) previewImg.src = '';
    }
</script>
@endpush

@section('content')
<div class="page-header">
    <h1 class="page-title">Create {{ Str::singular($config['title']) }}</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route($dashboardRoute::name('resources.store'), $resource) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @foreach($config['fields'] as $key => $field)
            @if(($field['hide_in_form'] ?? false) || ($field['hide_in_create'] ?? false))
            @continue
            @endif

            @if($field['type'] === 'hidden')
            <input type="hidden" name="{{ $key }}" value="{{ old($key) }}">
            @continue
            @endif

            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="{{ $key }}" class="form-label">{{ $field['label'] }}</label>

                @if($field['type'] === 'textarea')
                <textarea name="{{ $key }}" id="{{ $key }}" class="form-input @error($key) is-invalid @enderror" rows="5" placeholder="{{ $field['placeholder'] ?? '' }}" {{ ($field['readonly'] ?? false) ? 'readonly' : '' }} @if(isset($field['attributes'])) @foreach($field['attributes'] as $attr => $value) {{ $attr }}="{{ $value }}" @endforeach @endif>{{ old($key, $field['default'] ?? '') }}</textarea>

                @elseif($field['type'] === 'richtext')
                <div class="richtext-wrapper">
                    <div id="editor-{{ $key }}" style="min-height: 220px;"></div>
                    <textarea name="{{ $key }}" id="{{ $key }}" style="display:none">{{ old($key, $field['default'] ?? '') }}</textarea>
                </div>

                @elseif($field['type'] === 'markdown')
                <x-tyro-dashboard-editor name="{{ $key }}" id="{{ $key }}" :value="old($key, $field['default'] ?? '')" placeholder="{{ $field['placeholder'] ?? '' }}" :label="null" :show-error="false" />

                @elseif($field['type'] === 'select')
                @if($field['multiple'] ?? false)
                <select name="{{ $key }}[]" id="{{ $key }}" class="form-select @error($key) is-invalid @enderror" multiple>
                    @if(isset($options[$key]))
                    @foreach($options[$key] as $option)
                    <option value="{{ $option->id }}" {{ in_array($option->id, old($key, [])) ? 'selected' : '' }}>
                        {{ $option->{$field['option_label'] ?? 'name'} }}
                    </option>
                    @endforeach
                    @elseif(isset($field['options']))
                    @foreach($field['options'] as $value => $label)
                    @php
                    $optionValue = is_int($value) ? $label : $value;
                    $optionLabel = $label;
                    @endphp
                    <option value="{{ $optionValue }}" {{ in_array($optionValue, old($key, [])) ? 'selected' : '' }}>
                        {{ $optionLabel }}
                    </option>
                    @endforeach
                    @endif
                </select>
                @else
                <select name="{{ $key }}" id="{{ $key }}" class="form-select @error($key) is-invalid @enderror">
                    <option value="">Select {{ $field['label'] }}</option>
                    @if(isset($options[$key]))
                    @foreach($options[$key] as $option)
                    <option value="{{ $option->id }}" {{ old($key)==$option->id ? 'selected' : '' }}>
                        {{ $option->{$field['option_label'] ?? 'name'} }}
                    </option>
                    @endforeach
                    @elseif(isset($field['options']))
                    @foreach($field['options'] as $value => $label)
                    @php
                    $optionValue = is_int($value) ? $label : $value;
                    $optionLabel = $label;
                    @endphp
                    <option value="{{ $optionValue }}" {{ old($key)==$optionValue ? 'selected' : '' }}>
                        {{ $optionLabel }}
                    </option>
                    @endforeach
                    @endif
                </select>
                @endif

                @elseif($field['type'] === 'multiselect')
                <select name="{{ $key }}[]" id="{{ $key }}" class="form-select @error($key) is-invalid @enderror" multiple>
                    @if(isset($options[$key]))
                    @foreach($options[$key] as $option)
                    <option value="{{ $option->id }}" {{ in_array($option->id, old($key, [])) ? 'selected' : '' }}>
                        {{ $option->{$field['option_label'] ?? 'name'} }}
                    </option>
                    @endforeach
                    @elseif(isset($field['options']))
                    @foreach($field['options'] as $value => $label)
                    @php
                    $optionValue = is_int($value) ? $label : $value;
                    $optionLabel = $label;
                    @endphp
                    <option value="{{ $optionValue }}" {{ in_array($optionValue, old($key, [])) ? 'selected' : '' }}>
                        {{ $optionLabel }}
                    </option>
                    @endforeach
                    @endif
                </select>

                @elseif($field['type'] === 'radio')
                <div class="radio-group">
                    @if(isset($options[$key]))
                    @foreach($options[$key] as $option)
                    <div class="form-check">
                        <input type="radio" name="{{ $key }}" id="{{ $key }}_{{ $option->id }}" value="{{ $option->id }}" {{ old($key)==$option->id ? 'checked' : '' }}>
                        <label for="{{ $key }}_{{ $option->id }}">{{ $option->{$field['option_label'] ?? 'name'} }}</label>
                    </div>
                    @endforeach
                    @elseif(isset($field['options']))
                    @foreach($field['options'] as $value => $label)
                    @php
                    $optionValue = is_int($value) ? $label : $value;
                    $optionLabel = $label;
                    @endphp
                    <div class="form-check">
                        <input type="radio" name="{{ $key }}" id="{{ $key }}_{{ $optionValue }}" value="{{ $optionValue }}" {{ old($key)==$optionValue ? 'checked' : '' }}>
                        <label for="{{ $key }}_{{ $optionValue }}">{{ $optionLabel }}</label>
                    </div>
                    @endforeach
                    @endif
                </div>

                @elseif($field['type'] === 'checkbox' && (isset($options[$key]) || isset($field['options'])))
                <div class="checkbox-group">
                    @if(isset($options[$key]))
                    @foreach($options[$key] as $option)
                    <div class="form-check">
                        <input type="checkbox" name="{{ $key }}[]" id="{{ $key }}_{{ $option->id }}" value="{{ $option->id }}" {{ in_array($option->id, old($key, [])) ? 'checked' : '' }}>
                        <label for="{{ $key }}_{{ $option->id }}">{{ $option->{$field['option_label'] ?? 'name'} }}</label>
                    </div>
                    @endforeach
                    @elseif(isset($field['options']))
                    @foreach($field['options'] as $value => $label)
                    @php
                    $optionValue = is_int($value) ? $label : $value;
                    $optionLabel = $label;
                    @endphp
                    <div class="form-check">
                        <input type="checkbox" name="{{ $key }}[]" id="{{ $key }}_{{ $optionValue }}" value="{{ $optionValue }}" {{ in_array($optionValue, old($key, [])) ? 'checked' : '' }}>
                        <label for="{{ $key }}_{{ $optionValue }}">{{ $optionLabel }}</label>
                    </div>
                    @endforeach
                    @endif
                </div>

                @elseif($field['type'] === 'file')
                <div class="custom-file-dropzone" id="dropzone-container-{{ $key }}">
                    <input type="file" 
                           name="{{ $key }}" 
                           id="{{ $key }}" 
                           accept="image/*" 
                           class="custom-file-input"
                           onchange="handleImageFileSelect(this, '{{ $key }}')">
                    
                    <label for="{{ $key }}" class="dropzone-label" id="dropzone-label-{{ $key }}">
                        <div class="dropzone-content">
                            <div class="dropzone-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                                    <circle cx="9" cy="9" r="2"/>
                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                                </svg>
                            </div>
                            <div class="dropzone-text">
                                <span class="dropzone-title">Click to upload or drag & drop</span>
                                <span class="dropzone-sub">PNG, JPG, WEBP, GIF up to 10MB</span>
                            </div>
                            <button type="button" class="dropzone-browse-btn" onclick="document.getElementById('{{ $key }}').click()">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 6px;">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" x2="12" y1="3" y2="15"/>
                                </svg>
                                Browse Image
                            </button>
                        </div>
                    </label>

                    {{-- Live Image Preview Card --}}
                    <div id="preview-card-{{ $key }}" class="dropzone-preview-card" style="display: none;">
                        <div class="preview-card-inner">
                            <img id="preview-{{ $key }}" src="" alt="Selected Preview" class="dropzone-preview-img">
                            <div class="preview-card-info">
                                <span class="preview-file-name" id="preview-name-{{ $key }}">image.jpg</span>
                                <span class="preview-file-size" id="preview-size-{{ $key }}">0 KB</span>
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearSelectedImage('{{ $key }}')">
                                        Change / Remove Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @elseif($field['type'] === 'boolean')
                <div class="form-check">
                    <input type="checkbox" name="{{ $key }}" id="{{ $key }}" value="1" {{ old($key) ? 'checked' : '' }}>
                    <label for="{{ $key }}">Yes</label>
                </div>

                @else
                <input type="{{ $field['type'] }}" name="{{ $key }}" id="{{ $key }}" class="form-input @error($key) is-invalid @enderror" value="{{ old($key, $field['default'] ?? '') }}" placeholder="{{ $field['placeholder'] ?? '' }}" {{ ($field['readonly'] ?? false) ? 'readonly' : '' }} @if(isset($field['attributes'])) @foreach($field['attributes'] as $attr => $value) {{ $attr }}="{{ $value }}" @endforeach @endif>
                @endif

                @if(isset($field['help_text']))
                <div class="form-help-text" style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.25rem;">{{ $field['help_text'] }}</div>
                @endif

                @error($key)
                @if(config('tyro-dashboard.resource_ui.show_field_errors', true))
                <div class="form-error" style="color: var(--danger); font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
                @endif
                @enderror
            </div>
            @endforeach

            <div class="form-actions" style="margin-top: 1.5rem;">
                <a href="{{ route($dashboardRoute::name('resources.index'), $resource) }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create {{ Str::singular($config['title']) }}</button>
            </div>
        </form>
    </div>
</div>
@endsection