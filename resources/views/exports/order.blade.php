<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .details {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .total {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Report</h1>
            <p>Thank you for your purchase!</p>
        </div>

        <div class="details">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Customer:</strong> {{ $order->user->name }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
        </div>

        <h2>Order Items</h2>
        <table>
            <thead>
                <tr>
                    <th>Menu Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->menu->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->menu->price, 2) }}</td>
                        <td>{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total Order Price: {{ number_format($order->total_order_price, 2) }}
        </div>
    </div>
</body>
</html>
