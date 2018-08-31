<?php $user_session = session('user', null); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="{!! asset('bower_components/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" href="{!! asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('/bower_components/dataTables/dataTables.bootstrap.min.css') !!}">
    <script type="text/javascript" src="{!! asset('/bower_components/jquery/dist/jquery.min.js') !!}"></script>
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
    <script src="{!! asset('/bower_components/select2/dist/js/select2.min.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/counterup/jquery.counterup.min.js') !!}"></script>
    <!--Morris JavaScript -->
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/raphael/raphael-min.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/morrisjs/morris.js') !!}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('/bower_components/admin/js/custom.min.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/js/dashboard1.js') !!}"></script>
    <script src="{!! asset('/bower_components/admin/plugins/bower_components/toast-master/js/jquery.toast.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/bower_components/moment/min/moment.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script src="{!! asset('/bower_components/jquery-validation/dist/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('/bower_components/dataTables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('/bower_components/dataTables/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('/bower_components/ckeditor/ckeditor.js') !!}"></script>
    <script src="{!! asset('/js/book_shop.js') !!}"></script>
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
                        {!! Form::text( 'test', null, ['class' => 'form-control' ]) !!}
                            <a href="#"><i class="fa fa-search"></i></a>
                        {!! Form::close() !!}
                    </li>
                </ul>
                
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            {{ $user_session->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/admin/edit/{{ $user_session->id }}">
                                    {{ trans('common.edit_profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="/logout">
                                    {{ trans('common.logout') }}
                                </a>
                            </li>
                        </ul>
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
                        <a href="{{ route('users.index') }}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('common.user')}}</span></a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="waves-effect"><i class="fa fa-bars fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.manager_category')}}</span></a>
                    </li>
                     <li>
                        <a href="{{ route('prices.index') }}" class="waves-effect"><i class="fa fa-money fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('messages.manager_price')}}</span></a>
                    </li>
                    @if($user_session->role == 2)
                    <li>
                        <a href="{{ route('books.index') }}" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('common.book')}}</span></a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('statistics.index') }}" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('common.order_list')}}</span></a>
                    </li>
                    @if($user_session->role == 2)
                    <li>
                        <a href="{{ route('chart') }}" class="waves-effect"><i class="glyphicon glyphicon-signal fa-fw" aria-hidden="true"></i><span class="hide-menu">{{ trans('common.statistic')}}</span></a>
                    </li>
                    @endif
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
                @yield('content')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
        </div>

        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</body>
</html>
