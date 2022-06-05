<?php

namespace App\Http\Controllers;

use App\Models\brand;


use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brand;
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function index()
    {
        $brands = $this->brand->latest()->paginate();
        return (view('admin.brand.index', compact('brands')));
    }
}
