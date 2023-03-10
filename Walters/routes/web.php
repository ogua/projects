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
    return Redirect()->route('login');
});

Auth::routes();

Route::get('/home/{code}', 'WaltersController@record_sales')->name('record-sales');

Route::get('/home', [
    'uses' => 'WaltersController@home',
    'as' => 'home'
	]);

	//user
Route::get('/login/worker',[
	    'uses' => 'WaltersController@login_worker',
	    'as' => 'login-worker',
	    'middleware' => 'guest'
]);


Route::post('/loign-user', [
	    'uses' => 'WaltersController@login_worker_script',
	    'as' => 'login-worker-script'
]);


Route::group(['prefix'=> 'Walters/DreamBig','middleware' => 'auth'], function(){

   Route::get('/home', [
    'uses' => 'WaltersController@home',
    'as' => 'home'
	]);


   Route::get('/home/newrecord/{code}', [
    'uses' => 'WaltersController@new_record',
    'as' => 'new-record-sales'
	]);



   Route::get('/dashboard', [
    'uses' => 'WaltersController@dashboard',
    'as' => 'dashboard'
	]);


    Route::get('/add-branch', [
    'uses' => 'WaltersController@add_branch',
    'as' => 'add-branch'
	]);


	Route::get('/view-branch', [
    'uses' => 'WaltersController@view_branch',
    'as' => 'view-branch'
	]);



	 Route::post('/save-branch', [
	    'uses' => 'WaltersController@save_branch',
	    'as' => 'save-branch'
	]);


	 Route::get('/edit-branch/{id}', [
	    'uses' => 'WaltersController@edit_branch',
	    'as' => 'edit-branch'
	]);



	 Route::post('/update-branch/{id}', [
	    'uses' => 'WaltersController@update_branch',
	    'as' => 'update-branch'
	]);



	  Route::get('/delete-branch/{id}', [
	    'uses' => 'WaltersController@delete_branch',
	    'as' => 'delete-branch'
	]);






	Route::get('/add-product', [
	    'uses' => 'WaltersController@add_product',
	    'as' => 'add-product'
	]);


	Route::post('/save-product', [
	    'uses' => 'WaltersController@save_product',
	    'as' => 'save-product'
	]);


	Route::get('/edit-product/{id}', [
	    'uses' => 'WaltersController@edit_product',
	    'as' => 'edit-product'
	]);

	Route::post('/update-product/{id}', [
	    'uses' => 'WaltersController@update_product',
	    'as' => 'update-product'
	]);

	Route::get('/delete-product/{id}', [
	    'uses' => 'WaltersController@delete_product',
	    'as' => 'delete-product'
	]);


	Route::get('/delete-product2/{id}', [
	    'uses' => 'WaltersController@delete_product2',
	    'as' => 'delete-product2'
	]);


	Route::get('/update-Product-quantity/{id}', [
	    'uses' => 'WaltersController@quantity_update',
	    'as' => 'qantity-update'
	]);

	Route::post('/update-Product-quantity/save/{id}', [
	    'uses' => 'WaltersController@quantity_update_save',
	    'as' => 'qantity-update-save'
	]);

//	end of Product Information


	Route::get('/inventory/', [
	    'uses' => 'WaltersController@view_product',
	    'as' => 'view-product'
	]);


	Route::get('/salespday/sales/{code}', [
	    'uses' => 'WaltersController@sales_per_day',
	    'as' => 'sales-per-day'
	]);


	Route::get('/salesmonth/sales/{code}', [
	    'uses' => 'WaltersController@sales_per_month',
	    'as' => 'sales-per-month'
	]);



	Route::post('/salesmonth/data/{code}', [
	    'uses' => 'WaltersController@sales_per_month_data',
	    'as' => 'sales-per-month-data'
	]);


	Route::get('/salesmonth/data/{code}/{from}/{to}', [
	    'uses' => 'WaltersController@sales_per_month_datatable',
	    'as' => 'sales-per-month-datatable'
	]);


	Route::post('/getyousale/user/{code}', [
	    'uses' => 'WaltersController@fetchallsales',
	    'as' => 'sales-user-all'
	]);


	Route::get('/getproducts/user/', [
	    'uses' => 'WaltersController@getproducts',
	    'as' => 'all-product-display'
	]);



	Route::get('/salepProduct/sales/{code}', [
	    'uses' => 'WaltersController@sales_per_product',
	    'as' => 'sales-per-product'
	]);


	Route::get('/salepProduct/data/{code}/{value}', [
	    'uses' => 'WaltersController@sales_p_p_data',
	    'as' => 'sales-per-prd-save'
	]);



	Route::get('/allsales/sales/{code}', [
	    'uses' => 'WaltersController@all_sales',
	    'as' => 'all-sales'
	]);


	Route::get('/sales/record/perdate/{date}/{code}', [
	    'uses' => 'WaltersController@sales_perdate',
	    'as' => 'getsales-perdate'
	]);
	





	//sales start Here

	Route::get('/record/usersales', [
	    'uses' => 'WaltersController@userrecord_sales',
	    'as' => 'record-usersales'
	]);



	Route::get('/record/usersales/view', [
	    'uses' => 'WaltersController@userrecord_sales_view',
	    'as' => 'record-usersales-view'
	]);





	Route::post('/sales/save', [
	    'uses' => 'WaltersController@sales_save',
	    'as' => 'sale-save'
	]);


	Route::post('/seach/product', [
	    'uses' => 'WaltersController@search_product',
	    'as' => 'search-product'
	]);




	//print Invoice
	Route::post('/print/Invoice/{code}', [
	    'uses' => 'WaltersController@print_invoice',
	    'as' => 'print-invoice'
	]);



});



//Brach Management


//Roles and Permssions Configuration


Route::group(['prefix'=> 'UserManagement',  'middleware' => 'auth'], function(){

    Route::get('/adduserRole', [
        'uses' => 'UserRoleController@addrole',
        'as' => 'add-user-role'
    ]);


    Route::post('/adduserRole/save/user/role', [
        'uses' => 'UserRoleController@addrole_save',
        'as' => 'user-role-save'
    ]);


     Route::post('/adduserRole/save/user/permission', [
        'uses' => 'UserRoleController@addpermission_save',
        'as' => 'user-permission-save'
    ]);



    Route::post('/adduserRole/edit/role/{id}', [
        'uses' => 'UserRoleController@edit_role_per',
        'as' => 'edit-role-perm'
    ]);


    Route::post('/adduserRole/edit/roles/update', [
        'uses' => 'UserRoleController@edit_role_save',
        'as' => 'edit-role-update'
    ]);

    Route::post('/adduserRole/edit/permsission/update', [
        'uses' => 'UserRoleController@edit_per_save',
        'as' => 'edit-perm-update'
    ]);


    
    Route::get('/adduserRole/assign/role/permission/{id}', [
        'uses' => 'UserRoleController@assignrole_to_permission',
        'as' => 'assingn-role-to-permission'
    ]);

    Route::post('/adduserRole/assign/role/permission/save', [
        'uses' => 'UserRoleController@assignrole_to_permission_save',
        'as' => 'assingn-role-to-permission-save'
    ]);


    Route::post('/adduserRole/assign/role/edit/permission/{id}', [
        'uses' => 'UserRoleController@edit_permission',
        'as' => 'edit-role-assign-to-permission'
    ]);

    

    //user and their roles

    Route::get('/users/roles/display/rolesandUsers', [
        'uses' => 'UserRoleController@user_roles_display',
        'as' => 'users-roles-display'
    ]);


    //forcelogout

    Route::get('/users/force/logout', [
        'uses' => 'UserRoleController@user_force_logout',
        'as' => 'logout-user-force'
    ]);

    Route::post('/users/force/logout/{id}', [
        'uses' => 'UserRoleController@user_force_logout_update',
        'as' => 'logout-user-force-update'
    ]);

    Route::post('/users/force/logout/{id}/enableuser', [
        'uses' => 'UserRoleController@user_force_logout_enable',
        'as' => 'logout-user-force-enable'
    ]);



    Route::get('/set-locale/{lang}', [
        'uses' => 'UserRoleController@user_set_locale',
        'as' => 'setLocale'
    ]);




    //user
	Route::get('/add/user/{user}', [
	    'uses' => 'WaltersController@add_user',
	    'as' => 'add-user'
	]);


	Route::post('/register/{users}', [
	    'uses' => 'WaltersController@reg_user',
	    'as' => 'reg-user'
	]);


});
