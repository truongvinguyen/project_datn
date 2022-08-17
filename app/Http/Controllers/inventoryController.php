<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;
use App\Models\imageProduct;
use App\Models\inventory;


class inventoryController extends Controller
{
    public function index($product_id,$product_name){
       $product_name=$product_name;
       $product_id=$product_id;
       $data=inventory::where('product_id',$product_id)->get();
       $import_price=DB::table('product_inventory')->where('product_id',$product_id)->first();
       $price=DB::table('product')->where('id',$product_id)->first();
       return view('admin.inventory',compact('data','product_name','import_price','price','product_id'));
    }


    public function add_new_inventory(Request $request){
        $inventory=DB::table('product_inventory')->where('product_id',$request->product_id)->get();
          foreach($inventory as $item){
            if($item->product_size == $request->size){
              
               return redirect()->back()->withError('Trùng kích thước');
            }       
          }
        
            inventory::create([
            'product_size' => $request->size,
            'import_price'=> $request->import_price,
            'price'=>$request->price,
            'inventory'=>$request->inventory,
            'sold'=>$request->sold,
            'product_id'=>$request->product_id      
             ]);
             return redirect()->back()->withSuccess('Thêm kích thước thành công');     
    }
    public function update_inventory(Request $request,$id){
       $inventory= inventory::find($id);
       $inventory->update([
        'product_size' => $request->size,
        'import_price'=> $request->import_price,
        'price'=>$request->price,
        'inventory'=>$request->inventory,
        'sold'=>$request->sold,
        'product_id'=>$request->product_id  
       ]);
       return redirect()->back()->withSuccess('Cập nhật thành công');  
    }
    public function delete_inventory(Request $request,$id){
      $inventory= inventory::find($id);
      $inventory->delete();
      return redirect()->back()->withSuccess('Xóa nhật thành công');  
   }
}
