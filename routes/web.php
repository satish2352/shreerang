<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('admin.login');
});


Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('clear-compiled');
    return 'Cache cleared'; // You can return any response you want here
});

Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\LoginController@index']);
Route::post('/submitLogin', ['as' => 'submitLogin', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\LoginController@submitLogin']);
Route::get('/register', ['as' => 'register', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@index']);

Route::group(['middleware' => ['admin']], function () {

    Route::get('/dashboard', ['as' => '/dashboard', 'uses' => 'App\Http\Controllers\Admin\Dashboard\DashboardController@index']);
    Route::get('/forms', ['as' => 'forms', 'uses' => 'App\Http\Controllers\Admin\Forms\FormsController@index']);
    Route::get('/admin-log-out', ['as' => 'log-out', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\LoginController@logout']);


    Route::get('/list-organizations', ['as' => 'list-organizations', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@index']);
    Route::get('/add-organizations', ['as' => 'add-organizations', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@add']);
    Route::post('/store-organizations', ['as' => 'store-organizations', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@store']);
    Route::get('/edit-organizations/{id}', ['as' => 'edit-organizations', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@edit']);
    Route::post('/update-organizations', ['as' => 'update-organizations', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@update']);
    Route::any('/delete-organizations/{id}', ['as' => 'delete-organizations', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@destroy']);
    Route::get('/organization-details/{id}', ['as' => 'organization-details', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@details']);
    Route::get('/filter-employees/{id}', ['as' => 'filter-employees', 'uses' => 'App\Http\Controllers\Admin\Organization\OrganizationController@filterEmployees']);


    Route::get('/list-employees', ['as' => 'list-employees', 'uses' => 'App\Http\Controllers\Admin\Employees\EmployeesController@index']);
    Route::get('/add-employees', ['as' => 'add-employees', 'uses' => 'App\Http\Controllers\Admin\Employees\EmployeesController@add']);
    Route::post('/store-employees', ['as' => 'store-employees', 'uses' => 'App\Http\Controllers\Admin\Employees\EmployeesController@store']);
    Route::get('/edit-employees/{emp_id}', ['as' => 'edit-employees', 'uses' => 'App\Http\Controllers\Admin\Employees\EmployeesController@edit']);
    Route::post('/update-employees', ['as' => 'update-employees', 'uses' => 'App\Http\Controllers\Admin\Employees\EmployeesController@update']);
    Route::any('/delete-employees/{emp_id}', ['as' => 'delete-employees', 'uses' => 'App\Http\Controllers\Admin\Employees\EmployeesController@destroy']);

    Route::any('/list-departments', ['as' => 'list-departments', 'uses' => 'App\Http\Controllers\Admin\Departments\DepartmentController@index']);
    Route::any('/add-departments', ['as' => 'add-departments', 'uses' => 'App\Http\Controllers\Admin\Departments\DepartmentController@add']);
    Route::any('/store-departments', ['as' => 'store-departments', 'uses' => 'App\Http\Controllers\Admin\Departments\DepartmentController@store']);
    Route::any('/edit-departments/{id}', ['as' => 'edit-departments', 'uses' => 'App\Http\Controllers\Admin\Departments\DepartmentController@edit']);
    Route::any('/update-departments', ['as' => 'update-departments', 'uses' => 'App\Http\Controllers\Admin\Departments\DepartmentController@update']);
    Route::any('/delete-departments/{id}', ['as' => 'delete-departments', 'uses' => 'App\Http\Controllers\Admin\Departments\DepartmentController@destroy']);

    Route::any('/list-roles', ['as' => 'list-roles', 'uses' => 'App\Http\Controllers\Admin\Roles\RolesController@index']);
    Route::any('/add-roles', ['as' => 'add-roles', 'uses' => 'App\Http\Controllers\Admin\Roles\RolesController@add']);
    Route::any('/store-roles', ['as' => 'store-roles', 'uses' => 'App\Http\Controllers\Admin\Roles\RolesController@store']);
    Route::any('/edit-roles/{id}', ['as' => 'edit-roles', 'uses' => 'App\Http\Controllers\Admin\Roles\RolesController@edit']);
    Route::any('/update-roles', ['as' => 'update-roles', 'uses' => 'App\Http\Controllers\Admin\Roles\RolesController@update']);
    Route::any('/delete-roles/{id}', ['as' => 'delete-roles', 'uses' => 'App\Http\Controllers\Admin\Roles\RolesController@destroy']);

    // Organization admin
    Route::get('/admin-dashboard', ['as' => '/admin-dashboard', 'uses' => 'App\Http\Controllers\Organizations\Dashboard\DashboardController@index']);
    Route::get('/organizations-list-employees', ['as' => 'organizations-list-employees', 'uses' => 'App\Http\Controllers\Organizations\Employees\EmployeesController@index']);
    Route::get('/organizations-add-employees', ['as' => 'organizations-add-employees', 'uses' => 'App\Http\Controllers\Organizations\Employees\EmployeesController@add']);
    Route::post('/organizations-store-employees', ['as' => 'organizations-store-employees', 'uses' => 'App\Http\Controllers\Organizations\Employees\EmployeesController@store']);
    Route::get('/organizations-edit-employees/{id}', ['as' => 'organizations-edit-employees', 'uses' => 'App\Http\Controllers\Organizations\Employees\EmployeesController@edit']);
    Route::post('/organizations-update-employees', ['as' => 'organizations-update-employees', 'uses' => 'App\Http\Controllers\Organizations\Employees\EmployeesController@update']);
    Route::any('/organizations-delete-employees/{id}', ['as' => 'organizations-delete-employees', 'uses' => 'App\Http\Controllers\Organizations\Employees\EmployeesController@destroy']);
    Route::post('/check-email-availability', ['as' => 'check-email-availability', 'uses' => 'App\Http\Controllers\Organizations\Employees\EmployeesController@checkEmailAvailability']);

    //Organizations HR
    Route::get('/hr-dashboard', ['as' => '/hr-dashboard', 'uses' => 'App\Http\Controllers\Organizations\Dashboard\DashboardController@index']);
    Route::get('/hr-list-employees', ['as' => 'hr-list-employees', 'uses' => 'App\Http\Controllers\Organizations\HR\Employees\EmployeesHrController@index']);
    Route::get('/hr-add-employees', ['as' => 'hr-add-employees', 'uses' => 'App\Http\Controllers\Organizations\HR\Employees\EmployeesHrController@add']);
    Route::post('/hr-store-employees', ['as' => 'hr-store-employees', 'uses' => 'App\Http\Controllers\Organizations\HR\Employees\EmployeesHrController@store']);
    Route::get('/hr-edit-employees/{id}', ['as' => 'hr-edit-employees', 'uses' => 'App\Http\Controllers\Organizations\HR\Employees\EmployeesHrController@edit']);
    Route::post('/hr-update-employees', ['as' => 'hr-update-employees', 'uses' => 'App\Http\Controllers\Organizations\HR\Employees\EmployeesHrController@update']);
    Route::any('/hr-delete-employees/{id}', ['as' => 'hr-delete-employees', 'uses' => 'App\Http\Controllers\Organizations\HR\Employees\EmployeesHrController@destroy']);

    //Organizations Designer
    Route::get('/designer-dashboard', ['as' => '/designer-dashboard', 'uses' => 'App\Http\Controllers\Organizations\Dashboard\DashboardController@index']);
    Route::get('/list-designs', ['as' => 'list-designs', 'uses' => 'App\Http\Controllers\Organizations\Designers\Designs\DesignerController@index']);
    Route::get('/add-designs', ['as' => 'add-designs', 'uses' => 'App\Http\Controllers\Organizations\Designers\Designs\DesignerController@add']);
    Route::post('/store-designs', ['as' => 'store-designs', 'uses' => 'App\Http\Controllers\Organizations\Designers\Designs\DesignerController@store']);
    Route::get('/edit-designs/{id}', ['as' => 'edit-designs', 'uses' => 'App\Http\Controllers\Organizations\Designers\Designs\DesignerController@edit']);
    Route::post('/update-designs', ['as' => 'update-designs', 'uses' => 'App\Http\Controllers\Organizations\Designers\Designs\DesignerController@update']);
    Route::any('/delete-designs/{id}', ['as' => 'delete-designs', 'uses' => 'App\Http\Controllers\Organizations\Designers\Designs\DesignerController@destroy']);

    //Organizations Production
    Route::get('/production-dashboard', ['as' => '/production-dashboard', 'uses' => 'App\Http\Controllers\Organizations\Dashboard\DashboardController@index']);
    Route::get('/list-products', ['as' => 'list-products', 'uses' => 'App\Http\Controllers\Organizations\Productions\ProductionController@index']);
    Route::get('/add-products', ['as' => 'add-products', 'uses' => 'App\Http\Controllers\Organizations\Productions\ProductionController@add']);
    Route::post('/store-products', ['as' => 'store-products', 'uses' => 'App\Http\Controllers\Organizations\Productions\ProductionController@store']);
    Route::get('/edit-products/{id}', ['as' => 'edit-products', 'uses' => 'App\Http\Controllers\Organizations\Productions\ProductionController@edit']);
    Route::post('/update-products', ['as' => 'update-products', 'uses' => 'App\Http\Controllers\Organizations\Productions\ProductionController@update']);
    Route::any('/delete-products/{id}', ['as' => 'delete-products', 'uses' => 'App\Http\Controllers\Organizations\Productions\ProductionController@destroy']);

    Route::get('/list-purchases', ['as' => 'list-purchases', 'uses' => 'App\Http\Controllers\Organizations\Productions\PurchaseController@index']);
    Route::get('/add-purchases', ['as' => 'add-purchases', 'uses' => 'App\Http\Controllers\Organizations\Productions\PurchaseController@add']);
    Route::post('/store-purchases', ['as' => 'store-purchases', 'uses' => 'App\Http\Controllers\Organizations\Productions\PurchaseController@store']);
    Route::get('/edit-purchases/{id}', ['as' => 'edit-purchases', 'uses' => 'App\Http\Controllers\Organizations\Productions\PurchaseController@edit']);
    Route::post('/update-purchases', ['as' => 'update-purchases', 'uses' => 'App\Http\Controllers\Organizations\Productions\PurchaseController@update']);
    Route::any('/delete-purchases/{id}', ['as' => 'delete-purchases', 'uses' => 'App\Http\Controllers\Organizations\Productions\PurchaseController@destroy']);

    //Organizations Purchases
    Route::get('/purchase-dashboard', ['as' => '/purchase-dashboard', 'uses' => 'App\Http\Controllers\Organizations\Dashboard\DashboardController@index']);
    Route::get('/list-purchase', ['as' => 'list-purchase', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseController@index']);
    Route::get('/add-purchase', ['as' => 'add-purchase', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseController@add']);
    Route::post('/store-purchase', ['as' => 'store-purchase', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseController@store']);
    Route::get('/edit-purchase/{id}', ['as' => 'edit-purchase', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseController@edit']);
    Route::post('/update-purchase', ['as' => 'update-purchase', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseController@update']);
    Route::any('/delete-purchase/{id}', ['as' => 'delete-purchase', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseController@destroy']);

    Route::get('/list-purchase-order', ['as' => 'list-purchase-order', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseOrderController@index']);
    Route::get('/add-purchase-order', ['as' => 'add-purchase-order', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseOrderController@create']);
    Route::post('/store-purchase-order', ['as' => 'store-purchase-order', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseOrderController@store']);
    Route::get('/show-purchase-order/{id}', ['as' => 'show-purchase-order', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseOrderController@show']);
    Route::get('/edit-purchase-order/{id}', ['as' => 'edit-purchase-order', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseOrderController@edit']);
    Route::post('/update-purchase-order', ['as' => 'update-purchase-order', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseOrderController@update']);
    Route::any('/delete-purchase-order/{id}', ['as' => 'delete-purchase-order', 'uses' => 'App\Http\Controllers\Organizations\Purchase\PurchaseOrderController@destroy']);

    //Organizations Store
    Route::get('/store-dashboard', ['as' => '/store-dashboard', 'uses' => 'App\Http\Controllers\Organizations\Dashboard\DashboardController@index']);
    Route::get('/list-store-purchase', ['as' => 'list-store-purchase', 'uses' => 'App\Http\Controllers\Organizations\Store\PurchaseController@index']);
    Route::get('/add-store-purchase', ['as' => 'add-store-purchase', 'uses' => 'App\Http\Controllers\Organizations\Store\PurchaseController@add']);
    Route::post('/store-store-purchase', ['as' => 'store-store-purchase', 'uses' => 'App\Http\Controllers\Organizations\Store\PurchaseController@store']);
    Route::get('/edit-store-purchase/{id}', ['as' => 'edit-store-purchase', 'uses' => 'App\Http\Controllers\Organizations\Store\PurchaseController@edit']);
    Route::post('/update-store-purchase', ['as' => 'update-store-purchase', 'uses' => 'App\Http\Controllers\Organizations\Store\PurchaseController@update']);
    Route::any('/delete-store-purchase/{id}', ['as' => 'delete-store-purchase', 'uses' => 'App\Http\Controllers\Organizations\Store\PurchaseController@destroy']);

});



// frontend website shreerag path 
Route::get('/', ['as' => 'index', 'uses' => 'App\Http\Controllers\Website\PagesController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'App\Http\Controllers\Website\PagesController@about']);
Route::get('/services', ['as' => 'services', 'uses' => 'App\Http\Controllers\Website\PagesController@services']);
Route::get('/product', ['as' => 'product', 'uses' => 'App\Http\Controllers\Website\PagesController@product']);
Route::get('/product_details', ['as' => 'product_details', 'uses' => 'App\Http\Controllers\Website\PagesController@product_details']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'App\Http\Controllers\Website\PagesController@contact']);

