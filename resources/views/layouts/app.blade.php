<!DOCTYPE html>
    <html lang="en">
        <!-- header_script -->
        @include('layouts.header_script')
        <!-- end header_script -->

        <body class="theme-default">
        <!-- header -->
        @include('layouts.header')
        <!-- end header -->

        <!--######  BDFLAT MAIN ######-->
        <main class="main">
            @yield('content')
        </main>
        <!--######  BDFLAT MAIN ######-->

        <!-- footer -->
        @include('layouts.footer')
        <!-- end footer -->

        <!-- common_modal -->
        @include('layouts.common_modal')
        <!-- end common_modal -->

        <!-- footer_script -->
        @include('layouts.footer_script')
        <!-- end footer_script -->

        <!-- custom_script -->
        @stack('custom_js')
        <!-- end custom_script -->
    </body>
</html>
