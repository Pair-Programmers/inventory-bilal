<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory | Invoice Print</title>

    <link href="{{asset('adminpanel')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/style.css" rel="stylesheet">

</head>

<body class="white-bg" >
    <div class="ibox-content p-xl">
        <div class="row text-center">
            <img src="{{ asset('storage') }}/images/logo-asif.jpg" alt="logo-asif-fabric">
        </div>
        <div class="row ">
            <div class="col-sm-4  " >
                M. Asif  <span style="margin-right: 240px"></span> M. Mohsin Asif <span style="margin-right: 240px"></span> M. Umar Asif
                <br>
            </div>
            <div class="col-sm-4 ">
                0300-4265624 <span style="margin-right: 197px"></span> 0323-4801929 <span style="margin-right: 245px"></span>0321-8448846
            </div>


        </div>
        <div class="row">
            <div class="col-sm-6 text-left">
                <h4>Invoice No.</h4>
                <h4 class="text-navy">S-INV-{{sprintf("%05d", $invoice->id)}}</h4>
                <p>
                    <span><strong>Invoice Date:</strong> {{date('d-M-Y', strtotime($invoice->issue_date))}}</span><br/>
                </p>
                <address>
                    Customer: <strong>{{$invoice->customer->name}}</strong><br>
                    Address: <strong>{{$invoice->customer->address}}</strong><br>
                    Phone: <strong>{{$invoice->customer->phone}}</strong><br>
                </address>

            </div>
        </div>

        <div class="table-responsive m-t">
            <table class="table invoice-table">
                <thead>
                <tr>
                    <th>Item List</th>
                    <th>Meter</th>
                    <th>Ghaz</th>
                    <th>KG</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->detail as $item)
                    <tr>
                        <td>
                            <strong>{{$item->id}}</strong>
                        </td>

                        <td>{{$item->product->meter}}</td>
                        <td>{{$item->product->ghaz}}</td>
                        <td>{{$item->product->kg}}</td>

                        <td>{{$item->sale_quantity}}</td>
                        <td>{{$item->sale_price}}</td>
                        <td>{{$item->total_ammount}}</td>
                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div><!-- /table-responsive -->

        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>Pre. Balance :</strong></td>
                <td>RS {{$invoice->pre_balance}}.00</td>
            </tr>
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
                <td>RS {{$invoice->amount + $invoice->pre_balance}}.00</td>
            </tr>
            </tbody>
        </table>
        <br>
        <br>

        <div class="row ">
            <div class="col-sm-6  " >
                -------------------------------  <span style="margin-right: 440px;"></span> -------------------------------

            </div>
            <br>
            <div class="col-sm-6 "  >
                Signature  <span style="margin-right: 515px;"></span> Signature
            </div>


        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('adminpanel')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminpanel')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('adminpanel')}}/js/inspinia.js"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
