<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    @include('admin.components.head')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Navbar Start -->
        @include('admin.components.navbar')
        <!-- Navbar End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.components.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                    <h4 class="page-title">{{$data ->story_name}}</h4>
                                    {{$data ->content}}
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-10" id="show">

                        </div>
                        <div class="col-lg-11">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- content -->

            @include('admin.components.footer')

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    @include('admin.components.js')

</body>

</html>
