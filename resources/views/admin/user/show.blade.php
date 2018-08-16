<?php $user_session = session('user', null); ?>
@extends('layout.admin_layout')
@section('title', 'User')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('common.user_show') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="{{ route('users.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">{{ trans('common.user_add')}}
            </a>
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('common.user_show') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#customer">
                    {{ trans('common.customer') }}
                </a>
            </li>
            @if($user_session->role == 2)
            <li>
                <a data-toggle="tab" href="#employee">
                    {{ trans('common.employee') }}
                </a>
            </li>
            @endif
        </ul>

        <div class="tab-content">
            <div id="customer" class="tab-pane fade in active">
                <div class="y-scroller">
                    <table class="table table-bordered table-hover table-responsive user_table">
                        <thead>
                        <tr>
                            <th class="text-center">
                                {{ trans('common.name') }}
                            </th>
                            <th class="text-center">
                                {{ trans('common.username') }}
                            </th>
                            <th class="text-center">
                                {{ trans('common.email') }}
                            </th>
                            <th class="text-center">
                                {{ trans('common.action') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td class="text-center">
                                    {{ $customer['name'] }}
                                </td>
                                <td class="text-cetner">
                                    {{ $customer['username'] }}
                                </td>
                                <td class="text-cetner">
                                    {{ $customer['email'] }}
                                </td>
                                <td class="text-cetner">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $customer['id'] }}">{{trans('common.detail')}}</button>

                                    <!-- Modal -->
                                    <div id="myModal{{ $customer['id'] }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                    <h4 class="modal-title">
                                                        <b>
                                                            {{ trans('common.detail') }}
                                                            <b>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>
                                                        <b>
                                                            {{ trans('common.full_name') }} :
                                                        </b>
                                                        {{ $customer['name'] }}
                                                    </h3>
                                                    <h3>
                                                        <b>
                                                            {{ trans('common.username') }} :
                                                        </b>
                                                        {{ $customer['username'] }}
                                                    </h3>
                                                    <h3>
                                                        <b>
                                                            {{ trans('common.email') }} :
                                                        </b>
                                                        {{ $customer['email'] }}
                                                    </h3>
                                                    <h3>
                                                        <b>
                                                            {{ trans('common.phone') }} :
                                                        </b>
                                                        {{ $customer['phone'] }}
                                                    </h3>
                                                    <h3>
                                                        <b>
                                                            {{ trans('common.address') }} :
                                                        </b>{{ $customer['address'] }}
                                                    </h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        {{ trans('common.close') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($user_session->role == 2)
                                        <a href="{{ route('users.edit', ['id' => $customer['id']]) }}" class="btn btn-success btn-sm">
                                            {{ trans('common.edit') }}
                                        </a>
                                        {!! Form::open(['route' => ['users.destroy' , $customer['id']] , 'method' => 'delete' , 'class' => 'delete_form']) !!}
                                        {!! Form::submit( trans('common.delete'), ['class' => 'btn btn-warning btn-sm']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if($user_session->role == 2)
                <div id="employee" class="tab-pane fade">
                    <div class="y-scroller">
                        <table class="table table-bordered table-hover table-responsive user_table">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    {{ trans('common.name') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('common.username') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('common.email') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('common.action') }}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td class="text-center">
                                        {{ $employee['name'] }}
                                    </td>
                                    <td class="text-cetner">
                                        {{ $employee['username'] }}
                                    </td>
                                    <td class="text-cetner">
                                        {{ $employee['email'] }}
                                    </td>
                                    <td class="text-cetner">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $employee['id'] }}">{{ trans('common.detail') }}</button>

                                        <!-- Modal -->
                                        <div id="myModal{{ $employee['id'] }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">
                                                            <b>
                                                                {{ trans('common.detail') }}
                                                                <b>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>
                                                            <b>
                                                                {{ trans('common.full_name') }} :
                                                            </b>
                                                            {{ $employee['name'] }}
                                                        </h3>
                                                        <h3>
                                                            <b>
                                                                {{ trans('common.username') }} :
                                                            </b>
                                                            {{ $employee['username'] }}
                                                        </h3>
                                                        <h3>
                                                            <b>
                                                                {{ trans('common.email') }} :
                                                            </b>
                                                            {{ $employee['email'] }}
                                                        </h3>
                                                        <h3>
                                                            <b>
                                                                {{ trans('common.phone') }} :
                                                            </b>
                                                            {{ $employee['phone'] }}
                                                        </h3>
                                                        <h3>
                                                            <b>
                                                                {{ trans('common.address') }} :
                                                            </b>{{ $employee['address'] }}
                                                        </h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            {{ trans('common.close') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('users.edit', ['id' => $employee['id']]) }}" class="btn btn-success btn-sm">
                                            {{ trans('common.edit') }}
                                        </a>
                                        {!! Form::open(['route' => ['users.destroy' , $employee['id']] , 'method' => 'delete' , 'class' => 'delete_form']) !!}
                                        {!! Form::submit( trans('common.delete'), ['class' => 'btn btn-warning btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
	<script type="text/javascript">
		$(function () {
            $('.delete_form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var btn = form.find('.btn');
                $.ajax({
                    url : form.attr('action'),
                    type : 'DELETE',
                    dataType : 'json',
                    beforeSend : function(){
                        btn.prop('disabled', true);
                    },
                    success : function(msg){
                        if(msg.error == 0){
                            $.toast({
                                heading: '{{ trans('common.delete_success') }}',
                                text: '{{ trans('common.delete_success') }}',
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'info',
                                hideAfter: 2000,
                                stack: 6
                            });
                            setTimeout(function(){
                                form.closest('tr').hide();
                            },2000);
                        }
                    },
                    error : function(){
                        console.log('error');
                    },
                    complete : function(){
                        btn.prop('disabled', false);
                    }
                });
            });

            $('.user_table').DataTable();
        })
	</script>
@endsection
