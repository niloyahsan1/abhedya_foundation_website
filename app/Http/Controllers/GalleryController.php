<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request): View
    {
        $albumSlug = $request->query('album');

        $albums = GalleryAlbum::query()
            ->published()
            ->withCount(['images' => function ($q) {
                $q->published();
            }])
            ->orderBy('order')
            ->get();

        $query = GalleryImage::query()
            ->published()
            ->with('album');

        if ($albumSlug) {
            $query->whereHas('album', function ($q) use ($albumSlug) {
                $q->where('slug', $albumSlug);
            });
        }

        $images = $query->orderBy('order')->latest()->paginate(12)->withQueryString();

        return view('pages.gallery.index', compact('albums', 'images', 'albumSlug'));
    }
}
