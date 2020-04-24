<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Customer;
class LoginController extends Controller
{
  public function dangnhap(){
    return view('frontend.auth.login');
  }
}
