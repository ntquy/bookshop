@extends('layout.admin_layout')
@section('title' , 'Book edit')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('messages.edit_category') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('messages.edit_category') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        {!! Form::open(['route' => ['categories.update' , $cat->id] , 'method' => 'put' , 'id' => 'edit_form' , 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('name', trans('common.name')) !!}
            {!! Form::text('name', $cat->name, ['class' => 'form-control']) !!}
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
                    name : {
                        required : true,
                        minlength : 6,
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
