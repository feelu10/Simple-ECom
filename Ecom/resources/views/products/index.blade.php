<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
      /* Basic CSS Styling */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
        background-color: #f5f5f5;
      }
      
      table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
      }
      
      th, td {
        text-align: left;
        padding: 10px;
        border-bottom: 1px solid #ddd;
      }
      
      th {
        background-color: #eee;
      }
      
      tr:hover {
        background-color: #f5f5f5;
      }
      
      a.button {
        display: inline-block;
        margin: 10px 0;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      }
      
      a.button:hover {
        background-color: #0069d9;
      }

      .container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 15px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -15px;
}

.col-md-4 {
  flex: 0 0 33.33333%;
  max-width: 33.33333%;
  padding: 0 15px;
  margin-bottom: 30px;
}

.card {
  transition: all 0.3s ease;
  border-radius: 0.5rem;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}

.card-img-top {
  height: 200px;
  object-fit: cover;
  border-radius: 0.5rem 0.5rem 0 0;
}

.card-body {
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.75rem;
  font-size: 1.25rem;
  font-weight: bold;
}

.card-text {
  margin-bottom: 1rem;
  font-size: 1rem;
  height: 50px;
  overflow: hidden;
  text-overflow: ellipsis;
  color: #777;
}

.card-text::before {
  content: "";
  display: inline-block;
  width: 1em;
  height: 1em;
  margin-right: 0.3em;
  vertical-align: -0.2em;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%234b5563' d='M8 12a4 4 0 110-8 4 4 0 010 8zm0-1.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm0-6.5a2 2 0 11-.001 4.001A2 2 0 018 4.5z'/%3E%3Cpath fill='%23fff' d='M8 14a6 6 0 110-12 6 6 0 010 12zm0-1.5a4.5 4.5 0 100-9 4.5 4.5 0 000 9z'/%3E%3C/svg%3E");
}

.card-text::after {
content: "";
display: inline-block;
width: 1em;
height: 1em;
margin-left: 0.3em;
vertical-align: -0.2em;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%234b5563' d='M8 12a4 4 0 110-8 4 4 0 010 8zm0-1.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm0-6.5a2 2 0 11-.001 4.001A2 2 0 018 4.5z'/%3E%3Cpath fill='%23fff' d='M8 14a6 6 0 110-12 6 6 0 010 12zm0-1.5a4.5 4.5 0 100-9 4.5 4.5 0 000 9z'/%3E%3C/svg%3E");
}
.card-link {
display: block;
margin-top: auto;
color: #007bff;
font-weight: bold;
}

.card-link:hover {
color: #0056b3;
text-decoration: none;
}

@media (max-width: 991.98px) {
.col-md-4 {
flex: 0 0 50%;
max-width: 50%;
}
}

@media (max-width: 767.98px) {
.col-md-4 {
flex: 0 0 100%;
max-width: 100%;
}
}
    </style>
  </head>
  <body>
  @if(auth()->user()->email == 'carljamesberdos101998@gmail.com')
    <div class="container">
      <h1>Admin Side/Product List</h1>
      <a href="{{ route('products.create') }}" class="button">Add Product</a>
      <form method="POST" action="{{ route('logout') }}" >
                            @csrf
                            <button type="submit"style="background-color:lightblue; padding: 0 .5rem; border-radius: 12%">Logout</button>
                    </form>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Images</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->description }}</td>
              <td>$ {{ $product->price }}</td>
              <td>{{ $product->quantity }}</td>
              <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100"></td>
              <td>
                <a href="{{ route('products.show', $product->id) }}" style="background-color:#45a049;text-decoration:none; padding: 0 .5rem; border-radius: 12%">View</a>
                <a href="{{ route('products.edit', $product->id) }}" style="background-color:gray;text-decoration:none; padding: 0 .5rem; border-radius: 12%">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color:red;text-decoration:none; padding: 0 .5rem; border-radius: 12%">Delete</button>
                </form>

              </td>
            </tr>
          @endforeach
        </tbody>
        @else
        <form method="POST" action="{{ route('logout') }}">
              @csrf
          <button type="submit" style="background-color:lightblue; padding: 0 .5rem; border-radius: 12%; margin-bottom:1rem;">Logout</button>
        </form>
                    <a href="{{ route('cart.index') }}" style="text-decoration:none; margin-top:2rem;">View Cart</a>
        <div class="container">
          <h1 style="text-align:center; font-size:45px"> Products </h1>
  <div class="row">
    @foreach ($products as $product)
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <a href="{{ route('products.show', $product->id) }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="width:100%; padding-bottom:2re">
          </a>
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">{{ $product->name }}</a>
            </h5>
            <p class="card-text"><strong>Description: </strong>{{ $product->description }}</p>
            <p class="card-text font-weight-bold text-primary" ><strong>Price: </strong>${{ $product->price }}</p>
            <form action="{{ route('products.addToCart', $product->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

    @endif
  </body>
</html>


