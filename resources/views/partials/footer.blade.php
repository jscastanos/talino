<footer class="bg-dark">
    <div class="container p-4 pt-5">
        <div class="row">

            <div class="col-md-4 mt-3">
                <h2>Talino </h2>
                <p>
                    Your daily source of science &amp; technology
                    news, happenings, discoveries and many more.
                </p>
            </div>

            <div class="col-md-3 mt-3 ml-auto">
                <h5 class="mb-3">
                    <i class="fa fa-line-chart"></i>
                    What's Popular?
                </h5>
                <ul class="menu-category">
                    @foreach ($popularNews as $news)
                    <li class="mt-2">
                        <a href="/news/{{ $news->slug }}">{{ $news->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 mt-3 ml-auto">
                <h5 class="mb-3">
                    <i class="fa fa-list"></i>
                    Browse by Category
                </h5>
                <ul class="menu-category
                        {{ count($menuCategory) > 6 ? 'menu-two-columns' : '' }}">
                    @foreach ($menuCategory as $menu)
                    <li class="mt-2">
                        <a href="/categories/{{ $menu->slug }}">{{ $menu->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-12 mt-3 text-center">
                <p>
                    Developed by <a href="https://github.com/jscastanos" target="_blank">Zeck</a> |
                    Source code @ <a href="https://github.com/jscastanos/talino">GitHub</a>
                </p>
            </div>
        </div>
    </div>
</footer>
