@extends('layout.admin_layout')
@section('title' , 'User edit')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('common.user_edit') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('common.user_edit') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#profile_edit">{{ trans('common.user_edit') }}</a></li>
            <li><a data-toggle="tab" href="#password_edit">{{ trans('common.password_change') }}</a></li>
        </ul>

        <div class="tab-content">
            <div id="profile_edit" class="tab-pane fade in active">
                {!! Form::open(['route' => ['admin.profile.update' , $user->id], 'method' => 'post', 'id' => 'edit_form']) !!}
                <div class="form-group">
                    {!! Form::label('full_name', trans('common.full_name')) !!}
                    {!! Form::text('name', $user['name'], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', trans('common.email')) !!}
                    {!! Form::text('email', $user['email'], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('username', trans('common.username')) !!}
                    {!! Form::text('username', $user['username'], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('birthday', trans('common.birthday')) !!}
                    {!! Form::text('birthday', date_format(date_create($user['birthday']), 'd-m-Y'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', trans('common.address')) !!}
                    {!! Form::text('address', $user['address'], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', trans('common.phone')) !!}
                    {!! Form::text('phone', $user['phone'], ['class' => 'form-control']) !!}
                </div>
                {!! Form::hidden('role', $user->role, ['class' => 'form-control']) !!}
                <div class="form-group">
                    {!! Form::submit(trans('common.update') . '!', ['class' => 'btn btn-primary ']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div id="password_edit" class="tab-pane fade">
                {!! Form::open(['route' => ['password.change', $user->id], 'method' => 'post', 'id' => 'password_change']) !!}
                    <div class="form-group">
                        {!! Form::label('current_password', trans('common.current_password')) !!}
                        {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => trans('common.current_password')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('new_password', trans('common.new_password')) !!}
                        {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => trans('common.new_password')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('confirm_password', trans('common.confirm_password')) !!}
                        {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => trans('common.confirm_password')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('common.password_change') . '!', ['class' => 'btn btn-primary ']) !!}
                    </div>
                    <div class="error_msg">

                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function ()
        {
            $('#edit_form').validate({
                rules : {
                    name : {
                        required : true,
                        minlength : 4,
                    },
                    email : {
                        required : true,
                        email : true,
                    },
                    username : {
                        required : true,
                        minlength : 6,
                    },
                    birthday : "required",
                    address : "required",
                    phone : {
                        required : true,
                        number : true,
                    },
                },
                submitHandler: function(form , e) {
                    e.preventDefault();
                    var form = $(form);
                    var btn = form.find('.btn');
                    $.ajax({
                        url : form.attr('action'),
                        type : 'POST',
                        dataType : 'json',
                        data : form.serialize(),
                        beforeSend : function() {
                            btn.prop('disabled', true);
                        },
                        success : function(msg) {
                            if (msg.error == 0) {
                                $.toast({
                                    heading: '{{ trans('common.success') }}',
                                    text: '{{ trans('common.success') }}',
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'info',
                                    hideAfter: 2000,
                                    stack: 6,
                                });
                                setTimeout(function () {
                                    window.location.href = '/dashboard';
                                }, 2000);
                            }
                        },
                        error : function() {
                            console.log('{{ trans('common.error') }}');
                        },
                        complete : function() {
                            btn.prop('disabled', false);
                        },
                    })
                }
            });

            $('#password_change').validate({
                rules : {
                    current_password : {
                        required : true,
                        minlength : 8,
                    },
                    new_password : {
                        required : true,
                        minlength : 8,
                    },
                    confirm_password : {
                        required : true,
                        minlength : 8,
                        equalTo : '#new_password',
                    }
                },
                submitHandler : function(form, e)
                {
                    e.preventDefault();
                    var form = $(form);
                    var btn = form.find('.btn');
                    var error_container = form.find('.error_msg');
                    $.ajax({
                        url : form.attr('action'),
                        type : 'POST',
                        dataType : 'json',
                        data : form.serialize(),
                        beforeSend : function() {
                            btn.prop('disabled', true);
                            error_container.empty();
                        },
                        success : function(msg) {
                            if (msg.error == 0) {
                                $.toast({
                                    heading: '{{ trans('common.password_success') }}',
                                    text: '{{ trans('common.password_success') }}',
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'info',
                                    hideAfter: 2000,
                                    stack: 6,
                                });
                            }
                            else
                            {
                                error_container.append(msg.error_msg).show();
                                setTimeout(function(){
                                    error_container.hide();
                                }, 2000);
                            }
                        },
                        error : function() {
                            console.log('{{ trans('common.error') }}');
                        },
                        complete : function() {
                            btn.prop('disabled', false);
                        },
                    })
                }
            });

            $('#birthday').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            $('.select2').select2();
        })
    </script>
@endsection
