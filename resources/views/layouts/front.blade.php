<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">   
    <!-- Mains Style-->
    @include('include.head-script')
  </head>

    <body> 
    <!-- layout-->
    <div id="layout">

        <!-- Main -->
        @yield('main')
        
        <!-- end Main -->

        <!-- central content -->
        <section class="central_content">
            @yield('content')
        </section>
        <!--end central content -->

        <!--footer-->
        <footer>
            @include('include.foot')
        </footer>
        <!-- end Footer -->
    </div>
    <!-- layout-->


    <!-- ======================= JQuery libs =========================== -->
    <!-- local copy of jquery. -->       
    @include('include.script')
    <!-- ======================= End JQuery libs =========================== -->
</body>
</html>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('footscript')