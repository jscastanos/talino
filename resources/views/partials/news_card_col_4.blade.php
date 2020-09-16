<div class="col-md-4 mb-3 feature-card">
    <a href="/news/{{ $news->slug }}">
        <div class="card">
            <img class="img-fluid" alt="{{ $news->imageAltText('cover') }}"
                src="{{ $news->image('cover', 'desktop') }}">
            <div class="card-body">
                <span class="float-right">{{ $news->created_at->format('M d, Y') }}</span>
                <span class="badge" style="background-color: {{ $news->category->badge_color }}">
                <span>{{ $news->category->name }}</span>
                </span>
                <h4 class="feature-title mt-3">{{ $news->title }}</h4>
            </div>
        </div>
    </a>
</div>
