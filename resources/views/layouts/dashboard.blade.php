<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

       <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="{{ asset('vendor/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/dash.min.css') }}" rel="stylesheet">
    </head>

<body id="page-top">
    <div id="app">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Side Bar Menu -->
            @include('partials.sidebarMenu')


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    @include('partials.topbarMenu')
                    @yield('content')
                </div>

                {{-- @include('partials.footer') --}}
            </div>
        </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dash.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    @yield('scripts')

    <script type="text/javascript">
        $(document).ready( function () {
              $('#dataTable').DataTable();
            } );
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#J_name').keyup(function(e){
            var str = $('#J_name').val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#J_slug').val(str);
            $('#J_slug').attr('placeholder', str);
        });
    });
    </script>

</body>

</html>