<ul class="list-group">
    <li class="list-group-item">
        <a href="{{route('admin.dashboard')}}" class="{{Route::currentRouteName() == 'admin.dashboard' ? 'uk-text-primary' : ''}}">
            <i class="bi bi-columns-gap"></i>
            Dashboard
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{route('admin.series.index')}}" class="{{Request::segment(2) == 'series' ? 'uk-text-primary' : ''}}">
            <i class="bi bi-stack"></i>
            Series
        </a>
    </li>
</ul>