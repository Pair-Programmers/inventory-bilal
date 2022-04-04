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
        <div class="col-lg-10">
            <h2>Show Customer</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Customer</a>
                </li>
                <li class="active">
                    <strong>Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="ibox-content">

                <form method="post" class="form-horizontal"  action=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name" disabled value="{{$customer->name}}"  required>
                        </div>

                        <label class="col-sm-2 control-label">Total Amount</label>
                        <div class="col-sm-4">
                            <label class="col-sm-2 control-label" id="totalAmount">--</label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" disabled value="{{$customer->email}}" placeholder="Optional">
                        </div>

                        <label class="col-sm-2 control-label">Total Discount</label>
                        <div class="col-sm-4">
                            <label class="col-sm-2 control-label" id="totalDiscount">--</label>
                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-4">
                            <select class="form-control" name="type" disabled required>
                                <option selected disabled>Select</option>
                                <option value="Cash" @if($customer->type == 'Cash') selected @endif>Cash Based</option>
                                <option value="Credit" @if($customer->type == 'Credit') selected @endif>Credit Based</option>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label">Total Recieved</label>
                        <div class="col-sm-4">
                            <label class="col-sm-2 control-label" id="totalCashRecieved">--</label>
                        </div>




                    </div>



                    <div class="form-group">

                        <label class="col-sm-2 control-label">Adress</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" disabled name="address" value="{{$customer->address}}"  placeholder="Optional">
                        </div>

                        <label class="col-sm-2 control-label">Balance</label>
                        <div class="col-sm-4">
                            <label class="col-sm-2 control-label">{{$customer->balance}}</label>
                        </div>
                    </div>



                </form>
            </div>

            <br>

        </div>

        <div class="row">


            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>All the Packages are listed here..</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>No.</th>
                    <th>ID/Code</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th># Items</th>
                    <th>Discount</th>
                    <th>Cash Recieved</th>
                    <th>Pre Balance</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                @endphp

                @foreach($invoices as $invoice)
                    <tr class="gradeX" id="row-{{$invoice->id}}">
                        <td>{{$counter}}</td>
                        <td class="center">{{sprintf("%05d", $invoice->id)}}</td>
                        <td class="center">{{date('d-M-Y', strtotime($invoice->issue_date))}}</td>
                        <td class="center">{{$invoice->amount}}</td>
                        <td class="center">{{$invoice->no_of_items}}</td>
                        <td class="center">{{$invoice->discount}}</td>
                        <td class="center">{{$invoice->cash_recieved}}</td>
                        <td class="center">{{$invoice->pre_balance}}</td>
                        <td class="center">{{$invoice->group}}</td>

                        <td>
                            <a href="{{route('admin.sale_invoice.show', $invoice->id)}}">
                                <small class="label label-warning"><i class="fa"></i>View</small>
                            </a>
                            {{-- <a href="{{route('admin.sale_invoice.show', $invoice->id)}}">
                                <small class="label label-primary"><i class="fa"></i>Edit</small>
                            </a> --}}
                            <a onclick="deleteSaleInvoice({{$invoice->id}})">
                                <small class="label label-danger"><i class="fa"></i>Delete</small>
                            </a>
                        </td>
                    </tr>

                    @php
                        $counter = $counter + 1;
                    @endphp
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>ID/Code</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th># Items</th>
                    <th>Discount</th>
                    <th>Cash Recieved</th>
                    <th>Pre Balance</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                </table>
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


            var invoices = @json($invoices);
            var totalAmount = parseInt(0);
            var totalDiscount = parseInt(0);
            var totalCashRecieved = parseInt(0);
            invoices.forEach(element => {
                totalAmount = parseInt(totalAmount) +  parseInt(element.amount);
                totalDiscount = parseInt(totalDiscount) +  parseInt(element.discount);
                totalCashRecieved = parseInt(totalCashRecieved) + parseInt(element.cash_recieved);
            });
            //console.log(totalAmount);
            $('#totalAmount').html(parseInt(totalAmount));
            $('#totalDiscount').html(parseInt(totalDiscount));
            $('#totalCashRecieved').html(parseInt(totalCashRecieved));
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

            }, 1200);
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

                }, 1200);
        }
    </script>
@endsection
