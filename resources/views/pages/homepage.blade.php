@extends('layouts.site')

@section('content')
    <section class="container mt-3 mb-3">
        <div id="popularNews" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($popularNews as $news)
                <li data-target="#popularNews" data-slide-to="{{ $loop->index }}"
                                            class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                @endforeach
              <li data-target="#popularNews" data-slide-to="1"></li>
              <li data-target="#popularNews" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
             @foreach ($popularNews as $news)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <a href="news/{{ $news->slug }}">
                        <img class="d-block w-100" src="{{ $news->image('cover', 'desktop') }}"
                                                alt="{{ $news->image('cover') }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $news->title }}</h5>
                        </div>
                    </a>
                </div>
             @endforeach
            </div>
            <a class="carousel-control-prev" href="#popularNews" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#popularNews" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        <h3 class="title">Latest News</h3>
        @if (count($latestNews) > 0)
            <div class="row"id="latestNews">
                @each('partials.news_card_col_4', $latestNews, 'news')
            </div>
            <div class="col-md-12 text-center mt-4 mb-5">
                <button id="loadMoreNews" class="btn btn-primary btn-lg"
                    onclick="onLoadMorePage('partials.news_card_col_4', 6, {{ count($latestNews) }})">
                    Load more news
                </button>
                <h5 id="noMoreNews" class="d-none text-muted">No more news</h5>
            </div>
        @else
            <p class="text-muted text-center mt-5">No news available</p>
        @endif
    </section>
@endsection
