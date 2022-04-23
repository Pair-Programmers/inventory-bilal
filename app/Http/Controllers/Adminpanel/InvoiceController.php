<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\Product;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::with('category', 'creator')->orderby('id', 'desc')->get();
        $invoices = Invoice::where('type', 'Sale')->orderby('id', 'desc')->get();
        return view('adminpanel.pages.sale_invoice_list', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $customers = Customer::all();
        $products = Product::with('category', 'creator')->orderby('id', 'desc')->get();
        return view('adminpanel.pages.sale_invoice_create', compact('products', 'customers', 'accounts'));

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
            'customer_id'=> 'required',
            'product_id'=> 'required',
        ]);

        $items = [];
        $customer = Customer::find($request->customer_id);

        $inputs = $request->all();
        $no_of_items = 0;
        foreach ($inputs['product_qty'] as $key => $value) {
            $no_of_items = $no_of_items + $value;
        }
        $inputs['no_of_items'] = $no_of_items;
        $inputs['no_of_products'] = sizeof($inputs['product_id']);
        $inputs['type'] = 'Sale';
        if($customer->type == 'Cash'){
            $inputs['group'] = 'Cash';
        }
        else{
            $inputs['group'] = 'Credit';
            $preBalance = $customer->balance;
            $inputs['pre_balance'] = $customer->balance;
            if($inputs['cash_recieved'] > 0){
                $customer->balance = $preBalance + intval($inputs['amount']) - intval($inputs['cash_recieved']);
            }
            else{
                $customer->balance = $preBalance + intval($inputs['amount']);
            }
            $customer->save();
        }
        $inputs['created_by'] = Auth::guard('admin')->id();
        $inputs['amount'] = intval($inputs['amount']);

        $product_ids = $inputs['product_id'];
        $product_qtys = $inputs['product_qty'];
        $product_sale_price = $inputs['product_sale_price'];

        unset($inputs['product_id']);
        unset($inputs['product_qty']);
        unset($inputs['product_sale_price']);

        $invoice = Invoice::create($inputs);
        for ($i=0; $i < sizeof($product_ids); $i++) {
            $product = Product::find($product_ids[$i]);
            InvoiceDetail::create(['product_id'=>$product_ids[$i],
                             'sale_quantity'=>$product_qtys[$i],
                             'purchase_price'=>$product->cost_price,
                             'sale_price'=>$product_sale_price[$i],
                             'total_ammount'=>$product_sale_price[$i] * $product_qtys[$i],
                             'invoice_id'=>$invoice->id]);
            $product->available_qty = $product->available_qty - $product_qtys[$i];
            $product->save();
            array_push($items, ['name'=>$product->name, 'qty'=>$product_qtys[$i], 'price'=>$product_sale_price[$i]]);
        }

        if($customer->type == 'Cash'){
            $account = Account::find($request->account_id);
            Payment::create(['amount'=>intval($inputs['amount']), 'payment_date'=>date('Y-m-d'), 'group'=>'In', 'note'=>'Created Auto By System',
             'type'=>'Sale', 'invoice_id'=>$invoice->id, 'customer_id'=>$customer->id, 'account_id'=>$account->id,  'created_by'=>Auth::guard('admin')->id()]);
            $current_balance = $account->balance;
            $account->balance = $current_balance + $inputs['amount'];
            $account->save();
        }
        else{
            if($inputs['cash_recieved'] > 0){
                Payment::create(['amount'=>intval($inputs['cash_recieved']), 'payment_date'=>date('Y-m-d'), 'group'=>'In', 'note'=>'Recieved in Credit Invoice # '. $invoice->id,
             'type'=>'Sale', 'invoice_id'=>$invoice->id, 'customer_id'=>$customer->id, 'account_id'=>1,  'created_by'=>Auth::guard('admin')->id()]);
            }
        }

        if($request->button == 'Save & Print'){
            if(env('PRINTER_TYPE') != 'Thermal'){
                return redirect()->route('admin.sale_invoice.print', $invoice->id);
            }
            $mid = '';
            $store_name = 'AL-KHIDMAT';
            $store_address = '1.5 km Defence road, Moderno Fabrics Branch';
            $store_phone = '+92 300 0771601';
            $store_email = 'yourmart@email.com';
            $store_website = '';
            $tax_percentage = $inputs['discount'];
            $transaction_id = sprintf("%05d", $invoice->id);
            $currency = '';
            $image_path = asset('storage'). '/images/Capture.PNG';

            // Init printer
            $printer = new ReceiptPrinter;
            $printer->init(
                config('receiptprinter.connector_type'),
                config('receiptprinter.connector_descriptor')
            );

            // Set store info
            $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

            // Set currency
            $printer->setCurrency($currency);
            // Add items
            foreach ($items as $item) {
                $printer->addItem(
                    $item['name'],
                    $item['qty'],
                    $item['price']
                );
            }
            // Set tax
            $printer->setTax($tax_percentage);
            $printer->setCustomerName($inputs['reference_no']);
            // Calculate total
            $printer->calculateSubTotal();
            $printer->calculateGrandTotal();

            // Set transaction ID
            $printer->setTransactionID($transaction_id);

            // Set logo
            // Uncomment the line below if $image_path is defined
            //$printer->setLogo($image_path);



            // Print receipt
            $printer->printReceipt();

            return redirect()->back()->with('success', 'Created & Sent For Print Successfuly !');
        }
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
        $invoice =  Invoice::with('detail')->find($id);
        return view('adminpanel.pages.sale_invoice_show', compact('invoice'));
    }

    public function print($id)
    {
        $items = [];

        $invoice =  Invoice::with('detail')->find($id);
        if(env('PRINTER_TYPE') != 'Thermal'){
            return view('adminpanel.pages.sale_invoice_print', compact('invoice'));
        }
        foreach ($invoice->detail as $key => $item_p) {
            $item_p->product->name;
            array_push($items, ['name'=>$item_p->product->name, 'qty'=>$item_p->sale_quantity, 'price'=>$item_p->sale_price]);
        }
        $mid = '';
        $store_name = 'AL-KHIDMAT';
        $store_address = '1.5 km Defence road, Moderno Fabrics Branch';
        $store_phone = '+92 300 0771601';
        $store_email = 'yourmart@email.com';
        $store_website = '';
        $tax_percentage = $invoice->discount;
        $transaction_id = sprintf("%05d", $invoice->id);
        $currency = '';
        $image_path = asset('storage'). '/images/Capture.PNG';

        // Init printer
        $printer = new ReceiptPrinter;
        $printer->init(
            config('receiptprinter.connector_type'),
            config('receiptprinter.connector_descriptor')
        );

        // Set store info
        $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

        // Set currency
        $printer->setCurrency($currency);
        // Add items
        foreach ($items as $item) {
            $printer->addItem(
                $item['name'],
                $item['qty'],
                $item['price']
            );
        }
        // Set tax
        $printer->setTax($tax_percentage);
        $printer->setCustomerName($inputs['reference_no']);
        // Calculate total
        $printer->calculateSubTotal();
        $printer->calculateGrandTotal();

        // Set transaction ID
        $printer->setTransactionID($transaction_id);

        // Set logo
        // Uncomment the line below if $image_path is defined
        //$printer->setLogo($image_path);



        // Print receipt
        $printer->printReceipt();

        return redirect()->back()->with('success', 'Created & Sent For Print Successfuly !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = ProductCategory::all();
        return view('adminpanel.pages.product_edit', compact('product', 'categories'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);

        if($invoice){
            $payment = Payment::where('invoice_id', $invoice->id)->first();
            if($payment){
                $customer = Customer::find($invoice->customer_id);
                if($customer->type == 'Credit'){
                    $customer->balance = $customer->balance - $payment->amount;
                    $customer->save();
                }
                $payment->delete();
            }
            foreach ($invoice->detail as $key => $item) {
                $product = Product::find($item->product_id);
                $current_qty = $product->available_qty;
                $product->update(['available_qty'=>($current_qty+$item->sale_quantity)]);
            }
            $invoice->delete();
            return response()->json(['success'=>'invoice deleted successfully !']);
        }
        return response()->json(['error'=>'invoice not found !']);
    }

    public function search(Request $request)
    {
        $invoices = Invoice::where('type', 'Sale')
            ->when($request->filled('start_date') , function ($query) use ($request){
                return $query->where('issue_date' , '>=', $request->start_date);

            })
            ->when($request->filled('end_date') , function ($query) use ($request){
                return $query->where('issue_date' , '<=', $request->end_date);
            })
            ->orderby('id', 'desc')->get();
            $request->flash();
        return view('adminpanel.pages.sale_invoice_list', compact('invoices'));
    }
}
