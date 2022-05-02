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
        <div class="row ">
            <img src="{{ asset('adminpanel') }}/img/sardar-sons.png"  style="width: 700px; height: 160px;" alt="logo-asif-fabric">

            {{-- <span>03224304056, 03045584205</span>
            <span>(Adress: Shope # 4, Rehman plaza near faisal Movers workshop Bakkar mandi )</span> --}}
        </div>
        <div class="row " style="display: flex; text-align: center" >
            <div style="margin-right: 370px; margin-left: 100px">
                BILAL SARDAR <br> 03224304056 <br> 03174146066
            </div>

            <div class="">

                Abdullah zubair <br>  03045584205 <br> 03077888333
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 text-left">
                <h4>Sr. No: <span>S-INV-{{sprintf("%05d", $invoice->id)}}</span></h4>
                <h4>Invoice No: <span>_________________</span></h4>
                <p>
                    <span><strong>Invoice Date:</strong> {{date('d-M-Y', strtotime($invoice->issue_date))}}</span><br/>
                </p>
                <address>
                    M/S: <strong>{{$invoice->customer->name}}</strong><br>
                    Address: <strong>{{$invoice->customer->address}}</strong><br>
                    Phone: <strong>{{$invoice->customer->phone}}</strong><br>
                </address>

            </div>
        </div>

        <div class="table-responsive m-t">
            <table class="table invoice-table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Item List</th>
                    <th>Model</th>
                    <th>Part No.</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->detail as $item)
                    <tr>
                        <td>{{$loop->count}}</td>
                        <td>{{$item->product->code}}</td>
                        <td>
                            <strong>{{$item->product->name}}</strong>
                        </td>

                        <td>{{$item->product->model->name}}</td>
                        <td>{{$item->product->meter}}</td>

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
