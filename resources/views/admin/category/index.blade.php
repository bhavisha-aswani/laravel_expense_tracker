@extends('layouts.admin')
@section('title')

<h2>
{{ __('Manage category') }}
</h2>


@endsection
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
   <strong>{{ $message }}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
 <div class="d-flex justify-content-end">
<a class="btn btn-success my-1" href="{{route('category.create')}}">Add new Category</a></div>
<div class="container">
<table class="table table-hover my-2 mb-4">
 <thead style="background-color: #e3f2fd;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach($categories as $cat)
    <tr>
      <th scope="row">{{ $cat->id }}</th>
      <td>{{ $cat->cat_name }}</td>
      <td>
        <form action="{{ route('category.destroy',$cat->id) }}" method="POST">
                     <a class="btn btn-primary" href="{{ route('category.edit', $cat->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
      </td>
      </tr>
      @endforeach
    
   
  </tbody>
</table>
 <div style="margin-left: 40%">
{!! $categories->links() !!}
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
