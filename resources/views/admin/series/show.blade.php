@extends('admin.dashboard')

@section('adminContent')
    <div class="row">
        <div class="col-md-6">
            <h3>{{$series->title}}</h3>
        </div>
        <div class="col-md-6 text-right">
            <p>
                <i class="bi bi-pencil-square"></i>
                Edit the Series
            </p>
        </div>
    </div>

    <div class="card">
        <img class="card-img-top" src="{{asset('images/1.jpg')}}" alt="{{$series->title}}">
        <div class="card-body">
            <form action="{{route('admin.series.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Series title" value="{{$series->title}}">
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Series description...">{{$series->description}}</textarea>
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
@endsection
