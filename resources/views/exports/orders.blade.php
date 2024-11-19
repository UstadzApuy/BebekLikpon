<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Report</title>
    <style>
        /* Add basic styling for PDF here */
    </style>
</head>
<body>
    <h1>Order Report</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Items</th>
                <th>Total Order Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        @foreach ($order->items as $item)
                            {{ $item->menu->title }} ({{ $item->quantity }} x {{ $item->menu->price }}) = {{ $item->total_price }}<br>
                        @endforeach
                    </td>
                    <td>{{ $order->total_order_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
