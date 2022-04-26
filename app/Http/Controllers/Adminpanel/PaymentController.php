<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Vendor;
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

    public function createMake()
    {
        $employees = Employee::all();
        $customers = Customer::all();
        $vendors = Vendor::all();
        $accounts = Account::all();
        return view('adminpanel.pages.payment_make', compact('employees', 'accounts', 'customers', 'vendors'));
    }

    public function createRecieve()
    {
        $employees = Employee::all();
        $customers = Customer::all();
        $vendors = Vendor::all();
        $accounts = Account::all();
        return view('adminpanel.pages.payment_recieve', compact('employees', 'accounts', 'customers', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $this->validate($request, [
            //'group' => 'required|string|in:In,Out',
            //'type' => 'required|string|in:Customer Payment,Vendor Payment,Employee Salary',
            'amount' => 'required',
        ]);

        $inputs = $request->all();
        $inputs['created_by'] = Auth::guard('admin')->id();
        if($inputs['group'] == 'In'){
            $inputs['type'] = 'Customer Payment';
            $customer = Customer::find($inputs['customer_id']);
            $customer->balance = $customer->balance - $inputs['amount'];
            $customer->save();
        }
        else{
            $inputs['type'] = 'Vendor Payment';
            $vendor = Vendor::find($inputs['vendor_id']);
            $vendor->balance = $vendor->balance + $inputs['amount'];
            $vendor->save();
        }


        Payment::create($inputs);
        // $account = Account::find($request->account_id);
        // $current_balance = $account->balance;
        // if ($inputs['group'] == 'In') {
        //     $account->balance = $current_balance + $inputs['amount'];
        // } else {
        //     $account->balance = $current_balance - $inputs['amount'];
        // }
        // $account->save();
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
        $customers = Customer::all();
        $vendors = Vendor::all();
        $accounts = Account::all();
        $employees = Employee::all();
        $payment = Payment::find($id);
        if($payment->group == 'In'){

            return view('adminpanel.pages.payment_edit_recieve', compact('payment', 'employees', 'accounts', 'customers'));
        }
        else{
            return view('adminpanel.pages.payment_edit_make', compact('payment', 'employees', 'accounts','vendors'));
        }
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
        //return $request;
        $this->validate($request, [
            // 'group' => 'required|string|in:In,Out',
            //'type' => 'required|string|in:Customer Payment,Vendor Payment,Employee Salary',
            'amount' => 'required',
        ]);

        $payment = Payment::find($id);
        if ($payment) {

            $inputs = $request->all();
            $inputs['created_by'] = Auth::guard('admin')->id();
            if($inputs['group'] == 'In'){
                $inputs['type'] = 'Customer Payment';
                $customer = Customer::find($inputs['customer_id']);
                $customer->balance = $customer->balance - $inputs['amount'] + $payment->amount;
                $customer->save();
                $payment->customer_id = $inputs['customer_id'];
            }
            else{
                $inputs['type'] = 'Vendor Payment';
                $vendor = Vendor::find($inputs['vendor_id']);
                $vendor->balance = $vendor->balance + $inputs['amount'] - $payment->amount;
                $vendor->save();
                $payment->vendor_id = $inputs['vendor_id'];

            }

            $payment->amount = $inputs['amount'];
            $payment->payment_date = $inputs['payment_date'];
            $payment->save();
            // $account = Account::find($request->account_id);
            // $current_balance = $account->balance;

            // $account->save();
            return redirect()->route('admin.payment.index')->with('success', 'Updated Successfuly !');
        }
        return response()->json(['error' => 'Expense not found !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);

        if ($payment) {
            switch ($payment->type) {
                case 'Customer Payment':
                    $customer = Customer::find($payment->customer_id);
                    if ($payment->group == 'In') {
                        $customer->balance = $customer->balance + $payment->amount;
                    } else {
                        $customer->balance = $customer->balance - $payment->amount;
                    }
                    $customer->save();
                    break;
                case 'Vendor Payment':
                    $vendor = Vendor::find($payment->vendor_id);
                    if ($payment->group == 'In') {
                        $vendor->balance = $vendor->balance + $payment->amount;
                    } else {
                        $vendor->balance = $vendor->balance - $payment->amount;
                    }

                    $vendor->save();
                    break;
                default:
                    # code...
                    break;
            }
            $payment->delete();
            return response()->json(['success' => 'Expense deleted successfully !']);
        }
        return response()->json(['error' => 'Expense not found !']);
    }

    public function search(Request $request)
    {
        $payments = Payment::
            when($request->filled('start_date') , function ($query) use ($request){
                return $query->where('payment_date' , '>=', $request->start_date);

            })
            ->when($request->filled('end_date') , function ($query) use ($request){
                return $query->where('payment_date' , '<=', $request->end_date);
            })
            ->orderby('id', 'desc')->get();
            $request->flash();
        return view('adminpanel.pages.payment_list', compact('payments'));
    }
}
