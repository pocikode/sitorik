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

        dd($motorcycle);

        return view('pages.motorcycle.index', compact($motorcycle));
    }
}
