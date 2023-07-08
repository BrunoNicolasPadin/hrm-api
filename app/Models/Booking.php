<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id',
        'nameGuest',
        'emailGuest',
        'from',
        'end',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'room_id' => 'integer',
        'from' => 'timestamp',
        'end' => 'timestamp',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
