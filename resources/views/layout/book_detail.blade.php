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
								<li><a href="cart.html" class="more-btn">+ {{ trans('messages.to_cart') }}</a></li>
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
						<a class="cart-btn2" href="cart.html">{{ trans('messages.add_cart') }}</a>
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
						<li>
							<span class="rating-bar"><img src="/images/rating-star.png" alt="Rating Star"/></span>
							<em class="">AAAA</em>
							<p>“ BBBBBBBB’</p>
						</li>
					</ul>
					<a href="#" class="grey-btn">{{ trans('messages.write_review') }}</a>
				</figure>
				<figure class="right-sec">
					<div class="r-title-bar">
						<strong>{{ trans('messages.write_review') }}</strong>
					</div>
					<ul class="review-f-list">
						<li>
							<label>{{ trans('messages.your_name') }} *</label>
							<input name="" type="text" />
						</li>
						<li>
							<label>{{ trans('messages.summary_review') }} *</label>
							<input name="" type="text" />
						</li>
						<li>
							<label>{{ trans('messages.your_review') }} *</label>
							<textarea name="" cols="2" rows="20"></textarea>
						</li>
						<li>
							<label>{{ trans('messages.you_rate') }} *</label>
							<div class="rating-list">
								<div class="rating-box">
									<label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									1 {{ trans('messages.star') }}
								</label>
								</div>
								<label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									2 {{ trans('messages.star') }}
								</label>
								<label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									3 {{ trans('messages.star') }}
								</label>
								<label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									4 {{ trans('messages.star') }}
								</label>
								<label class="radio">
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									5 {{ trans('messages.star') }}
								</label>
							</div>
						</li>
					</ul>
					<a href="#" class="grey-btn left-btn">{{ trans('messages.write_review') }}</a>
				</figure>
			</section>
			<!-- End Customer Reviews Section -->
			</section>
			<!-- Strat Book Detail Section -->
		</section>
		<!-- End Main Content -->
		
		<!-- Start Main Side Bar -->
		<section class="span3">
			<div class="side-holder">        
			</div>
			<div class="side-holder">
				<article class="shop-by-list">
					<h2>{{ trans('messages.shop_by') }}</h2>
					<div class="side-inner-holder">
						<strong class="title">{{ trans('messages.category') }}</strong>
						<ul class="side-list">
							<li><a href="grid-view.html">a (15)</a></li>
							<li><a href="grid-view.html">b (15)</a></li>
							<li><a href="grid-view.html">c (15)</a></li>
							<li><a href="grid-view.html">d(15)</a></li>
						</ul>
						<strong class="title">{{ trans('messages.price') }}</strong>
						<ul class="side-list">
							<li><a href="#">$0.00 - $10,00.00 (13)</a></li>
							<li><a href="#">$10,00.00 - $20,00.00 (2)</a></li>
						</ul>
						<strong class="title">{{ trans('messages.author') }}</strong>
						<ul class="side-list">
							<li><a href="book-detail.html">A (9)</a></li>
							<li><a href="book-detail.html">B (2)</a></li>
							<li><a href="book-detail.html">C (1)</a></li>
							<li><a href="book-detail.html">D (3)</a></li>
						</ul>
					</div>
				</article>
			</div>
			<div class="side-holder">
				<article class="price-range">
					<h2>{{ trans('messages.price_range') }}</h2>
					<div class="side-inner-holder">
						<p>{{ trans('messages.select_price') }}</p>                     
						<div id="slider-range"></div>
						<p> <input type="text" id="amount" class="r-input"> </p>
					</div>
				</article>
			</div>    
		</section>
	</section>
@endsection