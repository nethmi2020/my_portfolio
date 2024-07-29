@extends('admin.layouts.admin')

@section('content')
{{--

<div class="main-panel">
    <div class="content-wrapper"> --}}
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Category</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.category.update',$category->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Category Name" value="{{old('name',$category->name)}}" >
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
            </form>
          </div>
      </div>

{{-- </div>
</div> --}}

@endsection



