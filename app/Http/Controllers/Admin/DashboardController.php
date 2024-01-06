<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalBrands = Brand::all()->count();
        $totalMotors = Motorcycle::all()->count();
        $totalArticles = Article::all()->count();

        return view('admin.dashboard', compact('totalBrands', 'totalMotors', 'totalArticles'));
    }
}
