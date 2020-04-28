<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cart;
use DB;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Customer;
class CheckoutController extends Controller
{
  public function step(){
    if (Auth::guard('customers')->check()) {
      return view('frontend.step.step');
    }
    else{
      return redirect('/dang-nhap')->with('flash_ms_error','Bạn phải đăng nhập để mua hàng');
    }
  }
  public function stepcontinue(Request $req){
    
    $name_order = $req->name_shipping;
    $phone_order = $req->phone_shipping;
    $address_order = $req->address_shipping;
    
    $data_send = [
      'name_order' => $name_order, 
      'phone_order' => $phone_order,
      'address_order' => $address_order
    ];
    //print_r($data_send);
    return view('frontend.step.step_continue')->with($data_send);
  }
  public function checkout(Request $req){
    $cart_data = Cart::getContent();
    $cart_subtotal = Cart::getSubTotal();
    $order                = new Order();
    $order->customer_id   = Auth::guard('customers')->user()->id;
    $order->email         = Auth::guard('customers')->user()->email;
    $order->total_price   = $cart_subtotal;
    $order->name          = $req->name_order;
    $order->phone         = $req->phone_order;
    $order->note          = $req->note;
    $order->address       = $req->address_order;
    $order->order_status  = '1';
    $order->order_method  = $req->method_order;
     if ($order->save()) {
      $order_id     = DB::getPdo()->lastInsertId();
      foreach ($cart_data as $value) {
        $orderdetail               = new OrderDetail();
        $orderdetail->order_id     = $order_id;
        $orderdetail->product_id   = $value->attributes->product_id;
        $orderdetail->customer_id  = Auth::guard('customers')->user()->id;
        $orderdetail->product_name = $value->name;
        $orderdetail->price        = $value->price;
        $orderdetail->quantity     = $value->quantity;
        $query = $orderdetail->save();
      }
      if ($query) {
         return redirect('cart/thanks');
      }
    }
  }
  public function thank()
  {
    Cart::clear();
    return view('frontend.home.thanks');
  }
}
