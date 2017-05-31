<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'car_number',
    ];

    /**
     * Get the car bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the car type that owns the car.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }

    /**
     * Scope a query to only include car that's free.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFree($query)
    {
        return $query->whereDoesntHave('bookings')
            ->orWhereHas('bookings', function ($query) {
                $query->where('date_finish', '<', Carbon::now());
            });
    }

    /**
     * Scope a query to only include car that's free on given date.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Carbon\Carbon  $from
     * @param  \Carbon\Carbon  $until
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFreeOn($query, Carbon $from, Carbon $until)
    {
        return $query->whereDoesntHave('bookings', function ($query) use ($from, $until) {
                $query->where(function ($query) use ($from, $until) {
                    $query->where('date_start', '>=', $from)
                        ->where('date_finish', '<=', $until);
                })->orWhere(function ($query) use ($from, $until) {
                    $query->where('date_finish', '>=', $from)
                        ->where('date_start', '<=', $until);
                });
            });
    }
}
