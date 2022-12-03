<?php

namespace App\Http\Controllers;

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

class ProductController extends Controller
{
    //
    function index()
    {
        $data= Product::all();
       return view('product',['products'=>$data]);
     
    }
    function detail($id)
    {
        $data =Product::find($id);
        
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/');

        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return Cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId=Session::has('user') ? Session::get('user')['id'] : '';
        $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
      if(Session::has('user')){
        
         return view('cartlist',['products'=>$products]);
      }else{
       return view('login');
      }
        
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow()
    {
     $userId=Session::has('user') ? Session::get('user')['id'] : '';
        $total= $products= DB::table('cart')
         ->join('products','cart.product_id','=','products.id')
         ->where('cart.user_id',$userId)
         ->sum('products.price');

         return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req)
    {
        $userId=Session::has('user') ? Session::get('user')['id'] : '';
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             Cart::where('user_id',$userId)->delete();
         }
         $req->input();
         return redirect('/');
    }
    function myOrders()
    {
        $userId=Session::has('user') ? Session::get('user')['id'] : '';
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();
     if(Session::has('user')){
         return view('myorders',['orders'=>$orders]);
     }else{
         return view('login');
     }
    }
    function admin_products()
    {
        $products= Product::all();
       return view('admin_products',['products'=>$products]);
    }
    
    function admin_add_product(){
       
    return view('admin_add_product'); 
    }
    function admin_store_product(Request $request){
       $product = new Product;

    $product->name = $request->name;
    $product->category = "tv";
    $product->price = $request->price;
    $product->description = $request->description;
    $product->gallery = $request->gallery;
    $product->save();

    return redirect('admin_products'); 
    }
    function admin_edit_product($id){
      $product= Product::find($id);
      return view('admin_edit_product',['product'=>$product]);
    }
    function admin_update_product(Request $request,$id){
      $product = Product::findOrFail($id);
    
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->gallery = $request->gallery;
    $product->save();
    
    return redirect('admin_products'); 
    }
     function admin_delete_product($id){
      $product=Product::find($id);
      $product->delete();
    
    return redirect('admin_products'); 
    }
    function excel(){
      
      return Excel::download(new ProductsExport, 'productos.xlsx');
    }
    function PDF(){
      return Excel::download(new ProductsExport, 'productos.pdf');
    }
    function cart_excel(){
      return Excel::download(new CartExport, 'carrito.xlsx');
    }
    function cart_PDF(){
      return Excel::download(new CartExport, 'carrito.pdf');
    }
    function orders_excel(){
      
      return Excel::download(new OrdersExport, 'ordenes.xlsx');
    }
    function orders_PDF(){
      return Excel::download(new OrdersExport, 'ordenes.pdf');
    }
}
