<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Room extends Model
{
    use HasFactory, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id',
        'number',
        'size',
        'bath',
        'wifi',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hotel_id' => 'integer',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function toSearchableArray(): array
    {
        $rooms = $this->select('id', 'hotel_id', 'bath', 'size', 'number')->with('hotel')->first()->toArray();

        return [
            'id' => (int) $this->id,
            'bath' => (int) $this->bath,
            'size' => (int) $this->size,
            'hotelName' => (string) $this->hotel->name,
        ];
    }

    public function searchableAs(): string
    {
        return 'rooms_index';
    }

    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with('hotel');
    }
}
