<?php

namespace App\Listeners;

use App\Events\StatusBookingUpdated;
use App\Models\Booking;

class UpdateBookingStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StatusBookingUpdated $event): void
    {
        $booking = Booking::findOrFail($event->id);
        $booking->status = $event->status;
        $booking->save();
    }
}
