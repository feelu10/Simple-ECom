<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
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
        background-color: #4CAF50;
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
    </style>
  </head>
  <body>
    <div class="product">
      <h1>Edit Product</h1>
      <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $product->name }}">
        
        <label for="description">Description</label>
        <textarea name="description" required>{{ $product->description }}</textarea>
        
        <label for="price">Price</label>
        <input type="text" id="price" name="price" value="{{ old('price') }}" required>
        
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" value="{{ $product->quantity ?? old('quantity') }}" min="0">


        <label for="image">Image</label>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Update Product</button>
      </form>
      <a href="{{ route('products.show', $product->id) }}">Cancel</a>
    </div>
  </body>
</html>
