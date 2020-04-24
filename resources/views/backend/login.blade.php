
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/admin/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .error{
        color: brown;
        font-size: 14px;
        padding: 5px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><img class="logo-img" src="{{asset('public/admin/assets/images/logo.png')}}" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="{{ url('admin/dang-nhap') }}" method="POST" onsubmit="return false;" id="frm-login">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="email" id="email" type="email"
                         placeholder="Username" autocomplete="off" data-rule-required="true" data-msg-required="Vui lòng nhập email.">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password"
                         placeholder="Password" data-rule-required="true" data-msg-required="Vui lòng nhập mật khẩu.">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-sign">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/plugins/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/plugins/notify.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/login.js') }}"></script>
</body>

</html>
