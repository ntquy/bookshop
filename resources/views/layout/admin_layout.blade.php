<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/bower_components/admin/plugins/images/favicon.png')}}">
    <title>{{ trans('messages.dashboard') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('/bower_components/admin/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{!! asset('/bower_components/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') !!}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{!! asset('/bower_components/admin/plugins/bower_components/toast-master/css/jquery.toast.css') !!}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{!! asset('/bower_components/admin/plugins/bower_components/morrisjs/morris.css') !!}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{!! asset('/bower_components/admin/css/animate.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! asset('/bower_components/admin/css/style.css') !!}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{!! asset('/bower_components/admin/css/colors/blue-dark.css') !!}" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('/css/bookshop.css') !!}">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="#"><b><img src="{{ asset('/bower_components/admin/plugins/images/pixeladmin-logo.png')}}" alt="home" /></b><span class="hidden-xs"><img src="{{ asset('/bower_components/admin/plugins/images/pixeladmin-text.png')}}" alt="home" /></span></a>
                </div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        {!! Form::open([ 'url' => '#', 'role' => 'search', 'class' => 'app-search hidden-xs' ]) !!}
                        {!! Form::text( 'test', null, [ 'placeholder' => '...', 'class' => 'form-control' ]) !!}
                            <a href="#"><i class="fa fa-search"></i></a>
                        {!! Form::close() !!}
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"><img src="{{ asset('/bower_components/admin/plugins/images/users/varun.jpg')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.dashboard')}}</span></a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.profile')}}</span></a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.basic')}}</span></a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.icon')}}</span></a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.map')}}</span></a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.blank')}}</span></a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.error')}}</span></a>
                    </li>
                </ul>
                <div class="center p-20">
                    <span class="hide-menu">
                        <a href="#" target="_blank" class="btn btn-danger btn-block btn-rounded waves-effect waves-light">{{ trans('messages.upgrade')}}
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">@yield('title')</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="#" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">{{ trans('messages.upgrade')}}
                        </a>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">@yield('title')</a>
                            </li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    @yield('content')
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
        </div>

        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/jquery/dist/jquery.min.js') !!}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('/bower_components/admin/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') !!}"></script>
    <!--slimscroll JavaScript -->
    <script src="{!! asset('/bower_components/admin/js/jquery.slimscroll.js') !!}"></script>
    <!--Wave Effects -->
    <script src="{!! asset('/bower_components/admin/js/waves.js') !!}"></script>
    <!--Counter js -->
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/counterup/jquery.counterup.min.js') !!}"></script>
    <!--Morris JavaScript -->
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/raphael/raphael-min.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/morrisjs/morris.js') !!}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('/bower_components/admin/js/custom.min.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/js/dashboard1.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/toast-master/js/jquery.toast.js') !!}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Pixel admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
</body>
</html>
