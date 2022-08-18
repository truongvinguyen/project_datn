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

          $inventory=DB::table('product_inventory')->select('product_size','id')->where('product_id',$request->product_id)->where('product_size',$request->size)->get();
          if(count($inventory)>0){
             return 1;
          }else{
            inventory::create([
               'product_size' => $request->size,
               // 'import_price'=> $request->import_price,
               // 'price'=>$request->price,
               'inventory'=>$request->inventory,
               'sold'=>$request->sold,
               'product_id'=>$request->product_id      
                ]);
                $product_id =$request->product_id;
                $data=inventory::where('product_id',$request->product_id )->get();
                return view('admin.inventory_cut',compact('data','product_id'));  
          }         
    }
    public function update_inventory(Request $request,$id){
       $inventory= inventory::find($id);
       $inventory->update([
        'inventory'=>$request->inventory,
        'sold'=>$request->sold
       ]);
       $product_id =$request->product_id;
       $data=inventory::where('product_id',$request->product_id )->get();
       return view('admin.inventory_cut',compact('data','product_id'));  
    }
    public function delete_inventory(Request $request,$id){
      $inventory= inventory::find($id);
      $inventory->delete();
      return redirect()->back()->withSuccess('Xóa thành công');  
   }
   public function edit_inventory($id){
      $dataedit = DB::table('product_inventory')->select('*')->where('id',$id)->first();
      return view('admin.modalinven',compact('dataedit'));
   }
}
