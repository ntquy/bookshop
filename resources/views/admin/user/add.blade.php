@extends('layout.admin_layout')
@section('title' , 'User add')
@section('content')
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">{{ trans('common.user_add') }}</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li>
					<a href="#">{{ trans('common.user_add') }}</a>
				</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- row -->
	<div class="row">
        {!! Form::open(['route' => 'users.store' , 'method' => 'post' , 'id' => 'add_form']) !!}
            <div class="form-group">
                {!! Form::label('full_name', trans('common.full_name')) !!}
                {!! Form::text('name' , '' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', trans('common.email')) !!}
                {!! Form::text('email' , '' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('username', trans('common.username')) !!}
                {!! Form::text('username' , '' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', trans('common.password')) !!}
                {!! Form::password('password' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('confirm_password', trans('common.confirm_password')) !!}
                {!! Form::password('confirm_password' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('birthday', trans('common.birthday')) !!}
                {!! Form::text('birthday' , '' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address', trans('common.address')) !!}
                {!! Form::text('address' , '' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', trans('common.phone')) !!}
                {!! Form::text('phone' , '' , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role', trans('common.role')) !!}
                {!! Form::select('role', ['Customer', 'Staff', 'Admin'], null, ['class' => 'form-control , select2']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(trans('common.add').'!' , ['class' => 'btn btn-primary ']); !!}
            </div>
        {!! Form::close() !!}
    </div>
	<script type="text/javascript">
        $(function(){
            $('#add_form').validate({
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
                    password : {
                        required : true,
                        minlength : 8,
                    },
                    confirm_password : {
                        required : true,
                        minlength : 8,
                        equalTo : '#password',
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
                        beforeSend : function(){
                            btn.prop('disabled' , true);
                        },
                        success : function(msg){
                            if(msg.error == 0){
                                $.toast({
                                    heading: '{{trans('common.success')}}',
                                    text: '{{trans('common.success')}}',
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'info',
                                    hideAfter: 2000,
                                    stack: 6
                                });
                                setTimeout(function(){
                                    window.location.href='{{route('users.index')}}';
                                } , 2000);
                            }
                        },
                        error : function(){
                            console.log('{{trans('common.error')}}');
                        },
                        complete : function(){
                            btn.prop('disabled' , false);
                        },
                    })
                }
            });

            $('#birthday').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        })
	</script>
@endsection
