@extends('layouts.site')

@section('content')
<section class="container">
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
    <h3 class="title">{{ $categories->name }}</h3>
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
  </section>
@endsection
