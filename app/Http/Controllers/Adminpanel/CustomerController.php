<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderby('id', 'desc')->get();
        return view('adminpanel.pages.customer_list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.pages.customer_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name'=> 'required',
        ]);

        $inputs = $request->all();

        if($request->hasfile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path('storage/images/customers'), $imageName);
            $inputs['profile_image'] = $imageName;
        }

        $inputs['balance'] = $request->opening_balance;
        $inputs['created_by'] = Auth::guard('admin')->id();
        Customer::create($inputs);
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
        $customer = Customer::findOrFail($id);
        $invoices = Invoice::where('customer_id', $customer->id)->get();
        $paymentsTotalAmount = Payment::where('customer_id', $id)->sum('amount');
        return view('adminpanel.pages.customer_show', compact('customer', 'invoices', 'paymentsTotalAmount'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('adminpanel.pages.customer_edit', compact('customer'));
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
        $customer = Customer::find($id);
        $inputs = $request->all();
        if($request->hasfile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path('storage/images/customers'), $imageName);
            $inputs['profile_image'] = $imageName;
        }
        $inputs['created_by'] = Auth::guard('admin')->id();
        if($customer){
            $customer->update($inputs);
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
        $customer = Customer::find($id);
        if($customer){
            $customer->delete();
            return response()->json(['success'=>'customer deleted successfully !']);
        }
        return response()->json(['error'=>'customer not found !']);
    }
}
