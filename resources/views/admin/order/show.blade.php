@extends('layout.admin_layout')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('common.order_show') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('common.order_show') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        <div class="y-scroller">
            <table class="table table-bordered table-hover table-responsive" id="order_table">
                <thead>
                <tr>
                    <th class="text-center">
                        {{ trans('common.customer_name') }}
                    </th>
                    <th class="text-center">
                        {{ trans('common.total_price') }}
                    </th>
                    <th class="text-center">
                        {{ trans('common.address') }}
                    </th>
                    <th class="text-center">
                        {{ trans('common.status') }}
                    </th>
                    <th class="text-center">
                        {{ trans('common.action') }}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $stt => $order)
                    <tr>
                        <td class="text-center">
                            {{ $order->name_ship }}
                        </td>
                        <td class="text-center">
                            {{ number_format($order->total_price) }}
                        </td>
                        <td class="text-center">
                            {{ $order->ship_address }}
                        </td>
                        <td class="text-center <?php echo $order->paid == 1?'paid_check':'paid_uncheck' ?>">
                            @if($order->paid == 1)
                                <i class="fa fa-check"></i> {{ trans('common.check') }}
                            @else
                                {!! Form::open(['route' => ['statistics.update' , $order['id']] , 'method' => 'put' , 'class' => 'update_form']) !!}
                                {!! Form::submit(trans('common.paid') , ['class' => 'btn btn-warning btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td class="">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $order['id'] }}">{{ trans('common.order_detail') }}</button>

                            <!-- Modal -->
                            <div id="myModal{{ $order['id'] }}" class="modal fade fullscreen" role="dialog">
                                <div class="modal-dialog order_modal">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                &times;
                                            </button>
                                            <h4 class="modal-title">
                                                <b>
                                                    {{ trans('common.order_detail') }}
                                                    <b>
                                            </h4>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-md-4">
                                                <h3>
                                                    <b>
                                                        {{ trans('common.customer_name') }} :
                                                    </b>
                                                    {{ $order->name_ship }}
                                                </h3>
                                                <h3>
                                                    <b>
                                                        {{ trans('common.total_price') }} :
                                                    </b>
                                                    {{ $order['total_price'] }}
                                                </h3>
                                                <h3>
                                                    <b>
                                                        {{ trans('common.promotion') }} :
                                                    </b>
                                                    {{ $order['discount'] }}
                                                </h3>
                                                <h3>
                                                    <b>
                                                        {{ trans('common.ship_address') }} :
                                                    </b>
                                                    {{ $order['ship_address'] }}
                                                </h3>
                                                <h3>
                                                    <b>
                                                        {{ trans('common.phone') }} :
                                                    </b>
                                                    {{ $order['phone'] }}
                                                </h3>
                                            </div>
                                            <div class="col-md-8">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                {{ trans('common.book_name') }}
                                                            </th>
                                                            <th>
                                                                {{ trans('common.quantity') }}
                                                            </th>
                                                            <th>
                                                                {{ trans('common.price') }}
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        @foreach($order->order as $order_detail)
                                                            <tr>
                                                                <td>
                                                                    {{ $order_detail->book['name'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $order_detail->quantity }}
                                                                </td>
                                                                <td>
                                                                    {{ $order_detail->prices * $order_detail->quantity }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                {{ trans('common.close') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::open(['route' => ['statistics.destroy' , $order['id']] , 'method' => 'delete' , 'class' => 'delete_form']) !!}
                            {!! Form::submit(trans('common.order_delete') , ['class' => 'btn btn-warning btn-sm']) !!}
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
            $('.update_form').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var container = form.closest('.paid_uncheck');
                $.ajax({
                    url : form.attr('action'),
                    type : 'PUT',
                    dataType : 'json',
                    success : function (msg) {
                        if(msg.error == 0)
                        {
                            container.removeClass('paid_uncheck').addClass('paid_check');
                            container.html('<i class="fa fa-check"></i> {{ trans('common.check') }}');
                        }
                    }
                });
            });
            
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

            $('#order_table').DataTable();
        })
    </script>
@endsection
