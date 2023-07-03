<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Hoki Mart</title>

    {{-- style --}}
    @stack('before-style')
    @include('components.style')
    @stack('after-style')

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col scroll-view sidebar-fix">
                <div class="left_col">
                    <!-- sidebar menu -->
                    @include('components.sidebar')
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            @include('components.navbar')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <!-- /footer content -->
        </div>
    </div>

    {{-- script --}}
    @stack('prepend-script')
    @include('components.script')
    @stack('addon-script')
</body>

</html>