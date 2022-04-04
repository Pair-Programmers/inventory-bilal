<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory | Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('adminpanel')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/style.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
        <?=$sidebar; ?>
        <div id="page-wrapper" class="gray-bg">
        <?=$header; ?>
        <div class="wrapper wrapper-content animated fadeIn">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dismissable Alerts</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul> -->
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @foreach($allNotifications as $notification)
                        <div class="alert alert-success alert-dismissable " role="alert">
                            <a href="#" aria-hidden="true" data-id="{{ $notification->id }}" data-dismiss="alert" class="close mark-as-read" type="button">×</a>
                            <i class="fa fa-newspaper-o fa-fw"></i> {{ $notification->data['message'] }}
                            <span class="pull-right text-muted small">[{{ $notification->created_at }}]</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        </div>
        <?=$footer; ?>

        </div>
        </div>
    <!-- Mainly scripts -->
    <script src="{{asset('adminpanel')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminpanel')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="{{asset('adminpanel')}}/js/plugins/flot/jquery.flot.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="{{asset('adminpanel')}}/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('adminpanel')}}/js/inspinia.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{asset('adminpanel')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="{{asset('adminpanel')}}/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="{{asset('adminpanel')}}/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="{{asset('adminpanel')}}/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('adminpanel')}}/js/demo/sparkline-demo.js"></script>

    <script src="{{asset('adminpanel')}}/js/plugins/dataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            function sendMarkRequest(id = null) {
                return $.ajax("{{ route('admin.markNotification') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id
                    }
                });
            }
            $(function() {
                $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                    request.done(() => {
                        $(this).parents('div.alert').remove();
                    });
                });
                $('#mark-all').click(function() {
                    let request = sendMarkRequest();
                    request.done(() => {
                        $('div.alert').remove();
                    })
                });
            });
        });
        </script>
</body>

</html>
