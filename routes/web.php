<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\AdminUserController;
use App\Http\Controllers\backend\assign\AssignController;
use App\Http\Controllers\backend\checkIn\CheckInController;
use App\Http\Controllers\backend\role\RoleController;
use App\Http\Controllers\backend\course\CourseController;
use App\Http\Controllers\backend\timeSetup\TimeSetupController;
use App\Http\Controllers\backend\users\UserController;
use App\Http\Controllers\frontend\LoginUserController;
use App\Http\Controllers\ProfileController;
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
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin-login', [LoginUserController::class, 'adminLogin'])->name('admin-login');
Route::post('/admin-login', [LoginController::class, 'adminLogin'])->name('admin-login');
Route::get('/admin-logout', [LoginUserController::class, 'adminLogout'])->name('admin-logout');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', function () {
            return view('backends.dashboard.index');
        })->name('dashboard');
        
        /**
         * Users
         */
        Route::get('/users', [UserController::class, 'index'])->name('users-list');
        Route::get('/users/create', [UserController::class, 'create'])->name('users-create');
        Route::post('/users/create', [UserController::class, 'store'])->name('users-submit');
        Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users-delete');

        Route::get('/users/update/{id}', [UserController::class, 'edit'])->name('users-edit');
        Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users-update');
        Route::get('/users/update-service/{service_id}', [UserController::class, 'editUserService'])->name('user-service-update');

        /**
         * TimeSetup
         */
        Route::get('/time-setups', [TimeSetupController::class, 'index'])->name('time-setups-list');
        Route::get('/time-setups/create', [TimeSetupController::class, 'create'])->name('time-setups-create');
        Route::post('/time-setups/create', [TimeSetupController::class, 'store'])->name('time-setups-submit');
        Route::get('/time-setups/delete/{id}', [TimeSetupController::class, 'destroy'])->name('time-setups-delete');

        Route::get('/time-setups/update/{id}', [TimeSetupController::class, 'edit'])->name('time-setups-edit');
        Route::post('/time-setups/update/{id}', [TimeSetupController::class, 'update'])->name('time-setups-update');
        // Route::get('/users/update-service/{service_id}', [TimeSetupController::class, 'editUserService'])->name('user-service-update');
        
        /**
         * course
         */
        Route::get('/course', [CourseController::class, 'index'])->name('course-list');
        Route::get('/course/create', [CourseController::class, 'create'])->name('course-create');
        Route::post('/course/create', [CourseController::class, 'store'])->name('course-submit');
        Route::get('/course/delete/{id}', [CourseController::class, 'destroy'])->name('course-delete');

        Route::get('/course/update/{id}', [CourseController::class, 'edit'])->name('course-edit');
        Route::post('/course/update/{id}', [CourseController::class, 'update'])->name('course-update');
        // Route::get('/users/update-service/{service_id}', [TimeSetupController::class, 'editUserService'])->name('user-service-update');

        /**
         * assign
         */
        Route::get('/assign', [AssignController::class, 'index'])->name('assign-list');
        Route::get('/assign/create', [AssignController::class, 'create'])->name('assign-create');
        Route::post('/assign/create', [AssignController::class, 'store'])->name('assign-submit');
        Route::get('/assign/delete/{id}', [AssignController::class, 'destroy'])->name('assign-delete');

        Route::get('/assign/update/{id}', [AssignController::class, 'edit'])->name('assign-edit');
        Route::post('/assign/update/{id}', [AssignController::class, 'update'])->name('assign-update');
        // Route::get('/users/update-service/{service_id}', [TimeSetupController::class, 'editUserService'])->name('user-service-update');

        /**
         * student checking
         */
        Route::get('/check-in', [CheckInController::class, 'index'])->name('check-in-list');
        Route::get('/check-in/create', [CheckInController::class, 'create'])->name('check-in-create');
        Route::post('/check-in/create', [CheckInController::class, 'store'])->name('check-in-submit');
        Route::get('/check-in/delete/{id}', [CheckInController::class, 'destroy'])->name('check-in-delete');

        Route::get('/check-in/update/{id}', [CheckInController::class, 'edit'])->name('check-in-edit');
        Route::post('/check-in/update/{id}', [CheckInController::class, 'update'])->name('check-in-update');
        // Route::get('/users/update-service/{service_id}', [TimeSetupController::class, 'editUserService'])->name('user-service-update');
        
    });
    /**
     * Roles
     */

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('admins', AdminUserController::class);
    });
});

require __DIR__ . '/auth.php';
