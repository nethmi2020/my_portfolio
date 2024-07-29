@extends('admin.layouts.admin')

@section('content')
{{--

<div class="main-panel">
    <div class="content-wrapper"> --}}
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Portfolio</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
             <form class="forms-sample" method="POST" action="{{ route('admin.portfolio.update',$portfolio->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        value={{old('title',$portfolio->title)}}>
                </div>
                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Image"
                    value={{old('image')}}>
                </div>
                <div class="form-group">
                    <label for="project_url">Project URL</label>
                    <input type="text" class="form-control" id="project_url" name="project_url"
                        placeholder="Project URL"  value={{old('project_url',$portfolio->project_url)}} >
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Category</label>
                    <select class="form-control text-black" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{old('category_id')==$category->id?'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
              </form>
          </div>
      </div>

{{-- </div>
</div> --}}

@endsection



