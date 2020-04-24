@extends('layouts.frontend.home')
@section('content')
<style>
#loading
{
 text-align:center; 
 background: url('{{ asset('public/frontend/loader.gif') }}') no-repeat center; 
 height: 150px;
}
</style>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{ $dataCate->name}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Danh mục sản phẩm</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <li class="active">
                                        <span></span><a href="#">{{$dataCate->name}}</a>
                                        <ul style="display: block;">
                                          @foreach($dataCate->categories as $element) 
                                            <li><span></span><a href="{{ url('danh-muc/'.$element->url) }}">
                                              {{ $element->name}}
                                            </a></li>
                                          @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block filter -->
                <div class="block left-module">
                    <p class="title_block">Khoảng giá</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter price -->
                            <div class="layered_subtitle">giá</div>
                            <div class="layered-content slider-range">
                                <input type="text" id="hidden_minimum_price" value="0" />
                                <input type="text" id="hidden_maximum_price" value="12000000" />
                                <div data-label-reasult="Giá:" data-min="0" data-max="12000000" data-unit="VNĐ" class="slider-range-price" data-value-min="100000" data-value-max="1000000"></div>
                                <div class="amount-range-price">Giá: 300 nghìn - 1 triệu</div>
{{--                                 <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="p1" name="cc" />
                                        <label for="p1">
                                        <span class="button"></span>
                                        $20 - $50<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p2" name="cc" />
                                        <label for="p2">
                                        <span class="button"></span>
                                        $50 - $100<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p3" name="cc" />
                                        <label for="p3">
                                        <span class="button"></span>
                                        $100 - $250<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                </ul> --}}
                            </div>
                            <!-- ./filter price -->
                            <!-- ./filter brand -->
                            <div class="layered_subtitle">thương hiệu</div>
                            <div class="layered-content filter-brand">
                                <ul class="check-box-list">
                                    @foreach ($dataBrand as $element)
                                        <li>
                                            <input type="checkbox" id="brand{{ $element->id}}" name="cc" class="common_selector brand" value="{{ $element->id}}"/>
                                            <label for="brand{{ $element->id}}">
                                            <span class="button"></span>
                                                {{ $element->name}}
                                            </label>   
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- ./filter brand -->
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>
                <!-- ./block filter  -->
                <!-- Testimonials -->
                <div class="block left-module">
                    <p class="title_block">Testimonials</p>
                    <div class="block_content">
                        <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./Testimonials -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title">{{$dataCate->name}}</span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid filter_data">
                        
                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                    <div class="show-product-item">
                        <select name="">
                            <option value="">Show 18</option>
                            <option value="">Show 20</option>
                            <option value="">Show 50</option>
                            <option value="">Show 100</option>
                        </select>
                    </div>

                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<script>
  jQuery(document).ready(function($) {
    $("body").removeClass('home');
    $("body").addClass('page-category');
    filter_data();
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        //console.log(brand);
        $.ajax({
            url:"{{ url('/filter-product/'.$dataCate->url) }}",
            method:"POST",
            cache:false,
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
            data:{minimum_price:minimum_price, maximum_price:maximum_price, brand:brand},
            success:function(data){
                console.log(data);
                $('.filter_data').html(data);
            },
            error: function(err){
                console.log(err);
            }
        });
    }
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
    $('.common_selector').click(function(){
        filter_data();
    });
    function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
    }
    // CATEGORY FILTER 
    $('.slider-range-price').each(function(){
            var min             = $(this).data('min');
            var max             = $(this).data('max');
            var unit            = $(this).data('unit');
            var value_min       = $(this).data('value-min');
            var value_max       = $(this).data('value-max');
            var label_reasult   = $(this).data('label-reasult');
            var t               = $(this);
            $( this ).slider({
              range: true,
              min: min,
              max: max,
              step: 100000,
              values: [ value_min, value_max ],
              stop: function( event, ui ) {
                var result = label_reasult +" "+ number_format(ui.values[ 0 ]) + unit +' - '+ number_format(ui.values[ 1 ]) + unit;
                //console.log(t);
                t.closest('.slider-range').find('.amount-range-price').html(result);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
              }
            });
        })
  });
</script>
@endsection