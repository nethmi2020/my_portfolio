@extends('admin.layouts.admin')

@section('content')

                <div class="col-lg-12 grid-margin stretch-card">
                    
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Education Records</h4>
                        <a href="{{ route('admin.qualification.create')}}">
                        <button type="button" class="btn btn-primary btn-fw ">Add New</button>
                        </a>
                        {{-- <p class="card-description"></code> --}}
                        </p>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th> Title </th>
                              <th> Aassociation </th>
                              <th> Description </th>
                              <th> From </th>
                              <th> To </th>
                              <th> Manage </th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($educations as $education)
                              <tr>
                              <td>{{$education->title}}</td>
                              <td>{{$education->association}}</td>
                              <td>{{$education->description}}</td>
                              <td>{{$education->from}}</td>
                              <td>{{$education->to}}</td>
                              <td>
                                <a href="{{ route('admin.qualification.edit',$education->id)}}" class="btn btn-primary">Edit</a>
                                <form type="submit" action="{{route('admin.qualification.destroy',$education->id)}}" method="POST">
                                  @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                              </tr>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
{{-- 
            </div>
        </div> --}}
@endsection
