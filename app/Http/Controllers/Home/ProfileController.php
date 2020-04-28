<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Customer;
use App\Model\Order;
class ProfileController extends Controller
{
  public function account()
  {
    if (Auth::guard('customers')->check()) {
      $customer_id = Auth::guard('customers')->user()->id;
    $order       = Order::with('orders')->where('customer_id', $customer_id)->orderBy('id', 'DESC')->get();
    return view('frontend.auth.account', compact('order',$order));
    }
    else{
      return redirect('/dang-nhap');
    }
    
  }
}
