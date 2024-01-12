<!DOCTYPE html>
<html lang="en">
    <head>

        @include('partials.dashboard-v2.title-meta')

        @include('partials.dashboard-v2.head-css')

    </head>

    @include('partials.dashboard-v2.body')

        <!-- Begin page -->
        <div id="wrapper">


            @include('partials.dashboard-v2.topbar-dark')

            {{--@include('partials.dashboard-v2.left-sidebar')--}}
            @include('partials.dashboard-v2.horizontal')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    @yield('dashboard-content')
                    {{--@include('dashboardv2.general.cards')--}}

                </div> <!-- content -->

                @include('partials.dashboard-v2.footer')

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        @include('partials.dashboard-v2.right-sidebar')

        @include('partials.dashboard-v2.vendor')

        <!-- knob plugin -->
        <script src="{{ asset('/dashboard-v2/libs/jquery-knob/jquery.knob.min.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('/dashboard-v2/libs/morris.js06/morris.min.js')}}"></script>
        <script src="{{ asset('/dashboard-v2/libs/raphael/raphael.min.js')}}"></script>

        <!-- Dashboar init js-->
        <script src="{{ asset('/dashboard-v2/js/pages/dashboard.init.js')}}"></script>

        <!-- App js-->
        <script src="{{ asset('/dashboard-v2/js/app.min.js')}}"></script>

    </body>
</html>
