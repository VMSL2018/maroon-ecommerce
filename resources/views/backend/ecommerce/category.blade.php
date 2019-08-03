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
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">
                            Product Category
                            <span class="badge badge-success onmousehover float_content_right" data-toggle="modal" data-target=".category-model" onclick="" >
                                Add New
                            </span> 
                        </h4>
                        
                        @if(isset($category_success))
                            <p class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </p>
                        @endif
                        
                        <!--MODAL FORM for CATEGORY-->
                        
                            <!--  Modal content for the above example -->
                            <div class="modal fade category-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/category" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" class="form-control" name="category_name" value="">
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-success" type="submit">ADD</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        
                        <!---->
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $category as $row )
                                <tr>
                                    <th scope="row">{{ $row['id'] }}</th>
                                    <th >{{ $row['name'] }}</th>
                                    <th>
                                        <span class="badge badge-success onmousehover" onclick="" >EDIT</span>
                                        <span class="badge badge-danger onmousehover" onclick="" >DISABLE</span>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
            
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">
                            Product Sub-Category 
                            <span class="badge badge-success onmousehover float_content_right" data-toggle="modal" data-target=".sub_category-model" onclick="">
                                Add New
                            </span>  
                        </h4>
                        @if(isset($sub_success))
                            <p class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </p>
                        @endif
                        <!--MODAL FORM for SUB CATEGORY-->
                            <!--  Modal content for the above example -->
                            <div class="modal fade sub_category-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Sub Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/sub_category" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Sub Category Name</label>
                                                    <input type="text" class="colorpicker-default form-control" name="sub_category_name" id="sub_category_name" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <select class="form-control" name="category_id" id="category_id">
                                                        @foreach( $category as $row )
                                                            <option value="{{ $row->id }} ">
                                                                {{ $row->name }} 
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                    
                                                <div class="form-group text-center">
                                                    <button class="btn btn-success" type="submit" >ADD</button>
                                                </div>
                    
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        <!---->
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub Category</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $sub_category as $row )
                                <tr>
                                    <th scope="row">{{ $row['id'] }}        </th>
                                    <th>    {{ $row->name }}                </th>
                                    <th>    {{ $row->categories->name }}    </th>
                                    <th>
                                        <span class="badge badge-success onmousehover" onclick="" >EDIT</span>
                                        <span class="badge badge-danger onmousehover" onclick="" >DISABLE</span>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
            
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">
                            Product Sub-Category Child 
                            <span class="badge badge-success onmousehover float_content_right" data-toggle="modal" data-target=".sub_slave_category-model" onclick="" >
                                Add New
                            </span> 
                        </h4>
                        @if(isset($sub_slave_success))
                            <p class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </p>
                        @endif
                        <!--MODAL FORM for SubCATEGORY Slave-->
                            <!--  Modal content for the above example -->
                            <div class="modal fade sub_slave_category-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Sub Category Child</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/sub_slave_category" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Sub Category Child</label>
                                                    <input type="text" class="colorpicker-default form-control" name="sub_slave_category_name" id="sub_slave_category_name" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub Category Name</label>
                                                    <select class="form-control" name="sub_category_id" id="">
                                                        @foreach( $sub_category as $row )
                                                            <option value="{{ $row->id }} ">
                                                                {{ $row->name }} 
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group text-center">
                                                    <button class="btn btn-success">ADD</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        <!---->
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub Slave</th>
                                    <th>Sub Category</th>
                                    <th>Category </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $sub_slave_category as $row )
                                <tr>
                                    <th scope="row">{!! $row['id'] !!}</th>
                                    <th>    {!! $row['name'] !!}</th>
                                    <th>    {!! $row->sub_categories->name!!}</th>
                                    <th>
                                        <span class="badge badge-success onmousehover" onclick="" >EDIT</span>
                                        <span class="badge badge-danger onmousehover" onclick="" >DISABLE</span>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->

</div> <!-- Page content Wrapper -->


@endsection

@section('footer')

<!--AJAX REQUESTs-->

    <!--Category-->
        <script type="text/javascript">
            //  function category(){
            //    alert('category');
            //}
        </script>

    
    <!--SubCategory-->
        <script type="text/javascript">
            function sub_category(){
                alert('sub_category');
            }
        </script>
    
    <!--Sub Category Slave-->
        <script type="text/javascript">
            function sub_slave_category(){
                alert('sub_slave_category');
            }
        </script>
<!-- Alertify js -->
<script src="assets/plugins/alertify/js/alertify.js"></script>
<script src="assets/pages/alertify-init.js"></script>

@endsection
