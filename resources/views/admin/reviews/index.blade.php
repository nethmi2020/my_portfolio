@extends('admin.layouts.admin')

@section('content')

                <div class="col-lg-12 grid-margin stretch-card">

                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Review Records</h4>
                        <a href="{{ route('admin.review.create')}}">
                        <button type="button" class="btn btn-primary btn-fw ">Add New</button>
                        </a>
                        {{-- <p class="card-description"></code> --}}
                        </p>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th> # </th>
                              <th> photo </th>
                              <th> Name  </th>
                              <th> Job </th>
                              <th>Description</th>
                              <th> Manage </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($reviews as $review)
                            <tr>
                              <td> {{ $review->id }} </td>
                              <td> <img src="{{ asset('storage/images/reviews/' . basename($review->image)) }}" alt="Current Image" style="max-width: 200px; max-height: 200px; margin-bottom: 10px;"> </td>
                              <td> {{ $review->name }} </td>
                              <td> {{ $review->job }} </td>
                              <td> {{ Str::limit($review->description, 40) }} </td>
                              <td>
                                <button type="button" class="btn btn-success btn-sm me-1 " onclick="location.href='{{ route('admin.review.edit', $review->id) }}';">Edit</button>
                                  <form type="submit" method="POST" style="display: inline" action="{{ route('admin.review.destroy', $review->id)}}" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="style="display: inline"">Delete</button>
                                </form>
                            </td>
                            </tr>
                            <tr>
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
