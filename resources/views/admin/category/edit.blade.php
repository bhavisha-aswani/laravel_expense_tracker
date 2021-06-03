@extends('layouts.admin')
@section('title')

<h2>
{{ __('Edit Category Form') }}
</h2>


@endsection
@section('content')

 @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <div class="d-flex justify-content-end">
<a class="btn btn-success my-1" href="{{route('category.index')}}">Back</a></div>
<div class="container">
 <form method="post" action="{{route('category.update', $categories->id)}}">
    @method('PATCH') 
  @csrf
<div class="form-group">    
  <input type="hidden" name="id" value="{{ $categories->id }}">
              <label for="name">Category name:</label>
              <input type="text" class="form-control" name="cat_name" required value="{{ $categories->cat_name }}" />
          </div>
                    
         <button type="submit" class="btn btn-success" style="margin-left: 40%">Update</button>
  </form>
</div>
@endsection
