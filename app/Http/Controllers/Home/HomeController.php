<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Media;
use App\Model\Blog;
use App\Model\Brand;
use View;
class HomeController extends Controller
{
  public function __construct()
  {
    $media_slider = Media::where('position',1)->get();
    $dataBrand = Brand::orderBy('created_at','ASC')->get();
    $dataBlog = Blog::where('status',1)->orderBy('created_at','asc')->paginate(4);
    $data_send = ['media_slider' => $media_slider, 'dataBlog' =>$dataBlog,'dataBrand' => $dataBrand];
    View::share($data_send);
  }
  public function index(){
    $dataCate = Category::with('categories')->where('parent_id',0)->paginate(3);
    $dataproSale = Product::where('sale','>', 0)->get();
    return view('frontend.home.index', compact('dataCate','dataproSale'));
  }
  public function category($url){
    $dataCate = Category::with('categories')->where('url',$url)->first();
    return view('frontend.home.category', compact('dataCate', $dataCate));
  }
  public function filter(Request $req, $url){
    $cate_data = Category::where('url', $url)->first();
    $idin[]    = $cate_data->id;
    $cate_in   = Category::where('parent_id', $cate_data->id)->get();
    foreach ($cate_in as $item) {
        if (in_array($item->id, $idin) == false) {
            $idin[] = $item->id;
        }
    }
    $query = Product::whereIn('category_id', $idin);
     if(isset($req->minimum_price, $req->maximum_price) && !empty($req->minimum_price) && !empty($req->maximum_price)){
      $query = $query->whereBetween('price',[$req->minimum_price, $req->maximum_price]);
     }
     if(isset($req->brand) && !empty($req->brand)){
      $query = $query->where('brand_id',$req->brand);
     }
    $query = $query->paginate(1);
    $output = '';
    if (count($query) > 0) {
      foreach($query as $row)
      {
       $output .= '<li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="#">
                                        <img class="img-responsive" alt="product" src="'.asset('public/uploads/images/products/').'/'.''.$row['image'].'" />
                                    </a>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Mua ngay</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">'.$row['name'].'</a></h5>
                                    <div class="content_price">';
                                    if ($row['promotional_price'] > 0) {
                                        $output .= '<span class="price product-price">'.number_format($row['promotional_price']).'</span>';
                                        $output .= '<span class="price old-price">'.number_format($row['price']).'</span>';
                                    }
                                    else{
                                        $output .= '<span class="price product-price">'.number_format($row['price']).'</span>';
                                    }  
                                    $output .= '</div>
                                </div>
                            </div>
                        </li>
                       ';
      }
    }
    else
   {
    $output = '<h3 style="text-align: center; margin-top:25px; ">Không có dữ liệu</h3>';
   }
    echo $output;
  }
}
