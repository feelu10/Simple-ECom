<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <style>
      /* Basic CSS Styling */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
        background-color: #f5f5f5;
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
        display:        block;
        margin-bottom: 10px;
        font-weight: bold;
      }
      
      input[type="text"], textarea {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
      }
      
      button[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }
      
      button[type="submit"]:hover {
        background-color: #45a049;
      }
      
      .error {
        color: red;
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>
  <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
      @csrf
      <h1>Add Product</h1>

      @if ($errors->any())
        <div class="error">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" required>

      <label for="description">Description</label>
      <textarea id="description" name="description" rows="5" required>{{ old('description') }}</textarea>

      <label for="price">Price</label>
      <input type="text" id="price" name="price" value="{{ old('price') }}" required>
      <label for="quantity">Quantity</label>
      <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}">
      <label for="image">image: 
      <input type="file" id="image" name="image" required></label>

      <button type="submit">Add Product</button>
    </form>
  </body>
</html>
