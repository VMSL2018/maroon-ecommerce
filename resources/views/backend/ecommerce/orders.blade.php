@extends('backend.layout.app')

@section('header')
<style type="text/css">
    .dataTables_filter {
        width: 50%;
        float: right !important;
        text-align: right;
        margin-left:500px;
    }
</style>
@endsection


@section('contents')

<div class="page-content-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="order_table" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Sub Total</th>
                                <th>Shipping</th>
                                <th>Total</th>
                                <th>Payment method</th>
                                <th>Order Status</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{!! $order->invoices_id !!}</td>
                                <td>{!! $order->sub_total !!}</td>
                                <td>{!! $order->shipping !!}</td>
                                <td>{!! $order->order_total !!}</td>
                                <td>{!! $order->payment_method !!}</td>
                                <td>{!! $order->order_status !!}</td>
                                <td>{!! $order->updated_at !!}</td>
                                <td><a href=""><label for="" class="badge badge-info">GO</label></a></td>
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
    $(document).ready(function () {
        $('#order_table').DataTable();
    });
</script>
@endsection