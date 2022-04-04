<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AcademyWorld | Course Add</title>

    <link href="{{asset('adminpanel')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/style.css" rel="stylesheet">
    {{-- toaster --}}
    <link href="{{ asset('adminpanel') }}/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <style>
        .disabledbutton {
            pointer-events: none;
            opacity: 0.4;
        }

    </style>
</head>

<body>

    <div id="wrapper">

    <?=$sidebar; ?>

        <div id="page-wrapper" class="gray-bg">
            <?=$header; ?>            
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Create User</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>User</a>
                        </li>
                        <li class="active">
                            <strong>Create</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{ route('user.store') }}"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control   @error('name') is-invalid  @enderror "
                                name="name" required>
                            @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-4">
                            <input type="email" class="form-control @error('password') is-invalid  @enderror"
                                name="email" required>
                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="phone" required>

                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control  @error('password') is-invalid  @enderror"
                                name="password" id="password" value="{{ Str::random(8) }}" required>
                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>





                    <div class="form-group">
                        <label class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-4">
                            <select class="form-control" name="type" required>
                                <option disabled selected>Select</option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                                <option value="Viewer">Viewer</option>
                            </select>
                        </div>





                    </div>
                    <div class="form-group">

                        <div class="mb-3 form-check col-sm-4 col-sm-offset-2 ">
                            <input type="checkbox" class="form-check-input" style="
                                transform:scale(1.5);
                              " id="copypassword">
                            {{-- <p class="ml-2"></p> --}}
                            <label class="ml-4 form-check-label " id="copymsg" for="exampleCheck1">Copy
                                Password</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary disabledbutton" id="submitbtn" type="submit">Create
                                User</button>
                        </div>
                    </div>
                        </div>
                        <br>
                
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>

     <!-- Mainly scripts -->
    <script src="{{asset('adminpanel')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminpanel')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('adminpanel') }}/js/plugins/toastr/toastr.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{asset('adminpanel')}}/js/inspinia.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="{{asset('adminpanel')}}/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    @if ($Status = Session::get('Status'))
    @endif
    @if ($Message = Session::get('Message'))
    @endif
    <script>
        var Status = '<?php echo $Status; ?>';
        var Message = '<?php echo $Message; ?>';

        if (Status) {
            if (Status == "Success") {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 7000
                    };
                    toastr.success('Success Message', Message);

                }, 1300);
            } else {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('Failure Message', Message);

                }, 1300);
            }
        }
    </script>
    <script>
        function copyToClipboard(text) {

            var textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy', err);
            }
            document.body.removeChild(textArea);
        }
        $('#copypassword').change(function() {
            var clipboardText = "";
            clipboardText = $('#password').val();
            copyToClipboard(clipboardText);
            // alert("Copied to Clipboard");

            if ($('input[type=checkbox]').prop('checked')) {
                $("#copymsg").html("<span class='text-success'>Password Copied!</span>");
                $("#submitbtn").removeClass('disabledbutton');
                $("#password").addClass('disabledbutton');
            } else {
                $("#copymsg").html("<span class=''>Copy Password</span>");
                $("#submitbtn").addClass('disabledbutton');
                $("#password").removeClass('disabledbutton');

            }
        });
    </script>

</body>

</html>
