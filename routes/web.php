<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//adminpanel routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/admin/login', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'login'])->name('admin.login');
Route::prefix('admin')->name('admin.')->middleware('authAdmin')->group(function(){
    Route::post('/logout', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\Adminpanel\DashboardrController::class, 'index'])->name('home');
    Route::get('/setting/{id}', [App\Http\Controllers\Adminpanel\AdminController::class, 'edit'])->name('setting');
    Route::post('/setting/update/{id}', [App\Http\Controllers\Adminpanel\AdminController::class, 'update'])->name('setting.update');

    //Expense
    Route::prefix('expense')->name('expense.')->group(function(){
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/index', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'update'])->name('update')->middleware('isSuperAdmin');
            Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');
        });

        Route::get('/index', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'update'])->name('update')->middleware('isSuperAdmin');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');

    });

    //Product
    Route::prefix('product')->name('product.')->group(function(){
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/index', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'update'])->name('update')->middleware('isSuperAdmin');
            Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');
        });

        Route::get('/index', [App\Http\Controllers\Adminpanel\ProductController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\ProductController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\ProductController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'update'])->name('update')->middleware('isSuperAdmin');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');

    });

    //Employee
    Route::prefix('employee')->name('employee.')->group(function(){
        Route::get('/index', [App\Http\Controllers\Adminpanel\EmployeeController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\EmployeeController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\EmployeeController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\EmployeeController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\EmployeeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\EmployeeController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\EmployeeController::class, 'destroy'])->name('destroy');

    });

    //Customer
    Route::prefix('customer')->name('customer.')->group(function(){
        Route::get('/index', [App\Http\Controllers\Adminpanel\CustomerController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\CustomerController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\CustomerController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\CustomerController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\CustomerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\CustomerController::class, 'update'])->name('update')->middleware('isSuperAdmin');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\CustomerController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');

    });

    //Vendor
    Route::prefix('vendor')->name('vendor.')->group(function(){
        Route::get('/index', [App\Http\Controllers\Adminpanel\VendorController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\VendorController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\VendorController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\VendorController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\VendorController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\VendorController::class, 'update'])->name('update')->middleware('isSuperAdmin');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\VendorController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');

    });

    //Payment
    Route::prefix('payment')->name('payment.')->group(function(){
        Route::get('/index', [App\Http\Controllers\Adminpanel\PaymentController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\PaymentController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\PaymentController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\PaymentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\PaymentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\PaymentController::class, 'update'])->name('update')->middleware('isSuperAdmin');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\PaymentController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');

    });

    //Sale Invoice
    Route::prefix('sale_invoice')->name('sale_invoice.')->group(function(){

        Route::get('/index', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'show'])->name('show');
        Route::get('/print/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'print'])->name('print');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'update'])->name('update')->middleware('isSuperAdmin');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');

    });

    //Sale Invoice
    Route::prefix('purchase_invoice')->name('purchase_invoice.')->group(function(){

        Route::get('/index', [App\Http\Controllers\Adminpanel\PurchaseInvoiceController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\PurchaseInvoiceController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\PurchaseInvoiceController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\PurchaseInvoiceController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\PurchaseInvoiceController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\PurchaseInvoiceController::class, 'update'])->name('update')->middleware('isSuperAdmin');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\PurchaseInvoiceController::class, 'destroy'])->name('destroy')->middleware('isSuperAdmin');

    });

});


Route::resource('user', App\Http\Controllers\Adminpanel\ExpenseCategoryController::class);

