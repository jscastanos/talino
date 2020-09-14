@extends('layouts.site')



@section('content')
    <section class="container mt-3 mb-3">
        <img src="{{ $news->image('cover', 'desktop') }}" class="img-fluid" alt="">
        <div class="p-md-4">
            <h1 class="title">{{ $news->title }}</h1>
            <span>{{ $news->created_at->format('M d, Y') }}</span>
            <div class="float-right">
                <h4>
                    <span class="badge" style="background-color:{{ $news->category->badge_color }}">
                        <span>{{ $news->category->name }}</span>
                    </span>
                </h4>
            </div>
            <div class="description_box pt-4">
                {!! $news->description !!}
            </div>
        </div>
    </section>

    <section class="container mt-4 mb-3">
        <h3 class="title">Latest News</h3>
        <div class="row">
            @foreach ($latest_news as $latest)
                    <div class="col-md-4 mb-3 feature-card">
                        <a href="{{ $latest->slug }}">
                            <div class="card">
                                <img class="img-fluid" alt="{{ $latest->imageAltText('cover') }}"
                                    src="{{ $latest->image('cover', 'desktop') }}">
                                <div class="card-body">
                                    <span>{{ $latest->created_at->format('M d, Y') }}</span>
                                    <span class="badge float-right" style="background-color: {{ $latest->category->badge_color }}">
                                    <span>{{ $latest->category->name }}</span>
                                    </span>
                                    <h4 class="feature-title mt-2">{{ $latest->title }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
        </section>
    </section>
@endsection
