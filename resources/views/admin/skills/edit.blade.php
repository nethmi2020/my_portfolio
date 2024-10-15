@extends('admin.layouts.admin')

@section('content')
{{--
<div class="main-panel">
    <div class="content-wrapper"> --}}
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Skill</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif
        {{-- <p class="card-description"> Basic form elements </p> --}}
        <form class="forms-sample" method="POST" action="{{ route('admin.skill.update',$skill->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputName1">Color</label>
                <br>
                <input type="color" id="colorpicker" value="{{old('name',$skill->color)}}" name="color"></div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Skill</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="enter skill name" value="{{old('name',$skill->name)}}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Percent</label>
                <div class="col-sm-9">
                  <input type="text" name="percent" class="form-control" placeholder="enter percentage" value="{{old('name',$skill->percent)}}" required/>
                </div>
              </div>
            </div>
          </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
{{-- </div>
</div> --}}

@endsection
