<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: inline-block;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }

        input[type="number"] {
            width: 50px;
            text-align: center;
        }

        .total {
            font-weight: bold;
        }

        .back-link {
            display: block;
            margin-top: 16px;
            
        }
    </style>
</head>
<body>
    @if (count(session('cart', [])))
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach (session('cart') as $itemId => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $itemId) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" style="padding: 0 .3rem; margin-right:2rem;">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>${{ $subtotal }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $itemId) }}" method="POST">
                                @csrf
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td class="total">Total: ${{ $total }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit">Checkout</button>
        </form>
        <a href="/products" class="back-link" style="text-decoration: none;" >&lt;&lt; Back to Products</a>
    @else
        <p>No items in cart.</p>
        <a href="/products" class="back-link" style="text-decoration: none;">&lt;&lt; Back to Products</a>
    @endif
</body>
</html>
