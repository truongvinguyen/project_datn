<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;

class SearchController extends Controller
{
    public function search(Request $request, $value){
    $data = new product();
        $products = $data->searchProduct($value);
        if($products){
            return view('client.product.product-grid',compact('products'));
        }
    
    }
}
