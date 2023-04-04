<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Show Product</title>
    <style>
      /* Basic CSS Styling */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
        background-color: #f5f5f5;
      }
      
      .product {
        max-width: 500px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      }
      
      label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
      
      input[type="text"],
      textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      
      button[type="submit"] {
        background-color: red;
        color: #fff;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
      button[type="submit"]:hover {
        background-color: #45a049;
      }
      .product a{
        padding: 0 .4rem;
      }
      h1{
        text-align:center;
      }
      a{
        text-decoration:none;

      }
    </style>
  </head>
  <body>
    <div class="product">
      <h1>{{ $product->name }}</h1>
      <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
      <p><strong>Description: </strong>{{ $product->description }}</p>
      <p><strong>Price: </strong>{{ $product->price }}</p>
      <p><strong>Stock: </strong>{{ $product->quantity }}</p>
      <p><strong>Created at: </strong>{{ $product->created_at }}</p>
      <p><strong>Updated at: </strong>{{ $product->updated_at }}</p>
      @if(auth()->user()->email == 'carljamesberdos101998@gmail.com')
      <a href="{{ route('products.edit', $product->id) }}">Edit Product</a>
      <a href="/products">Back to Products</a>
      <form action="{{ route('products.show', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
      @else
      <a href="/products">Back to Products</a>
      @endif
    </div>
  </body>
</html>
