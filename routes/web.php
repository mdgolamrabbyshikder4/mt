<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\admin;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FindPartnerController;
use App\Http\Controllers\AddClickEarnController;
use App\Http\Controllers\HomeMadeFoodSellController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\BuySellController;
use App\Http\Controllers\FindPartnerControllerClientView;
use App\Http\Controllers\HomeMadeFoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddClickEarnControllerClient;
use App\Http\Controllers\ourServiceController;
use App\Http\Controllers\search;
use App\Http\Controllers\OurServiceClient;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('client/index');
// });

Auth::routes();
// Contact Route From User
Route::get('/contact', [App\Http\Controllers\Contact::class, 'index']);
Route::post('/contact', [App\Http\Controllers\Contact::class, 'create_message']);
// About us route
Route::get('/about', [App\Http\Controllers\About::class, 'index']);
// user route are start
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\globalDataSend::class, 'index']);
Route::get('/client/single/service/view/{id}', [App\Http\Controllers\globalDataSend::class, 'Single_service']);
Route::get('/deposit', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit');
Route::POST('/deposit', [App\Http\Controllers\HomeController::class, 'deposit_store'])->name('deposit_store');
Route::get('/withdroad', [App\Http\Controllers\HomeController::class, 'withdroad'])->name('withdroad');
Route::POST('/withdroad', [App\Http\Controllers\HomeController::class, 'withdroad_store'])->name('withdroad_store');
// message route list start
Route::get('/inbox/{id}', [App\Http\Controllers\messageUser::class, 'index']);
Route::get('/inbox/single/{id}', [App\Http\Controllers\messageUser::class, 'single_inbox']);
Route::POST('/send/message/{id}', [App\Http\Controllers\messageUser::class, 'store']);
Route::get('/show/message/{id}', [App\Http\Controllers\messageUser::class, 'show']);
Route::get('/count/message', [App\Http\Controllers\messageUser::class, 'count']);
Route::get('/count/personal/message/{id}', [App\Http\Controllers\messageUser::class, 'personal_text_count']);
// message route list end
Route::get('/profile', [App\Http\Controllers\client::class, 'index']);
Route::get('/client/deposit', [App\Http\Controllers\client::class, 'deposit_histry']);
Route::get('/client/withdroad', [App\Http\Controllers\client::class, 'withdroad_histry']);
Route::get('/client/service', [App\Http\Controllers\serviceCreate::class, 'create']);
Route::post('/client/service', [App\Http\Controllers\serviceCreate::class, 'store']);
Route::post('/client/service/update/{id}', [App\Http\Controllers\serviceCreate::class, 'update']);
Route::get('/client/single/service/{id}', [App\Http\Controllers\serviceCreate::class, 'show']);
Route::get('/client/service/list', [App\Http\Controllers\serviceCreate::class, 'index']);
Route::get('/client/service/edit/{id}', [App\Http\Controllers\serviceCreate::class, 'edit']);
Route::get('/client/service/delete/{id}', [App\Http\Controllers\serviceCreate::class, 'destroy']);
Route::get('/client/', [App\Http\Controllers\client::class, 'withdroad']);
Route::get('client/update/profile', [App\Http\Controllers\client::class, 'update_profile']);
Route::post('client/update/profile', [App\Http\Controllers\client::class, 'update_profile_save']);
// user route area end
// job post
Route::resource('job-posts', JobPostController::class);
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // Public route for all jobs

Route::get('/jobs/{id}', [JobController::class, 'show'])->middleware('auth')->name('jobs.show'); // Protected route for single job view

// product route
Route::resource('products', ProductController::class);
Route::post('products/{product}/mark-as-sold', [ProductController::class, 'markAsSold'])->name('products.markAsSold');
Route::post('products/{product}/mark-as-in-stock', [ProductController::class, 'markAsInstock'])->name('products.markAsInstock');
// Show all posts (Buy & Sell)
    Route::get('/buy-sell', [BuySellController::class, 'index'])->name('buy-sell.index');

Route::middleware('auth')->group(function () {
    
    // Show single post view
    Route::get('/buy-sell/{id}', [BuySellController::class, 'show'])->name('buy-sell.show');

    // Order routes
    Route::post('/order-now/{id}', [BuySellController::class, 'orderNow'])->name('order.now');
    Route::post('/order-complete/{id}', [BuySellController::class, 'orderComplete'])->name('order.complete');
    Route::post('/order-cancel/{id}', [BuySellController::class, 'orderCancel'])->name('order.cancel');
});

// Other routes...

Route::resource('find_partner', FindPartnerController::class);

// Additional routes for marking as married/unmarried
Route::post('find_partner/{findPartner}/married', [FindPartnerController::class, 'markAsMarried'])->name('find_partner.married');
Route::post('find_partner/{findPartner}/unmarried', [FindPartnerController::class, 'markAsUnmarried'])->name('find_partner.unmarried');
Route::get('/partners', [FindPartnerControllerClientView::class, 'index'])->name('partners.index');
Route::get('/partners/{id}', [FindPartnerControllerClientView::class, 'show'])->middleware('auth')->name('partners.show');

// add click earning
Route::resource('add_click_earn', AddClickEarnController::class);
Route::get('/click-earns', [AddClickEarnControllerClient::class, 'index'])->name('click_earn.index');
Route::get('/click-earns/{id}', [AddClickEarnControllerClient::class, 'show'])->middleware('auth')->name('click_earn.show');
Route::get('/our_services_client_view', [OurServiceClient::class, 'index'])->name('our_services_client_view.index');

// home made food sales

Route::resource('home-made-food-sell', HomeMadeFoodSellController::class);
Route::get('/home-made-food', [HomeMadeFoodController::class, 'index'])->name('home_made_food.index');
Route::get('/home-made-food/{id}', [HomeMadeFoodController::class, 'show'])->name('home_made_food.show');
Route::get('order/create/{foodId}', [OrderController::class, 'createOrder'])->name('order.create');
Route::get('order/complete/{orderId}', [OrderController::class, 'completeOrder'])->name('order.complete');
Route::get('order/cancel/{orderId}', [OrderController::class, 'cancelOrder'])->name('order.cancel');
Route::get('order/show/{orderId}', [OrderController::class, 'showOrder'])->name('order.show');

// order area start


Route::get('client/order/first/{id}', [App\Http\Controllers\orderClientall::class, 'first_package_order']);
Route::post('client/order/first/{id}', [App\Http\Controllers\orderClientall::class, 'first_package_order_store']);
Route::get('client/order/second/{id}', [App\Http\Controllers\orderClientall::class, 'second_package_order']);
Route::post('client/order/second/{id}', [App\Http\Controllers\orderClientall::class, 'second_package_order_store']);
Route::get('client/order/thirdthird/{id}', [App\Http\Controllers\orderClientall::class, 'third_package_order']);
Route::post('client/order/thirdthird/{id}', [App\Http\Controllers\orderClientall::class, 'third_package_order_store']);
Route::get('client/order/complete/reqiest/frellancer/{id}', [App\Http\Controllers\orderClientall::class, 'order_freelancer_complete_request']);
Route::get('client/order/count/{id}', [App\Http\Controllers\globalDataSend::class, 'count_order']);
Route::get('client/order/notif', [App\Http\Controllers\globalDataSend::class, 'notif_order']);
Route::get('client/order/custom/{id}', [App\Http\Controllers\orderclient::class, 'custom_order']);
Route::post('client/order/custom/{id}', [App\Http\Controllers\orderclient::class, 'custom_order_store']);
Route::get('client/order/list', [App\Http\Controllers\clientOrder::class, 'index']);
Route::get('client/order/single/{id}', [App\Http\Controllers\clientOrder::class, 'show']);
Route::get('client/order/single/cl/complete/{id}', [App\Http\Controllers\clientOrder::class, 'order_complete']);
Route::get('/client/order/cancle/cl/{id}', [App\Http\Controllers\clientOrder::class, 'order_cancle']);
Route::get('/client/order/cancle/frelancer/{id}', [App\Http\Controllers\clientOrder::class, 'cancle_order_freelancer']);
Route::get('/client/order/cancle/fr/reject/{id}', [App\Http\Controllers\clientOrder::class, 'order_cancle_request_reject_fr']);
Route::get('/client/order/cancle/fr/accept/{id}', [App\Http\Controllers\clientOrder::class, 'order_cancle_request_accept_fr']);
Route::get('/client/order/cancle/cl/reject/{id}', [App\Http\Controllers\clientOrder::class, 'order_cancle_request_reject_cl']);
Route::get('/client/order/cancle/cl/accept/{id}', [App\Http\Controllers\clientOrder::class, 'order_cancle_request_accept_cl']);
// order area end
// admin route area start
// admin custommer support
Route::get('/admin-mt-134/custommer_support', [App\Http\Controllers\admin_custommer_support::class, 'index'])->middleware(admin::class);
Route::get('/admin-mt-134/single_custommer_support/{id}', [App\Http\Controllers\admin_custommer_support::class, 'show'])->middleware(admin::class);
Route::post('/admin-mt-134/single_custommer_support/replay/{id}', [App\Http\Controllers\admin_custommer_support::class, 'create'])->middleware(admin::class);


Route::get('/admin-mt-134', [App\Http\Controllers\admincontrol::class, 'index'])->middleware(admin::class);
Route::get('/admin-mt-134/order/list', [App\Http\Controllers\orderAdmin::class, 'index'])->middleware(admin::class);
Route::get('/admin-mt-134/order/cancle/{id}', [App\Http\Controllers\orderAdmin::class, 'order_cancle'])->middleware(admin::class);
Route::get('/admin-mt-134/order/back/{id}', [App\Http\Controllers\orderAdmin::class, 'order_back'])->middleware(admin::class);
Route::get('/admin-mt-134/order/complete/{id}', [App\Http\Controllers\orderAdmin::class, 'order_complete'])->middleware(admin::class);
Route::get('/admin-mt-134/order/delete/{id}', [App\Http\Controllers\orderAdmin::class, 'destroy'])->middleware(admin::class);
Route::get('/admin-mt-134/order/view/{id}', [App\Http\Controllers\orderAdmin::class, 'show'])->middleware(admin::class);
// user route area start
Route::get('/admin-mt-134/user', [App\Http\Controllers\admincontrol::class, 'user'])->middleware(admin::class);

Route::get('/admin-mt-134/user/delete/{id}', [App\Http\Controllers\admincontrol::class, 'user_delete'])->middleware(admin::class);
Route::get('/admin-mt-134/user/approval/{id}', [App\Http\Controllers\admincontrol::class, 'user_approval'])->middleware(admin::class);
Route::get('/admin-mt-134/user/suspend/{id}', [App\Http\Controllers\admincontrol::class, 'user_suspend'])->middleware(admin::class);
Route::get('/admin-mt-134/user/view/{id}', [App\Http\Controllers\admincontrol::class, 'user_view'])->middleware(admin::class);
Route::get('/admin-mt-134/user/single/view/{id}', [App\Http\Controllers\admincontrol::class, 'single_user_view'])->middleware(admin::class);
// user route area end
//deposit route area start
Route::get('/admin-mt-134/deposit', [App\Http\Controllers\admincontrol::class, 'deposit'])->middleware(admin::class);
Route::get('/admin-mt-134/deposit/view/{id}', [App\Http\Controllers\admincontrol::class, 'deposit_single_view'])->middleware(admin::class);
Route::get('/admin-mt-134/deposit/approval/{id}', [App\Http\Controllers\admincontrol::class, 'deposit_approval'])->middleware(admin::class);
Route::get('/admin-mt-134/deposit/back/{id}', [App\Http\Controllers\admincontrol::class, 'deposit_back'])->middleware(admin::class);
Route::get('/admin-mt-134/deposit/delete/{id}', [App\Http\Controllers\admincontrol::class, 'deposit_delete'])->middleware(admin::class);

// deoisut route area end

//withdroad route area start
Route::get('/admin-mt-134/withdroad', [App\Http\Controllers\admincontrol::class, 'withdroad'])->middleware(admin::class);
Route::get('/admin-mt-134/withdroad/view/{id}', [App\Http\Controllers\admincontrol::class, 'withdroad_single_view'])->middleware(admin::class);
Route::get('/admin-mt-134/withdroad/approval/{id}', [App\Http\Controllers\admincontrol::class, 'withdroad_approval'])->middleware(admin::class);
Route::post('/admin-mt-134/withdroad/approval/{id}', [App\Http\Controllers\admincontrol::class, 'withdroad_approval_update'])->middleware(admin::class);
Route::get('/admin-mt-134/withdroad/back/{id}', [App\Http\Controllers\admincontrol::class, 'withdroad_back'])->middleware(admin::class);
Route::get('/admin-mt-134/withdroad/edit/{id}', [App\Http\Controllers\admincontrol::class, 'withdroad_edit'])->middleware(admin::class);
Route::post('/admin-mt-134/withdroad/edit/{id}', [App\Http\Controllers\admincontrol::class, 'withdroad_update'])->middleware(admin::class);
Route::get('/admin-mt-134/withdroad/delete/{id}', [App\Http\Controllers\admincontrol::class, 'withdroad_delete'])->middleware(admin::class);

// withdroad route area end

// catagory route area start
Route::get('/admin-mt-134/catagory', [App\Http\Controllers\catagorys::class, 'index'])->middleware(admin::class);
Route::post('/admin-mt-134/catagory', [App\Http\Controllers\catagorys::class, 'store'])->middleware(admin::class);
Route::get('/admin-mt-134/catagory/delete/{id}', [App\Http\Controllers\catagorys::class, 'destroy'])->middleware(admin::class);
Route::get('/admin-mt-134/catagory/edit/{id}', [App\Http\Controllers\catagorys::class, 'edit'])->middleware(admin::class);
Route::post('/admin-mt-134/catagory/update/{id}', [App\Http\Controllers\catagorys::class, 'update'])->middleware(admin::class);

// catagory route area end
// our service route area start
Route::resource('our_services', ourServiceController::class)->middleware(admin::class);
// our service route area end
// search route area start
Route::post('service_search', [search::class, 'search_searvice'])->name('search_searvice.search_searvice');
Route::post('search_find_partner_client_view', [search::class, 'search_find_partner_client_view'])->name('search_find_partner_client_view.search_find_partner_client_view');
Route::post('add_click_earn_search', [search::class, 'search_searvice'])->name('add_click_earn_search.search_searvice');
Route::post('search_click_earn', [search::class, 'search_click_earn'])->name('search_click_earn.search_click_earn');
Route::post('search_job_post', [search::class, 'search_job_post'])->name('search_job_post.search_job_post');
Route::post('search_product', [search::class, 'search_product'])->name('search_product.search_product');
Route::post('search_home_made_food_sell', [search::class, 'search_home_made_food_sell'])->name('search_home_made_food_sell.search_home_made_food_sell');
Route::post('search_our_service_client_view', [search::class, 'search_our_service_client_view'])->name('search_our_service_client_view.search_our_service_client_view');
// Route::post('add_click_earn_search', [search::class, 'search_searvice'])->name('search_searvice.search_searvice');

// search route area end   
// admin route area end
