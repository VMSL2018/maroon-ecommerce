@extends('backend.layout.app')


@section('header')
        <!-- Dropzone css -->
        <link href="/admin-asset/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
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
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(isset($success))
                        <div class="alert alert-success">
                            <p>File Uploaded Successfully</p>
                        </div>
                    @endif

                    <h4 class="mt-0 header-title">Upload Media Files</h4>
                    <p>JPEG Images only</p>
                    <form action="/admin/media" class="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="m-b-30">
                            <div class="fallback">
                                <input name="photos[]" type="file" multiple="multiple">
                            </div>
                        </div>
                        <div class="text-center m-t-15">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">UPLOAD</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($images as $image)
                                <!-- Simple card -->
                                <div class="col-md-3 col-lg-6 col-xl-3" style="margin-bottom:5px !important">
                                    <div class="card">
                                        <img class="card-img-top" width="300px !important" height="200px !important" src="{{ $image->image_url }}" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title font-12 mt-0">
                                                {{ $image->image_name }} 
                                                <!-- The text field -->
                                                <input type="hidden" value="{{ $image->image_url }} " id="myInput">
                                                <span>
                                                    <label for="" class="badge badge-info" onclick="myFunction()"> <i class="fa fa-copy"></i> copy</label>        
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- container -->

</div> <!-- Page content Wrapper -->


@endsection


@section('footer')
<!-- Dropzone js -->
<script src="/admin-asset/assets/plugins/dropzone/dist/dropzone.js"></script>

<script type="text/javascript">
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
@endsection