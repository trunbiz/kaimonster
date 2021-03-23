<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{asset('/asset')}}/"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Kai | Beta</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{asset('login')}}" method="POST">
                    {{ csrf_field() }}
                    <h1>Đăng nhập</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                    </div>
                    <div>
                        <button class="btn btn-default submit">Đăng nhập</button>
                        <a class="reset_pass" href="#">Quên mật khẩu?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Bạn chưa có tài khoản?
                            <a href="{{asset('login'). '#signup'}}" class="to_register"> Tạo tài khoản </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-paw"></i> Kai Monster!</h1>
                            <p>©2021 Isu.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form method="POST" action="{{asset('register')}}">
                    {{ csrf_field() }}
                    <h1>Đăng ký thành viên</h1>
                    @if(Session::has('messageUser'))
                        <p style="color: red">{{Session::get('messageUser')}}</p>
                    @endif
                    <div>
                        <input type="text" class="form-control" placeholder="Họ tên" required="" name="fullname"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Điện thoại" required="" name="phone"/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" name="email"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                    </div>
                    <div>
                        <button class="btn btn-default submit">Đăng ký</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Bạn đã có tài khoản ?
                            <a href="{{asset('login'). '#signin'}}" class="to_register"> Đăng nhập </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-paw"></i> Kai Monster!!</h1>
                            <p>©2021 Isu.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
