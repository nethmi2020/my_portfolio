@extends('admin.layouts.admin')

@section('content')

                <div class="col-lg-12 grid-margin stretch-card">

                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Category Records</h4>
                        <a href="{{ route('admin.category.create')}}">
                        <button type="button" class="btn btn-primary btn-fw ">Add New</button>
                        </a>
                        {{-- <p class="card-description"></code> --}}
                        </p>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th> # </th>
                                <th> Category </th>
                                <th> Manage </th>
                            </tr>
                            @foreach($categories as $category)
                              <tr>
                              <td>{{ $category -> id }}</td>
                              <td>{{$category->name}}</td>
                              <td>
                                <a href="{{ route('admin.category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                                <form type="submit" action="{{route('admin.category.destroy',$category->id)}}" method="POST">
                                  @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                              </tr>
                          @endforeach
                          </thead>
                          <tbody>


                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
{{--
            </div>
        </div> --}}
@endsection
