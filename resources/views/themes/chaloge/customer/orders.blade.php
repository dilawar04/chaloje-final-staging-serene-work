@php
$orders = \App\Order::where(['customer_id' => \Auth::id()])
->join('order_details', 'order_details.order_id', '=', 'orders.id')
->join('project_properties', 'project_properties.id', '=', 'order_details.property_id')
->join('project_blocks', 'project_blocks.id', '=', 'project_properties.block_id')
->get(['orders.id', 'orders.created_at', 'project_blocks.title as block', 'project_properties.plot', 'orders.payment_status', 'orders.status']);
@endphp

@if(count($orders) > 0)
<h4>Order Detail</h4>
<div class="table-responsive table-data">
    <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            <th>Invoice #</th>
            <th>Booking Date</th>
            <th>Block #</th>
            <th>Plot #</th>
            <th>Booking Status</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>#{{$order->id}}</td>
            <td>{{\Carbon\Carbon::parse($order->created_at)->format('F d, Y')}}</td>
            <td>Block {{ $order->block }}</td>
            <td>Plot #{{ $order->plot }}</td>
            <td><div class="badge badge-success">{{ $order->status }}</div></td>
            <td><div class="badge badge-danger">{{ $order->payment_status }}</div></td>
            <td><a href="javascript:">Download Invoice</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
