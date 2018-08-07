@extends('layout.main_layout')
@section('title', trans('messages.category'))

@section('content')
 <section id="content-holder" class="container-fluid container">
	<section class="row-fluid">
		<section class="span9 first">
			<div class="product_sort">
			<div class="heading-bar">
			<h2>{{ $category->name }}</h2>
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
			@foreach($categories as $key => $cat)
				<figure class="span4 slide first ">
					<a href="{{ url('/book-detail').'/'.$cat->id }}"><img class="image4" src="{{ $cat->image }}" alt="" class="pro-img"/></a>
					<span class="title"><a href="{{ url('/book-detail').'/'.$cat->id }}">{{ $cat->name }}</a></span>
					<span class="title">{{ $cat->author }}</span>
					<span class="rating-bar"><img src="/images/rating-star.png" alt="Rating Star"/></span>
					<div class="cart-price">
						<a class="cart-btn2" href="{{ url( '/cart' ).'/'.$cat->id }}">{{ trans('messages.add_cart') }}</a>
						@if( $cat->promotion_id > 1 )
						<span class="price"><del class="price_sale">{{ number_format($cat->price) }} vnd</del></span>
						<span class="price">{{ number_format(($cat->price * (100 - $cat->value))/100) }} vnd</span>
					</div>
					<span class="sale-icon">Sale</span>
						@else
						<span class="price">{{ number_format($cat->price) }} vnd</span>
					</div>
						@endif
				</figure>
			@endforeach
			</section>
			<hr>
			<div class="blog-footer">
				<div class="pagination">  
					<ul>
						@if( $categories->currentPage() != 1 )
						<li><a href="{{ $categories->url($categories->currentPage() - 1) }}">{{ trans('messages.prev') }}</a></li>
						@endif
						@for($i = 1 ; $i <= $categories->lastPage() ; $i++)
						<li class="{{ ($categories->currentPage() == $i ) ? 'active' : '' }}">  
							<a href="{{ $categories->url($i) }}">{{ $i }}</a>  
						</li> 
						@endfor
						@if( $categories->currentPage() != $categories->lastPage() )
						<li><a href="{{ $categories->url($categories->currentPage() + 1) }}">{{ trans('messages.next') }}</a></li>
						@endif
					</ul>  
				</div>
				
				<ul class="product_view">
					<li>View as:</li>
					<li><a class="grid-view" href="{{ url('/cart').'/'.$cat->id }}">{{ trans('messages.grid_view') }}</a></li>
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
