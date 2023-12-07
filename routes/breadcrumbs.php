<?php
// Admin Page Breadcrumbs

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
