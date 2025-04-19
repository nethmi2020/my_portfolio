@extends('admin.layouts.admin')

@section('content')

                <div class="col-lg-12 grid-margin stretch-card">

                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">PortFolio Records</h4>
                        <a href="{{ route('admin.portfolio.create')}}">
                        <button type="button" class="btn btn-primary btn-fw ">Add New</button>
                        </a>
                        {{-- <p class="card-description"></code> --}}
                        </p>
                        <div style="overflow-x:auto; width:100%;">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                  <th> # </th>
                                  <th>Title </th>
                                  <th style="width:10%">Project </th>
                                  <th>Image </th>
                                  <th>Category </th>
                                  <th>Action</th>
                              </tr>
                              @foreach($portfolios as $portfolio)
                                <tr>
                                <td>{{ $portfolio->id }}</td>
                                <td>{{$portfolio->title}}</td>
                                <td><a href="{{ $portfolio->project_url }}">Click Here</a></td>
                                <td> <img src="{{ asset('storage/images/portfolios/' . basename($portfolio->image)) }}" alt="Current Image" style="max-width: 200px; max-height: 200px; margin-bottom: 10px;"> </td>
                                <td>{{$portfolio->category?->name ?? 'No Category'}}</td>
                                <td>
                                  <a href="{{ route('admin.portfolio.edit',$portfolio->id)}}" class="btn btn-primary">Edit</a>
                                  <form type="submit" action="{{route('admin.portfolio.destroy',$portfolio->id)}}" method="POST">
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
                  </div>
{{--
            </div>
        </div> --}}
@endsection
