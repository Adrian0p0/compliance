<?php

use App\Http\Controllers\BackPanel;
use App\Http\Controllers\UserPages;
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
require __DIR__.'/auth.php';

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);


Route::get('/', function () { return view('public.GDPR_Page'); });

Route::get('/compliance-form',          [UserPages::class, 'ComplianceForm']        )->name('FormSubmit');

Route::post('/compliance-form-submit',  [UserPages::class, 'ComplianceFormSave']    )->name('FormSubmitSave');

Route::post('/get-data',                [UserPages::class, 'AjaxGetData']           )->name('ajax-get-data');

Route::get('/mail',                     [UserPages::class, 'sendMail']);

Route::middleware(['auth'])
    ->prefix('/admin')
    ->group(function () {
        Route::get('/', [BackPanel::class, 'dashboard'])->name('dashboard');

        Route::group([ 'prefix' => 'reports', 'as' => 'reports.' ], function(){
            Route::get('/{id?}',        [BackPanel::class, 'reportShow']        )->name('show');
            Route::get('/edit/{id}',    [BackPanel::class, 'reportEdit']        )->name('edit');
            Route::post('/save',        [BackPanel::class, 'reportSave']        )->name('save');
        });

        Route::group([ 'prefix' => 'subjects', 'as' => 'subjects.' ], function(){
            Route::get('/list',         [BackPanel::class, 'subjectShow']       )->name('show');
            Route::post('/add',         [BackPanel::class, 'subjectAdd']        )->name('add');
            Route::get('/delete/{id}',  [BackPanel::class, 'subjectDelete']     )->name('delete');
            Route::post('/edit',        [BackPanel::class, 'subjectEdit']       )->name('edit');
            Route::post('/edit/save',   [BackPanel::class, 'subjectSave']       )->name('save');
        });

        Route::group([ 'prefix' => 'companies', 'as' => 'companies.' ], function(){
            Route::get('/list',         [BackPanel::class, 'companyShow']       )->name('show');
            Route::post('/add',         [BackPanel::class, 'companyAdd']        )->name('add');
            Route::get('/delete/{id}',  [BackPanel::class, 'companyDelete']     )->name('delete');
            Route::post('/edit',        [BackPanel::class, 'companyEdit']       )->name('edit');
            Route::post('/edit/save',   [BackPanel::class, 'companySave']       )->name('save');
        });
});
