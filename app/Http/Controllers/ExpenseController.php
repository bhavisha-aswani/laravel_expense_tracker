<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Expense;
use App\Income;
use App\User;
use App\Category;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costs = auth()->user()->expenses()->paginate(3);
        $activity = auth()->user()->expenses()->get();
        $total = count($activity);
        $usersCost = auth()->user()->expenses()->with('category')->select(DB::raw("SUM(amount) as count"))->pluck('count');
        return view('frontend.expense.index',compact('costs','total','usersCost')); 
    
    }
 // public function demo()
 //    {
 //      $costs = Expense::where('user_id','=',Auth::user()->id)->paginate(3);
 //        $activity = Expense::get()->where('user_id','=',Auth::user()->id);
 //        $total = count($activity);
 //        $usersCost = Expense::select(DB::raw("SUM(amount) as count"))->where('user_id','=',Auth::user()->id)->pluck('count');
 //        return view('index',compact('costs','total','usersCost')); 
 // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('frontend.expense.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
           'name'=>'required',
            'date'=>'required',
            'amount'=>'required',
        ]);
        Expense::create($input);
        return redirect('debit/')->with('success','Cost Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $costs = Expense::with('category')->find($id);
        return view('frontend.expense.edit', compact('costs','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
           
            'name'=>'required',
            'date'=>'required',
            'amount'=>'required',
        ]);

        $costs = Expense::find($id);
        $costs->name =  $request->get('name');
         $costs->date =  $request->get('date');
         $costs->amount =  $request->get('amount');
         $costs->save();

        $costs->update($request->all());

        //Expense::find($request->id)->update($request->all());
        return redirect('debit/')->with('success','Cost updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::find($id)->delete();
        return redirect('debit/')->with('success','Cost deleted successfully');
    }
    public function display()
    {
        $users = auth()->user()->expenses()->select(DB::raw("SUM(amount) as count"))
        ->whereYear('date', date('Y'))
        ->groupBy(\DB::raw("Month(date)"))
        ->pluck('count');

        $months = auth()->user()->expenses()->select(DB::raw("Month(date) as month"))
        ->whereYear('date', date('Y'))
        ->groupBy(DB::raw("Month(date)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month) {
            $datas[$month-1] = $users[$index];
        }
        return view('frontend.chart', compact('datas'));
    }
    public function chart()
    {
        $users = auth()->user()->expenses()->select(DB::raw("SUM(amount) as count"))
        ->whereYear('date', date('Y'))
        ->groupBy(\DB::raw("Month(date)"))
        ->pluck('count');

         $months = auth()->user()->expenses()->select(DB::raw("Month(date) as month"))
        ->whereYear('date', date('Y'))
        ->groupBy(DB::raw("Month(date)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month) {
            $datas[$month-1] = $users[$index];
        }

         $usersI = auth()->user()->incomes()->select(DB::raw("SUM(amount) as count"))
        ->whereYear('date', date('Y'))
        ->groupBy(\DB::raw("Month(date)"))
        ->pluck('count');

         $monthsI = auth()->user()->incomes()->select(DB::raw("Month(date) as month"))
        ->whereYear('date', date('Y'))
        ->groupBy(DB::raw("Month(date)"))
        ->pluck('month');

        $datasI = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($monthsI as $indexI => $monthI) {
            $datasI[$monthI-1] = $usersI[$indexI];
        }
   
        return view('frontend.chart1', compact('datas','datasI'));

    }
}
