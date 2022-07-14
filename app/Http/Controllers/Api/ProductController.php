<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function qty_sold(String $orderBy = 'product.id', String $sort = 'desc'){
        $qty_sold = DB::table('product') 
        ->selectRaw('product.id,5 CAST(sum(inventory) as int) as qty_sold')
        ->groupBy($orderBy)
        ->orderBy($orderBy, $sort)
        ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
        ->get();
        return $qty_sold;
    }


    public function show($id)
    {
        //
    }

}
