<?php

namespace App\Http\Controllers;

use App\Models\category;

use Illuminate\Http\Request;

use App\Components\Recusive;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Log;
class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(50);
        // $categories = $this->category->latest()->paginate(50);
        return (view('admin.category.index', compact('categories')));
    }
    public function create()
    {
        $category = category::all();
        return (view('admin.category.add', compact('category')));
    }
    //
    public function store(Request $request)
    {
        if ($request->has('category_image')) {
            $category_image = $request->category_image;
            $file_name = $category_image->getClientOriginalName();
            $category_image->move(base_path('public/upload/category'), $file_name);
        }
        if ($request->category_slug == '') {
            $request->category_slug = Str::slug($request->category_name);
        } else {
            $request->category_slug = Str::slug($request->category_slug);
        }
        
        // dd($file_name);
        category::create([
            'category_name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'employee_id' => $request->employee_id,
            'category_slug' => $request->category_slug,
            'category_image' => $file_name,
            'category_description' => $request->category_description,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        return redirect()->route('categories.index')->withSuccess('Thêm danh mục thành công');
    }
    //
    public function edit($id)
    {
        $categories=category::find($id);
        $category = category::all();
        return (view('admin.category.edit', compact('category', 'categories')));
    }
    //
    public function update(Request $request, $id){
        $categories=category::find($id);
        
        if ($request->has('category_image')) {
            $category_image = $request->category_image;
            $file_name = $category_image->getClientOriginalName();
            $category_image->move(base_path('public/upload/category'), $file_name);
        }
        if (($request->category_slug == '') || ($request->category_name != $categories->category_name)) {
            $request->category_slug = Str::slug($request->category_name);
        } else {
            $request->category_slug = Str::slug($request->category_slug);
        }
        category::find($id)->update([
            'category_name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'employee_id' => $request->employee_id,
            'category_slug' => $request->category_slug,
            'category_image' => $file_name,
            'category_description' => $request->category_description,
            'created_at' => now(), 
            'updated_at' => now()         
         ]);
         return redirect()->route('categories.index')->withSuccess('Cập nhật danh mục thành công');
    }
    public function delete($id){
        $delete=category::find($id);
        $delete->delete();
        return redirect()->route('categories.index')->withSuccess('Xóa thành công');
    }
}
