<?php

namespace App\Http\Controllers;

use App\Models\category;

use Illuminate\Http\Request;

use App\Components\Recusive;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return (view('admin.category.index', compact('categories')));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return(view('admin.category.add', compact('htmlOption')));
    }
    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request-> name
        ]);
        return redirect()->route('categories.index');
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
