@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 @if ($message = Session::get('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <strong>{{ $message }}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
            <p>
             {{ __('Welcome to Expense Tracker,') }}
            {{ __('You are successfully logged in!') }}
                    </p>
                    <p>
                        {{ __('Expense Tracker will help you to track your daily expense.It is totally free and userfriendly.so.....lets get started') }}
                    </p>
                    <p>
                        {{ __('Start with adding expense from') }}
                        <mark>{{ __('manage Expense') }}</mark>
                        {{ __('tab . Once you click at') }}
                        <mark>{{ __('Add Expense') }}</mark>
                         {{ __('one Form will appear . Insert name of activity in which you have spent , choose the date and insert amount.') }}
                    </p>
                     <p>
                        {{ __('After inserted data successfully you will be redirected to') }}
                        <mark>{{ __('Manage Expense') }}</mark>
                        {{ __('page if there would be any error with your inputs you will be informed via error messages.') }}
                    </p>

                     <p>
                        {{ __('You can update existing expense in') }}
                        <mark>{{ __('Manage Expense') }}</mark>
                        {{ __('page . Edit and Delete option for each entries available in') }}
                         <mark>{{ __('Manage Expense') }}</mark>
                          {{ __('page') }}
                    </p>

                     <p>
                        {{ __('You will find chart of total expenses of month in') }}
                        <mark>{{ __('View Chart') }}</mark>
                        {{ __('page. With help of') }}
                        <mark>{{ __('Expense Tracker') }}</mark>
                          {{ __('you can store and track your daily expenses and get idea about in which month you have spent more.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
