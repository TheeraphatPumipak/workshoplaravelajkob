<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackOfficeController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController ;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Routing\RouteRegistrar;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    $title = 'About';
    return view('about', compact('title'));
});
route::get('/contact', function () {
    $name = 'Contact';
    $age = 20;
    $salary = 1000;
    return view('contact', compact('name', 'age', 'salary'));
});
route::get('/profile', function () {

    return view('profile', ['name' => 'Kob', 'age' => 40]);
});
route::get('/params/{name}/{age}/{salary}', function ($name, $age, $salary) {
    return view('params', compact('name', 'age', 'salary'));
});
route::get('/post', function () {
    return view('post');
});
route::post('/post', function (Request $request) {
    $name = $request->name;
    return json_encode(['name' => $name]);
});
route::get('/home', function () {
    return view('home');
});
//http response
route::get('/product', function () {
    $product = [
        ['id' => 1, 'name' => 'Product 1', 'price' => 100],
        ['id' => 2, 'name' => 'Product 2', 'price' => 200],
        ['id' => 3, 'name' => 'Product 3', 'price' => 300]
    ];
    return response()->json(['product' => $product]);
});
//response type
route::get('/response-type', function () {
    return response('Unauthorized', 401);
});
//response redirect
route::get('/redirect', function () {
    return redirect('/target');
});
route::get('/target', function () {
    return response()->json(['message' => 'Target']);
});
// route with controller customer
$customerController = customercontroller::class;
route::get('/customers', [$customerController, 'List']);
route::get('/customers/{id}', [$customerController, 'detail']);
route::post('/customers', [$customerController, 'create']);
route::put('/customers/{id}', [$customerController, 'update']);
route::delete('/customers/{id}', [$customerController, 'delete']);
//route with controller user
$usercontroller = UserController::class;
route::get('/users', [$usercontroller, 'list']);

route::get('/users/list', [$usercontroller, 'list']);
route::get('/users/form', [$usercontroller, 'form']);
route::post('/users', [$usercontroller, 'create']);
route::get('/users/{id}', [$usercontroller, 'edit']);
route::put('/users/{id}', [$usercontroller, 'update']);
route::delete('/users/remove/{id}', [$usercontroller, 'remove']);

//usser sign in
route::get('/user/signIn', [$usercontroller, 'signIn']);
route::get('/user/signInProcess', [$usercontroller, 'signInProcess']);
route::get('/user/signOut', [$usercontroller, 'signOut'])->middleware(EnsureTokenIsValid::class);
route::get('/user/info', [$usercontroller, 'info'])->middleware(EnsureTokenIsValid::class);

route::get('/backoffice', [BackOfficeController::class, 'index'])->middleware(EnsureTokenIsValid::class);

route::get('/product-type-list', [ProductController::class, 'productTypeList']);
route::get('/list-by-product-type/{productTypeId}', [ProductController::class, 'listByProductType']);
route::get('/product/list', [ProductController::class, 'list']);
route::post('/product', [ProductController::class, 'save']);
route::get('/product/max-min-count-avg', [ProductController::class, 'priceMaxMinCountAvg']);
route::get('/product/form', [ProductController::class, 'form']);
route::get('/product/price-More-Than', [ProductController::class, 'priceMoreThan']);
Route::get('/product-price-less-than', [ProductController::class, 'priceLessThan']);
Route::get('/product-price-between', [ProductController::class, 'priceBetween']);
Route::get('/product-price-not-between', [ProductController::class, 'priceNotBetween']);
route::get('/product/{id}', [ProductController::class, 'edit']);
route::put('/product/{id}', [ProductController::class, 'update']);
route::get('/product/remove/{id}', [ProductController::class, 'remove']);
route::post('/product/search', [ProductController::class, 'search']);

route::get('/product-type/list',[ProductTypeController::class,'index']);