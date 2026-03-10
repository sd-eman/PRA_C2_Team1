<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        // +1 view tellen
        $manual->increment('views');


        // Als het manual lokaal beschikbaar is, toon het in een iframe
        if ($manual->locally_available) {
            return view('pages.manual_view', [
                'manual' => $manual,
                'brand' => $brand,
            ]);
        }

        // Als het manual extern is, redirect naar de echte URL
        return redirect()->away($manual->url);
    }
}
