@extends('adminpanel.layout.master')
<!-- ================================== EXTEND TITLE AND META TAGS ============================= -->
@section('title-meta')
<title>Inventory | Dashboard</title>
<meta name="description" content="this is description">
@endsection
<!-- ====================================== EXTRA CSS LINKS ==================================== -->
@section('other-css')
<link href="{{asset('adminpanel')}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection
<!-- ======================================== BODY CONTENT ====================================== -->
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 >List of Payments</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Payments</a>
            </li>
            <li class="active">
                <strong> List</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <form action="{{route('admin.payment.search')}}" method="POST">
                    @csrf
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="control-label" for="date_added">Start Date</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="start_date" id="date_added" type="date" class="form-control" value="{{ old('start_date')? old('start_date') : date('Y-m-d')}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="control-label" for="date_modified">End Date</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="end_date" id="date_modified" type="date" class="form-control" value="{{ old('end_date')? old('end_date') : date('Y-m-d')}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label"  for="amount">_____________</label>
                        <div class="input-group date">
                            <button class="btn btn-primary" type="submit" >Search</button>
                        </div>

                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label"  >Total Payment <span style="color: green" >In</span></label>
                        <div class="input-group date">

                           <h2 style="color: rgb(11, 109, 189)"><strong id="total_payment_in"> 0 Rs</strong></h2>
                        </div>

                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label"  >Total Payment <span style="color: red"> Out</span></label>
                        <div class="input-group date">

                           <h2 style="color: rgb(11, 109, 189)"><strong id="total_payment_out"> 0 Rs</strong></h2>
                        </div>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label"  >= In - Out</label>
                        <div class="input-group date">

                           <h2 style="color: rgb(11, 109, 189)"><strong id="total_in_out"> 0 Rs</strong></h2>
                        </div>

                    </div>
                </div>
            </form>
            </div>

        </div>

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
                <th>Date</th>
                <th>Amount</th>
                <th>Transaction</th>
                <th>Type</th>
                <th>Note</th>
                <th>Ref #</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
            @endphp

            @foreach($payments as $payment)
                <tr class="gradeX" id="row-{{$payment->id}}">
                    <td>{{$counter}}</td>
                    <td class="center">{{$payment->payment_date}}</td>
                    <td class="center">{{$payment->amount}}</td>

                    @if ($payment->group == 'In')
                    <td class="center" style="color: green">{{$payment->group}}</td>
                    @else
                    <td class="center" style="color: red">{{$payment->group}}</td>
                    @endif

                    <td class="center">{{$payment->type}}</td>
                    <td class="center">{{$payment->note}}</td>
                    @if ($payment->type == 'Sale Invoice')

                    @elseif ($payment->type == 'Purchase Invoice')
                    @elseif ($payment->type == 'Expense')
                    @elseif ($payment->type == 'Employee Salary')
                    @elseif ($payment->type == 'Sale Invoice')

                    @else
                    @endif
                    <td class="center">{{$payment->cnic}}</td>

                    <td>
                        @if ($payment->type != 'Customer Payment' && $payment->type != 'Vendor Payment')
                        @else
                        <a href="{{ route('admin.payment.edit', $payment->id) }}">
                            <small class="label label-primary"><i class="fa"></i>Edit</small>
                        </a>
                        <a onclick="deletePayment({{$payment->id}})">
                            <small class="label label-danger"><i class="fa"></i>Delete</small>
                        </a>
                        @endif

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
                <th>Date</th>
                <th>Amount</th>
                <th>Transaction</th>
                <th>Type</th>
                <th>Note</th>
                <th>Ref #</th>
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
<!-- Page-Level Scripts -->

<script>
    $(document).ready(function(){

        var payments = @json($payments);
        var totalPaymentIn = 0;
        var totalPaymentOut = 0;
        for (let i = 0; i < payments.length; i++) {
            if(payments[i].group == 'In'){
                totalPaymentIn += payments[i].amount;
            }
            else if(payments[i].group == 'Out'){
                totalPaymentOut += payments[i].amount;
            }
        }
        $('#total_payment_in').html(totalPaymentIn);
        $('#total_payment_out').html(totalPaymentOut);
        $('#total_in_out').html(totalPaymentIn-totalPaymentOut);

        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

        /* Init DataTables */
        var oTable = $('#editable').DataTable();

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable( '../example_ajax.php', {
            "callback": function( sValue, y ) {
                var aPos = oTable.fnGetPosition( this );
                oTable.fnUpdate( sValue, aPos[0], aPos[1] );
            },
            "submitdata": function ( value, settings ) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition( this )[2]
                };
            },

            "width": "90%",
            "height": "100%"
        } );


    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>
<script>
    function deletePayment(id) {
    swal({

        title: "You really want to delete ？", // You really want to delete ?
        text: "Your will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "No, Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                method: 'GET',
                url: "{{ route('admin.employee.destroy', '') }}/" + id,
                success: function(response) {
                    console.log(response);
                    if(response.success){
                        swal("Deleted!", "Employee has been deleted.", "success");
                        $("#row-"+id).remove();
                    }
                    else if(response.error){
                        swal("Coudnt Found!", "News not Found", "error");
                    }
                    else{
                        swal("Error!", "Not Authorize | Logical Error", "error");
                    }
                },
                error: function (response){
                    swal("Error!", "Cannot delete !", "error");
                }
            });
        }
        else {
            swal("Cancelled", "News is safe :)", "error");
        }

    });
    }
</script>


@endsection
