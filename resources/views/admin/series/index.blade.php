@extends('admin.dashboard')

@section('adminContent')
<div class="row">
    <div class="col-md-6">
        <h3>Series</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('admin.series.create')}}" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-plus-circle"></i>
            Create Series
        </a>
    </div>
</div>
@endsection