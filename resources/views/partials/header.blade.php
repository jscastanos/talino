<header class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Talino</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/news/popular">
                        <i class="fa fa-line-chart"></i> Popular
                    </a>
                </li>
                <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-list"></i> By Category
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($menuCategory as $menu)
                        <a class="dropdown-item" href="/categories/{{ $menu->slug }}">{{ $menu->name }}</a>
                      @endforeach
                  </div>
                </li>
              </ul>
            </div>
        </div>
    </nav>
</header>
