@extends('admin.layouts.admin')

@section('content')
{{--

<div class="main-panel">
    <div class="content-wrapper"> --}}
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Category</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Title" value="{{old('name')}}" >
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
            </form>
          </div>
      </div>

{{-- </div>
</div> --}}

@endsection



