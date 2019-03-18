<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Address extends Model
{
    use Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'apartment_name',
        'street_details',
        'city_name',
        'location',
        'lat',
        'lng',
        'address_name',
        'country_code',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
          'remember_token',
    ];

    /**
     * Address tokens relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * Return the country code and phone number concatenated
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->country_code.$this->phone;
    }
}
