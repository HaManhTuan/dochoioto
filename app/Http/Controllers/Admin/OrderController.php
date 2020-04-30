<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use DB;
use Auth;
class OrderController extends Controller
{
  public function view()
  {
   $orders = Order::with('orders')->get();
   return view('backend.order.list')->with(compact('orders'));
  }
}
