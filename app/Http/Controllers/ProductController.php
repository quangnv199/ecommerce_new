<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $data = Product::all();
        return view('product',['products'=>$data]);
        // return Product::all();//test dang json lay tu database mysql
    }

    function detail($id){
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }

    function addToCart(Request $request){
        if($request->session()->has('user')){
            $cart = new Cart();
            $cart->user_id=$request->session()->get('user')['id'];// la id luu len (1)
            //database de nguoi mua co the mua o bat cu dau (2);
            $cart->product_id=$request->product_id;
            $cart->save();
            return redirect('/');//mua hang xong tro ve trang chu
        }else{
            return redirect('/login');
        }
        
    }

    static function cartItem(){
        $userID = Session::get('user')['id'];
        return Cart::where('user_id',$userID)->count();
    }

    function cartList(){
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(){
        $userId = Session::get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);
    }

    function orderPlace(Request $request){
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_Id',$userId)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$request->payment;
            $order->payment_status="pending";
            $order->address=$request->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        $request->input();
        return redirect('/');
    }

    function myOrders(){
        $userId = Session::get('user')['id'];
        // return DB::table('orders') xem co tra ve json hay khong
        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('myorders',['orders'=>$orders]);
    }
    
}
