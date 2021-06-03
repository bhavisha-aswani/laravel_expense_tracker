@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Expense') }}<a class="btn btn-primary pull-right" href="{{ route('debit.index') }}">Back</a></div>

                <div class="card-body">
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
      <form method="post" action="{{route('debit.update', $costs->id )}}">
          @method('PATCH') 
          @csrf
           <div class="form-group">    
              <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="user_id" />
          </div>
<div class="form-group">    
      <label for="name">category:</label>
      <select class="form-control" id="exampleFormControlSelect1" name="category_id">
         <option value="{{$costs->category_id}}">{{$costs->category->cat_name}}</option>
     
       
      <option value="{{$costs->category->id}}">{{$costs->category->cat_name}}</option>
    
    </select> 
  </div>


<div class="form-group">    
              <label for="name">name:</label>
              <input type="text" class="form-control" name="name" value="
              {{ $costs->name }}" />
          </div>

          <div class="form-group">    
              <label for="name">Date:</label>
              <input type="date" class="form-control" name="date" min="2021-01-01" max="2021-12-31" value="{{ $costs->date }}"/>
          </div>
          
        
          <div class="form-group">
              <label for="price">expense amount:</label>
              <input type="number" class="form-control" name="amount" value="{{ $costs->amount }}" />
          </div>                         
         <button type="submit" class="btn btn-success pull-right">Update</button>
  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
