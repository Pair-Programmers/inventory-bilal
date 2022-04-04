<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory | Admin Login</title>

    <link href="{{asset('adminpanel')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/style.css" rel="stylesheet">


</head>

<body class="gray-bg">
    <div style="text-align: center">
        <h1 class="logo-name" >Inventory</h1>
    </div>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>


            <h3>Welcome to Inventory Management</h3>
            {{-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views. --}}
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" method="POST" role="form" action="{{route('admin.login')}}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: red">{{$error}}</div>
                    @endforeach
                @endif
                {{-- <a href="{{route('admin.logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><small>Forgot password?</small></a> --}}
            </form>
            <p class="m-t"> <small>This is developed by Pair Programmers in &copy; 2021</small> </p>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('adminpanel')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminpanel')}}/js/bootstrap.min.js"></script>

</body>

</html>
