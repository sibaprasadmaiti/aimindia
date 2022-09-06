<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthControler;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;

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

//****Frontend Route Start */
Route::get('/', [FrontendController::class, 'home']);
Route::get('/activities', [FrontendController::class, 'activities']);


//Route::post('/save-form-data', [FrontendController::class, 'saveFormData'])->name('save-form-data');


//****Admin Route Start */
Route::get('/admin', [UserAuthControler::class, 'adminView'])->middleware('alreadyLoggedIn');
Route::get('/admin/login', [UserAuthControler::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/admin/registration', [UserAuthControler::class, 'registration'])->middleware('alreadyLoggedIn');
Route::get('/admin/dashboard', [UserAuthControler::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/admin/logout', [UserAuthControler::class, 'logout']);

Route::get('/admin/banner-management', [AdminController::class, 'bannerManagement']);
Route::get('/admin/add-banner', [AdminController::class, 'addBanner']);
Route::get('/admin/edit-banner/{id}', [AdminController::class, 'addBanner']);
Route::get('/admin/delete-banner/{id}', [AdminController::class, 'deleteBanner']);

Route::get('/admin/setting', [AdminController::class, 'setting']);

Route::get('/admin/on-mouce-hover-management', [AdminController::class, 'onMouceHoverManagement']);
Route::get('/admin/add-mouce-hover-cms', [AdminController::class, 'addMouceHoverCms']);
Route::get('/admin/edit-mouce-hover/{id}', [AdminController::class, 'addMouceHoverCms']);
Route::get('/admin/delete-mouce-hover/{id}', [AdminController::class, 'deleteMouceHoverCms']);

Route::get('/admin/form-management', [AdminController::class, 'formManagement']);
Route::get('/admin/delete-form/{id}', [AdminController::class, 'deleteForm']);

Route::get('/admin/home-page-footer-cms', [AdminController::class, 'homePageFooterCms']);
Route::get('/admin/add-home-page-footer-cms', [AdminController::class, 'addeditHomePageFooterCms']);
Route::get('/admin/edit-home-page-footer-cms/{id}', [AdminController::class, 'addeditHomePageFooterCms']);
Route::get('/admin/delete-home-page-footer-cms/{id}', [AdminController::class, 'deleteHomePageFooterCms']);

Route::get('/admin/design-center-cms', [AdminController::class, 'designCenterCms']);
Route::get('/admin/add-design-center-cms', [AdminController::class, 'addeditDesignCenterCms']);
Route::get('/admin/edit-design-center-cms/{id}', [AdminController::class, 'addeditDesignCenterCms']);
Route::get('/admin/delete-design-center-cms/{id}', [AdminController::class, 'deleteDesignCenterCms']);

Route::get('/admin/page-content-management', [AdminController::class, 'pageContentManagement']);
Route::get('/admin/add-page-content-view', [AdminController::class, 'addeditBlogview']);
Route::get('/admin/edit-page-content-view/{id}', [AdminController::class, 'addeditBlogview']);
Route::get('/admin/delete-page-content/{id}', [AdminController::class, 'deleteBlog']);

Route::get('/admin/service-management', [AdminController::class, 'serviceManagement']);
Route::get('/admin/add-service-view', [AdminController::class, 'addeditSericeView']);
Route::get('/admin/edit-service-view/{id}', [AdminController::class, 'addeditSericeView']);
Route::get('/admin/delete-service/{id}', [AdminController::class, 'deleteService']);

Route::post('/admin/register-user', [UserAuthControler::class, 'registerUser'])->name('register-user');
Route::post('/admin/login-user', [UserAuthControler::class, 'loginUser'])->name('login-user');
Route::post('/admin/add-banner', [AdminController::class, 'addBannerImage'])->name('add-banner');
Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('change-password');
Route::post('/admin/footer-setting', [AdminController::class, 'footerSetting'])->name('footer-setting');
Route::post('/admin/addedit-mouce-hover', [AdminController::class, 'addeditMouceHover'])->name('addedit-mouce-hover');
Route::post('/admin/fetch-on-mouce-hover-title', [AdminController::class, 'fetchOnMouceHoverTitle'])->name('fetch-on-mouce-hover-title');
Route::post('/admin/add-home-page-footer-cms', [AdminController::class, 'addHomePageFooterCms'])->name('add-home-page-footer-cms');
Route::post('/admin/addedit-design-center-save', [AdminController::class, 'addEditDesignCenterCmsSave'])->name('addedit-design-center-save');
Route::post('/admin/addedit-blog-save', [AdminController::class, 'addEditBlogSave'])->name('addedit-blog-save');
Route::post('/admin/addUpdate-service', [AdminController::class, 'addUpdateService'])->name('addUpdate-service');
Route::post('/admin/remove-image', [AdminController::class, 'removeImage'])->name('remove-image');
