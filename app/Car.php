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
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFree($query)
    {
        return $query->whereDoesntHave('bookings')
            ->orWhereHas('bookings', function ($query) {
                $query->where('date_finish', '<', Carbon::now());
            });
    }
}
