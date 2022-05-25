<?php
 namespace App\Models;


 class cart{
     public $products = null;
     public $totalPrice = 0;
     public $totalQty = 0;
     public function __construct($cart){
         if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQty = $cart->totalQty;
         }
     }
     public function addCart($product,$id,$quantity){
         $newProduct = ['quanty'=>$quantity,'price'=>$product->price,'productInfo'=>$product];
         if($this->products){
           if(array_key_exists($id,$this->products)){
             $newProduct = $this->products[$id];
           }  
         }
         $newProduct['quanty']=$quantity+$newProduct['quanty'];
         $newProduct['price']= $newProduct['quanty']*$product->price;
         $this->products[$id] = $newProduct;
         $this->totalPrice +=$product->price;
         $this->totalQty++;
        
     }
    //  public function DeleteItem($id){
    //      $this->totalQty -= $this->products[$id]['quanty'];
    //      $this->totalPrice -= $this->products[$id]['price'];
    //      unset($this->products[$id]);
    //  }
     public function updateCart($id,$quanty){
         $this->totalQty -= $this->products[$id]['quanty'];
         $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->product_price;

        $this->totalQty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
     }

 }
?>
        