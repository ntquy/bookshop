@extends('layout.main_layout')
@section('title', trans('messages.book_detail'))

@section('content')
  <section class="row-fluid">
		<div class="heading-bar">
			<h2>{{ trans('messages.book_detail') }}</h2>
			<span class="h-line"></span>
		</div>
		<!-- Start Main Content -->
		<section class="span9 first">
		
			<!-- End Ad Slider Section -->
			
			<!-- Strat Book Detail Section -->
			<section class="b-detail-holder">
				<article class="title-holder">
					<div class="span6">
						<h4><strong>{{ $books->name }}</strong> {{ trans('messages.by') }} {{ $books->author }}</h4>
					</div>
					<div class="span6 book-d-nav">
						<ul>
							<li><a href="#">2 {{ trans('messages.review') }}</a></li>
						</ul>
					</div>
				</article>
				<div class="book-i-caption">
				<!-- Strat Book Image Section -->
					<div class="span6 b-img-holder">
						<span class='zoom' id='ex1'> <img class="image5" src='{{ $books->image }}' id='jack' alt='Book'/></span>
					</div>
				<!-- Strat Book Image Section -->
				
				<!-- Strat Book Overview Section -->    
					<div class="span6">
						<strong class="title">{{ trans('messages.quick') }}</strong>
						<p>{{ $books->summary }}. </p>
						<p>{{ trans('messages.availability') }}: <a href="#">@if( $books->quantity ) Còn hàng @else Hết hàng @endif</a></p>
						<div class="comm-nav">
							<strong class="title2">{{ trans('messages.quantity') }}</strong>
							<ul>
								<li><input name="quantity" type="text" /></li>
								@if( $books->promotion_id == 1)
								<li class="b-price">{{ number_format($books->price) }} vnd</li>
								@else
								<li class="b-price">{{ number_format((($books->price) * (100-$books->value))/100) }} vnd</li>
								@endif
								<li><a href="{{ url('/cart').'/'.$books->id }}" class="more-btn">+ {{ trans('messages.to_cart') }}</a></li>
							</ul>
						</div>
				   </div>
				<!-- End Book Overview Section -->
				</div>
				
				<!-- Start Book Summary Section -->
					<div class="tabbable">
					  <ul class="nav nav-tabs">
						<li class="active"><a href="#pane1" data-toggle="tab">{{ trans('messages.book_content') }}</a></li>
					  </ul>
					  <div class="tab-content">
						<div id="pane1" class="tab-pane active">
						  <p>{{ $books->content }} </p>
						</div>
					  </div><!-- /.tab-content -->
					</div><!-- /.tabbable -->
				<!-- End Book Summary Section -->
			
			<!-- Start BX Slider holder -->  
			<section class="related-book">
			<div class="heading-bar">
				<h2>{{ trans('messages.related') }}</h2>
				<span class="h-line"></span>
			</div>
			<div class="slider6">
			@foreach($books_cat as $catbook)
				<div class="slide">
					<a href="{{ url('/book-detail').'/'.$catbook->id }}"><img class="image6" src="{{ $catbook->image }}" alt="" class="pro-img"/></a>
					<span class="title"><strong><a href="{{ url('/book-detail').'/'.$catbook->id }}">{{ $catbook->name }}</a></strong></span>
					<span class="title">{{ $catbook->author }}</span>
					<span class="rating-bar"><img src="/images/rating-star.png" alt="Rating Star"/></span>
					<div class="cart-price">
						<a class="cart-btn2" href="{{ url('/cart').'/'.$catbook->id }}">{{ trans('messages.add_cart') }}</a>
						@if( $catbook->promotion_id > 1 )
						<span class="price"><del class="price_sale">{{ number_format($catbook->price) }} vnd</del></span>
						<span class="price">{{ number_format(($catbook->price * (100 - $catbook->value))/100) }} vnd</span>
						<span class="sale-icon">Sale</span>
						@else
						<span class="price">{{ number_format($catbook->price) }} vnd</span>
						@endif
					</div>
				</div>
			@endforeach
			</div>
			</section>
			<!-- End BX Slider holder -->
			
			<!-- Stsrt Customer Reviews Section -->
			<section class="reviews-section">
				<figure class="left-sec">
					<div class="r-title-bar">
						<strong>{{ trans('messages.customer') }}</strong>
					</div>
					<ul class="review-list">
					@foreach($comments as $com)
						<li>
							<em class="">{{ $com->name }}</em>
							<p>{{ $com->content }}</p>
						</li>
					@endforeach
					</ul>
				</figure>
				<figure class="right-sec">
					<div class="r-title-bar">
						<strong>{{ trans('messages.write_review') }}</strong>
					</div>
					@if(Auth::check())
					{{ Form::open(['url' => route('rateComment', ['id_book' => $books->id, 'id_user' =>  Auth::user()->id])]) }}
					@else
					@endif
					<ul class="review-f-list">
						<li>
							{{ Form::label( trans('messages.your_review') ) }}
							{{ Form::textarea('comment', null) }}
						</li>
						<li>
							{{ Form::label( trans('messages.you_rate') ) }}
							<div class="rating-list">
								<div class="rating-box">
								{{ Form::radio('optionsRadios', 1)}}
								1 {{ trans('messages.star') }}
								</div>
								<br>
									{{ Form::radio('optionsRadios', 2)}}
									2 {{ trans('messages.star') }}
								<br>
									{{ Form::radio('optionsRadios', 3)}}
									3 {{ trans('messages.star') }}
								<br>
									{{ Form::radio('optionsRadios', 4)}}
									4 {{ trans('messages.star') }}
								<br>
									{{ Form::radio('optionsRadios', 5)}}
									5 {{ trans('messages.star') }}
								<br>
							</div>
						</li>
					</ul>
					@if(Auth::check())
					{{ Form::submit(trans('messages.write_review'), ['class' => 'grey-btn left-btn'])}}
					{{ Form::close() }}
					@else
					{{ Form::submit(trans('messages.write_review'), ['class' => 'grey-btn left-btn', 'disabled' => 'true']) }}
					<hr>
					<p class="text">{{ trans('messages.you_must') }}</p>
					{{ Form::close() }}
					@endif
				</figure>
			</section>
			<!-- End Customer Reviews Section -->
			</section>
			<!-- Strat Book Detail Section -->
		</section>
		<!-- End Main Content -->
		
		<!-- Start Main Side Bar -->
		@include('layout.side_bar')
	</section>
@endsection
