<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Payment;
use Illuminate\Http\Request;
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
        $expenses = Expense::with('category', 'creator')->orderby('id', 'desc')->get();
        return view('adminpanel.pages.expense_list', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $categories = ExpenseCategory::all();
        return view('adminpanel.pages.expense_create', compact('categories', 'accounts'));

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
        $data[] = null;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $image)
            {
                $name=time().'_'. $key . '_'.$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/expense', $name);
                $data[] = $name;
            }
        }
        $inputs['images'] = json_encode($data);
        $inputs['created_by'] = Auth::guard('admin')->id();
        $expense = Expense::create($inputs);
        $account = Account::find($request->account_id);
        Payment::create(['amount'=>intval($inputs['amount']), 'payment_date'=>date('Y-m-d'), 'group'=>'Out', 'note'=>'Created Auto By System',
        'type'=>'Expense', 'expense_id'=>$expense->id, 'account_id'=>$account->id,  'created_by'=>Auth::guard('admin')->id()]);
        $current_balance = $account->balance;
        $account->balance = $current_balance - intval($inputs['amount']);
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
        $expense = Expense::find($id);
        $categories = ExpenseCategory::all();
        $accounts = Account::all();
        return view('adminpanel.pages.expense_edit', compact('expense', 'categories', 'accounts'));
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
        $expense = Expense::find($id);
        $account = Account::find($expense->account_id);

        $data[] = null;
        $inputs = $request->all();
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $image)
            {
                $name=time().'_'. $key . '_'.$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/expenses', $name);
                $data[] = $name;
            }
        }
        $inputs['images'] = json_encode($data);
        if($expense){
            $current_balance = $account->balance;
            $current_balance = $current_balance + $expense->amount - intval($inputs['amount']);
            $account->balance = $current_balance;
            $account->save();
            $expense->update($inputs);
            $payment = Payment::where('expense_id', $expense->id)->first();
            $payment->amount = intval($inputs['amount']);
            $payment->save();
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
        $expense = Expense::find($id);
        if($expense){
            $expense->delete();
            return response()->json(['success'=>'Expense deleted successfully !']);
        }
        return response()->json(['error'=>'Expense not found !']);
    }
}
