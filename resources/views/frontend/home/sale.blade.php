@extends('layouts.frontend.home')
@section('content')
<script>
  jQuery(document).ready(function($) {
    $("body").removeClass('home');
    $("body").addClass('page-category');
  });
</script>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ url('/')}}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Giá sốc</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-12" id="center_column">
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title">Giá sốc</span>
                    </h2>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        @foreach ($dataproSale as $element)
                            <li class="col-sx-12 col-sm-3" id="loadmore">
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="{{ url('san-pham/'.$element->url)}}">
                                            <img class="img-responsive" alt="product" src="{{ asset('public/uploads/images/products/'.$element->image) }}" />
                                        </a>
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="#add">Mua ngay</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="{{ url('san-pham/'.$element->url)}}">{{ $element->name }}</a></h5>
                                        <div class="content_price">
                                        @if ($element->promotional_price > 0) 
                                            <span class="price product-price">{{number_format($element->promotional_price)}}</span>
                                            <span class="price old-price">{{number_format($element->price)}}</span>
                                        
                                        @else{
                                            <span class="price product-price">{{number_format($element->price)}}</span>
                                        }  
                                        @endif
                                       </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                     {{ $dataproSale->links('frontend.pagination.paginate') }}
                </div>  
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<script id="script"></script>

@endsection