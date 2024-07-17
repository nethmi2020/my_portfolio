@extends('admin.layouts.admin')

@section('content')
{{-- 
<div class="main-panel">
    <div class="content-wrapper"> --}}
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">About me</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.aboutme.update', $user->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <p class="card-description"> Personal info </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="phone" value="{{$user->phone}}"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="address" value="{{$user->address}}"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Job</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="job" value="{{$user->job}}"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Degree</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="degree" value="{{$user->degree}}" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Experience</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="experience" value="{{$user->experience}}"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Birth Day</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="birthday" value="{{ $user->birth_day}}" max="{{ date('Y-m-d') }}"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <label>File upload</label>
            <div class="col-md-4">
                <!-- Image Preview Box -->
                <div id="imagePreview" class="form-control mr-3">
                    @if ($user->profile_pic)
                    <img src="{{ Storage::url($user->profile_pic) }}" alt="Profile Picture" class="img-thumbnail" style="width: 100px; height: 100px;">
                    <button id="close_btn" type="button" class="close" aria-label="Close"   title="Remove Image" style=" background-color:red; top: 0; right: 0;" onclick="removeImage()">
                        <b><span aria-hidden="true">&times;</span></b>
                    </button>
                    @else
                        <div class="img-thumbnail" style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center;">
                            <span>No Image</span>
                        </div>
                    @endif
                </div>
                <!-- File Upload Input -->
                <input type="file" name="image" class="file-upload-default" id="imageUpload">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                    </span>
                </div>
            </div>
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
            </form>
          </div>
      </div>

{{-- </div>
</div> --}}

@endsection