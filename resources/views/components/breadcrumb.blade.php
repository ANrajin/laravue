<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if($one != '' && $one === 'admin')
            <li class="breadcrumb-item active">
                <a href="javascript:void(0)">Dashboard</a>
            </li>
        @endif

        @if($two != '' && $two !== 'dashboard')
            <li class="breadcrumb-item active" aria-current="page">
                <a href="javascript:void(0)">{{Str::ucfirst($two)}}</a>
            </li>
        @endif

        @if($three != '')
            <li class="breadcrumb-item active" aria-current="page">
                <a href="javascript:void(0)">{{Str::ucfirst($three)}}</a>
            </li>
        @endif
    </ol>
</nav>