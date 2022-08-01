<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\brand;
use App\Models\article;
use App\Models\inventory;
use App\Models\imageProduct;
use App\Models\wishlist;
use Session;
class showDataController extends Controller
{
    public function product(){
        $data = new product();
        $product = $data->products();
        return  response() ->json($product, 200);
    }

    public function home_page(){

        $data = new product();
        $wishlist = new wishlist();
        $article = new article();
        
        $best_product = $data->products();
        $products = $data::select('*')->orderBy('id','DESC')->get();
        
        $suggestions = $wishlist->productList(Session::get('userId'));
        $articles = $article->article();
        return view('client.others.home-page', compact('best_product','products','articles','suggestions'));
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

    public function product_grid($id){
        $data = new product();
        $article = new article();

        $categories = category::all();
        $articles = $article->article();
        $brands = brand::all();
        $productByCategory = $data->productByCategory($id);
        //  echo '<pre>';
        //  var_dump($products);
        //  echo '</pre>';
        //  die;
        $length = $data::all()->count();
        return view('client.product.product-grid',compact('length','categories','brands','articles','productByCategory'));
    }

    public function search(Request $request){
        $data = new product();
        $article = new article();

        $articles = $article->article();
        $categories = category::all();
        $brands = brand::all();
        $value = $request->search;
      
        $products = $data->searchProduct($value);
        $length = $data::all()->count();
        return view('client.product.search',compact('length','categories','brands','articles','products'));
    }

    public function aboutUs(){
        return view('client.others.aboutUs');
    }

    public function policy(){
        return view('client.others.policy');
    }

    
    public function FAQs(){
        return view('client.others.faqs');
    }

    public function quickview (Request $request,$id){
        $data = DB::table('product')
        ->select('*')
        ->leftJoin('wishlist','wishlist.product_id','=','product.id')
        ->where('product.id',$id)
        ->first();
        $image =imageProduct::where('product_id',$id)->get();    
   
        $size = inventory::where('product_id',$id)->get();  
        return view('client.cart.modal_quickview',compact('data','image','size'));
    }
}
