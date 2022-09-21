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
Route::get('/activities-details', [FrontendController::class, 'activitiesDetails']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/environment-initiative', [FrontendController::class, 'environmentInitiative']);
Route::get('/gallery', [FrontendController::class, 'gallery']);
Route::get('/join-volunteer', [FrontendController::class, 'joinVolunteer']);
Route::get('/organisation', [FrontendController::class, 'organisation']);
Route::get('/our-team', [FrontendController::class, 'ourTeam']);
Route::get('/testimonials', [FrontendController::class, 'testimonials']);


//Route::post('/save-form-data', [FrontendController::class, 'saveFormData'])->name('save-form-data');


//****Admin Route Start */
Route::get('/admin', [UserAuthControler::class, 'adminView'])->middleware('alreadyLoggedIn');
Route::get('/admin/login', [UserAuthControler::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/admin/registration', [UserAuthControler::class, 'registration'])->middleware('alreadyLoggedIn');
Route::get('/admin/dashboard', [UserAuthControler::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/admin/logout', [UserAuthControler::class, 'logout']);
Route::post('/admin/register-user', [UserAuthControler::class, 'registerUser'])->name('register-user');
Route::post('/admin/login-user', [UserAuthControler::class, 'loginUser'])->name('login-user');

Route::get('/admin/organisation', [AdminController::class, 'organisation']);
Route::get('/admin/add-organisation', [AdminController::class, 'addOrganisation']);
Route::get('/admin/edit-organisation/{id}', [AdminController::class, 'addOrganisation']);
Route::get('/admin/delete-organisation/{id}', [AdminController::class, 'deleteOrganisation']);
Route::post('/admin/save-organisation', [AdminController::class, 'saveOrganisation'])->name('save-organisation');

Route::get('/admin/testimonial', [AdminController::class, 'testimonial']);
Route::get('/admin/add-testimonial', [AdminController::class, 'addTestimonial']);
Route::get('/admin/edit-testimonial/{id}', [AdminController::class, 'addTestimonial']);
Route::get('/admin/delete-testimonial/{id}', [AdminController::class, 'deleteTestimonial']);
Route::post('/admin/save-testimonial', [AdminController::class, 'saveTestimonial'])->name('save-testimonial');
Route::post('/admin/fetch-testimonial-title', [AdminController::class, 'fetchTestimonialTitle'])->name('fetch-testimonial-title');

Route::get('/admin/gallery', [AdminController::class, 'gallery']);
Route::get('/admin/add-gallery', [AdminController::class, 'addGallery']);
Route::get('/admin/edit-gallery/{id}', [AdminController::class, 'addGallery']);
Route::get('/admin/delete-gallery/{id}', [AdminController::class, 'deleteGallery']);
Route::post('/admin/save-gallery', [AdminController::class, 'saveGallery'])->name('save-gallery');
Route::post('/admin/fetch-gallery-section-title', [AdminController::class, 'fetchGallerySectionTitle'])->name('fetch-gallery-section-title');

Route::get('/admin/our-team', [AdminController::class, 'ourTeam']);
Route::get('/admin/add-our-team', [AdminController::class, 'addOurTeam']);
Route::get('/admin/edit-our-team/{id}', [AdminController::class, 'addOurTeam']);
Route::get('/admin/delete-our-team/{id}', [AdminController::class, 'deleteOurTeam']);
Route::post('/admin/save-our-team', [AdminController::class, 'saveOurTeam'])->name('save-our-team');
Route::post('/admin/fetch-team-section-title', [AdminController::class, 'fetchTeamSectionTitle'])->name('fetch-team-section-title');

Route::get('/admin/cms', [AdminController::class, 'cms']);
Route::get('/admin/add-cms', [AdminController::class, 'addCms']);
Route::get('/admin/edit-cms/{id}', [AdminController::class, 'addCms']);
Route::get('/admin/delete-cms/{id}', [AdminController::class, 'deleteCms']);
Route::post('/admin/save-cms', [AdminController::class, 'saveCms'])->name('save-cms');

Route::get('/admin/blog', [AdminController::class, 'blog']);
Route::get('/admin/add-blog', [AdminController::class, 'addBlog']);
Route::get('/admin/edit-blog/{id}', [AdminController::class, 'addBlog']);
Route::get('/admin/delete-blog/{id}', [AdminController::class, 'deleteBlog']);
Route::post('/admin/save-blog', [AdminController::class, 'saveBlog'])->name('save-blog');
Route::post('/admin/fetch-blog-heading', [AdminController::class, 'fetchBlogHeading'])->name('fetch-blog-heading');

Route::get('/admin/activities', [AdminController::class, 'activities']);
Route::get('/admin/add-activities', [AdminController::class, 'addActivities']);
Route::get('/admin/edit-activities/{id}', [AdminController::class, 'addActivities']);
Route::get('/admin/delete-activities/{id}', [AdminController::class, 'deleteActivities']);
Route::post('/admin/save-activities', [AdminController::class, 'saveActivities'])->name('save-activities');
Route::post('/admin/fetch-activities-heading', [AdminController::class, 'fetchActivitiesHeading'])->name('fetch-activities-heading');

Route::get('/admin/contact', [AdminController::class, 'contact']);
Route::get('/admin/add-contact', [AdminController::class, 'addContact']);
Route::get('/admin/edit-contact/{id}', [AdminController::class, 'addContact']);
Route::get('/admin/delete-contact/{id}', [AdminController::class, 'deleteContact']);
Route::post('/admin/save-contact', [AdminController::class, 'saveContact'])->name('save-contact');

Route::get('/admin/site-setting', [AdminController::class, 'siteSetting']);
Route::post('/admin/save-site-setting', [AdminController::class, 'saveSiteSetting'])->name('save-site-setting');

Route::get('/admin/banner', [AdminController::class, 'banner']);
Route::get('/admin/add-banner', [AdminController::class, 'addBanner']);
Route::get('/admin/edit-banner/{id}', [AdminController::class, 'addBanner']);
Route::get('/admin/delete-banner/{id}', [AdminController::class, 'deleteBanner']);
Route::post('/admin/save-banner', [AdminController::class, 'saveBanner'])->name('save-banner');

Route::get('/admin/setting', [AdminController::class, 'setting']);

Route::get('/admin/form-management', [AdminController::class, 'formManagement']);
Route::get('/admin/delete-form/{id}', [AdminController::class, 'deleteForm']);

Route::get('/admin/home-page-footer-cms', [AdminController::class, 'homePageFooterCms']);
Route::get('/admin/add-home-page-footer-cms', [AdminController::class, 'addeditHomePageFooterCms']);
Route::get('/admin/edit-home-page-footer-cms/{id}', [AdminController::class, 'addeditHomePageFooterCms']);
Route::get('/admin/delete-home-page-footer-cms/{id}', [AdminController::class, 'deleteHomePageFooterCms']);

Route::get('/admin/service-management', [AdminController::class, 'serviceManagement']);
Route::get('/admin/add-service-view', [AdminController::class, 'addeditSericeView']);
Route::get('/admin/edit-service-view/{id}', [AdminController::class, 'addeditSericeView']);
Route::get('/admin/delete-service/{id}', [AdminController::class, 'deleteService']);

Route::post('/admin/add-banner', [AdminController::class, 'addBannerImage'])->name('add-banner');
Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('change-password');
Route::post('/admin/footer-setting', [AdminController::class, 'footerSetting'])->name('footer-setting');
Route::post('/admin/addedit-mouce-hover', [AdminController::class, 'addeditMouceHover'])->name('addedit-mouce-hover');
Route::post('/admin/fetch-testimonial-title', [AdminController::class, 'fetchTestimonialTitle'])->name('fetch-testimonial-title');
Route::post('/admin/add-home-page-footer-cms', [AdminController::class, 'addHomePageFooterCms'])->name('add-home-page-footer-cms');
Route::post('/admin/addedit-design-center-save', [AdminController::class, 'addEditDesignCenterCmsSave'])->name('addedit-design-center-save');
Route::post('/admin/addedit-blog-save', [AdminController::class, 'addEditBlogSave'])->name('addedit-blog-save');
Route::post('/admin/addUpdate-service', [AdminController::class, 'addUpdateService'])->name('addUpdate-service');
Route::post('/admin/remove-image', [AdminController::class, 'removeImage'])->name('remove-image');
