<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return InvoiceDetail::where('product_id', 29)->orWhere('product_id', 30)
        //->orWhere('product_id', 32)->sum('sale_quantity');
        $totalSale = 0;
        $totalPurchase = 0;
        $totalProducts = 0;
        $totalExpense = 0;
        $paymentIn = 0;
        $paymentOut = 0;

        $account1 = Account::find(1);
        $account2 = Account::find(2);
        $totalSale = Invoice::where('type', 'Sale')->sum('amount');
        $totalPurchase = Invoice::where('type', 'Purchase')->sum('amount');
        $totalProducts = Product::count('id');
        $totalExpense = Expense::sum('amount');
        $paymentIn = Payment::where('group', 'In')->sum('amount');
        $paymentOut = Payment::where('group', 'Out')->sum('amount');

        return view('adminpanel/pages/dashboard', compact('account1', 'account2', 'totalSale',
         'totalPurchase', 'totalProducts', 'totalExpense', 'paymentIn', 'paymentOut'));
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
        //
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
