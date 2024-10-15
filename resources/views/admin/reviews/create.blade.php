@extends('admin.layouts.admin')

@section('content')
    {{--
<div class="main-panel">
    <div class="content-wrapper"> --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Review</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('admin.review.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Image"
                            value={{ old('image') }}>
                    </div>
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Namejob"
                            value={{ old('name') }}>
                    </div>

                    <div class="form-group">
                        <label for="job">Job</label>
                        <input type="text" class="form-control" id="job" name="job"
                            placeholder="Job" value={{ old('job') }}>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" maxlength="255" name="description" required>{{old('description')}}</textarea>
                      </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                </form>
            </div>
        </div>
    </div>
    {{-- </div>
</div> --}}

@endsection
