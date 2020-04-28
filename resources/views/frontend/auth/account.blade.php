@extends('layouts.frontend.home')
@section('content')
<style type="text/css" media="screen">
  .error{
    display: flex;
    color: red;
  }
</style>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ url('/') }}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Cập nhật thông tin</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Thông tin tài khoản</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
                <div class="col-sm-4">
                    <div class="box-authentication">
                        <h3>Bạn có thể thay đổi thông tin</h3>
                        <form action="{{ url('/update-account') }}" method="POST" id="frm-register" onsubmit="return false;">
                          @csrf
                          <label for="name_register">Họ tên</label>
                          <input id="name_register" type="text" class="form-control" name="name" id="name" data-rule-required="true" data-msg-required="Vui lòng nhập tên." value="{{ Auth::guard('customers')->user()->name}}">
                          <label for="phone_register">Số điện thoại</label>
                          <input id="phone_register" type="text" class="form-control" name="phone" id="phone" data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại."  data-rule-minlength="10" data-msg-minlength="Số điện thoại phải 10 kí tự" data-rule-maxlength="10" data-msg-maxlength="Số điện thoại phải 10 kí tự" data-rule-number="true" data-msg-number="Số điện thoại phải là số" value="{{ Auth::guard('customers')->user()->phone}}" >
                         {{--  <label for="emmail_register">Email</label>
                          <input id="emmail_register" type="email" class="form-control" name="email" id="email" data-rule-required="true" data-msg-required="Vui lòng nhập email." data-rule-email="true" data-msg-email="Vui lòng nhập đúng định dạng  email" {{ Auth::guard('customers')->user()->email}}> --}}
                          <label for="address_register">Địa chỉ</label>
                          <textarea class="form-control" name="address" id="parent_id" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ" >{{ Auth::guard('customers')->user()->address}}</textarea>
                          <button type="submit" class="button" id="btn-register"><i class="fa fa-user"></i> Thay đổi thông tin</button>
                          
                        </form>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="box-authentication">
                      <h3>Lịch sử mua hàng</h3>
                      <table class="table table-bordered orderview">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>HTTT</th>
                            <th>Ngày tạo</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($order as $order)
                          <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                              @foreach($order->orders as $pro)
                               
                              {{ $pro->product_name }} <br>
                              Số lượng: 
                              {{$pro->quantity}} x {{ number_format($pro->price) }} = {{ number_format($pro->price*$pro->quantity) }}
                              @endforeach
                            </td>
                          
                            <td>{{ number_format($order->total_price) }}</td>
                              <td>COD</td>
                            <td>{{ $order->created_at }}</td>
                           
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/frontend/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/frontend/assets/js/notify.js') }}"></script>
@if(Session::has('flash_ms_error'))
<script>
   $.notify("{!! session('flash_ms_error') !!}","error");
</script>
@endif
<script>
  $(document).on('click', '#btn-register', function() {
   $("#frm-register").validate({
    submitHandler: function() {
       let action = $("#frm-register").attr('action');
       let method = $("#frm-register").attr('method');
       let formData = $("#frm-register").serialize();
       $.ajax({
         url: action,
         type: method,
         dataType: 'JSON',
         data: formData,
         headers: {
          'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
         },
         success: function(data){
          if (data.status == '_success') {
            $.notify(data.msg,'success');
            $("#frm-register")[0].reset();
            $('html, body').animate({
              scrollTop: 2000
            }, 2000);
          }
          else{
            $('.email-re').notify(data.msg,'error');
            $(".email-re").val('');
          }
         },
         error:function(error){
          console.log(error);
         }
       });
    }
   });
  });
</script>
<script>
  jQuery(document).ready(function($) {
    var length = $("#phone_register").val().length;
    console.log(length);
    $("body").removeClass('home');
    $("body").addClass('page-category');
    });
  </script>
@endsection