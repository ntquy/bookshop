@extends('layout.main_layout')
@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h2>{{ trans('messages.register')}}</h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'register', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}                      
                        <div class="form-group{{ $errors->has( 'username' ) ? ' has-error' : '' }}">
                            {{ Form::label(trans('messages.username')) }}
                            <div class="col-md-6">
                                {{ Form::text('username', null, ['class' => 'form-control', 'value' => old( 'username' ), 'required' => ''])}}
                                @if ($errors->has( 'username' ))
                                    <span class="help-block">
                                        <strong>{{ $errors->first( 'username' ) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has( 'name' ) ? ' has-error' : '' }}">
							{{ Form::label(trans('messages.name')) }}
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control', 'value' => old( 'name' ), 'required' => 'autofocus'])}}
                                @if ($errors->has( 'name' ))
                                    <span class="help-block">
                                        <strong>{{ $errors->first( 'name' ) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						{{ Form::label(trans('messages.birthday')) }}
						  	<div class="col-10">
						    	{{ Form::date('birthday', \Carbon\Carbon::now())}}
						  	</div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('E-mail') }}

                            <div class="col-md-6">
                                {{ Form::email('email', null, ['class' => 'form-control', 'value' => old( 'email' ), 'required' => ''])}}
                                @if ($errors->has( 'email' ))
                                    <span class="help-block">
                                        <strong>{{ $errors->first( 'email' ) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has( 'address' ) ? ' has-error' : '' }}">
                            {{ Form::label(trans('messages.address')) }}
                            <div class="col-md-6">
                                {{ Form::text('address', null, ['class' => 'form-control', 'value' => old( 'address' ), 'required' => 'autofocus'])}}
                                @if ($errors->has( 'address' ))
                                    <span class="help-block">
                                        <strong>{{ $errors->first( 'address' ) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {{ Form::label(trans('messages.phone')) }}

                            <div class="col-md-6">
                                {{ Form::text('phone', null, ['class' => 'form-control', 'value' => old( 'phone' ), 'required' => 'autofocus'])}}
                                @if ($errors->has( 'phone' ))
                                    <span class="help-block">
                                        <strong>{{ $errors->first( 'phone' ) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has( 'password' ) ? ' has-error' : '' }}">
                            {{ Form::label(trans('messages.password')) }}

                            <div class="col-md-6">
                                {!! Form::password('password', ['required'=>''])!!}
                                @if ($errors->has( 'password' ))
                                    <span class="help-block">
                                        <strong>{{ $errors->first( 'password' ) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label(trans('messages.confirm')) }}

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['required'=>''])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit(trans('messages.register'), ['class' => 'btn btn-primary'])}}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
