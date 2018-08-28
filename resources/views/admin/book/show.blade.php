@extends('layout.admin_layout')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ trans('common.book_show') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="{{ route('books.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">{{ trans('common.book_add')}}
            </a>
            <ol class="breadcrumb">
                <li>
                    <a href="#">{{ trans('common.book_show') }}</a>
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        <div class="y-scroller">
            <table class="table table-bordered table-hover table-responsive" id="book_table">
                <thead>
                    <tr>
                        <th class="text-center">
                            {{ trans('common.name') }}
                        </th>
                        <th class="text-center">
                            {{ trans('common.author') }}
                        </th>
                        <th class="text-center">
                            {{ trans('common.publisher') }}
                        </th>
                        <th class="text-center">
                            {{trans('common.action')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $stt => $book)
                    <tr>
                        <td class="text-center">
                            {{ $book['name'] }}
                        </td>
                        <td class="text-center">
                            {{ $book['author'] }}
                        </td>
                        <td class="text-center">
                            {{ $book['publisher']->name }}
                        </td>
                        <td class="">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{$book['id']}}">{{ trans('common.detail') }}</button>

                            <!-- Modal -->
                            <div id="myModal{{ $book['id'] }}" class="modal fade" role="dialog">
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
                                                    {{ trans('common.name') }} :
                                                </b>
                                                {{$book['name']}}
                                            </h3>
                                            <h3>
                                                <b>
                                                    {{ trans('common.author') }} :
                                                </b>
                                                {{$book['author']}}
                                            </h3>
                                            <h3>
                                                <b>
                                                    {{ trans('common.category') }} :
                                                </b>
                                                @foreach($book->categories as $index => $category)
                                                    @if($index != 0)
                                                        {{' , '}}
                                                    @endif
                                                    {{ $category->name }}
                                                @endforeach
                                            </h3>
                                            <h3>
                                                <b>
                                                    {{ trans('common.quantity') }} :
                                                </b>
                                                {{ $book['quantity'] }}
                                            </h3>
                                            <h3>
                                                <b>
                                                    {{ trans('common.price') }} :
                                                </b>
                                                {{$book['price'] . ' VND'}}
                                            </h3>
                                            <h3>
                                                <b>
                                                    {{ trans('common.publisher') }} :
                                                </b>
                                                {{ $book->publisher->name }}
                                            </h3>
                                            <h3>
                                                <b>
                                                    {{ trans('common.promotion') }} :
                                                </b>
                                                {{ $book->promotion->value . '%' }}
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
                            <a href="{{ route('books.edit', ['id' => $book['id']]) }}" class="btn btn-success btn-sm">
                                {{ trans('common.edit') }}
                            </a>
                            {!! Form::open(['route' => ['books.destroy', $book['id']] , 'method' => 'delete' , 'class' => 'delete_form']) !!}
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

            $('#book_table').DataTable();
        })
	</script>
@endsection