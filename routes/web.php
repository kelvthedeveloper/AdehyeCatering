<?php
// Public routes
$router->get('/', 'PagesController@home');
$router->get('/about', 'PagesController@about');
$router->get('/contact', 'PagesController@contact');
$router->post('/contact', 'PagesController@contactSubmit');
$router->get('/menu', 'FoodController@menu');
$router->get('/menu/search', 'FoodController@search');
$router->get('/menu/category/(\d+)', 'FoodController@category');

// Auth routes
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@registerSubmit');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@loginSubmit');
$router->get('/logout', 'AuthController@logout');

// Customer routes (protected)
$router->get('/customer/dashboard', 'CustomerController@dashboard');
$router->get('/customer/cart', 'CartController@index');
$router->post('/cart/add', 'CartController@add');
$router->post('/cart/update', 'CartController@update');
$router->post('/cart/remove', 'CartController@remove');
$router->get('/checkout', 'CheckoutController@index');
$router->post('/checkout', 'CheckoutController@process');
$router->get('/customer/orders', 'CustomerController@orders');
$router->get('/customer/bookings', 'CustomerController@bookings');
$router->get('/customer/book', 'BookingController@create');
$router->post('/customer/book', 'BookingController@store');

// Admin routes (protected)
$router->get('/admin/dashboard', 'AdminController@dashboard');
$router->get('/admin/foods', 'AdminFoodController@index');
$router->get('/admin/foods/create', 'AdminFoodController@create');
$router->post('/admin/foods', 'AdminFoodController@store');
$router->get('/admin/foods/(\d+)/edit', 'AdminFoodController@edit');
$router->post('/admin/foods/(\d+)', 'AdminFoodController@update');
$router->post('/admin/foods/(\d+)/delete', 'AdminFoodController@delete');
$router->get('/admin/categories', 'AdminCategoryController@index');
$router->get('/admin/categories/create', 'AdminCategoryController@create');
$router->post('/admin/categories', 'AdminCategoryController@store');
$router->get('/admin/categories/(\d+)/edit', 'AdminCategoryController@edit');
$router->post('/admin/categories/(\d+)', 'AdminCategoryController@update');
$router->post('/admin/categories/(\d+)/delete', 'AdminCategoryController@delete');
$router->get('/admin/orders', 'AdminOrderController@index');
$router->get('/admin/orders/(\d+)', 'AdminOrderController@show');
$router->post('/admin/orders/(\d+)/status', 'AdminOrderController@updateStatus');
$router->get('/admin/bookings', 'AdminBookingController@index');
$router->get('/admin/bookings/(\d+)', 'AdminBookingController@show');
$router->post('/admin/bookings/(\d+)/status', 'AdminBookingController@updateStatus');
$router->get('/admin/users', 'AdminUserController@index');
$router->get('/admin/reports', 'AdminReportController@index');
