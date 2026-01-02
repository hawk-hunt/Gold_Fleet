<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapDashboardController;
use App\Http\Controllers\InfoDashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FuelFillupController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard routes
    Route::get('/dashboard/map', [MapDashboardController::class, 'index'])->name('dashboard.map');
    Route::get('/dashboard/info', [InfoDashboardController::class, 'index'])->name('dashboard.info');
    Route::get('/dashboard/info/chart-data', [InfoDashboardController::class, 'getChartData'])->name('dashboard.info.chart-data');

    // Map dashboard API
    Route::get('/api/vehicle-locations', [MapDashboardController::class, 'getVehicleLocations'])->name('api.vehicle-locations');

    // Resource routes for fleet management
    Route::resource('vehicles', VehicleController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('trips', TripController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('inspections', InspectionController::class);
    Route::resource('issues', IssueController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('fuel-fillups', FuelFillupController::class);
    Route::resource('reminders', ReminderController::class);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Notification routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::patch('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
});

require __DIR__.'/auth.php';
