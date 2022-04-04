<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderby('id', 'desc')->get();
        return view('adminpanel.pages.employee_list', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.pages.employee_create');

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

        if($request->hasfile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path('storage/images/employees'), $imageName);
            $product['profile_image'] = $imageName;
        }


        $inputs['created_by'] = Auth::guard('admin')->id();
        Employee::create($inputs);
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
        $employee = Employee::find($id);
        return view('adminpanel.pages.employee_edit', compact('employee'));
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
        $employee = Employee::find($id);
        $inputs = $request->all();
        if($request->hasfile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path('storage/images/employees'), $imageName);
            $inputs['profile_image'] = $imageName;
        }
        $inputs['created_by'] = Auth::guard('admin')->id();
        if($employee){
            $employee->update($inputs);
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
        $expense = Employee::find($id);
        if($expense){
            $expense->delete();
            return response()->json(['success'=>'Expense deleted successfully !']);
        }
        return response()->json(['error'=>'Expense not found !']);
    }
}
