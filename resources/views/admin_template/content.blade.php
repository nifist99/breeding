<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    @include('admin_template/css')

    @stack('css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin_template/sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- header --}}
                @include('admin_template/header')

                <div class="container-fluid">

                    {{-- dinamis content --}}
                    @yield('content')

                </div>

                {{-- footer --}}
                @include('admin_template/footer')

            </div>

        </div>

    </div>

    {{-- scroll --}}
    @include('admin_template/scroll')

    @include('admin_template/js')

    @stack('js')
</body>
</html>