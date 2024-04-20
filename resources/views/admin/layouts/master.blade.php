<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- Start Navbar -->
        @include('admin.layouts.navbar')
        <!-- End Navbar -->

        <!-- Start Sidebar -->
        @include('admin.layouts.sidebar')
        <!-- Start Sidebar -->

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        @include('admin.layouts.footer')

    </div>
</div>

@include('admin.layouts.script')

</body>
</html>
