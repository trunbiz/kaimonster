@extends('admin.base')
@section('title','Kai - facebook')
@section('main')
    {{--<div id="fb-root"></div>--}}
    {{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=420936362609024&autoLogAppEvents=1" nonce="5ME8GANM"></script>--}}
    {{--<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="true"></div>--}}
{{--<script>--}}
    {{--FB.getLoginStatus(function(response) {--}}
        {{--statusChangeCallback(response);--}}
    {{--});--}}
{{--</script>--}}



    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId            : 420936362609024,
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v10.0'
            });
        };

    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js"></script>

    <script>
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    </script>

@stop
