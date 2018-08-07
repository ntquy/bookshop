@extends('layout.main_layout')
@section('title', trans('messages.sale'))

@section('content')
 <section id="content-holder" class="container-fluid container">
	<section class="row-fluid">
		<section class="span9 first">
			<div class="product_sort">
			<div class="heading-bar">
		  	<h2>{{ trans('messages.book_sale') }}</h2>
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
			@foreach($books_sale as $sale)
				<figure class="span4 slide first ">
					<a href="{{ url('/book-detail').'/'.$sale->id }}"><img class="image4" src="{{ $sale->image }}" alt="" class="pro-img"/></a>
					<span class="title"><a href="{{ url('/book-detail').'/'.$sale->id }}">{{ $sale->name }}</a></span>
					<span class="title">{{ $sale->author }}</span>
					<span class="rating-bar"><img src="/images/rating-star.png" alt="Rating Star"/></span>
					<div class="cart-price">
						<a class="cart-btn2" href="{{ url('/cart').'/'.$sale->id }}">{{ trans('messages.add_cart') }}</a>
						<span class="price"><del class="price_sale">{{ number_format($sale->price) }} vnd</del></span>
						<span class="price">{{ number_format(($sale->price * (100 - $sale->value))/100) }} vnd</span>
					</div>
					<span class="sale-icon">Sale</span>
				</figure>
			@endforeach
			</section>
			<hr>
			<div class="blog-footer">
				<div class="pagination">  
					<ul>
						@if( $books_sale->currentPage() != 1 )
						<li><a href="{{ $books_sale->url($books_sale->currentPage() - 1) }}">{{ trans('messages.prev') }}</a></li>
						@endif
						@for($i = 1 ; $i <= $books_sale->lastPage() ; $i++)
						<li class="{{ ($books_sale->currentPage() == $i ) ? 'active' : '' }}">  
							<a href="{{ $books_sale->url($i) }}">{{ $i }}</a>  
						</li> 
						@endfor
						@if( $books_sale->currentPage() != $books_sale->lastPage() )
						<li><a href="{{ $books_sale->url($books_sale->currentPage() + 1) }}">{{ trans('messages.next') }}</a></li>
						@endif
					</ul>  
				</div>
				
				<ul class="product_view">
					<li>View as:</li>
					<li><a class="grid-view" href="grid.html">{{ trans('messages.grid_view') }}</a></li>
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
