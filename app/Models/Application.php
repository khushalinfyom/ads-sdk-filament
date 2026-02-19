<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'package_name',
      "display_time",
      "place_add",
      "ip_tracking",
      "midium_rate_ip_tracking",
    ];

    public static $rules = [
      'name'=> 'required|unique:applications,name',
      'package_name'=> 'required|unique:applications,package_name',
    ];

    public function googleAds(){
        return $this->hasOne(GoogleAds::class);
    }
    public function facebook(){
        return $this->hasOne(Facebook::class);
    }
    public function startUp(){
        return $this->hasOne(StartUp::class);
    }
    public function qureka(){
        return $this->hasOne(Qureka::class);
    }
}
