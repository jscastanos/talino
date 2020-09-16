@extends('layouts.site')

@section('content')
<section class="container mt-3 mb-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $categories->name }}
            </li>
        </ol>
    </nav>
</section>
  <section class="container mt-3 mb-3">
    {{-- POPULAR NEWS --}}
    @if (count($popularNews) > 0)
        <h3 class="title">
            <i class="fa fa-line-chart"></i>Popular News
        </h3>
        <div class="row">
            @each('partials.news_card_col_4', $popularNews, 'news')
        </div>
    @endif

    <h3 class="title">
        <i class="fa fa-flask"></i> More News
    </h3>

    @if (count($categories->news) > 0)
        <div class="row">
            @foreach ($categories->news as $news )
            <div class="col-md-4 mb-3 feature-card">
                <a href="/news/{{ $news->slug }}">
                    <div class="card">
                        <img class="img-fluid" alt="{{ $news->imageAltText('cover') }}"
                            src="{{ $news->image('cover', 'desktop') }}">
                        <div class="card-body">
                            <span class="float-right">{{ $news->created_at->format('M d, Y') }}</span>
                            <span class="badge" style="background-color: {{ $categories->badge_color }}">
                            <span>{{ $categories->name }}</span>
                            </span>
                            <h4 class="feature-title mt-3">{{ $news->title }}</h4>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    @else
        <p class="text-muted text-center mt-5">No news available</p>
    @endif
  </section>
@endsection
