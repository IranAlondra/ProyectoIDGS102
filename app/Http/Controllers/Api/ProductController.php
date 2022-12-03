<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Exports\CartExport;
use App\Exports\OrdersExport;

class ProductController extends Controller {

    function index()
    {
        $products= Product::all();
       return $products;
     
    }
    function store(Request $request){
    $product = new Product;

    $product->name = $request->name;
    $product->category = "tv";
    $product->price = $request->price;
    $product->description = $request->description;
    $product->gallery = $request->gallery;
    if($product->save()){
    return response(['message' => 'Producto agregado'], 200);    
    }else{
    return response(['errors' => 'Algo salió mal'], 403);
    }
    }
    function show($id)
    {
        $product =Product::find($id);
        
        return $product;
    }
    function update(Request $request,$id){
    
    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->gallery = $request->gallery;
    if($product->save()){
    return response(['message' => 'Producto actualizado'], 200);    
    }else{
    return response(['errors' => 'Algo salió mal'], 403);
    } 
    }
    function destroy($id){
      $product=Product::find($id);
      if($product->delete()){
    return response(['message' => 'Producto eliminado'], 200);    
    }else{
    return response(['errors' => 'Algo salió mal'], 403);
    } 
    }
    function myOrders($id)
    {
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$id)
         ->get();
     return $orders;
    }
    function cartList($id)
    {
        $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$id)
        ->select('products.*','cart.id as cart_id')
        ->get();
      return $products;
        
    }
    function addToCart(Request $req,$id)
    {
           $cart= new Cart;
           $cart->user_id=$id;
           $cart->product_id=$req->product_id;
           if($product->delete()){
           return response(['message' => 'Producto agregado al carrito'], 200);    
           }else{
           return response(['errors' => 'Algo salió mal'], 403);
           } 
    }
        
    
    function removeCart($id)
    {    
        if(Cart::destroy($id)){
           return response(['message' => 'Producto eliminado del carrito'], 200);    
           }else{
           return response(['errors' => 'Algo salió mal'], 403);
           }
        }
    }
