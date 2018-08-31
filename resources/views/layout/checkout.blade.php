@extends('layout.main_layout')
@section('title', trans('messages.cart'))

@section('content')
<section class="row-fluid">
	@if(count($orders) != 0)
	<table class="table table-bordered table-hover table-responsive" id="order_table">
		<thead>
			<tr>
				<th scope="col">#</th>
			  	<th scope="col">{{ trans('messages.name_ship') }}</th>
			  	<th scope="col">{{ trans('messages.address_ship') }}</th>
			  	<th scope="col">{{ trans('messages.phone') }}</th>
			  	<th scope="col">{{ trans('messages.total_price') }}</th>
			  	<th scope="col">{{ trans('messages.action') }}</th>
			</tr>
		</thead>
		<tbody>
		@foreach($orders as $key => $orders)
			<tr>
			  	<th scope="row">{{ $key + 1}}</th>
			  	<td>{{ $orders->name_ship }}</td>
			  	<td>{{ $orders->ship_address }}</td>
			  	<td>{{ $orders->phone }}</td>
			  	<td>{{ number_format($orders->total_price) }}</td>
			  	<td><button type="button" id="{{ $orders->id }}" class="btn btn-info view-data" >{{ trans('common.order_detail') }}</button>
			  	</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	@else
	<center><h3>{{ trans('messages.no_orders') }}</h3></center>
	@endif
</section>
<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" >&times;</button>
				<h4 class="modal-title">{{ trans('common.order_detail') }}</h4>
			</div>
			<div class="modal-body" id="order_details">
				<table class="table table-striped">
				    <thead>
						<tr>
							<th scope="col">#</th>
						  	<th scope="col">{{ trans('common.book_name') }}</th>
						  	<th scope="col">{{ trans('common.quantity') }}</th>
						  	<th scope="col">{{ trans('common.price') }}</th>
						  	<th scope="col">{{ trans('messages.subtotal') }}</th>
						</tr>
					</thead>
					<tbody id="trTable">
						
					</tbody>
			  </table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('messages.close') }}</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.view-data').click(function() {
			var order_detail_id = $(this).attr("id");
			$.ajax({
				url: '/details/' + order_detail_id,
				method: "get",
				data: {order_detail_id:order_detail_id},
				success:function(data) {
					var stt=0;
					$(".tr1").remove();
					data.forEach(function(data){
						stt++;
						$("#trTable").append(
							"<tr class='tr1' >"+
							"<td>"+stt+"</td>" +
							"<td>"+ data['name'] +"</td>" +
							"<td>"+ data['quantity'] +"</td>" +
							"<td>"+ data['prices'] +"</td>" +
							"<td>"+ data['quantity'] * data['prices'] +"</td>"+
							"</tr>"
							)
					});
				}

			})
			$('#dataModal').modal('show');
		});
	});
</script>
@endsection
