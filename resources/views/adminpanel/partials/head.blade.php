<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @yield('title-meta')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('adminpanel')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/animate.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('adminpanel')}}/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    {{-- toaster --}}
    <link href="{{ asset('adminpanel') }}/css/plugins/toastr/toastr.min.css" rel="stylesheet">




    @yield('other-css')

</head>
