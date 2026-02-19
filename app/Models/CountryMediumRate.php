<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryMediumRate extends Model
{
    use HasFactory;

    protected $table = 'countries_medium_rate';
    protected $fillable = ['medium_rate_countries_name', 'medium_rate_countries_code'];
}
