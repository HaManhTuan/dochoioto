@extends('layouts.frontend.home')
@section('content')
@include('layouts.frontend.slider')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h2 class="page-heading">
                    <span class="page-heading-title">Sản phẩm đang khuyến mãi</span>
                </h2>
                <div class="latest-deals-product">
                    <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "10" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                        @foreach ($dataproSale as $element)
                            <li>
                                <div class="left-block">
                                    <a href="{{ url('san-pham/'.$element->url) }}"><img class="img-responsive" alt="product" src="{{ asset('public/uploads/images/products/'.$element->image) }}" /></a>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                    <div class="price-percent-reduction2">
                                        -{{$element->sale}}% 
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">{{ $element->name }}</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">{{ number_format($element->promotional_price)}}</span>
                                        <span class="price old-price">{{ number_format($element->price)}}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-page">
    <div class="container">
        <!-- featured category fashion -->
        @foreach ($dataCate as  $key1 => $element)
       
            <div class="category-featured fashion">
                <nav class="navbar nav-menu show-brand">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-brand"><a href="{{ url('/danh-muc/'.$element->url) }}">{{$element->name}}</a></div>
                      <span class="toggle-menu"></span>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">           
                      <ul class="nav navbar-nav">
                        @foreach ($element->categories as $key => $item)
                           <li class="{{ $key == "0" ? "active":""}}"><a data-toggle="tab" href="#tab-{{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                  <div id="elevator-{{$element->id}}" class="floor-elevator">
                        <a href="@if ($key1 == "0")#@elseif($key1 == "1")#elevator-{{$element->id - 1}}@elseif($key1 == "2")#elevator-{{$element->id - 1}}@endif" class="btn-elevator up {{$key1 == "0" ? "disabled":""}} fa fa-angle-up"></a>
                        <a href="#elevator-{{$element->id + 1}}" class="btn-elevator down fa fa-angle-down"></a>
                  </div>
                </nav>
                <div class="product-featured clearfix">
                    <div class="row">
                        <div class="col-sm-12 col-right-tab">
                            <div class="product-featured-tab-content">
                                <div class="tab-container">
                                    @foreach ($element->categories as $key1 => $item)
                                        <div class="tab-panel {{ $key1 == "0" ? "active":""}}" id="tab-{{$item->id}}">
                                           <div class="box">
                                            @php
                                                $dataProCateChild = DB::table('product')->where('category_id',$item->id)->paginate(4);
                                            @endphp
                                               <ul class="product-list row">
                                                @foreach ($dataProCateChild as $item1)
                                                    <li class="col-sm-3">
                                                        <div class="left-block">
                                                            <a href="{{ url('san-pham/'.$item1->url) }}"><img class="img-responsive" alt="product" src="{{ asset('public/uploads/images/products/'.$item1->image) }}" /></a>
                                                            <div class="add-to-cart">
                                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="right-block">
                                                            <h5 class="product-name"><a href="{{ url('san-pham/'.$item1->url) }}">{{$item1->name}}</a></h5>
                                                            <div class="content_price">
                                                                <span class="price product-price">{{number_format($item1->price)}} VNĐ</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                               </ul>
                                           </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        <!-- end featured category fashion -->
    </div>
</div>
<div id="content-wrap">
    <div class="container">
        <!-- blog list -->
        <div class="blog-list">
            <h2 class="page-heading">
                <span class="page-heading-title" onclick="">Tin tức</span>
            </h2>
            <div class="blog-list-wapper">
                <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                    @foreach ($dataBlog as $element)
                    <li>
                        <div class="post-thumb image-hover2">
                            <a href="#"><img src="{{ asset('public/uploads/images/blog/'.$element->image) }}" alt="Blog"></a>
                        </div>
                        <div class="post-desc">
                            <h5 class="post-title">
                                <a href="#">{{$element->name}}</a>
                            </h5>
                            <div class="post-meta">
                                <span class="date">{{date("d-m-Y", strtotime($element->created_at))}}</span>
                               
                            </div>
                            <div class="readmore">
                                <a href="#">Đọc tiếp</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- ./blog list -->
    </div> <!-- /.container -->
</div>
@endsection