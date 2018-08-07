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
