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
        display: block;
        margin-bottom: 0.5rem;
      }
      
      input[type="text"], textarea {
        width: 100%;
        padding: 0.5rem;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      
      input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <form method="POST" action="{{ route('products.store') }}">
      @csrf
      <label for="name">Name:</label>
      <input type="text" id="name" name="name">
      <label for="description">Description:</label>
      <textarea id="description" name="description"></textarea>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
