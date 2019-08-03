@extends('backend.layout.app')
@section('contents')

<div class="page-content-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Basic Information</h4>
                    <p class="text-muted m-b-30 font-14">Fill all information below</p>
                    <p>Product SKU : {{ $product_infos[0]->sku }}</p>

                    <form method="POST" action="/admin/product/description">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $id }}"/>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="productdesc">Product Description</label>
                                    <textarea id="elm1" name="product_description">{{ $product_infos[0]->product_description  }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                    </form>

                </div>
            </div>
            

            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Product Variations - {{ $id}}</h4>
                    
                    <table class="table table-striped dt-responsive nowrap table-vertical table-sm" width="100%" cellspacing="0"
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_variations as $row)
                            <tr>

                                <td class="product-list-img">
                                    <img src="{{ $row->image_url }}" class="img-fluid" alt="tbl">
                                </td>
                                <td>
                                    {{ $row->colors_id }}
                                </td>
                                <td>
                                    {{ $row->sizes_id }}
                                </td>
                                <td>
                                    {{ $row['quantity'] }}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="mdi mdi-pencil font-18"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        
                    <hr>
                    <form action="/admin/productvariation">
                        
                        <div class="form-group row">
                            <label for="">How Many Product Variations</label>
                            <input type="text" class="form-control" name="num_of_product_variation"/>
                            
                            @php $product_id = $id @endphp
                            <input type="hidden" name="product_id" value=" @php echo $product_id @endphp"/>
                            
                        </div>
                        <button class="btn btn-purple" type="submit">Add New Variations</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div><!-- container -->

</div> <!-- Page content Wrapper -->


@endsection


@section('footer')
    <script>
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>
@endsection