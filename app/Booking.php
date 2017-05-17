<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'note',
    ];

    /**
     * The attributes casted to Carbon\Carbon object
     *
     * @var array
     */
    protected $dates = [
        'date_start',
        'date_finish',
    ];

    /**
     * Scope a query to only include booking that's ongoing.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOngoing($query)
    {
        return $query->where('date_finish', '>', Carbon::now());
    }

    /**
     * Get the user that owns the booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the car that owns the booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
