@extends('layout.main_layout')
@section('title', trans('messages.cart'))

@section('content')
<section class="row-fluid">
		<!-- Start Main Content -->
		@if(session('notify'))
		{{ session('notify') }}
		@endif
	<section class="span12 cart-holder">
		<div class="heading-bar">
			<h2>{{ trans('messages.cart') }}</h2>
		</div>
		<div class="cart-table-holder">
			<table class="table">
				<tr>
					<th class="th1">&nbsp;</th>
					<th class="th2">{{ trans('messages.product_name') }}</th>
					<th class="th3">{{ trans('messages.unit') }}</th>
					<th class="th3">{{ trans('messages.quantity') }}</th>
					<th class="th4"></th>
					<th class="th5">{{ trans('messages.subtotal') }}</th>
					<th class="th6">&nbsp;</th>
				</tr>
			  	@foreach($content as $item)
			  	<tr bgcolor="#FFFFFF" class=" product-detail">
					<td valign="top"><img class="image6" src="{!! asset('/storage/' . $item->options['img']) !!}" /></td>
					<td valign="top"><strong>{{ $item->name }}</strong></td>
					<td align="center" valign="top">{{ number_format($item->price) }} vnd </td>
					{{ Form::open(['url' => route('updateCart', ['id' => $item->rowId]), 'method' => 'post']) }}
					<td align="center" valign="top">{{ Form::text('quantity', $item->qty ) }}</td>
					<td align="center" valign="top">{{ Form::submit(trans('messages.update'),['class' => 'btn btn-link']) }}</td>
					{{ Form::close() }}
					<td align="center" valign="top">{{ number_format($item->price * $item->qty) }} vnd </td>
					<td align="center" valign="top"><a href="{{ url('/deleteCart'.'/'.$item->rowId) }}"> <i class="icon-trash"></i></a></td>
			  	</tr>
			  	@endforeach
			</table>

		</div>
		@if (Auth::check())
		{{ Form::open(['url' => route('order', ['id_user' => Auth::user()->id])]) }}
		@endif
		<figure class="span4 first">
			<div class="cart-option-box">
				<h4><i class="icon-shopping-cart"></i> {{ trans('messages.shipping') }}</h4>
				<p>{{ trans('messages.destination') }}</p>
				<ul class="billing-form">
					<li>   
						<div class="control-group">
							{{ Form::label('inputZip', trans('messages.name_ship'), array('class' => 'control-label')) }}
							<div class="controls">
							  	{{ Form::text('name_ship', null) }}
							</div>
						</div>
					</li>
					<li>   
						<div class="control-group">
						{{ Form::label('inputZip', trans('messages.address'), array('class' => 'control-label')) }}
							<div class="controls">
							  	{{ Form::text('address', null) }}
							</div>
						</div>
					</li>
					<li>   
						<div class="control-group">
							{{ Form::label('inputZip', trans('messages.phone'), array('class' => 'control-label')) }}
							<div class="controls">
							  	{{ Form::text('phone', null) }}
							</div>
						</div>
					</li>
				</ul>
			</div>
		</figure>
		<figure class="span4">
			<div class="cart-option-box">
				<h4><i class="icon-money"></i> {{ trans('messages.discount_code') }}</h4>
				<p>{{ trans('messages.coupon') }}</p>
				{{ Form::text('coupon', null) }}
				<br class="clearfix">
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
			  @if(Auth::check())
			  {{ Form::submit(trans('messages.proceed'), ['class' => 'more-btn'])}}
			  @else
			  {{ Form::submit(trans('messages.proceed'), ['class' => 'more-btn', 'disabled' => 'true'])}}
			  <hr>
			  <p class="text">{{ trans('messages.order_login') }}</p>
			  @endif
			</div>
		</figure>
		{{ Form::close() }}
	</section>
</section>
@endsection
