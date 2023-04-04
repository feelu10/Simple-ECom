  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <title>All Products</title>
      <style>
        /* Basic CSS Styling */
        body {
          font-family: Arial, sans-serif;
          font-size: 16px;
          line-height: 1.6;
          background-color: #f5f5f5;
        }
        
        .product-card {
          margin: 10px;
          max-width: 300px;
          background-color: #fff;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .product-card img {
          max-width: 100%;
          height: auto;
        }
        
        .product-card h2 {
          font-size: 20px;
          margin-top: 0;
          margin-bottom: 10px;
        }
        
        .product-card p {
          font-size: 16px;
          margin-top: 0;
          margin-bottom: 10px;
        }
        
        .product-card button {
          background-color: #4CAF50;
          color: #fff;
          padding: 8px 12px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          margin-top: 10px;
        }
        
        .product-card button:hover {
          background-color: #45a049;
        }
        
        .products-container {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
          margin-top: 20px;
        }
        
        h1 {
          text-align: center;
        }
      </style>
    </head>
    <body>
      <h1>All Products</h1>
      <div class="products-container">
      @foreach ($products as $product)

  <div class="product-card">
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <p>Price: {{ $product->price }}</p>
    <form action="{{ route('cart.add') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $product->id }}">
      <button type="submit">Add to Cart</button>
    </form>
  </div>
@endforeach
      </div>
    </body>
  </html>
