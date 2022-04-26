<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = ProductModel::orderby('id', 'DESC')->get();

        return view('adminpanel.pages.product_model_list', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = ProductModel::orderby('id', 'DESC')->get();
        return view('adminpanel.pages.product_model_list', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductModel::create(['name'=>$request->name, 'created_by'=>Auth::guard('admin')->id()]);
        return redirect()->back();
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
        $model = ProductModel::find($id);
        if($model){
            return view('adminpanel.pages.product_model_edit', compact('model'));
        }
        return redirect()->back()->with(['error'=>'Model not found !']);
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
        $model = ProductModel::find($id);
        if($model){
            $model->update($request->all());
            return redirect()->route('admin.product.model.index');
        }
        return redirect()->back()->with(['error'=>'model not found !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ProductModel::find($id);
        if($model){
            $model->delete();
            return response()->json(['success'=>'model deleted successfully !']);
        }
        return response()->json(['error'=>'model not found !']);
    }
}
