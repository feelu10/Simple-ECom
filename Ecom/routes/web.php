    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\ProductController;

    Route::get('/', function () {
        return view('welcome');
    });


    // Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    // Route::get('/logout', 'AuthController@logout');
    // Route::post('/login', [LoginController::class, 'login'])->name('login');


    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');


    Auth::routes();

// Products Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('products.addToCart');
Route::post('products/add-to-cart/{productId}', [ProductController::class, 'addToCart'])->name('products.addToCart');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout', 'CartController@showCheckout')->name('cart.checkout');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');





// Route::get('/all-products', function () {
//     $products = App\Models\Product::all();
//     return view('all-products', ['products' => $products]);
// })->name('products.all');


// // Routes for adding and removing items from cart
// Route::post('/cart/add', [CartsController::class, 'add'])->name('cart.add');
// Route::post('/cart/remove', [CartsController::class, 'remove'])->name('cart.remove');

// // Route for viewing the cart
// Route::get('/cart', [CartsController::class, 'index'])->name('cart.index');








    