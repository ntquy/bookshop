@extends('layout.admin_layout')
@section('title' , 'Book edit')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('common.book_edit') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('common.book_edit') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        {!! Form::open(['route' => ['books.update' , $book->id] , 'method' => 'put' , 'id' => 'edit_form' , 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('name', trans('common.name')) !!}
            {!! Form::text('name', $book->name, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('author', trans('common.author')) !!}
            {!! Form::text('author', $book->author, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('summary', trans('common.summary')) !!}
            {!! Form::text('summary', $book->summary, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', trans('common.content')) !!}
            {!! Form::textarea('content', $book->content, ['class' => 'form-control', 'rows' => 5, 'cols' => 40]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('quantity', trans('common.quantity')) !!}
            {!! Form::text('quantity', $book->quantity, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price', trans('common.price')) !!}
            {!! Form::text('price', $book->price, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category', trans('common.category')) !!}
            {!! Form::select('category[]', $category_list , $book->categories, ['class' => 'form-control , select2_munti' , 'muntiple' => 'muntiple']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('publisher', trans('common.publisher')) !!}
            {!! Form::select('publisher_id', $publisher_list, $book->publisher_id, ['class' => 'form-control , select2_item']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('promotion', trans('common.promotion')) !!}
            {!! Form::select('promotion_id', $promotion_list, $book->promotion_id, ['class' => 'form-control , select2_item']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image', trans('common.image')) !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
            <img id="blah" src="{{ asset('/storage/' . $book->image) }}" height="300px">
        </div>
        <div class="form-group">
            {!! Form::submit(trans('common.update') . '!', ['class' => 'btn btn-primary ']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <script type="text/javascript">
        $(function () {
            {{--$('#edit_form').submit(function (e) {--}}
                {{--e.preventDefault();--}}
                {{--var form = $(this);--}}
                {{--var formData = new FormData(this);--}}
                {{--var btn = form.find('.btn');--}}
                {{--$.ajax({--}}
                    {{--url : form.attr('action'),--}}
                    {{--type : 'PUT',--}}
                    {{--dataType : 'json',--}}
                    {{--data : formData,--}}
                    {{--contentType: false,--}}
                    {{--processData: false,--}}
                    {{--beforeSend : function() {--}}
                        {{--btn.prop('disabled', true);--}}
                    {{--},--}}
                    {{--success : function(msg) {--}}
                        {{--if (msg.error == 0) {--}}
                            {{--$.toast({--}}
                                {{--heading: '{{ trans('common.success') }}',--}}
                                {{--text: '{{ trans('common.success') }}',--}}
                                {{--position: 'top-right',--}}
                                {{--loaderBg: '#ff6849',--}}
                                {{--icon: 'info',--}}
                                {{--hideAfter: 2000,--}}
                                {{--stack: 6--}}
                            {{--});--}}
                            {{--setTimeout(function() {--}}
                                {{--window.location.href='{{ route('books.index') }}';--}}
                            {{--} , 2000);--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error : function() {--}}
                        {{--console.log('{{ trans('common.error') }}');--}}
                    {{--},--}}
                    {{--complete : function() {--}}
                        {{--btn.prop('disabled', false);--}}
                    {{--},--}}
                {{--})--}}
            {{--});--}}

            $('#edit_form').validate({
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
                }
            });

            $('.select2_munti').select2({
                multiple : true,
                placeholder : '{{ trans('common.select2') }}',
            });

            $('.select2_item').select2();

            CKEDITOR.replace( 'content' );
        })
    </script>
@endsection
