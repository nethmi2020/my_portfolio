@extends('admin.layouts.admin')

@section('content')
{{-- 
   
<div class="main-panel">
    <div class="content-wrapper"> --}}
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add New Qualification</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.qualification.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                    <label for="exampleInputName1">Title</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Title" value="{{old('title')}}" >
              </div>
              <div class="form-group">
                    <label for="exampleInputName1">Association</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="association" placeholder="Association" value="{{old('association')}}" >
              </div>
              <div class="form-group">
                    <label for="exampleInputName1">Description</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="description" placeholder="Description" value="{{old('description')}}" >
              </div>
              <div class="form-group">
                    <label for="exampleInputName1">Type</label>
                    <select class="form-control text-black" id="selectType" name="type">
                        <option value="Education" {{ old('type') == "Education"? 'selected' : ''}}>Education</option>
                        <option value="Work"  {{ old('type') == "Work"? 'selected' : ''}}>Work</option>
                    </select>
              </div>
              <p class="card-description"> Duration </p>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">From</label>
                        <div class="col-sm-9">
                        <input type="date" name="from" class="form-control"  value="{{old('from')}}" />
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">End</label>
                        <div class="col-sm-9">
                        <input type="date" name="to" class="form-control" value="{{old('to')}}" />
                        </div>
                    </div>
                    </div>
                </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
            </form>
          </div>
      </div>

{{-- </div>
</div> --}}

@endsection



