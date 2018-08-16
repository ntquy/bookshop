@extends('layout.admin_layout')
@section('title' , 'Book add')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('common.book_add') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('common.book_add') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        {!! Form::open(['route' => 'books.store' , 'method' => 'post' , 'id' => 'add_form' , 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', trans('common.name')) !!}
                {!! Form::text('name', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('author', trans('common.author')) !!}
                {!! Form::text('author', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('summary', trans('common.summary')) !!}
                {!! Form::text('summary', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', trans('common.content')) !!}
                {!! Form::textarea('content', '', ['class' => 'form-control', 'rows' => 5, 'cols' => 40]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('quantity', trans('common.quantity')) !!}
                {!! Form::text('quantity', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', trans('common.price')) !!}
                {!! Form::text('price', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category', trans('common.category')) !!}
                {!! Form::select('category[]', $category_list, null, ['class' => 'form-control , select2_munti']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('publisher', trans('common.publisher')) !!}
                {!! Form::select('publisher', $publisher_list, null, ['class' => 'form-control , select2_item']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('promotion', trans('common.promotion')) !!}
                {!! Form::select('promotion', $promotion_list, null, ['class' => 'form-control , select2_item']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', trans('common.image')) !!}
                {!! Form::file('image', ['class' => 'form-control']) !!}
                <img id="blah" height="300px" src="">
            </div>
            <div class="form-group">
                {!! Form::submit(trans('common.add') . '!', ['class' => 'btn btn-primary ']) !!}
            </div>
        {!! Form::close() !!}
    </div>
	<script type="text/javascript">
        $(function(){
            $('#add_form').validate({
                rules : {
                    name : {
                        required : true,
                        minlength : 6,
                    },
                    quantity : {
                        required : true,
                        number : true,
                    },
                    price : {
                        required : true,
                        number : true,
                    },
                    author : "required",
                    summary : "required",
                    content : "required",
                },
                submitHandler: function(form , e) {
                    e.preventDefault();
                    var formData = new FormData(form);
                    var form = $(form);
                    var btn = form.find('.btn');
                    $.ajax({
                        url : form.attr('action'),
                        type : 'POST',
                        dataType : 'json',
                        data : formData,
                        contentType: false,
                        processData: false,
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
                                    stack: 6
                                });
                                setTimeout(function() {
                                    window.location.href='{{ route('books.index') }}';
                                } , 2000);
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

            $('.select2_munti').select2({
                multiple : true,
                placeholder : '{{ trans('common.select2') }}',
            });

            $('.select2_item').select2();
        })
	</script>
@endsection
