<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="{{ asset('public/frontend/assets/images/phone.png') }}" />00-62-658-658</a>
                <a href="#"><img alt="email" src="{{ asset('public/frontend/assets/images/email.png') }}" />Liên hệ !</a>
            </div>
            
            <div class="support-link">
                <a href="#">Dịch vụ</a>
                <a href="#">Hướng dẫn</a>
            </div>
            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>Tài khoản</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="{{ url('/dang-nhap') }}">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="index-2.html"><img alt="Kute Shop" src="{{ asset('public/frontend/assets/images/logo2.png') }}" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
                <form class="form-inline">
                      <div class="form-group form-category">
                        <select class="select-category">
                            <option value="2">Danh mục</option>
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                        </select>
                      </div>
                      <div class="form-group input-serach">
                        <input type="text"  placeholder="Nhập từ khóa...">
                      </div>
                      <button type="submit" class="pull-right btn-search"></button>
                </form>
            </div>
            <div class="col-xs-5 col-sm-2 group-button-header">
                <div class="btn-cart" id="cart-block">
                    <a title="My cart" href="cart.html">Cart</a>
                    <span class="notify notify-right">2</span>
                    <div class="cart-block">
                        <div class="cart-block-content">
                            <h5 class="cart-title">2 sản phẩm trong giỏ hàng</h5>
                            <div class="cart-block-list">
                                <ul>
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="#" class="remove_link"></a>
                                        <a href="#">
                                        <img class="img-responsive" src="{{ asset('public/frontend/assets/data/product-100x122.jpg') }}" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">Donec Ac Tempus</p>
                                        <p class="p-rice">61,19 €</p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="#" class="remove_link"></a>
                                        <a href="#">
                                        <img class="img-responsive" src="{{ asset('public/frontend/assets/data/product-s5-100x122.jpg') }}" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">Donec Ac Tempus</p>
                                        <p class="p-rice">61,19 €</p>
                                        <p>Qty: 1</p>
                                    </div>
                                </li>
                            </ul>
                            </div>
                            <div class="toal-cart">
                                <span>Tổng</span>
                                <span class="toal-price pull-right">122.38 €</span>
                            </div>
                            <div class="cart-buttons">
                                <a href="order.html" class="btn-check-out">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> 
    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">Danh mục sản phẩm</span>
                        <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">
                            @foreach ($menu_data as $item)
                            <li>
                                <a class="parent" href="{{ url('danh-muc/'.$item['url']) }}"><img class="icon-menu" alt="Funky roots" src="{{ asset('public/uploads/images/category/'.$item['icon']) }}">{{ $item['name']}}</a>
                                    @if ( count($item['child']) > 0 )
                                        <div class="vertical-dropdown-menu">
                                            <div class="vertical-groups col-sm-12">
                                                @foreach ($item['child'] as $element)
                                                 @if ( count($element['child']) > 0 )
                                                    <div class="mega-group col-sm-4">
                                                            <h4 class="mega-group-header"><span>{{$element['name']}}</span></h4>
                                                            <ul class="group-link-default">
                                                                @foreach ($element['child'] as $element1)
                                                                     <li><a href="{{ url('danh-muc/'.$element1['url']) }}">{{$element1['name']}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                    </div>
                                                @else
                                                <div class="mega-group col-sm-4" onclick="window.location.href='{{url('danh-muc/'.$element['url'])}}'">
                                                    <h4 class="mega-group-header" ><span>{{$element['name']}}</span></h4>  
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                            </li>
                            @endforeach
                        </ul>
                       {{--  <div class="all-category"><span class="open-cate">All Categories</span></div> --}}
                    </div>
                </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="{{(request()->is('/') ? "active":"")}}"><a href=" {{ url('/') }}">Trang chủ</a></li>
                                    <li class="{{(request()->is('gia-soc') ? "active":"")}}"><a href="{{ url('/gia-soc') }}">Giá sốc</a></li>
                                    <li><a href="category.html">Hướng dẫn mua hàng</a></li>
                                    <li><a href="category.html">Hỗ trợ</a></li>
                                    <li><a href="category.html">Kiểm tra đơn hàng</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>