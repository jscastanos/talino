@extends('layouts.site')

@section('title', 'Popular News')

@section('content')
    <section class="container mt-3 mb-3">
        <h3 class="title">
            <i class="fa fa-line-chart"></i> This Week
        </h3>
        @if (count($popularNewsWeek) > 0)
            <div class="row" id="latestNews">
                @each('partials.news_card_col_4', $popularNewsWeek, 'news')
            </div>
        @else
            <p class="text-muted text-center mt-5">No news available</p>
        @endif

        <h3 class="title">
            <i class="fa fa-area-chart"></i> This Month
        </h3>
        @if (count($popularNewsMonth) > 0)
            <div class="row" id="latestNews">
                @each('partials.news_card_col_4', $popularNewsMonth, 'news')
            </div>
        @else
            <p class="text-muted text-center mt-5">No news available</p>
        @endif
    </section>
@endsection
