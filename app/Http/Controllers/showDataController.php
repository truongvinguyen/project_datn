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
        

        if(Session::has('userId')){
            $suggestions = $wishlist->productList(Session::get('userId'));
        }else {
            $suggestions = $data->whereNotNull('product_price_sale')->limit(4)->get();
        }
       
    
        $articles = $article->article()->limit(4)->get();
        return view('client.others.home-page', compact('best_product','products','articles','suggestions'));
    }

    public function article_page(){
        $article = new article();
        $articles = $article->article()->limit(4)->get();
        $artBrandLength = $article->pageStatus()->count();
        $brands = brand::all();
        return view('client.article.article-page',compact('articles','brands','artBrandLength'));
    }

    public function article_by_brand($id){
        $article = new article();
        $artByBrand = $article->articleByBrand($id)->get();
        $artBrandLength = $article->articleByBrand($id)->count();
        $idBrand = $id;
        return view('client.article.article',compact('idBrand','artByBrand','artBrandLength'));
    }

    public function popular_posts(){
        $article = new article();
        $articles = $article->popular()->limit(4)->get();
        return view('client.article.popular-posts',compact('articles'));
    }

    public function artPagePagination(){
        $article = new article();
        $artByBrand = $article->pageStatus()->get();
        return view('client.article.article_pages',compact('artByBrand'));
    }

    public function artPagination($id){
        $article = new article();
        $artByBrand = $article->status($id)->get();
        $artBrandLength = $article->status($id)->count();
        $idBrand = $id;
        return view('client.article.article',compact('idBrand','artByBrand','artBrandLength'));
    }


    public function articleOne($id){
        $art = new article();

        $articles = $art->article()->limit(4)->get();
        $articleOne = $art->articleOne($id);
    
        $articleByCategory = $art->articleByCategory($articleOne->category_id)->get();
      
        return view('client.article.article-one',compact('articles','articleOne','articleByCategory'));
    }

    public function product_grid($columns_name,$id){
        $data = new product();
        $article = new article();

        $categories = category::all();
        $articles = $article->article();
        $brands = brand::all();
        $productAll = $data->productByCategory($id);

        $lowToHigh = $data->priceLow();
        $highToLow = $data->priceHigh();
        $productSale = $data->whereNotNull('product_price_sale')->offset(0)->limit(6)->where('category_id','=',$id)->get();
 
        $productSaleLength = $data::whereNotNull('product_price_sale')->where('category_id','=',$id,)->where('product_status','=','1')->count();
        $productAllLength = $data->paginateCate($columns_name,$id)->count();
    
        return view('client.product.product-cate',compact('brands','productSaleLength','productAllLength','categories','articles','productAll','highToLow','lowToHigh','productSale'));
    }

    public function all_product(Request $request){
        $data = new product();
        $article = new article();
        $categories = category::all();

        $brands = brand::all();
        $articles = $article->article();
        $productAll = $data->productAll();
        $lowToHigh = $data->priceLow();
        $highToLow = $data->priceHigh();
        $productSale = $data->priceSale();
 
        $productSaleLength = $data::whereNotNull('product_price_sale')->count();
        $productAllLength = $data::orderBy('id','desc')->where('product_status','=','1')->count();
        return view('client.product.product-grid',compact('brands','productSaleLength','productAllLength','categories','articles','productAll','highToLow','lowToHigh','productSale'));
    }

    public function pagination($orderBy,$sort){
        $data = new product();
        $products = $data->pagination($orderBy,$sort) ->where('product_status','=','1')->paginate(6);
        return view('client.product.productGrid',compact('products'));
    }

    public function paginateCate($columns_name,$cate){
        $data = new product();
        $products = $data->paginateCate($columns_name,$cate) ->where('product_status','=','1')->paginate(6);
    
        return view('client.product.productGrid',compact('products'));
    }

    public function search(Request $request){
        $data = new product();

        $value = $request->search;
        
        $lowToHigh = $data->orderBy('product_price','asc')->where('product_name', 'like','%' .$value. '%')->offset(0)->limit(6)->get();
        $highToLow = $data->orderBy('product_price','desc')->where('product_name', 'like','%' .$value. '%')->offset(0)->limit(6)->get();
        $productSale = $data->whereNotNull('product_price_sale')->where('product_name', 'like','%' .$value. '%') ->offset(0)->limit(6) ->get();

        $productSaleLength = $data::where('product_name', 'like','%' .$value. '%')->whereNotNull('product_price_sale')->count();
        $productAllLength = $data::where('product_name', 'like','%' .$value. '%') ->where('product_status','=','1')->count();

        $products = $data->searchProduct($value);  
        
        return view('client.product.search',compact('productSaleLength','productAllLength','products','highToLow','lowToHigh','productSale'));
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
