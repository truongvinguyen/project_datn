<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Client\UserClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\brand;
use App\Models\article;
use App\Models\inventory;
use App\Models\imageProduct;
class showDataController extends Controller
{
    public function product(){
        $data = new product();
        $product = $data->products();
        return  response() ->json($product, 200);
    }

    public function home_page(){

        $data = new product();
        $article = new article();
        
        $best_product = $data->products();
        $products = $data::select('*')->orderBy('id','DESC')->get();
        $suggestions = $data::select('*')->limit(8)->get();
        $articles = $article->article();
        return view('client.home-page', compact('best_product','products','articles','suggestions'));
    }

    public function article_page(){
        $article = new article();

        $articles = $article->article();
        $length = article::all()->count();
        $brands = brand::all();
        return view('client.article.article-page',compact('articles','brands','length'));
    }
    public function articleOne($id){
        $art = new article();

        $articles = $art->article();
        $articleOne = $art::findOrFail($id);
        $articleByCategory = $art->articleByCategory($articleOne->category_id);
 
        return view('client.article.article-one',compact('articles','articleOne','articleByCategory'));
    }

    public function product_grid(){
        $data = new product();
        $article = new article();

        $categories = category::all();
        $articles = $article->article();
        $brands = brand::all();
          
        $products = $data::all();
        $length = $data::all()->count();
        return view('client.product.product-grid',compact('length','categories','brands','articles','products'));
    }

    public function product_list(){

        $data = new category();
        $categories = $data::all();
        return view('client.product-list',compact('categories'));
    }

    public function product_by_id($id){
        $data = new product();
        $article = new article();

        $articles = $article->article();
        $categories = category::all();
        $brands = brand::all();

        $products = $data::all();
        $length = $data::all()->count();
        return view('client.product.product-list',compact('length','categories','brands','articles','products'));
    }

    public function aboutUs(){
        return view('client.aboutUs');
    }

    public function contact(){
        return view('client.contact');
    }

    public function quickview (Request $request,$id){
        $data = DB::table('product')
        ->select('*')
        ->where('id',$id)
        ->first();
        $image =imageProduct::where('product_id',$id)->get();    
   
        $size = inventory::where('product_id',$id)->get();  
        return view('client.cart.modal_quickview',compact('data','image','size'));
    }
}
