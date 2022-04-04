<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('adminpanel.pages.admin_setting');

        //
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
        $admin = Admin::find($id);
        $inputs = $request->all();
        if($request->hasfile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path('storage/images/admins'), $imageName);
            $inputs['profile_image'] = $imageName;
        }
        else{
            unset($inputs['profile_image']);
        }
        if($admin){
            if(($inputs['password'] == null) && ($inputs['new_password'] == null)){
                unset($inputs['password']);
                unset($inputs['new_password']);
                $admin->update($inputs); 
                return redirect()->back()->with('success', 'Updated Successfuly  !');
            }
            elseif(($inputs['password'] != null) && ($inputs['new_password'] != null)){

                if (Hash::check($request->password, $admin->password)) {
                    unset($inputs['password']);
                    $admin->update([$inputs, 'password'=>Hash::make($request->new_password)]);
                    return redirect()->back()->with('success', 'Updated Successfuly !');
                }
                else{
                    return redirect()->back()->with('error', 'password not match');
                }

            }
            else{
                return redirect()->back()->with('error', 'Error while updating, Check password fields');
            }


        }
        return redirect()->back()->with('error', 'Error while updating !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
