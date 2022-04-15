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
            <h2>Recieve Payment</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Payment</a>
                </li>
                <li class="active">
                    <strong>Recieve From Customer</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('admin.payment.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Customer</label>

                        <div class="col-sm-4">
                            <select class="form-control" name="customer_id" required>
                                <option selected disabled value=""  >Select</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="In" name="group">

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Amount</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rs</span>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                        </div>

                        <label class="col-sm-2 control-label">Date</label>

                        <div class="col-sm-4">
                            <input type="date" class="form-control" required name="payment_date" value="<?php echo date('Y-m-d'); ?>" >
                        </div>


                    </div>





                    <input type="hidden" name="account_id" value="1">
                    {{-- <div class="form-group">


                        <label class="col-sm-2 control-label">Account</label>

                        <div class="col-sm-2">
                            <select class="form-control" name="account_id" required>
                                @foreach ($accounts as $account)

                                    <option value="{{ $account->id }}">{{ $account->name }} </option>
                                @endforeach

                            </select>
                        </div>



                    </div> --}}




                    <div class="form-group">
                        <label class="col-sm-2 control-label">Note</label>
                        <div class="col-sm-4">
                            <textarea name="note" id="" cols="50" rows="5"></textarea>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>

        </div>
    </div>

@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')
    <script>
        $(document).ready(function() {
            $('#typeSelect').on('change',function(e){
                console.log($(this).val());
                if ($(this).val() == 'Customer Payment') {
                    $("#groupSelect").val('In').change();
                    //$("#groupSelect").attr('disabled', true);
                    $('#customer_or_vendor').html(
                        `
                            <label class="col-sm-2 control-label">Customer</label>

                            <div class="col-sm-4">
                                <select class="form-control" name="customer_id" required>
                                    <option selected disabled value=""  >Select</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        `
                    );
                } else {
                    $("#groupSelect").val('Out').change();
                    $('#customer_or_vendor').html(
                        `
                            <label class="col-sm-2 control-label">Vendors</label>

                            <div class="col-sm-4">
                                <select class="form-control" name="vendor_id" required>
                                    <option selected disabled value="" >Select</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        `
                    );
                }
            });

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
