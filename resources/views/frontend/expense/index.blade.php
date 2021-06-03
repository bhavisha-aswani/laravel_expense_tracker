@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Expense') }}</div>

                <div class="card-body">
                   @if ($message = Session::get('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <strong>{{ $message }}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="row">
 <div class="col-4 totaluser">
 <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"> Total Records</i>
                </div>
                <div class="card-body">
                    <h5>{{ $total }}</h5>
                </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-money"> Total Amount</i>
                </div>
                <div class="card-body">
                    <h5>{{ $usersCost }}</h5>
                </div>
            </div>
        </div>
        <div class="col-4 pull-right">
    <a class="btn btn-success my-4 mb-4" href="{{route('debit.create')}}">Add Expense</a>
  </div>
        </div>
   
  
<table class="table table-hover my-4 mb-4">
 <thead style="background-color: #e3f2fd;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($costs as $cost)
    <tr>
      <th scope="row">{{ $cost->id }}</th>
       <td>{{ $cost->category->cat_name }}</td>
      <td>{{ $cost->name }}</td>
       <td>{{ $cost->date }}</td>
        <td>{{ $cost->amount }}</td>
      <td>
    
        <a href="{{ route('debit.edit', $cost->id)}}">
          <i class="fa fa-edit" style="color:blue;" data-toggle="tooltip" data-placement="top" title="Edit"></i>
        </a>
        <a href="/destroy-debit/{{ $cost->id }}">
          <i class="fa fa-trash" style="color:red;" data-toggle="tooltip" data-placement="top" title="Delete"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
 <div style="margin-left: 40%">
{!! $costs->links() !!}
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
