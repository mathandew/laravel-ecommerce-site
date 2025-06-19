<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(){

        $users = User::where('usertype', 'user')->get()->count();

        $products = Product::all()->count();

        $orders = Order::all()->count();
        $delivered_orders = Order::where('status', 'Delivered')->count();

        return view('admin.index', compact('users', 'products', 'orders', 'delivered_orders'));
    }

    public function home(){

        $products = Product::all();

        if(Auth::id()){

            $user = Auth::user();
            $user_id = $user->id;
    
            $cart_count = Cart::where('user_id', $user_id)->count();

            // return view('home.index', compact('products', 'cart_count'));
        }else{
            $cart_count = ' ';
        }

        return view('home.index', compact('products', 'cart_count'));
    }

    public function login_home(){

        $products = Product::all();

        $user = Auth::user();
        $user_id = $user->id;

        $cart_count = Cart::where('user_id', $user_id)->count();

        return view('home.index', compact('products', 'cart_count'));
    }

    public function product_detail($id){

        $product = Product::find($id);
        
        if(Auth::id()){

            $user = Auth::user();
            $user_id = $user->id;
    
            $cart_count = Cart::where('user_id', $user_id)->count();

            
        }else{
            $cart_count = ' ';
        }


        return view('home.product_detail', compact('product', 'cart_count'));
    }

    public function add_cart($id){

        $product_id = $id;

        $user = Auth::user();
        $user_id = $user->id;

        $cart = new Cart;

        $cart->user_id = $user_id;
        $cart->product_id = $product_id;

        $cart->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Product added to the Cart Successfully');

        return redirect()->back();
    }

    public function mycart(){

        if(Auth::id()){

            $user = Auth::user();
            $user_id = $user->id;
    
            $cart_count = Cart::where('user_id', $user_id)->count();

            $cart = Cart::where('user_id', $user_id)->get();

            
        }else{
            $cart_count = ' ';
        }
        return view('home.mycart', compact('cart_count', 'cart'));
    }

    public function confirm_order(Request $request){

        $recipientName = $request->recipientName;
        $recipientAddress = $request->recipientAddress;
        $recipientPhone = $request->recipientPhone;

        $user_id = Auth::user()->id;

        $cart = Cart::where('user_id', $user_id)->get();

        foreach ($cart as $carts) {
            
            $order = new Order;

            $order->name = $recipientName;
            $order->rec_address = $recipientAddress;
            $order->phone = $recipientPhone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;

            $order->save();

        }

        $empty_cart = Cart::where('user_id', $user_id)->get();

        foreach ($empty_cart as $cart) {
            
            $cart_data = Cart::find($cart->id);

            $cart_data->delete();
        }
        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Order Placed Successfully');

        return redirect()->back();

    }

    public function myorders(){

        $user = Auth::user()->id;

        $cart_count = Cart::where('user_id', $user)->count();

        $orders = Order::where('user_id', $user)->get();

        return view('home.myorders', compact('cart_count', 'orders'));
    }
}
