@extends('adminpanel.layout.master')
<!-- ================================== EXTEND TITLE AND META TAGS ============================= -->
@section('title-meta')
    <title>Inventory | Dashboard</title>
    <meta name="description" content="this is description">
@endsection
<!-- ====================================== EXTRA CSS LINKS ==================================== -->
@section('other-css')
@endsection
<!-- ======================================== BODY CONTENT ====================================== -->
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Purchase Invoice</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.home') }}">Home</a>
                </li>
                <li>
                    <a>Invoice</a>
                </li>
                <li class="active">
                    <strong>Purchase</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                <a href="{{route('admin.sale_invoice.print', $invoice->id)}}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">

                            <div class="row">


                                <div class="col-sm-6 text-left">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy">S-INV-{{sprintf("%05d", $invoice->id)}}</h4>
                                    <p>
                                        <span><strong>Invoice Date:</strong> {{date('d-M-Y', strtotime($invoice->issue_date))}}</span><br/>
                                    </p>
                                    <address>
                                        Vendor: <strong>{{$invoice->vendor->name}}</strong><br>
                                        Address: <strong>{{$invoice->vendor->address}}</strong><br>
                                        Phone: <strong>{{$invoice->vendor->phone}}</strong><br>
                                    </address>

                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Item List</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice->detail as $item)
                                        <tr>
                                            <td>
                                                <strong>{{$item->product->name}}</strong>
                                            </td>
                                            <td>{{$item->sale_quantity}}</td>
                                            <td>{{$item->purchase_price}}</td>
                                            <td>{{$item->total_ammount}}</td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                    <tr>
                                        <td><strong>GROSS TOTAL :</strong></td>
                                        <td>RS {{$invoice->amount + $invoice->discount}}.00</td>
                                    </tr>
                                    <tr>
                                        <td><strong>DISCOUNT :</strong></td>
                                        <td>RS {{$invoice->discount}}.00</td>
                                    </tr>
                                    <tr>
                                        <td><strong>TOTAL :</strong></td>
                                        <td>RS{{$invoice->amount}}.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <div class="text-right">
                                <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                            </div> --}}

                            <div class="well m-t"><strong>Description</strong>
                                {{$invoice->description}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <script>
        var Success = `{{\Session::has('success')}}`;
        var Error = `{{\Session::has('error')}}`;

        if (Success) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 7000
                };
                toastr.success('Success Message', `{{\Session::get('success')}}`);

            }, 1300);
        }
        else if(Error){
            setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('Failure Message', `{{\Session::get('error')}}`);

                }, 1300);
        }
    </script>
@endsection

