@extends('backend.layout.app')

@section('header')

<style type="text/css">
    .onmousehover{
        cursor:pointer;
    }
    .float_content_right {
        float: right;
    }
</style>
<!-- Alertify css -->
<link href="assets/plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">

@endsection

@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">
                                    ADD NEW SLIDE
                                </h4>
                                <hr>
                                <form action="/admin/slide" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Slide Image Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="image_name" name="image_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Slide Image URL</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="image_url" name="image_url">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-success" type="submit">ADD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">
                                    SLIDE LIST
                                </h4>
                                <hr>
                                <table class="table table-striped dt-responsive nowrap table-vertical text-center" width="100%" cellspacing="0">
                                   <thead>
                                       <tr>
                                           <th>SL</th>
                                           <th>Image Name</th>
                                           <th>Image URL</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach( $slides as $slide)
                                       <tr>
                                           <td>{{ $slide->id }}</td>
                                           <td>{{ $slide->image_name }}</td>
                                           <td>{{ $slide->image_url }}</td>
                                           <td> <badge class="badge badge-danger">Delete</badge></td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end col -->
            
            <div class="col-lg-4">
                <div class="card" height="200px !important">
                    <div class="card-body">
                        <div class="row">
                            @foreach($images as $image)
                                <!-- Simple card -->
                                <div class="col-md-6 col-lg-6 col-xl-6" style="margin-bottom:5px !important">
                                    <div class="card">
                                        <img class="card-img-top" width="300px !important" height="200px !important" src="{{ $image->image_url }}" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title font-12 mt-0" id="copy_image_url_{{ $image->id }}">{{ $image->image_name }}</p>
                                            <span>
                                                <button for="" class="badge badge-info" onclick="copyToClipboard('#copy_image_url_{{ $image->id }}')"> <i class="fa fa-copy"></i> copy</button>        
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            
        </div> <!-- end row -->
        
    </div><!-- container -->
</div> <!-- Page content Wrapper -->


@endsection

@section('footer')

<!-- Alertify js -->
<script src="assets/plugins/alertify/js/alertify.js"></script>
<script src="assets/pages/alertify-init.js"></script>

<script>
    function copyToClipboard(element) {
        
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        
        var str = element;
        str = str.replace('#', '');
        var copied_image_url = document.getElementById(str).innerHTML;
        document.getElementById("image_url").value = '/storage/'+copied_image_url;
        
        //alert(copied_image_url);
        $temp.remove();
      
    }
</script>

@endsection
