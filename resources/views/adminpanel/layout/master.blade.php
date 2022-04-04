<!DOCTYPE html>
<html lang="en">
    @include('adminpanel.partials.head')
<body>
    <div id="wrapper">
        @include('adminpanel.partials.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('adminpanel.partials.header')
            @yield('content')
            @include('adminpanel.partials.footer')
        </div>
    </div>
    @include('adminpanel.partials.script')
    @yield('other-script')
</body>
</html>
