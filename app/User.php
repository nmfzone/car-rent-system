<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'phone', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Always set and make name attribute as 'ucwords'.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    /**
     * Get the user type representation in number.
     *
     * @return integer|null
     */
    public function getTypeInNumberAttribute()
    {
        switch (strtoupper($this->attributes['type'])) {
            case 'OWNER':
                return 1;
            case 'CUSTOMER':
                return 2;
            default:
                return null;
        }
    }

    /**
     * Scope a query to only include user with type Customer.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCustomer($query)
    {
        return $query->where('type', 'CUSTOMER');
    }

    /**
     * Scope a query to only include user with type Owner.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOwner($query)
    {
        return $query->where('type', 'OWNER');
    }

    /**
     * Determine the user is customer.
     *
     * @return boolean
     */
    public function isCustomer()
    {
        return $this->attributes['type'] === 'CUSTOMER';
    }

    /**
     * Determine the user is owner.
     *
     * @return boolean
     */
    public function isOwner()
    {
        return $this->attributes['type'] === 'OWNER';
    }

    /**
     * Get the user bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Assign the user with given type.
     *
     * @param  string  $value
     * @return void
     */
    public function assign($value)
    {
        $this->attributes['type'] = strtoupper($value);
    }
}
