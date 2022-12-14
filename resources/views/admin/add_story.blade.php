<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thêm truyện</title>
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
                                    <h4 class="page-title">Thêm truyện</h4>
                                </div>
                            </div> <!-- end row -->
                        </div>

                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="col-lg-6" style="float: left;">
                                            <div class="form-group">
                                                <label>Tên truyện</label>
                                                <input type="text" class="form-control" id="story_name" required placeholder=""/>
                                            </div>
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea rows="8" class="form-control" id="content"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button id="submit" class="btn btn-primary waves-effect waves-light">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="float: right;">
                                            <div class="form-group">
                                                <label>Thể loại</label>
                                                <div>
                                                <?php $i = 0; ?>
                                                @foreach($data as $data)
                                                <?php $i++; ?>
                                                    <div class="custom-control custom-checkbox" style="float: left; width: 136px;">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck{{$i}}" value="{{$data->id}}">
                                                        <label class="custom-control-label" for="customCheck{{$i}}" style="line-height: 25px;">{{$data->category_name}}</label>
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <!-- container-fluid -->

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

    <script>
        //Them ten truyen
        $(document).ready(function () {
            var holder = $('#holder');

            $('#submit').click(() => {
                var data = new Array();
                var checkbox = $('.custom-control-input');
                for (var i = 0; i<checkbox.length; i++) {
                    if (checkbox[i].checked){
                        data[i] = checkbox[i].value;
                    }
                }
                var story_name = $("#story_name");
                var content = $("#content");
                $.ajax({
                    url: '{{URL::to("api/add-story")}}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        data: data,
                        story_name: story_name.val(),
                        content: content.val(),
                    }
                })
                    .done(function (data) {
                        story_name.val('');
                        content.val('');
                        holder.html('');
                        swal("Thành công", data.message, "success");
                    })
                    .fail(function (error) {

                        swal("Thất bại", error.responseJSON.message, "error");
                    })
            });
        });
    </script>

</body>

</html>
