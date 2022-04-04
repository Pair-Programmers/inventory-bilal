<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderby('id', 'desc')->get();
        return view('adminpanel.pages.payment_list', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $accounts = Account::all();
        return view('adminpanel.pages.payment_create', compact('employees', 'accounts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['created_by'] = Auth::guard('admin')->id();
        $expense = Expense::create(['amount'=>$request->amount, 'expense_date'=>$request->payment_date, 'account_id'=>$request->account_id, 'expense_category_id'=>4, 'created_by'=>Auth::guard('admin')->id()]);
        $inputs['type'] = 'Expense';
        $inputs['group'] = 'Out';
        $inputs['expense_id'] = $expense->id;
        Payment::create($inputs);
        $account = Account::find($request->account_id);
        $current_balance = $account->balance;
        $account->balance = $current_balance - $inputs['amount'];
        $account->save();
        return redirect()->back()->with('success', 'Created Successfuly !');
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
        $accounts = Account::all();
        $employees = Employee::all();
        $payment = Payment::find($id);
        return view('adminpanel.pages.payment_edit', compact('payment', 'employees', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Payment::find($id);

        $inputs = $request->all();

        $inputs['created_by'] = Auth::guard('admin')->id();
        if($expense){
            $expense->update($inputs);
            return redirect()->back()->with('success', 'Created Successfuly !');
        }
        return redirect()->back()->with('error', 'Error while creating !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Payment::find($id);
        if($expense){
            $expense->delete();
            return response()->json(['success'=>'Expense deleted successfully !']);
        }
        return response()->json(['error'=>'Expense not found !']);
    }
}
