<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::apiResource('rooms', RoomController::class);
Route::apiResource('bookings', BookingController::class);
Route::get('/bookings/{emailGuest}/my-bookings', [BookingController::class, 'getMyBookings'])->name('bookings.my');
Route::get('/bookings/{booking_id}/update-status', [BookingController::class, 'updateStatus'])->name('bookings.update-status');
