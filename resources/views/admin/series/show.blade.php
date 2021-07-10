@extends('admin.dashboard')

@section('adminContent')
    <div class="row pb-4">
        <div class="col-md-12">
            <p class="m-0">
                <i class="bi bi-pencil-square"></i>
                Edit the Series
            </p>
            <h3 class="m-0">{{ $series->title }}</h3>
        </div>
    </div>

    <div class="card">
        <img class="card-img-top" src="{{ asset('images/1.jpg') }}" alt="{{ $series->title }}">
        <div class="card-body">
            <form action="{{ route('admin.series.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Series title"
                        value="{{ $series->Lessons->first()->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control"
                        placeholder="Series description...">{{ $series->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Thumbnail</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-sm btn-outline-success">
                    <i class="bi bi-save2"></i>
                    Save
                </button>
            </form>
        </div>
    </div>

    <div class="py-3"></div>

    <div class="card">
        <div class="card-header">
            <span class="text-primary">
                Lessons of this series
            </span>
        </div>

        <div class="card-body">

        </div>
    </div>
@endsection
