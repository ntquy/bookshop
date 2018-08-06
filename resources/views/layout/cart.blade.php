@extends('layout.main_layout')
@section('title', trans('messages.cart'))

@section('content')
<section class="row-fluid">
		<!-- Start Main Content -->
	<section class="span12 cart-holder">
		<div class="heading-bar">
			<h2>{{ trans('messages.cart') }}</h2>
		</div>
		<div class="cart-table-holder">
			<table width="100%" border="0" cellpadding="10">
				<tr>
					<th width="14%">&nbsp;</th>
					<th width="43%" align="left">{{ trans('messages.product_name') }}</th>
					<th width="10%">{{ trans('messages.unit') }}</th>
					<th width="10%">{{ trans('messages.quantity') }}</th>
					<th width="6%"></th>
					<th width="12%">{{ trans('messages.subtotal') }}</th>
					<th width="5%">&nbsp;</th>
				</tr>
			  	@foreach($content as $item)
			  	<tr bgcolor="#FFFFFF" class=" product-detail">
					<td valign="top"><img class="image6" src="{{ $item->options['img'] }}" /></td>
					<td valign="top"><strong>{{ $item->name }}</strong></td>
					<td align="center" valign="top">
						@if($item->options['promotion_id'] > 1)
							{{ number_format((($item->price) * (100 - $item->promotion)) / 100) }} vnd 
						@else {{ number_format($item->price) }} vnd 
						@endif
					</td>
					{{ Form::open(['url' => route('updateCart', ['id' => $item->rowId]), 'method' => 'post']) }}
					<td align="center" valign="top">{{ Form::text('quantity', $item->qty ) }}</td>
					<td align="center" valign="top">{{ Form::submit(trans('messages.update'),['class' => 'btn btn-link']) }}</td>
					{{ Form::close() }}
					<td align="center" valign="top">
						@if($item->options['promotion_id'] = 1) 
							{{ number_format($item->price * $item->qty) }} vnd 
						@else 
							{{ number_format(((($item->price) * (100 - $item->promotion))/100) * $item->qty) }} vnd 
						@endif
					</td>
					<td align="center" valign="top"><a href="{{ url('/deleteCart'.'/'.$item->rowId) }}"> <i class="icon-trash"></i></a></td>
			  	</tr>
			  	@endforeach
			</table>

		</div>
		
		<figure class="span4 first">
			<div class="cart-option-box">
				<h4><i class="icon-shopping-cart"></i> {{ trans('messages.shipping') }}</h4>
				<p>{{ trans('messages.destination') }}</p>
				<form class="form-horizontal">
					<ul class="billing-form">
						<li>   
							<div class="control-group">
								<label class="control-label" for="inputZip">{{ trans('messages.name_ship') }} <sup>*</sup></label>
								<div class="controls">
								  	<input name="name_ship" type="text" id="inputZip" placeholder="">
								</div>
							</div>
						</li>
						<li>   
							<div class="control-group">
								<label class="control-label" for="inputZip">{{ trans('messages.address') }} <sup>*</sup></label>
								<div class="controls">
								  	<input name="address" type="text" id="inputZip" placeholder="">
								</div>
							</div>
						</li>
						<li>   
							<div class="control-group">
								<label class="control-label" for="inputZip">{{ trans('messages.phone') }} <sup>*</sup></label>
								<div class="controls">
								  	<input name="phone" type="text" id="inputZip" placeholder="">
								</div>
							</div>
						</li>
					</ul>
				</form>
			</div>
		</figure>
		<figure class="span4">
			<div class="cart-option-box">
				<h4><i class="icon-money"></i> {{ trans('messages.discount_code') }}</h4>
				<p>{{ trans('messages.coupon') }}</p>
				<input type="text" id="inputDiscount" placeholder="">
				<br / class="clearfix">
			</div>
		</figure>
		<figure class="span4 price-total">
			<div class="cart-option-box">
				<table width="100%" border="0" cellpadding="10" class="total-payment">
				  <tr>
					<td align="right"><strong class="large-f">{{ trans('messages.grand') }}</strong></td>
					<td align="left"><strong class="large-f">{{ $total }} vnd</strong></td>
				  </tr>
			  </table>
			  <hr />
				<a href="#" class="more-btn">{{ trans('messages.proceed') }}</a>
			</div>
		</figure>
	</section>
		<!-- End Main Content -->
</section>
@endsection