<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>@yield('title')</title>
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width">
        <!-- Css Files Start -->
        <link rel="shortcut icon" type="image/png" href="{!! asset('/images/favicon.png') !!}">
        <link href="{!! asset('/bower_components/user/css/style.css') !!}" rel="stylesheet" type="text/css" /><!-- All css -->  
        <link href="{!! asset('/bower_components/user/css/bs.css') !!}" rel="stylesheet" type="text/css" /><!-- Bootstrap Css -->
        <link rel="stylesheet" type="text/css" href="{!! asset('/bower_components/user/css/main-slider.css') !!}" /><!-- Main Slider Css -->
        <!--[if lte IE 10]><link rel="stylesheet" type="text/css" href="css/customIE.css" /><![endif]-->
        <link href="{!! asset('/bower_components/user/css/font-awesome.css') !!}" rel="stylesheet" type="text/css" /><!-- Font Awesome Css -->
        <link href="{!! asset('/bower_components/user/css/font-awesome-ie7.css') !!}" rel="stylesheet" type="text/css" /><!-- Font Awesome iE7 Css -->
        <link rel="stylesheet" type="text/css" href="{!! asset('/css/bookshop.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('/css/style.css') !!}">
        <noscript>
            <link rel="stylesheet" type="text/css" href="{!! asset('/bower_components/user/css/noJS.css') !!}" />
        </noscript>
        <!-- Css Files End -->
    </head>
<body>
<!-- Start Main Wrapper -->
<div class="wrapper">
  <!-- Start Main Header -->
  <!-- Start Top Nav Bar 
-->
    <section class="top-nav-bar">
        <section class="container-fluid container">
            <section class="row-fluid">
                <section class="span6">
                    <ul class="top-nav">
                        <li>
                            <a href="{{ url( '/' ) }}" class="active">
                                {{ trans('messages.home')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url( '/contact' ) }}">
                                {{ trans('messages.contact')}}
                            </a>
                        </li>
                    </ul>
                </section>
                <section class="span6 e-commerce-list">
                    <ul>
                        <li>
                            @if( Auth::user() )
                                {{ trans('messages.welcome') }}        
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">{{ Auth::user()->name }}<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url( '/users/edit').'/'. Auth::user()->id }}">
                                                {{ trans('messages.edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url( 'logout' ) }}">
                                                {{ trans('messages.logout') }}
                                            </a>
                                        </li>
                                  </ul>
                                </div>
                            @else
                                <a href="{!! url( 'login' ) !!}">
                                    {{ trans('messages.login') }}
                                </a> {{ trans('messages.or') }}
                                <a href="{!! url( 'register' ) !!}">
                                    {{ trans('messages.register') }}
                                </a>
                            @endif
                        </li>
                    </ul>
                    <div class="c-btn">
                        <a href="{{ url( '/cart' ) }}" class="cart-btn">
                            {{ trans('messages.cart') }}
                        </a>
                    </div>
                </section>
            </section>
        </section>
    </section>
    <!-- End Top Nav Bar -->
    <header id="main-header">
        <section class="container-fluid container">
            <section class="row-fluid">
                <section class="span4">
                    <h1 id="logo">
                        <a href="{{ url( '/' ) }}">
                            <img src="{{ asset('/bower_components/user/images/logo.png')}}" />
                        </a>
                    </h1>
                </section>
                <section class="span8">
                    <ul class="top-nav2">
                        <li>
                            <a href="#">
                                {{ trans('messages.cart') }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                {{ trans('messages.order') }}
                            </a>
                        </li>
                    </ul>
                    <div class="search-bar">
                    {{ Form::open(['url' => '/search', 'method' => 'get']) }}
                        {{ Form::text('key', null, [ 'placeholder' => trans('messages.search_book') ])}}
                        {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                    {{ Form::close() }}
                    </div>
                </section>
            </section>
        </section>
        <!-- Start Main Nav Bar -->
        <nav id="nav">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                        @foreach ($categories as $cat)
                            <li>
                                <a href="{{ url( '/categories') .'/'.$cat->id }}">
                                    {{ $cat->name}}
                                </a>
                            </li>
                        @endforeach
                            <li>
                                <a href="{{ url('/sale') }}">
                                    {{ trans('messages.sale')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!-- /.navbar-inner -->
            </div>
            <!-- /.navbar -->
        </nav>
        <!-- End Main Nav Bar -->
    </header>
    <!-- End Main Header -->
    <!-- Start Main Content Holder -->
    <section id="content-holder" class="container-fluid container">
        @yield('content')
    </section>
    <section class="container-fluid footer-top1">
        <section class="container">
            <section class="row-fluid">
                <figure class="span3">
                    <h4>
                        Facebook
                    </h4>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFramgia-Education-734064183465124%2F&tabs=timeline&width=500&height=250&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" class="facebook"></iframe>
                </figure>
                <figure class="span3">
                </figure>
                <figure class="span3">
                    <h4>
                        {{ trans('messages.location') }}
                    </h4>
                    <p>434 Trần Khát Chân, Phố Huế, Hai Bà Trưng, Hà Nội, Việt Nam</p>
                    <span>
                    <ul class="phon-list">
                        <li>(0123) 456-7899</li>
                        <li>(0988) 888-888</li>
                    </ul>
                    </span>
                    <span class="mail-list">
                        <a href="#">books_shop@companyname</a><br />
                        <a href="#">shop_books@companyname.com</a>
                    </span>
                </figure>
                <figure class="span3">
                    <h4>
                        {{ trans('messages.time') }}
                    </h4>
                    <p>
                        {{ trans('messages.day') }} : 8:00 {{ trans('messages.to') }} 18:00
                    </p>
                    <p>
                        {{ trans('messages.day_7') }} : 9:00 {{ trans('messages.to') }} 18:00
                    </p>
                    <p>
                        {{ trans('messages.day_8') }} : 10:00 {{ trans('messages.to') }} 16:00
                    </p>
                </figure>
            </section>
        </section>
    </section>
    <!-- End Footer Top 1 -->
    <!-- Start Footer Top 2 -->
    <section class="container-fluid footer-top2">
        <section class="social-ico-bar">
            <section class="container">
                <section class="row-fluid">
                    <div id="socialicons" class="hidden-phone">
                        <a id="social_linkedin" class="social_active" href="#" title="Visit Google Plus page">
                            <span></span>
                        </a>
                        <a id="social_facebook" class="social_active" href="#" title="Visit Facebook page">
                            <span></span>
                        </a>
                        <a id="social_twitter" class="social_active" href="#" title="Visit Twitter page">
                            <span></span>
                        </a>
                        <a id="social_youtube" class="social_active" href="#" title="Visit Youtube">
                            <span></span>
                        </a>
                        <a id="social_vimeo" class="social_active" href="#" title="Visit Vimeo">
                            <span></span>
                        </a>
                        <a id="social_trumblr" class="social_active" href="#" title="Visit Vimeo">
                            <span></span>
                        </a>
                        <a id="social_google_plus" class="social_active" href="#" title="Visit Vimeo">
                            <span></span>
                        </a>
                        <a id="social_dribbble" class="social_active" href="#" title="Visit Vimeo">
                            <span></span>
                        </a>
                        <a id="social_pinterest" class="social_active" href="#" title="Visit Vimeo">
                            <span></span>
                        </a>
                    </div>
                    <ul class="footer2-link">
                        <li>
                            <a href="about-us.html">{{ trans('messages.about') }}</a>
                        </li>
                        <li>
                            <a href="contact.html">{{ trans('messages.customer') }}</a>
                        </li>
                        <li>
                            <a href="order-recieved.html">{{ trans('messages.track') }}</a>
                        </li>
                    </ul>
                </section>
            </section>
        </section>
        <section class="container">
            <section class="row-fluid">
                <figure class="span4">
                    <h4>{{ trans('messages.seller') }}</h4>
                    <ul class="f2-img-list">
                        <li>
                            <div class="left">
                                <a href="book-detail.html">
                                    <img src="{{ asset('/bower_components/user/images/image19.jpg')}}" />
                                </a>
                            </div>
                            <div class="right">
                                <strong class="title">
                                    <a href="book-detail.html">abc xyz</a>
                                </strong>
                                    <span class="by-author"> b ABC XYZ</span>
                                    <span class="f-price">$127.55</span>
                            </div>
                        </li>
                    </ul>
                </figure>
                <figure class="span4">
                    <h4>{{ trans('messages.rate') }}</h4>
                    <ul class="f2-img-list">
                        <li>
                            <div class="left">
                                <a href="book-detail.html">
                                    <img src="{{ asset('/bower_components/user/images/image35.jpg')}}" alt=""/>
                                </a>
                            </div>
                            <div class="right">
                                <strong class="title">
                                    <a href="book-detail.html">abc xyz</a>
                                </strong>
                                <span class="by-author">b ABC XYZ</span>
                                <span class="rating-bar">
                                    <img src="{{ asset('/bower_components/user/images/rating-star.png')}}" alt="Rating Star"/>
                                </span>
                            </div>
                        </li>
                    </ul>
                </figure>
                <figure class="span4">
                    <h4>{{ trans('messages.blog') }}</h4>
                    <ul class="f2-pots-list">
                        <li>
                            <span class="post-date2">28 APR</span>
                                <a href="blog-detail.html">abcxyz...</a>
                            <span class="comments-num">6 cm</span>
                        </li>
                    </ul>
                </figure>
            </section>
        </section>
    </section>
    <!-- End Footer Top 2 -->
    <!-- Start Main Footer -->
    <footer id="main-footer">
        <section class="social-ico-bar">
            <section class="container">
                <section class="row-fluid">
                    <article class="span6">
                        <p>© 2018  Book Store - Premium WooCommerce Theme. </p>
                    </article>
                    <article class="span6 copy-right">
                        <p>Designed by <a href="http://www.crunchpress.com/">Crunchpress.com</a></p>
                    </article>
                </section>
            </section>
        </section>
    </footer>
    <!-- End Main Footer -->
</div>
<!-- End Main Wrapper -->
    <!-- JS Files Start -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/lib.js') !!}"></script><!-- lib Js -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/modernizr.js') !!}"></script><!-- Modernizr -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/easing.js') !!}"></script><!-- Easing js -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/bs.js') !!}"></script><!-- Bootstrap -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/bxslider.js') !!}"></script><!-- BX Slider -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/input-clear.js') !!}"></script><!-- Input Clear -->
    <script src="{!! asset('/bower_components/user/js/range-slider.js') !!}"></script><!-- Range Slider -->
    <script src="{!! asset('/bower_components/user/js/jquery.zoom.js') !!}"></script><!-- Zoom Effect -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/bookblock.js') !!}"></script><!-- Flip Slider -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/custom.js') !!}"></script><!-- Custom js -->
    <script type="text/javascript" src="{!! asset('/bower_components/user/js/social.js') !!}"></script><!-- Social Icons -->
    <script type="text/javascript" src="{!! asset('/js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/js/jquery-3.3.1.min.js') !!}"></script>
    <!-- JS Files End -->
    <script type="text/javascript">
      /* <![CDATA[ */
      $(document).ready(function() {
      $('.social_active').hoverdir( {} );
      $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd'});
    })
    /* ]]> */
    </script>
</body>
</html>
