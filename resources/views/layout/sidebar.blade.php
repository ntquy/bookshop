<section class="span3">
    <div class="side-holder">
        <article class="shop-by-list">
            <h2>{{ trans('messages.shop_by') }}</h2>
            <div class="side-inner-holder">
                <strong class="title">{{ trans('messages.category') }}</strong>
                <ul class="side-list">
                    @foreach ($limit_categories as $cat)
                        <li>
                            <a href="{{ url('/category') . '/' . $cat->id }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <strong class="title">{{ trans('messages.price') }}</strong>
                <ul class="side-list">
                    @foreach($range as $range)
                    <li>
                        <a href="{{ route('searchPrices', ['min' => $range->min, 'max' => $range->max])}}">{{ number_format($range->min) }} vnd - {{ number_format($range->max) }} vnd</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </article>
    </div>
</section>
