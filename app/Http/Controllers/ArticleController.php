<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\article;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\notification;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    private $category;
    private $article;
    private $product;
    private $brand;
    public function __construct(article $article, category $category, product $product, brand $brand)
    {
        $this->article = $article;
        $this->category = $category;
        $this->product = $product;
        $this->brand = $brand;
    }

    public function index()
    {
        $articles = $this->article->latest()->paginate(50);
        return (view('admin.article.index', compact('articles')));
    }

    public function create()
    {
        $brand = brand::all();
        $product = product::all();
        $category = category::all();
        $article = article::all();
        return (view('admin.article.add', compact('article', 'category', 'product', 'brand')));
    }
    //
    public function store(Request $request)
    {
        if ($request->has('article_thumbnail')) {
            $article_thumbnail = $request->article_thumbnail;
            $file_name = $article_thumbnail->getClientOriginalName();
            $article_thumbnail->move(base_path('public/upload/article'), $file_name);
        }
        if ($request->article_slug == '') {
            $request->article_slug = Str::slug($request->article_title);
        } else {
            $request->article_slug = Str::slug($request->article_slug);
        }
        
        article::create([
            'category_id' => $request->category_id,
            'article_title' => $request->article_title,
            'employee_id' => $request->employee_id,
            'article_slug' => $request->article_slug,
            'article_thumbnail' => $file_name,
            'article_content' => $request->article_content,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        return redirect()->route('articles.index')->withSuccess('Thêm bài viết thành công');
    }
    //
    public function edit($id)
    {
        $articles=article::find($id);
        $article = article::all();
        return (view('admin.article.edit', compact('article', 'articles')));
    }
    //
    public function update(Request $request, $id){
        $articles=article::find($id);
        $file_name = $articles->article_thumbnail;
        if ($request->has('article_thumbnail')) {
            $article_thumbnail = $request->article_thumbnail;
            $file_name = $article_thumbnail->getClientOriginalName();
            $article_thumbnail->move(base_path('public/upload/article'), $file_name);
        }
    
        if (($request->article_slug == '') || ($request->article_title != $articles->article_title)) {
            $request->article_slug = Str::slug($request->article_title);
        } else {
            $request->article_slug = Str::slug($request->article_slug);
        }
        article::find($id)->update([
            'article_title' => $request->article_title,
            'employee_id' => $request->employee_id,
            'article_slug' => $request->article_slug,
            'article_thumbnail' => $file_name,
            'article_content' => $request->article_content,
            'created_at' => now(), 
            'updated_at' => now()         
         ]);
         return redirect()->route('articles.index')->withSuccess('Cập nhật bài viết thành công');
    }
    public function delete($id){
        $delete=article::find($id);
        $delete->delete();
        return redirect()->route('articles.index')->withSuccess('Xóa thành công');
    }
}
