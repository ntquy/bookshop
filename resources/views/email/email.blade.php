<div class="cart-table-holder">
	<table class="table">
		<tr>
			<th class="th2">{{ trans('messages.product_name') }}</th>
			<th class="th3">{{ trans('messages.unit') }}</th>
			<th class="th3">{{ trans('messages.quantity') }}</th>
			<th class="th5">{{ trans('messages.subtotal') }}</th>
		</tr>
	  	@foreach($data as $item)
	  	<tr bgcolor="#FFFFFF" class=" product-detail">
			<td valign="top"><strong>{{ $item->name }}</strong></td>
			<td align="center" valign="top">{{ number_format($item->price) }} vnd </td>
			<td align="center" valign="top">{{ $item->qty }}</td>
			<td align="center" valign="top">{{ number_format($item->price * $item->qty) }} vnd </td>
	  	</tr>
	  	@endforeach
	</table>
</div>
