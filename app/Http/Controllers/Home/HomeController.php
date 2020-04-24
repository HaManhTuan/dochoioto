<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Media;
use App\Model\Blog;
use View;
class HomeController extends Controller
{
  public function __construct()
  {
    $media_slider = Media::where('position',1)->get();
    $dataBlog = Blog::where('status',1)->orderBy('created_at','asc')->paginate(4);
    $data_send = ['media_slider' => $media_slider, 'dataBlog' =>$dataBlog];
    View::share($data_send);
  }
  public function index(){
    $dataCate = Category::with('categories')->where('parent_id',0)->paginate(3);
    $dataproSale = Product::where('sale','>', 0)->get();
    return view('frontend.home.index', compact('dataCate','dataproSale'));
  }
  public function category($url){
    return view('frontend.home.category');
  }
}
