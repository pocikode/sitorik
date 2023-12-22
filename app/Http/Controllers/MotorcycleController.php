<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Contracts\View\View;

class MotorcycleController extends Controller
{
    public function index()
    {
        // TODO:
    }

    public function show(string $brand_slug, string $slug): View
    {
        $motorcycle = Motorcycle::with('brand', 'specification', 'picture')
            ->where('slug', $slug)
            ->firstOrFail();
        $title = $motorcycle->model_with_brand;

        return view('pages.motorcycle.show', compact('title', 'motorcycle'));
    }
}
