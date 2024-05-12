<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//Login Admin
$route['admin/login']['GET'] = 'LoginAdminController/index';
$route['admin/logout']['GET'] = 'LoginAdminController/logout';
$route['admin/login-user']['POST'] = 'LoginAdminController/login';
//DashBoard
$route['dashboard']['GET'] = 'DashBoardController/index';
//Brand
$route['brand/add']['GET'] = 'BrandController/addbrand';
$route['brand/store']['POST'] = 'BrandController/store';
$route['brand/list']['GET'] = 'BrandController/index';
$route['brand/edit/(:any)']['GET'] = 'BrandController/edit/$1';
$route['brand/delete/(:any)']['GET'] = 'BrandController/delete/$1';
$route['brand/update/(:any)']['POST'] = 'BrandController/update/$1';
//Categories
$route['categories/add']['GET'] = 'CategoriesController/addcategories';
$route['categories/store']['POST'] = 'CategoriesController/store';
$route['categories/list']['GET'] = 'CategoriesController/index';
$route['categories/delete/(:any)']['GET'] = 'CategoriesController/delete/$1';
$route['categories/edit/(:any)']['GET'] = 'CategoriesController/edit/$1';
$route['categories/update/(:any)']['POST'] = 'CategoriesController/update/$1';
//Product
$route['product/add']['GET'] = 'ProductController/addproduct';
$route['product/store']['POST'] = 'ProductController/store';
$route['product/list']['GET'] = 'ProductController/index';
$route['product/delete/(:any)']['GET'] = 'ProductController/delete/$1';
$route['product/edit/(:any)']['GET'] = 'ProductController/edit/$1';
$route['product/update/(:any)']['POST'] = 'ProductController/update/$1';
//Index
$route['danh-muc/(:any)']['GET'] = 'IndexController/categories/$1';
$route['thuong-hieu/(:any)']['GET'] = 'IndexController/brands/$1';
$route['san-pham/(:any)']['GET'] = 'IndexController/product/$1';
$route['gio-hang']['GET'] = 'IndexController/cart';
$route['gio-hang-emty']['GET'] = 'IndexController/cartEmty';
$route['add-to-cart']['POST'] = 'IndexController/addtocart';
$route['delete-cart']['POST'] = 'IndexController/deleteCart';
$route['delete-all']['GET'] = 'IndexController/deleteall';
$route['updateCart']['POST'] = 'IndexController/updateCart';
$route['login']['GET'] = 'IndexController/login';
$route['logout']['GET'] = 'IndexController/logout';
$route['login-customer']['POST'] = 'IndexController/logincustomer';
$route['add-to-cart-checkout']['POST'] = 'IndexController/addtocartCheckout';
$route['register']['GET'] = 'IndexController/register';
$route['checkout']['GET'] = 'IndexController/checkout';
$route['confirmcheckout']['POST'] = 'IndexController/confirmcheckout';
$route['checkout-online']['POST'] = 'OnlineCheckout/onlineCheckout';
$route['forgot-password']['POST'] = 'IndexController/forgotPassword';
$route['checksale']['GET'] = 'IndexController/checksale';
$route['unsetsession']['POST'] = 'IndexController/unsetsession';
$route['thanks']['GET'] = 'IndexController/thanks';
$route['timkiem']['GET'] = 'IndexController/timkiem';
$route['test-mail']['GET'] = 'IndexController/sendemail';
$route['24-cong-nghe']['GET'] = 'IndexController/technology';
$route['chi-tiet-don-hang/(:any)']['GET'] = 'IndexController/historyDetails/$1';
$route['su-kien']['GET'] = 'IndexController/event';
$route['account']['GET'] = 'IndexController/account';
$route['notification']['GET'] = 'APIController/notification';
$route['he-thong-chi-nhanh']['GET'] = 'IndexController/branchsystem';
$route['changeFillter/(:any)']['GET'] = 'IndexController/changeFillter/$1';
//Orders
$route['order/list']['GET'] = 'OrderController/index';
$route['order/process']['POST'] = 'OrderController/process';
$route['order/view/(:any)']['GET'] = 'OrderController/view/$1';
$route['order/delete/(:any)']['GET'] = 'OrderController/delete/$1';
//Onlin checkout
$route['online-checkout']['POST'] = 'OnlineCheckoutController/onlinecheckout';
//404
$route['404_override'] = 'ErrorsController/show_404';
//Slider
$route['slider/add']['GET'] = 'SliderController/slideradd';
$route['slider/store']['POST'] = 'SliderController/sliderstore';
$route['menucon']['GET'] = 'IndexController/menu';
//API
$route['get-api']['GET'] = 'APIController/index';
//Facebook
$route['loginfacebook']['GET'] = 'LoginFacebookController/index';
$route['login/facebook']['GET'] = 'LoginFacebookController/login';
$route['deletefblink']['GET'] = 'LoginFacebookController/deletefblink';
$route['deletefb']['POST'] = 'LoginFacebookController/deletefb';
$route['private']['GET'] = 'LoginFacebookController/private';




