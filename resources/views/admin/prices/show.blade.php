@extends('layout.admin_layout')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('messages.show_prices') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="{{ route('prices.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">{{ trans('messages.add_prices')}}
            </a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        <div class="y-scroller">
            <table class="table table-bordered table-hover table-responsive" id="prices_table">
                <thead>
                    <tr>
                        <th class="text-center">Stt</th>
                        <th class="text-center">
                            {{ trans('messages.range') }}
                        </th>
                        <th class="text-center">
                            {{ trans('common.action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ranges as $key => $range)
                    <tr>
                        <td class="text-center">{{ $key + 1}}</td>
                        <td class="text-center">
                            {{ number_format($range['min']) }} - {{ number_format($range['max']) }}
                        </td>
                        <td class="">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $range['id'] }}">{{ trans('common.detail') }}</button>

                            <!-- Modal -->
                            <div id="myModal{{ $range['id'] }}" class="modal fade" role="dialog">
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
                                                    {{ trans('messages.min') }} :
                                                </b>
                                                {{ number_format($range['min']) }}
                                            </h3>
                                            <h3>
                                                <b>
                                                    {{ trans('messages.max') }} :
                                                </b>
                                                {{ number_format($range['max']) }}
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
                            <a href="{{ route('prices.edit', ['id' => $range['id']]) }}" class="btn btn-success btn-sm">
                                {{ trans('common.edit') }}
                            </a>
                            {!! Form::open(['route' => ['prices.destroy', $range['id']] , 'method' => 'delete' , 'class' => 'delete_form']) !!}
                                {!! Form::submit( trans('common.delete'), ['class' => 'btn btn-warning btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $( '.delete_form' ).submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var btn = form.find( '.btn' );
                
                $.ajax({
                    url : form.attr( 'action' ),
                    type : 'DELETE',
                    dataType : 'json',
                    beforeSend : function() {
                        btn.prop('disabled', true);
                    },
                    success : function(msg) {
                        if(msg.error == 0) {
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
                    error : function() {
                        console.log('error');
                    },
                    complete : function() {
                        btn.prop('disabled', false);
                    }
                });
            });

            $('#prices_table').DataTable();
        })
    </script>
@endsection