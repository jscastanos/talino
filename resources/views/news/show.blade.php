@extends('layouts.site')

@section('content')
    <section class="container mt-3 mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/categories/{{ $news->category->slug }}">{{ $news->category->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $news->title }}
                </li>
            </ol>
        </nav>
    </section>

    <section class="container mt-3 mb-3">
        <div class="row">
            {{-- BODY OF NEWS --}}
            <div class="col-md-9">
                <img src="{{ $news->image('cover', 'desktop') }}" class="img-fluid" alt="">
                <div class="p-md-4">
                    <h1 class="title">{{ $news->title }}</h1>
                    <span class="badge badge-bigger" style="background-color:{{ $news->category->badge_color }}">
                        <span>{{ $news->category->name }}</span>
                    </span>
                    <div class="float-right">
                        <span>{{ $news->created_at->format('M d, Y') }}</span>
                        <br/>
                        <span>Page visits: {{ $news->page_visit }}</span>
                    </div>
                    <div class="description_box pt-5">
                        {!! $news->description !!}
                    </div>
                </div>
            </div>

            {{-- LATEST NEWS --}}
            <div class="col-md-3">
                <h3 class="title">
                    <i class="fa fa-rocket"></i>Latest News
                </h3>
                <div class="row">
                    @foreach ($latestNews as $latest)
                    <div class="col-md-12 col-sm-6 feature-card">
                        <a href="{{ $latest->slug }}">
                            <img class="img-fluid" alt="{{ $latest->imageAltText('cover') }}"
                                src="{{ $latest->image('cover', 'desktop') }}">
                            <h4 class="feature-title mt-3">{{ $latest->title }}</h4>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Popular NEWS --}}
            @if (count($popularNews) > 0)
                <div class="col-md-12">
                    <h3 class="title">
                        <i class="fa fa-line-chart"></i>Popular News
                    </h3>
                    <div class="row">
                    @each('partials.news_card_col_3', $popularNews, 'news')
                </div>
                </div>
            @endif


            {{-- MORE NEWS --}}
            @if (count($latestNewsByCategory) > 0)
                <div class="col-md-12">
                    <h3 class="title">
                        <i class="fa fa-flask"></i> More News From {{ $news->category->name }}
                    </h3>
                    <div class="row">
                    @each('partials.news_card_col_3', $latestNewsByCategory, 'news')
                </div>
                </div>
            @endif
        </section>
    </section>
@endsection
