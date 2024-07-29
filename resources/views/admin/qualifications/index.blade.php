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
                              <th> Type </th>
                              <th> From </th>
                              <th> To </th>
                              <th> Manage </th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($qualifications as $qualification)
                              <tr>
                              <td>{{$qualification->title}}</td>
                              <td>{{$qualification->association}}</td>
                              <td>{{$qualification->description}}</td>
                              <td>{{$qualification->type}}</td>
                              <td>{{$qualification->from}}</td>
                              <td>{{$qualification->to}}</td>
                              <td>
                                <a href="{{ route('admin.qualification.edit',$qualification->id)}}" class="btn btn-primary">Edit</a>
                                <form type="submit" action="{{route('admin.qualification.destroy',$qualification->id)}}" method="POST">
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
