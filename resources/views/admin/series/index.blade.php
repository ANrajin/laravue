@extends('admin.dashboard')

@section('adminContent')
    <div class="row">
        <div class="col-md-6">
            <h3>Series</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.series.create') }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-plus-circle"></i>
                Create Series
            </a>
        </div>
    </div>
    @if ($series->count() > 0)
        <series-component series="{{ $series }}"></series-component>
    @else
        <p class="text-center">No series created yet!</p>
    @endif
@endsection
