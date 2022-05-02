@extends('adminpanel.layout.master')
<!-- ================================== EXTEND TITLE AND META TAGS ============================= -->
@section('title-meta')
    <title>Inventory | Product List</title>
    <meta name="description" content="this is description">
@endsection
<!-- ====================================== EXTRA CSS LINKS ==================================== -->
@section('other-css')
    <link href="{{ asset('adminpanel') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection
<!-- ======================================== BODY CONTENT ====================================== -->
@section('content')
    <div class="row wrapper bor
der-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>List of Products</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Products</a>
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
        <div class="form-group">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">+ Add Product</a>
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
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID/Code</th>
                                        <th>Name</th>
                                        <th>Model</th>
                                        <th>Category</th>
                                        <th>Cost Price</th>
                                        <th>Sale Price</th>
                                        <th>Qty</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp

                                    @foreach ($products as $product)
                                        <tr class="gradeX" id="row-{{ $product->id }}">
                                            <td>{{ $counter }}</td>
                                            {{-- <td class="center">{{ sprintf('%04d', $product->id) }}</td> --}}
                                            <td class="center">{{ $product->code }}</td>
                                            <td class="center">{{ $product->name }}</td>
                                            <td class="center">{{ $product->model->name }}</td>
                                            <td class="center">{{ $product->category->name }}</td>
                                            <td class="center">{{ $product->cost_price }}</td>
                                            <td class="center">{{ $product->sale_price }}</td>
                                            <td class="center">{{ $product->available_qty }}</td>
                                            <td class="center">{{ $product->creator->name }}</td>

                                            <td>
                                                <a href="{{ route('admin.product.edit', $product->id) }}">
                                                    <small class="label label-primary"><i
                                                            class="fa"></i>Edit</small>
                                                </a>
                                                <a onclick="deleteProduct({{ $product->id }})">
                                                    <small class="label label-danger"><i
                                                            class="fa"></i>Delete</small>
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
                                        <th>Name</th>
                                        <th>Model</th>
                                        <th>Category</th>
                                        <th>Cost Price</th>
                                        <th>Sale Price</th>
                                        <th>Qty</th>
                                        <th>Created By</th>
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
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {
                        extend: 'print',
                        customize: function(win) {
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
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function(sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function(value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"
            ]);

        }
    </script>
    <script>
        function deleteProduct(id) {
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
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            method: 'GET',
                            url: "{{ route('admin.product.destroy', '') }}/" + id,
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    swal("Deleted!", "News has been deleted.", "success");
                                    $("#row-" + id).remove();
                                } else if (response.error) {
                                    swal("Coudnt Found!", "News not Found", "error");
                                } else {
                                    swal("Error!", "Not Authorize | Logical Error", "error");
                                }
                            },
                            error: function(response) {
                                swal("Error!", "Cannot delete !", "error");
                            }
                        });
                    } else {
                        swal("Cancelled", "News is safe :)", "error");
                    }

                });
        }
    </script>
    <script>
        var Success = `{{ \Session::has('success') }}`;
        var Error = `{{ \Session::has('error') }}`;

        if (Success) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 7000
                };
                toastr.success('Success Message', `{{ \Session::get('success') }}`);

            }, 1200);
        } else if (Error) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('Failure Message', `{{ \Session::get('error') }}`);

            }, 1200);
        }
    </script>

    <script>
        var Success = `{{ \Session::has('success') }}`;
        var Error = `{{ \Session::has('error') }}`;

        if (Success) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 7000
                };
                toastr.success('Success Message', `{{ \Session::get('success') }}`);

            }, 1200);
        } else if (Error) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('Failure Message', `{{ \Session::get('error') }}`);

            }, 1200);
        }
    </script>
@endsection
