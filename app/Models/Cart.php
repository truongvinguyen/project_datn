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
            $newProduct = ['quanty'=>0,'price'=>$product->price,'productInfo'=>$product];
            if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct = $this->products[$id];    
            }
            }
            $newProduct['quanty']=$quantity+$newProduct['quanty'];     
            $newProduct['price']= $quantity*$product->price;
            $this->products[$id] = $newProduct;
            $this->totalPrice +=$newProduct['price'];
            $this->totalQty +=$quantity;    
        }
        public function DeleteItem($id){
            $price = $this->products[$id]['productInfo']->price;
            $this->totalPrice -= $price * $this->products[$id]['quanty'];
            $this->totalQty -= $this->products[$id]['quanty'];
            unset($this->products[$id]);
        }
        public function updateCart($id,$quanty){
            $this->totalQty -= $this->products[$id]['quanty'];
            $this->totalPrice -= $this->products[$id]['price'];

            $this->products[$id]['quanty'] = $quanty;
            $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->price;

            $this->totalQty += $this->products[$id]['quanty'];
            $this->totalPrice += $this->products[$id]['price'];
        }
    }

    
        