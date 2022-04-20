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
        <script type="text/javascript">
        var timeLeft = 30;
        var elem = document.getElementById('Timer');

        var timerId = setInterval(countdown, 1000);

        function countdown() {
        if (timeLeft == -1) {
          clearTimeout(timerId);
          elem.style.display = 'none';
          // doSomething();
        } else {
          elem.innerHTML = '(' + timeLeft + ')';
          --timeLeft;
        }
        }
        </script>

    </body>
</html>
