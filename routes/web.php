<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Registration & Login Route
Route::post('/app/registration', "UserController@registration");
Route::post('/app/login', "UserController@login");
// Products Route
Route::post('/app/add_product', "ProductController@storeProduct");
Route::post('/app/edit_product', "ProductController@updateProduct");
Route::post('/app/delete_product', "ProductController@delete_Product");
Route::get('/app/all_product', "ProductController@all_product");
//Route::get('/app/product/{id}', "ProductController@show_product");
Route::get('/app/product/{id}', "ProductController@show_product_long");
Route::get('/app/test', "ProductController@test");

// Category Route
Route::post('/app/add_category', "CategoryController@storeCategory");
Route::post('/app/edit_category', "CategoryController@updateCategory");
Route::post('/app/delete_category', "CategoryController@deleteCategory");
Route::get('/app/all_category', "CategoryController@allCategory");
Route::get('/app/all_category/{id}', "ProductController@all_product_groupedbycategory");
Route::get('/app/all_tag/{id}', "TagController@all_product_groupedbytag");

//Tag routes
Route::post('/app/add_tag', "TagController@storeTag");
Route::post('/app/edit_tag', "TagController@updateTag");
Route::post('/app/delete_tag', "TagController@deleteTag");
Route::get('/app/all_tag', "TagController@allTag");
//add review
Route::post('/app/add_review', "ProductController@add_review");
Route::post('/app/edit_review', "ProductController@update_review");
Route::post('/app/delete_review', "ProductController@delete_review");
//crud review and rating
Route::post('/app/add_review_rating', "ProductController@add_review_rating");
Route::post('/app/edit_review_rating', "ProductController@update_review_rating");
Route::post('/app/delete_review_rating', "ProductController@delete_review_rating");
//reaction routes
Route::post('/app/add_reaction', "ReactionController@add_reaction");

//logout
Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    return redirect("/");
});



Route::any('{slug}', 'HomeController@home')->where('slug', '([A-z\d-\/_.]+)?');