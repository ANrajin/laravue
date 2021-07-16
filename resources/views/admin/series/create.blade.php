@extends('admin.dashboard')

@section('adminContent')
    <div class="row">
        <div class="col-md-6">
            <h3>Create New Series</h3>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.series.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Series title">
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Series description..."></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Thumbnail</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-sm btn-outline-success mx-2">
                    <i class="bi bi-save2"></i>
                    Save
                </button>
                <button type="reset" class="btn btn-sm btn-outline-secondary mx-2">
                    <i class="bi bi-eraser"></i>
                    Clear
                </button>
            </form>
        </div>
    </div>
@endsection
