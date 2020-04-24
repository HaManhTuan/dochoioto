@extends('layouts.frontend.home')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ url('/') }}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Đăng nhập</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Đăng nhập</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>Tạo 1 tài khoản</h3>
                        <p>Hãy điền đầy đủ thông tin.</p>
                        <form action="" method="POST" id="frm-register">
                          @csrf
                          <label for="name_register">Họ tên</label>
                          <input id="name_register" type="text" class="form-control" name="name">
                          <label for="phone_register">Số điện thoại</label>
                          <input id="phone_register" type="text" class="form-control" name="phone"  onkeypress="return onlyNumberKey(event)"
                          onKeyDown="if(this.value.length==10) return false;" >
                          <label for="emmail_register">Email</label>
                          <input id="emmail_register" type="email" class="form-control" name="email">
                          <label for="password_register">Mật khẩu</label>
                          <input id="password_register" type="password" class="form-control" name="email">
                          <label for="address_register">Địa chỉ</label>
                          <input id="address_register" type="text" class="form-control" name="address">
                          <button type="submit" class="button" id="btn-register"><i class="fa fa-user"></i> Tạo tài khoản</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>Nếu bạn đã có tài khoản ?</h3>
                        <form action="" method="POST" id="frm-login">
                          @csrf
                        <label for="emmail_login">Email</label>
                        <input id="emmail_login" name="email" type="text" class="form-control">
                        <label for="password_login">Mật khẩu</label>
                        <input id="password_login" type="password" name="password" class="form-control">
                        <button type="submit" class="button" id="btn-login"><i class="fa fa-lock"></i> Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script> 
    function onlyNumberKey(evt) {  
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 

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