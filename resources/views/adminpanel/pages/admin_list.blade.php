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
        <h2>List of Admins</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Admins</a>
            </li>
            <li class="active">
                <strong>List</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>All Users are listed here..</h5>
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
                    <th>Name</th>
                    <th>Type</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                @endphp

                @foreach($admins as $user)
                    <tr class="gradeX" id="row{{$user->id}}">
                        <td>{{$counter}}</td>
                        <td class="center">{{$user->name}}</td>
                        <td class="center">{{$user->type}}</td>
                        <td class="center">{{$user->email}}</td>
                        <td class="center">{{$user->phone}}</td>
                        <td class="center">{{$user->created_at}}</td>

                        <td>

                            <a onclick="DeactivateAdmin('{{ $user->id }}')">
                                @if($user->status == 'Active')
                                    <small class="label label-danger"><i class="fa"></i>Deactivate</small>
                                @else
                                    <small class="label label-success"><i class="fa"></i>Active</small>
                                @endif
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
                    <th>Name</th>
                    <th>Type</th>
                    <th>email</th>
                    <th>phone</th>
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
    function DeactivateAdmin(id) {
        swal({
            title: "You Want to Deactivate Admin",
            //text: id,
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#1bb394",
            confirmButtonText: "Yes",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if(isConfirm){

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.deactivate', '') }}/" + id,

                success: function(data) {
                    if (data.Status == "Success") {
                        swal("Successfuly Done", "", "success");
                        // location.reload();
                        $("#row"+id).remove();
                    } else {
                        swal("Not  Done", "", "danger");
                    }
                    }
                });
            }
            else{
                swal("Cancelled", "That's safe :)", "error");
            }

        });
    }
</script>
@endsection
