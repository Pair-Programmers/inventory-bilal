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
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('admin.update') }}"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control   @error('name') is-invalid  @enderror "
                                name="name" required value="{{ Auth::user()->name }}">
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
                                name="email" required value="{{ Auth::user()->email }}">
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
                            <input type="number" class="form-control" name="phone" required
                                value="{{ Auth::user()->phone }}">

                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Profile Image</label>

                        <div class="col-sm-4">
                            <input type="file" class="form-control   @error('profile_image') is-invalid  @enderror "
                                name="profile_image"  value="{{ Auth::user()->name }}">
                            @error('profile_image')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-4">
                            <input type="password" class="form-control  @error('password') is-invalid  @enderror"
                                name="password" id="password" value="">
                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-4">
                            <input type="password" class="form-control  @error('password') is-invalid  @enderror"
                                name="confirm_password" id="password" >
                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>




                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary disabledbutton" id="submitbtn" type="submit">Update
                                User</button>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')
<script>
    $(document).ready(function() {
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
@endsection
