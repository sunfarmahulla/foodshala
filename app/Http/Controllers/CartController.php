<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
use Redirect;
use App\User;
use App\Order;
use App\Address;
use App\AddMenu;
class CartController extends Controller
{
    public function addCart(Request $request,$id){
       $resturant_id=$request->input('user_id');
        $data = new Cart();
        $data->user_id=Auth::user()->id;
        $data->product_id=$id;
        $data->restaurent_id=$resturant_id;
        if($data->save() == true){
            return Redirect::back()->with('success','successfully add item in your cart');
        }else{
            return Redirect::back()->with('error', 'something got error in add cart');
        }
    }

    public function details(Request $request){
        $product=Cart::where('user_id','=', Auth::user()->id)->where('status','=','pending')->get();
        return view('cartDetails',['product'=>$product]);
        
    }
    public function deleteFromCart(Request $request, $id){
        $delete=Cart::where('id','=',$id)->delete();
        return Redirect::back()->with('success','successfully deleted item');
    }

    public function order(Request $request, $sum){
       $product=Cart::where('user_id','=', Auth::user()->id)->where('status','=','pending')->get();
        
        foreach($product as $product){
            $cart=Cart::findorfail($product->id);
            $cart->status='process';
            $cart->save()== true;
        }
        $invoice_id=auth()->user()->first_name.Auth::user()->id.mt_rand(1000000000, 9999999999);
        $data= new Order();
        $data->user_id=Auth::user()->id;
        $data->total_price=$sum;
        $data->invoice_id=$invoice_id;
        if($data->save() == true){
           
            return Redirect::back()->with('success','successfully Order please wait...');
        }else{
            return Redirect::back()->with('error', 'something got error in order');
        }

    }
    public function orderHistory(Request $request){
        $food = Cart::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('orderHistory',['food'=>$food]);

    }

    public function restaurentOrder(Request $request){
        $order=Cart::where('restaurent_id','=',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('restaurent.home',['order'=>$order]);
    }

    public function updateConfirmStatus(Request $request, $id){
        $data=Cart::findorfail($id);
        $data->status='shipped';
        if($data->save()==true){
            return Redirect::back()->with('success','successfully update orderd status');
        }else{
            return Redirect::back()->with('error', 'something got error in statsu');
        }
    }

}
