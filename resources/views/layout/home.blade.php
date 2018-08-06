@extends('layout.main_layout')
@section('title', trans('messages.home'))
@section('content')
<section class="row-fluid">
    <section class="span12 slider">
        <section class="main-slider">
            <div class="bb-custom-wrapper">
                <div id="bb-bookblock" class="bb-bookblock">
                @foreach( $books_rate as $rate )
                    <div class="bb-item">
                        <div class="bb-custom-content">
                            <div class="slide-inner">
                                <div class="span4 book-holder">
                                    <a href="{{ url('/book-detail').'/'.$rate->id }}"><img class="image1" src="{{ $rate->image }}" alt="Book" /></a>
                                    <div class="cart-price">
                                        <a class="cart-btn2" href="{{ url('/cart').'/'.$rate->id }}">{{ trans('messages.add_cart') }}</a>
                                        <span class="price">{{ number_format($rate->price) }} vnd</span>
                                    </div>
                                </div>
                                <div class="span8 book-detail">
                                    <h2>{{ $rate->name }}</h2>
                                    <strong class="title">{{ $rate->author }}</strong>
                                    <span class="rating-bar"> <img src="images/raing-star2.png" alt="Rating Star" /> </span>
                                    <a href="{{ url('/book-detail').'/'.$rate->id }}" class="shop-btn">{{ trans('messages.shop_now') }} </a>
                                    <div class="cap-holder">
                                        <p><img src="images/image27.png" alt="Best Choice" align="right"/> {{ $rate->summary}} </p>
                                        <a href="{{ url('/book-detail').'/'.$rate->id }}">{{ trans('messages.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        <nav class="bb-custom-nav">
            <a href="#" id="bb-nav-prev" class="left-arrow">{{ trans('messages.previous') }}</a>
            <a href="#" id="bb-nav-next" class="right-arrow">{{ trans('messages.next') }}</a>
        </nav>
        </section>
        <span class="slider-bottom">
            <img src="images/slider-bg.png" alt="Shadow"/>
        </span>
    </section>
    <section class="span12 wellcome-msg m-bottom first">
        <h2>{{ trans('messages.bookshop') }}</h2>
        <p>{{ trans('messages.love_book') }}</p>
      </section>
    </section>
    <section class="row-fluid ">
    @foreach($books_sale as $sale)
        <figure class="span4 s-product">
            <div class="s-product-img">
                <a href="{{ url('/book-detail').'/'.$sale->id }}"><img class="image2" src="{{ $sale->image }}" alt="Image02"/></a>
            </div>
            <article class="s-product-det">
                <h3><a href="{{ url('/book-detail').'/'.$sale->id }}">{{ $sale->name }}</a></h3>
                <p>{{ $sale->summary }}</p>
                <span class="rating-bar">
                    <img src="images/rating-star.png" alt="Rating Star"/>
                </span>
                <div class="cart-price">
                    <a href="{{ url('/cart').'/'.$sale->id }}" class="cart-btn2">{{ trans('messages.add_cart') }}</a>
                    <span class="price"><del class="price_sale">{{ number_format($sale->price) }} vnd</del></span>
                    <span class="price">{{ number_format(($sale->price * (100 - $sale->value))/100) }} vnd</span>
                </div>
                <span class="sale-icon">Sale</span>
            </article>
        </figure>
    @endforeach
    </section>
    <!-- Start BX Slider holder -->
    <section class="row-fluid features-books">
        <section class="span12 m-bottom">
            <div class="heading-bar">
              <h2>{{ trans('messages.new_book') }}</h2>
              <span class="h-line"></span>
            </div>
            <div class="slider1">
        @foreach($books_new as $new)
            <div class="slide"> <a href="{{ url('/book-detail').'/'.$new->id }}">
                <img class="image3" src="{{ $new->image }}" alt="" class="pro-img"/></a><span class="title"><strong><a href="{{ url('/book-detail').'/'.$new->id }}">{{ $new->name }}</a></strong></span>
                <span class="title">{{ $new->author }}</span>
                <span class="rating-bar"><img src="images/rating-star.png" alt="Rating Star"/></span>
            <div class="cart-price">
                <a class="cart-btn2" href="{{ url('/cart').'/'.$new->id }}">{{ trans('messages.add_cart') }}</a>
                <span class="price">{{ number_format($new->price) }} vnd</span>
            </div>
            </div>
        @endforeach
    </div>
    </section>
</section>
    <!-- End BX Slider holder -->
    <!-- Start Featured Author -->
@endsection
