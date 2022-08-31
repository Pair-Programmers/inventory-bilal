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
            <h2>Create Sale Invoice</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Sale Invoice</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    @error('customer_id')
        <div class="alert alert-danger" style="margin-top: 20px">Please Select Customer</div>
    @enderror
    @error('product_id')
        <div class="alert alert-danger" style="margin-top: 20px">Please Add Products in Cart</div>
    @enderror

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('admin.sale_invoice.store') }}"
                    enctype="multipart/form-data">
                    @csrf


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Customer</label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <select required data-placeholder="Choose a Country..." class="chosen-select"
                                                tabindex="2" style="width:350px;" id="customerSelect" name="customer_id">
                                                <option value="">Select Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <label class="col-sm-1 control-label">Date</label>

                                    <div class="col-sm-2">
                                        <input required type="date" class="form-control has-error" name="issue_date"
                                            value="<?php echo date('Y-m-d'); ?>">
                                    </div>

                                    <label class="col-sm-1 control-label">Account</label>

                                    <div class="col-sm-2">
                                        <select class="form-control" name="account_id" required>
                                            @foreach ($accounts as $account)

                                                <option value="{{ $account->id }}">{{ $account->name }} </option>
                                            @endforeach

                                        </select>
                                    </div>



                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Product</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <select data-placeholder="Choose a Country..." class="chosen-select"
                                                tabindex="2" style="width:600px;" id="productSelect">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $key => $product)
                                                    <option value="{{ $key }}">{{ $product->code }} - {{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Vendor</label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <select required data-placeholder="Choose a Country..." class="chosen-select"
                                                tabindex="2" style="width:350px;" id="vendorSelect" name="vendor_id">
                                                @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Qty</label>

                                    <div class="col-sm-2">
                                        <input id="quantity" class="touchspin1" type="text" min="1" value="1" >
                                    </div>

                                    <label class="col-sm-2 control-label">Sale Price</label>
                                    <div class="col-sm-2">
                                        <input id="sale_price" class="form-control" type="text" >
                                    </div>

                                    <div class="col-sm-4 ">
                                        <button onclick="addProduct()" class="btn btn-primary" type="button"
                                            >Add</button>
                                    </div>
                                </div>



                                <div class="ibox-content">

                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Model</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th>Vendor</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">

                                        </tbody>
                                    </table>



                                </div>

                                <div class="ibox-content">
                                    <h1 >Pre Balance: <strong id="preBalance">0</strong> Rs.</h1>
                                    <h1 >Gross Total: <strong id="grossTotalAmmount">0</strong> Rs.</h1>
                                    <h1 >Discount: <strong id="discountAmmount">0</strong> Rs.</h1>
                                    <h1 >Total: <strong id="totalAmmount">0</strong> Rs.</h1>

                                </div>
                                <br>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Enter Discount</label>

                                    <div class="col-sm-2">
                                        <input type="number" class="form-control " min="0" id="discount" name="discount" value="0">
                                        <input id="ammount" type="hidden"  name="amount" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">Ref #</label>

                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="reference_no" placeholder="Optional" >
                                    </div>

                                    <label class="col-sm-1 control-label">Description</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="description" placeholder="Optional">
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Cash Recieved</label>

                                    <div class="col-sm-2">
                                        <input type="number" class="form-control " id="cashRecievedAmount" name="cash_recieved" value="0">
                                    </div>

                                    <label class="col-sm-1 control-label">Balance</label>


                                    <div class="col-sm-2">
                                        <label class="control-label" id="changeAmount">-------</label>
                                    </div>




                                </div>


                                <button class="btn btn-primary" type="submit" name="button" value="Save & Print">Save & Print Invoice</button>
                                <button class="btn btn-primary" type="submit" name="button" value="Save">Save Invoice</button>



                </form>
            </div>

        </div>
    </div>

@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')

    <script>
        var products = @json($products);
        var vendors = @json($vendors);
        var customers = @json($customers);
        var counter = 1;
        var grossTotal = 0;
        var discount = 0;
        var cashRecieved = 0;
        var preBalance = 0;
        function addProduct() {
            if($('#quantity').val()){
                var productIndex = $('#productSelect').prop('selectedIndex')-1;
                var vendorIndex = $('#vendorSelect').prop('selectedIndex');
                var productName = $('#productSelect').find(":selected").text();
                var productQty = $('#quantity').val();
                var productSalePrice = $('#sale_price').val();
                if(productIndex >= 0){
                    $('#productTableBody').append(`<tr id="row-${counter}">
                                                    <td>${counter}</td>
                                                    <td>${products[productIndex].name}</td>
                                                    <td>${products[productIndex].model.name}</td>
                                                    <td>${productSalePrice}</td>
                                                    <td>${productQty}</td>
                                                    <td>${productQty*productSalePrice}</td>
                                                    <td>${vendors[vendorIndex].name}</td>
                                                    <td>
                                                        <a onclick="deleteProduct(${counter})">
                                                            <small class="label label-danger"><i class="fa"></i>delete</small>
                                                        </a>
                                                    </td>

                                                    <input type="hidden" name="product_id[]" value="${products[productIndex].id}">
                                                    <input type="hidden" name="product_qty[]" value="${productQty}">
                                                    <input type="hidden" name="vendor_id[]" value="${vendors[vendorIndex].id}">
                                                    <input type="hidden" name="product_sale_price[]" value="${productSalePrice}">
                                                </tr>`);
                    counter++;

                }
                calculateTotalAmmount();

            }

        }



        function deleteProduct(rowId){
            $("#row-" + rowId).remove();
            calculateTotalAmmount();
        }

        function calculateTotalAmmount(){
            var tottalAmount = 0;
            var products_in_cart = $("input[name='product_id[]']")
              .map(function(){return $(this).val();}).get();
            var products_qty_in_cart = $("input[name='product_qty[]']")
              .map(function(){return $(this).val();}).get();
            var products_salePrice_in_cart = $("input[name='product_sale_price[]']")
              .map(function(){return $(this).val();}).get();
            // console.log(products_in_cart);
            // console.log(products_qty_in_cart);
            products_in_cart.forEach(myFunction)
            function myFunction(product_id, index, arr) {
                products.every(element => {
                    if(element.id == parseInt(product_id)){
                        tottalAmount = tottalAmount + (parseInt(products_qty_in_cart[index]) * parseInt(products_salePrice_in_cart[index]));
                        return false;

                    }
                    return true;
                });
            }
            grossTotal = tottalAmount;
            $('#grossTotalAmmount').html(grossTotal);
            $('#preBalance').html(preBalance);
            $('#discountAmmount').html(discount);
            $('#totalAmmount').html( parseInt((grossTotal-discount)) + parseInt(preBalance));
            $('#ammount').val(grossTotal-discount);
            if(cashRecieved > 0){
                $('#changeAmount').html(cashRecieved- (grossTotal-discount));

            }

        }
        $('#discount').on('input',function(e){
            discount = $('#discount').val();
            calculateTotalAmmount();
        });
        function calculateChange(){

        }
        $('#cashRecievedAmount').on('input',function(e){
            cashRecieved = $('#cashRecievedAmount').val();
            calculateTotalAmmount();
        });

        $('#customerSelect').on('change',function(e){
            // console.log($(this).prop('selectedIndex'));
            // console.log(customers[$(this).prop('selectedIndex')-1]);
            preBalance = customers[$(this).prop('selectedIndex')-1].balance;
            calculateTotalAmmount();
        });

        function updateVendors(productId){
            $('#vendorSelect').empty();
            console.log(productId);
            vendors.forEach(vendor => {
                vendor.purchased_products.forEach(product => {
                    if(product.product_id == productId){
                        console.log('------------');
                        console.log(vendor);
                        var optionHtml = `<option value="${vendor.id}">${vendor.name}</option>`;
                        $('#vendorSelect').append(optionHtml);
                    }
                });
            });
        }

        $('#productSelect').on('change',function(e){
            var productIndex = $('#productSelect').prop('selectedIndex');
            var productSalePrice = products[productIndex-1].sale_price;
            $('#sale_price').val(productSalePrice);
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
