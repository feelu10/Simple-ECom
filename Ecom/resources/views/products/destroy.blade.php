<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Delete Product</title>
    <style>
      /* Basic CSS Styling */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
        background-color: #f5f5f
      }
      form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  
  label {
    display: block;
    margin-bottom: 0.5em;
  }
  
  input[type="text"],
  input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 1em;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  
  button[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 16px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 1em;
  }
  
  button[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>
</head>
  <body>
    <h1>Update Product</h1>
    <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <label for="name">Product Name:</label>
      <input type="text" name="name" id="name" value="{{ $product->name }}" required>
      <label for="description">Product Description:</label>
  <textarea name="description" id="description" rows="5" required>{{ $product->description }}</textarea>
  
  <label for="price">Product Price:</label>
  <input type="number" name="price" id="price" min="0" step="0.01" value="{{ $product->price }}" required>
  
  <button type="submit">Update Product</button>
</form>
</body>
</html>  