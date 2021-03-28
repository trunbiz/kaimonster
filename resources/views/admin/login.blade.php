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
                    <div id="status"></div>
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
                    <div>
                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>

                        <div id="status"></div>
                        <!-- Load the JS SDK asynchronously -->
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
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
<script>

    function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
        console.log('statusChangeCallback');
        console.log(response);                   // The current login status of the person.
        console.log(response.authResponse.accessToken);                   // The current login status of the person.
        if (response.status === 'connected') {   // Logged into your webpage and Facebook.
            testAPI();
        } else {                                 // Not logged into your webpage or we are unable to tell.
            document.getElementById('status').innerHTML = 'Please log ' +
                'into this webpage.';
        }
    }


    function checkLoginState() {               // Called when a person is finished with the Login Button.
        FB.getLoginStatus(function(response) {   // See the onlogin handler
            statusChangeCallback(response);
        });
    }


    window.fbAsyncInit = function() {
        FB.init({
            appId      : 420936362609024,
            cookie     : true,                     // Enable cookies to allow the server to access the session.
            xfbml      : true,                     // Parse social plugins on this webpage.
            version    : 'v10.0'           // Use this Graph API version for this call.
        });


        FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
            statusChangeCallback(response);        // Returns the login status.
        });
    };

    function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            console.log('Successful login for: ' + response.email);
            console.log('Successful login for: ' + response);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
        });
    }

</script>
</body>
</html>