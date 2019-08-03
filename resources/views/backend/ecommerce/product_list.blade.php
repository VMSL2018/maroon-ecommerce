@extends('backend.layout.app')
@section('contents')

<div class="page-content-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="product_list" class="table table-striped dt-responsive nowrap table-vertical table-sm" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Sku</th>
                            <th>Product Name</th>
                            <th>Added Date</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <!--
                            <th>Sold</th>
                            <th>Unsold</th>
                            <th>Total</th>     
                            -->
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $row)
                            <tr>

                                <td class="product-list-img">
                                    <img  src="{{ $row->image_url }}" class="img-fluid" alt="tbl">
                                </td>
                                <td>
                                    {{ $row->sku }}
                                </td>
                                <td>
                                    <!--<h6 class="mt-0 m-b-5">Riverston Glass Chair</h6>-->
                                    <p class="m-0 font-14">{{ $row->product_title }}</p>
                                </td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->discount_price }}</td>
                                <!--
                                <td>5841</td>
                                <td>5841</td>
                                <td>5841</td>
                                -->
                                <td>
                                    <a href="/admin/product/{{ $row->id }}/edit" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="mdi mdi-pencil font-18"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div><!-- container -->

</div> <!-- Page content Wrapper -->


@endsection


@section('footer')

<script type="text/javascript">
    $(document).ready( function () {
        $('#product_list').DataTable();
    });
</script>


@endsection