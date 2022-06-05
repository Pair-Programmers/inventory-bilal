<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::orderby('id', 'desc')->get();
        return view('adminpanel.pages.vendor_list', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.pages.vendor_create');

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
            $request->profile_image->move(public_path('storage/images/vendors'), $imageName);
            $inputs['profile_image'] = $imageName;
        }

        $inputs['balance'] = $request->opening_balance;
        $inputs['created_by'] = Auth::guard('admin')->id();
        Vendor::create($inputs);
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
        $vendor = Vendor::findOrFail($id);
        $invoices = Invoice::where('vendor_id', $vendor->id)->get();
        $paymentsTotalAmount = Payment::where('vendor_id', $id)->sum('amount');
        return view('adminpanel.pages.vendor_show', compact('vendor', 'invoices', 'paymentsTotalAmount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('adminpanel.pages.vendor_edit', compact('vendor'));
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
        $vendor = Vendor::find($id);
        $inputs = $request->all();
        if($request->hasfile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path('storage/images/vendors'), $imageName);
            $inputs['profile_image'] = $imageName;
        }
        $inputs['created_by'] = Auth::guard('admin')->id();
        if($vendor){
            $vendor->update($inputs);
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
        $vendor = Vendor::find($id);
        if($vendor){
            $vendor->delete();
            return response()->json(['success'=>'vendor deleted successfully !']);
        }
        return response()->json(['error'=>'vendor not found !']);
    }
}
