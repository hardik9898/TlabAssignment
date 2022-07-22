<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\Auth\RegisteredUserController;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\TherapistListController;
use App\Http\Controllers\Frontend\Auth\AuthenticatedSessionController;

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


Route::get('clearcache', function () {
    Artisan::call('optimize:clear');
});

 /**
     * to run job temporary added artisan call here so we can receive email without settings cron
*/
Route::get('execute-jobs', function () {
    Artisan::call('queue:work');
});




/*******************************************************************/
            /**** frontend */
/*******************************************************************/
    Route::get('/get-country-ajax-data', [RegisteredUserController::class, 'getCountryAjaxData'])->name('get.country.ajax.data');
    Route::get('/get-state-ajax-data', [RegisteredUserController::class, 'getStateAjaxData'])->name('get.state.ajax.data');
    Route::get('/get-services-ajax-data', [RegisteredUserController::class, 'getServicesAjaxData'])->name('get.services.ajax.data');
   
    Route::group(['middleware' =>'auth'], function () {
        Route::get('/', [FrontendController::class, 'index'])->name('home');
    });

require __DIR__.'/frontend_auth.php';







/*******************************************************************/
            /**** backend */
/*******************************************************************/

require __DIR__.'/backend_auth.php';

Route::group(['middleware' =>'auth:admin','prefix'=>'admin'], function () {

    Route::get('/', function () {
       return redirect()->route('dashboard');
    });

    /**Change password */
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('changepassword.form.show');
    Route::post('/changePasswordUpdate', [ChangePasswordController::class, 'update'])->name('changepassword.update');
    
    /** dashboard */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /** services  */
    Route::resource('services',ServicesController::class);
    Route::get('get-datatable-of-services',[ServicesController::class,'getDatatableResponse'])->name('services.getdatatable');

    /** services  */
    Route::resource('therapist-list',TherapistListController::class);
    Route::get('get-datatable-of-therapist-list',[TherapistListController::class,'getDatatableResponse'])->name('therapist.list.getdatatable');

  

});   

