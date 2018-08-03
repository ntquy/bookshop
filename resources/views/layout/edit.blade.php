@extends('layout.main_layout')
@section('title', trans('messages.edit'))
@section('content')
<div class="container">
    <div class="row">
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h2>{{ trans('messages.edit') }}  {{ $user->name }}</h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => route('update', ['id' => $user->id]), 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group{{ $errors->has( 'username' ) ? ' has-error' : '' }}">
                            {{ Form::label(trans('messages.username')) }}
                            <div class="col-md-6">
                                {{ Form::text('username', $user->username, ['class' => 'form-control', 'required' => '']) }}
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
                                {{ Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'autofocus']) }}
                                @if ($errors->has( 'name' ))
                                    <span class="help-block">
                                        <strong>{{ $errors->first( 'name' ) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						{{ Form::label( trans('messages.birthday')) }}
						  	<div class="col-10">
						    	{{ Form::date('birthday', $user->birthday ) }}
						  	</div>
                            {{ Form::label('E-mail') }}
                        <div class="col-md-6">
                            {{ Form::email('email', $user->email, ['class' => 'form-control', 'required' => '']) }}
                        </div>
						<div class="form-group{{ $errors->has( 'address' ) ? ' has-error' : '' }}">
                            {{ Form::label(trans('messages.address')) }}
                            <div class="col-md-6">
                                {{ Form::text('address', $user->address, ['class' => 'form-control', 'required' => 'autofocus']) }}
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
                                {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'required' => 'autofocus']) }}
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
                            {{ Form::label( trans('messages.confirm')) }}

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['required'=>'']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit( trans('messages.update'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
