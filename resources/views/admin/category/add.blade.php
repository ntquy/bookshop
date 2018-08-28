@extends('layout.admin_layout')
@section('title' , trans('messages.add_category') )
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('messages.add_category') }}</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        {!! Form::open(['route' => 'categories.store' , 'method' => 'post' , 'id' => 'add_form' , 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', trans('common.name')) !!}
                {!! Form::text('name', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(trans('common.add') . '!', ['class' => 'btn btn-primary ']) !!}
            </div>
        {!! Form::close() !!}
    </div>
	<script type="text/javascript">
        $(function(){
            $( '#add_form' ).validate({
                rules : {
                    name : {
                        required : true,
                        minlength : 6,
                    },
                },
                submitHandler: function(form , e) {
                    e.preventDefault();
                    var formData = new FormData(form);
                    var form = $(form);
                    var btn = form.find( '.btn' );
                    
                    $.ajax({
                        url : form.attr( 'action' ),
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
                                    window.location.href='{{ route('categories.index') }}';
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

            $( '.select2_munti' ).select2({
                multiple : true,
                placeholder : '{{ trans('common.select2') }}',
            });

            $( '.select2_item' ).select2();
        })
	</script>
@endsection
