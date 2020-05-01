@extends('layouts.frontend.home')
@section('content')
<script>
  jQuery(document).ready(function($) {
    $("body").removeClass('home');
    $("body").addClass('product-page right-sidebar');
  });
</script>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ url('/') }}" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="#" title="Blog">Tin tức</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span> {{$dataBlog->name}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->

            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2">{{$dataBlog->name}}</span>
                </h1>
                <article class="entry-detail">
                    <div class="entry-meta-data">
                        <span class="date"><i class="fa fa-calendar"></i> {{$dataBlog->created_at}}</span>
                    </div>
                    <div class="entry-photo">
                        <img src="assets/data/blog-full.jpg" alt="Blog">
                    </div>
                    <div class="content-text clearfix">
                        {!!$dataBlog->content!!}
                    </div>
                </article>
                <!-- Related Posts -->
                <div class="single-box">
                    <h2>Các bài viết khác</h2>
                    <ul class="related-posts owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
                        @foreach ($blogReleast as $element)
                          <li class="post-item">
                            <article class="entry">
                                <div class="entry-thumb image-hover2">
                                    <a href="{{ url('bai-viet/'.$element->id) }}">
                                        <img src="{{ asset('public/uploads/images/blog/'.$element->image) }}" alt="Blog">
                                    </a>
                                </div>
                                <div class="entry-ci">
                                    <h3 class="entry-title"><a href="{{ url('bai-viet/'.$element->id) }}">{{$element->name}}</a></h3>
                                    <div class="entry-meta-data">
                                        <span class="date">
                                            <i class="fa fa-calendar"></i> {{ date('d-m-Y',strtotime($element->created_at))}}
                                        </span>
                                    </div>
                                    <div class="entry-more">
                                        <a href="{{ url('bai-viet/'.$element->id) }}">Đọc tiếp</a>
                                    </div>
                                </div>
                            </article>
                        </li>}
                        @endforeach
                        

                    </ul>
                </div>
                <!-- ./Related Posts -->

            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection