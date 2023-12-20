<?php
// Admin Page Breadcrumbs

use App\Models\Article;
use App\Models\Motorcycle;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.dashboard'));
});

// Home > Brands > List
Breadcrumbs::for('brands', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Brands', route('admin.brands'));
    $trail->push('List');
});

// Home > Motorcycles > List
Breadcrumbs::for('motorcycles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Motorcycles', route('admin.motorcycles'));
    $trail->push('List');
});

// Home > Motorcycles > Create
Breadcrumbs::for('motorcycles-create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Motorcycles', route('admin.motorcycles'));
    $trail->push('Create');
});

// Home > Motorcycles > Brand - Model > Edit
Breadcrumbs::for('motorcycles-edit', function (BreadcrumbTrail $trail, Motorcycle $motorcycle) {
    $trail->parent('home');
    $trail->push('Motorcycles', route('admin.motorcycles'));
    $trail->push($motorcycle->brand->name . ' ' . $motorcycle->model, '#');
    $trail->push('Edit');
});

// Home > Articles > List
Breadcrumbs::for('articles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Articles', route('admin.articles'));
    $trail->push('List');
});

// Home > Articles > Create
Breadcrumbs::for('articles-create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Articles', route('admin.articles'));
    $trail->push('Create');
});

// Home > Articles > { Artitlce TItle } > Edit
Breadcrumbs::for('articles-edit', function (BreadcrumbTrail $trail, Article $article) {
    $trail->parent('home');
    $trail->push('Articles', route('admin.articles'));
    $trail->push($article->title, '#');
    $trail->push('Edit');
});
