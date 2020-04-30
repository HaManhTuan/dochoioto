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
            <span class="navigation_page">{{ $dataproIntrol->name}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                {!! $dataproIntrol->content !!}
            </div>
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Introl</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="">
                                    @foreach ($dataIntrol as $element)
                                        <li>
                                        <a href="{{ url('/introl/'.$element->url) }}">
                                              {{ $element->name}}
                                            </a>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ./row-->
    </div>
</div>
<script id="script"></script>

@endsection