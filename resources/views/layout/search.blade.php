@extends('layout.main_layout')
@section('title', trans('messages.result_search'))

@section('content')
 <section id="content-holder" class="container-fluid container">
	<section class="row-fluid">
		<section class="span9 first">
			<div class="product_sort">
			<div class="heading-bar">
		  	<h2>{{ trans('messages.result_search') }}</h2>
		  		<span class="h-line"></span>
		 	</div>
				<div class="row-2">
					<ul class="product_view">
						<li>{{ trans('messages.view_as') }} :</li>
						<li>
							<a class="grid-view" href="#">{{ trans('messages.grid_view') }}</a>
						</li>
						<li>
							<a class="list-view" href="#">{{ trans('messages.list_view') }}</a>
						</li>
					</ul>
				</div>
			</div>
			<section class="grid-holder features-books">
			@foreach($result as $search)
				<figure class="span4 slide first ">
					<a href="{{ url('/book-datail').'/'.$search->id }}"><img class="image4" src="{{ $search->image }}" alt="" class="pro-img"/></a>
					<span class="title"><a href="{{ url('/book-datail').'/'.$search->id }}">{{ $search->name }}</a></span>
					<span class="title">{{ $search->author }}</span>
					<span class="rating-bar"><img src="/images/rating-star.png" alt="Rating Star"/></span>
					<div class="cart-price">
						<a class="cart-btn2" href="{{ url('/cart').'/'.$search->id }}">{{ trans('messages.add_cart') }}</a>
						@if( $search->promotion_id > 1 )
						<span class="price"><del class="price_sale">{{ number_format($search->price) }} vnd</del></span>
						<span class="price">{{ number_format(($search->price * (100 - $search->value))/100) }} vnd</span>
					</div>
					<span class="sale-icon">Sale</span>
						@else
						<span class="price">{{ number_format($search->price) }} vnd</span>
						@endif
				</figure>
			@endforeach
			</section>
			<hr>
			<div class="blog-footer">
				<div class="pagination">  
					<ul>
						@if( $result->currentPage() != 1 )
						<li><a href="{{ $result->url($result->currentPage() - 1) }}">{{ trans('messages.prev') }}</a></li>
						@endif
						@for($i = 1 ; $i <= $result->lastPage() ; $i++)
						<li class="{{ ($result->currentPage() == $i ) ? 'active' : '' }}">  
							<a href="{{ $result->url($i) }}">{{ $i }}</a>  
						</li> 
						@endfor
						@if( $result->currentPage() != $result->lastPage() )
						<li><a href="{{ $result->url($result->currentPage() + 1) }}">{{ trans('messages.next') }}</a></li>
						@endif
					</ul>  
				</div>
				
				<ul class="product_view">
					<li>View as:</li>
					<li><a class="grid-view" href="{{ url('/cart').'/'.$search->id }}">{{ trans('messages.grid_view') }}</a></li>
					<li><a class="list-view" href="list-view.html">{{ trans('messages.list_view') }}</a></li>
			   </ul>
			</div>
			<!-- End Grid View Section -->     
		</section>
		@include('layout.side_bar')
		<!-- End Main Side Bar -->
	</section>
</section>
@endsection
