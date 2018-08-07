<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ trans('messages.login')}}</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget, Login form widgets, Sign up Web forms, Login signup Responsive web form, Flat Pricing table, Flat Drop downs,Registration Forms, News letter Forms, Elements" />
<script type="application/x-javascript">
    addEventListener('load', function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{ asset('/bower_components/login/css/font-awesome.css') }}"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="{{ asset('/bower_components/login/css/style.css') }}" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<!-- //web-fonts -->
</head>
<body>
    <!--header-->
    <div class="header-w3l">
        <h1>{{ trans('messages.book')}}</h1>
    </div>
    <!--//header-->
    <!--main-->
    <div class="main-w3layouts-agileinfo">
           <!--form-stars-here-->
        <div class="wthree-form">
            <h2>{{ trans('messages.fill')}}</h2>
            {{ session('notify')}}
            {!! Form::open(['url' => 'login', 'method' => 'post'])!!}
                <div class="form-sub-w3">
                    {{ Form::text('email', null, ['required'=>'']) }}
                <div class="icon-w3">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                </div>
                <div class="form-sub-w3">
                    {{ Form::password('password', ['required'=>'']) }}
                <div class="icon-w3">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
                </div>
                <label class="anim">
                {!! Form::checkbox('remember', null, ['class' => 'checkbox', 'id' => 'remember']) !!}
                    <span>
                        {{ trans('messages.remember')}}
                    </span> 
                    <a href="{{ url('/register') }}">
                        {{ trans('messages.register') }}
                    </a>
                </label> 
                <div class="clear">
                </div>
                <div class="submit-agileits">
                    {!! Form::submit( trans('messages.login') ) !!}
                </div>
            {!! Form::close() !!}

        </div>
            <!--//form-ends-here-->

    </div>
    <!--//main-->
    <!--footer-->
    <div class="footer">
        <p>&copy; 2018 Books Store Login Form. All rights reserved | Design by team 4</p>
    </div>
    <!--//footer-->
</body>
</html>
