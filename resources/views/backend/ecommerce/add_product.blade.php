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
<style type="text/css">
    .tooltip {
      position: relative;
      display: inline-block;
    }
    
    .tooltip .tooltiptext {
      visibility: hidden;
      width: 140px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      bottom: 150%;
      left: 50%;
      margin-left: -75px;
      opacity: 0;
      transition: opacity 0.3s;
    }
    
    .tooltip .tooltiptext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }
    
    .tooltip:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }
</style>
@endsection

@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">
                            ADD NEW PRODUCT
                        </h4>
                        <hr>

                        <form action="/admin/product" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Stock Keeping Unit" id="sku" name="sku">
                                </div>
                            </div>
                            <!--Product Category-->
                            <div class="form-group row">
                                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option>Choose Your Option</option>
                                        @foreach($category as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--Product Sub Category-->
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Sub Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_id" id="sub_category_id">
                                        <option>Choose Your Option</option>
                                        @foreach($sub_category as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"> Sub Category Child</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_slave_category_id" id="sub_slave_category_id">
                                        <option>Choose Your Option</option>
                                        @foreach($sub_slave_category as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="" id="product_title" name="product_title">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" min="0" value="" id="price" name="price">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Thumbnail Image URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="" id="thumbnail_image_url" name="thumbnail_image_url">
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">ADD</button>
                            </div>
                        </form>

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
        document.getElementById("thumbnail_image_url").value = '/storage/'+copied_image_url;
        
        //alert(copied_image_url);
        $temp.remove();
      
    }
</script>

@endsection
