<?php
use App\Http\Controllers\Backend\RoomListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Backend\ReportController;

use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\FrontendRoomController;
use App\Http\Controllers\Frontend\BookingController;




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
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'Index']);

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'UserProfile'])
        ->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'UserStore'])
        ->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])
        ->name('user.change.password');
    Route::post('/password/change/password', [UserController::class, 'ChangePasswordStore'])
        ->name('password.change.store');


});

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
        ->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])
        ->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])
        ->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])
        ->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])
        ->name('admin.password.update');


});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
    ->name('admin.login');
Route::middleware(['auth', 'roles:admin'])->group(function () {

    Route::controller(TeamController::class)->group(function () {
        Route::get('/all/team', 'AllTeam')->name('all.team');
        Route::get('/add/team', 'AddTeam')->name('add.team');
        Route::post('/team/store', 'StoreTeam')->name('team.store');
        Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
        Route::post('/team/update', 'UpdateTeam')->name('team.update');
        Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');



    });

    Route::controller(TeamController::class)->group(function () {


        Route::get('/book/area', 'BookArea')->name('book.area');
        Route::post('/book/area/update', 'BookAreaUpdate')->name('book.area.update');
    });
    Route::controller(RoomTypeController::class)->group(function () {


        Route::get('/room/type/list', 'RoomTypeList')->name('room.type.list');
        Route::get('/add/room/type', 'AddRoomType')->name('add.room.type');
        Route::post('/room/type/store', 'RoomTypeStore')->name('room.type.store');
    });
    Route::controller(RoomController::class)->group(function () {


        Route::get('/edit/room/{id}', 'EditRoom')->name('edit.room');
        Route::post('/update/room/{id}', 'UpdateRoom')->name('update.room');
        Route::get('/multi/image/delete/{id}', 'MultiImageDelete')->name('multi.image.delete');
        Route::post('/store/room/no/{id}', 'StoreRommeNumber')->name('store.room.no');
        Route::get('/edit/roomno/{id}', 'EditRomeNumber')->name('edit.roomno');
        Route::post('/update/roomno/{id}', 'UpdateRoomNumber')->name('update.roomno');
        Route::get('/delete/roomno/{id}', 'DeleteRoomNumber')->name('delete.roomno');
        Route::get('/delete/room/{id}', 'DeleteRoom')->name('delete.room');

    });



    Route::controller(BookingController::class)->group(function () {


        Route::get('/booking/list', 'BookingList')->name('booking.list');
        Route::get('/edit_booking/{id}', 'EditBooking')->name('edit_booking');
        Route::get('/download/invoice/{id}', 'DownloadInvoice')->name('download.invoice');


    });

    Route::controller(RoomListController::class)->group(function () {
        Route::get('/view/room/list', 'ViewRoomList')->name('view.room.list');
        Route::get('/add/room/list', 'AddRoomList')->name('add.room.list');
        Route::post('/store/roomlist', 'StoreRoomList')->name('store.roomlist');

    });
    Route::controller(SettingController::class)->group(function () {
        Route::get('/smtp/setting', 'SmtpSetting')->name('stmp.setting');
        Route::get('/smtp/update', 'SmtpUpdate')->name('stmp.update');

    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('/booking/report', 'BookingReport')->name('booking.report');
        Route::post('/search-by-date', 'SearchByDate')->name('searsh-by-date');

    });






});


Route::controller(FrontendRoomController::class)->group(function () {


    Route::get('/rooms', 'AllFrontendRoomList')->name('froom.all');
    Route::get('/room/details/{id}', 'RoomDeltailsPage')->name('details.all');
    Route::get('/bookings', 'BookingSearch')->name('booking.search');
    Route::get('/search/room/detalis/{id}', 'SearchRoomDetalis')->name('search_room_details');
    Route::get('/check_room_availability/ ', 'CheckRoomAvailability')->name('check_room_availability');


});

// Auth Middleware User Login
Route::middleware(['auth'])->group(function () {
    Route::controller(BookingController::class)->group(function () {


        Route::get('/checkout/ ', 'Checkout')->name('checkout');
        Route::post('/booking/store/', 'BookingStore')->name('user_booking_store');
        Route::post('/checkout/store/', 'CheckoutStore')->name('checkout.store');
        Route::match(['get', 'post'], '/stripe_pay', [BookingController::class, 'stripe_pay'])->name('stripe_pay');


        Route::post('/update/booking/status/{id}', 'UpdateBookingStatus')->name('update.booking.status');
        Route::post('/update/booking/{id}/booking', 'UpdateBooking')->name('update.booking');
        
        ///Assign Room Route
        Route::get('/assign_room/{id}', 'AssignRoom')->name('assign_room');

        Route::get('/assign_room/store/{booking_id}/{room_number_id}', 'AssignRoomStore')->name('assign_room_store');
        Route::get('/assign_room_delete/{id}', 'AssignRoomDelete')->name('assign_room_delete');

////////////////// User Booking Route /////////////////////
        Route::get('/user/booking','UserBooking')->name('user.booking');
        Route::get('/user/invoice/{id}','UserInvoice')->name('user.invoice');


});


}); //End 

///Notification////
Route::controller(BookingController::class)->group(function () {


    
    Route::post('/mark-notification-as-read/{notification}', 'markAsRead');


});