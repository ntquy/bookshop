@extends('layout.admin_layout')
@section('title' , trans('messages.edit_range') )
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('messages.edit_range') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('messages.edit_range') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        {!! Form::open(['route' => ['prices.update' , $range->id] , 'method' => 'put' , 'id' => 'edit_form' , 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('name', trans('messages.min')) !!}
            {!! Form::text('min', $range->min, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('messages.max')) !!}
            {!! Form::text('max', $range->max, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(trans('common.update') . '!', ['class' => 'btn btn-primary ']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <script type="text/javascript">
        $(function () {
            $( '#edit_form' ).validate({
                rules : {
                    min : {
                        required : true,
                        minlength : 5,
                        integer : true,
                    },
                    max : {
                        required : true,
                        minlength : 5,
                        integer : true,
                    },
                }
            });

            $( '.select2_munti' ).select2({
                multiple : true,
                placeholder : '{{ trans('common.select2') }}',
            });

            $( '.select2_item' ).select2();

            // CKEDITOR.replace( 'content' );
        })
    </script>
@endsection
