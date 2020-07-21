<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Fillable example -> Implicitely passing data to be saved to the database
    // protected $fillable = ['name', 'email', 'address', 'active'];

    // Guarded example -> Does mass assignment without checking which data to be stored.
    // Mass assignment 
    protected $guarded = [];

    // Eloquent Scope - always use the 'scope' word infront of the function or scope type.
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    // Eloquent Scope - always use the 'scope' word infront of the function or scope type. 
    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}  

