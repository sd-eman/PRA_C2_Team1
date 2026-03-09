<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('name')->get();

        return view('brands.index', [
            "brands" => $brands
        ]);
    }

    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);

        // Alle handleidingen van dit merk
        $manuals = $brand->manuals()->get();

        // Top 5 populairste handleidingen van dit merk
        $topManuals = $brand->manuals()
                            ->orderByDesc('views')
                            ->take(5)
                            ->get();

        return view('pages.manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "topManuals" => $topManuals
        ]);
    }

    public function byLetter($letter)
    {
        $letter = strtoupper($letter);
        $brands = Brand::where('name', 'LIKE', $letter . '%')->orderBy('name')->get();
        return view('pages.brandsbyletter', [
            'brands' => $brands,
            'letter' => $letter
        ]);
    }
}
