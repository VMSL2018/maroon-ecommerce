@extends('backend.layout.app')
@section('contents')

<div class="page-content-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Fill Variation Informations</h4>
                    <hr>
                    <form action="/admin/productvariation" method="POST">
                        @csrf
                        <input type="hidden" name="products_id" value="{{ $product_id }}"/>
                        @for($i=0;$i<$num_of_product_variation;$i++)
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <select class="form-control" name="product_color[]" id="prooduct_color" required>
                                        <option value="">Choose Your Color</option>
                                        @foreach($colors as $row)
                                            <option value="{{ $row['id'] }}">{{ $row['color_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Size</label>
                                    <select class="form-control" name="product_size[]" id="product_size" required>
                                        <option value="">Choose Your Color</option>
                                        @foreach($sizes as $row)
                                            <option value="{{ $row['id'] }}">{{ $row['size_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input  type="number" min="0" class="form-control" id="product_quantity" name="product_quantity[]" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="image_url">Image URL</label>
                                    <input  type="text" min="0" class="form-control" id="image_url" name="image_url" required>
                                </div>
                            </div>
                            
                        </div>
                        @endfor

                        <div class="row">

                        </div>
                        <hr>

                        <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                        <button type="" class="btn btn-secondary waves-effect">Cancel</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div><!-- container -->

</div> <!-- Page content Wrapper -->


@endsection


@section('footer')

@endsection