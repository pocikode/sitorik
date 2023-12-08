<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->storePublicly('sitorik_brands');
        Brand::create([
            'slug' => Str::slug($request->post('name')),
            'name' => $request->post('name'),
            'image' => $image,
        ]);

        return redirect()
            ->route('admin.brands')
            ->with('success', 'Brand Created Successfully!');
    }
}
