<!doctype html>
<html lang="en">

<head>
    @include('backend.layout.head')
</head>

<body class="dark-edition">
<div class="wrapper ">
    @include('backend.layout.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('backend.layout.navbar')
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('backend.layout.footer')
    </div>
</div>
@include('backend.layout.scripts')
</body>

</html>
