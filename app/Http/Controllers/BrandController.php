<?php

namespace App\Http\Controllers;

use App\Models\brand;


use Illuminate\Http\Request;

use Illuminate\Support\Str;
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
    public function create()
    {
        $brand = brand::all();
        return (view('admin.brand.add', compact('brand')));
    }
    //
    public function store(Request $request)
    {
        if ($request->has('brand_image')) {
            $brand_image = $request->brand_image;
            $file_name = $brand_image->getClientOriginalName();
            $brand_image->move(base_path('public/upload/brand'), $file_name);
        }
        if ($request->brand_slug == '') {
            $request->brand_slug = Str::slug($request->brand_name);
        } else {
            $request->brand_slug = Str::slug($request->brand_slug);
        }
        
        // dd($request);
        brand::create([
            'brand_name' => $request->brand_name,
            'employee_id' => $request->employee_id,
            'brand_slug' => $request->brand_slug,
            'brand_image' => $file_name,
            'brand_description' => $request->brand_description,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        return redirect()->route('brands.index')->withSuccess('Thêm thương hiệu thành công');
    }
    public function edit($id)
    {
        $brands = brand::find($id);
        $brand = brand::all();
        return (view('admin.brand.edit', compact('brand', 'brands')));
    }
    //
    public function update(Request $request, $id){
        $brands=brand::find($id);
        $file_name = $brands->brand_image;
        if ($request->has('brand_image')) {
            $brand_image = $request->brand_image;
            $file_name = $brand_image->getClientOriginalName();
            $brand_image->move(base_path('public/upload/brand'), $file_name);
        }
        if (($request->brand_slug == '') || ($request->brand_name != $brands->brand_name)) {
            $request->brand_slug = Str::slug($request->brand_name);
        } else {
            $request->brand_slug = Str::slug($request->brand_slug);
        }
        brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'employee_id' => $request->employee_id,
            'brand_slug' => $request->brand_slug,
            'brand_image' => $file_name,
            'brand_description' => $request->brand_description,
            'created_at' => now(), 
            'updated_at' => now()         
         ]);
       
         return redirect()->route('brands.index')->withSuccess('Cập nhật thương hiệu thành công');
    }
    //
    public function delete($id){
        $delete=brand::find($id);
        $delete->delete();
        return redirect()->route('brands.index')->withSuccess('Xóa thành công');
    }
}
