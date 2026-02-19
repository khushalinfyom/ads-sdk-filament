<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleAds extends Model
{
    use HasFactory;

    protected $fillable = [
        "application_id",
        "app_id",
        "interstitial",
        "native",
        "banner",
        "google_collapsible_banner",
        "rewarded",
        "app_open",
        "app_id_second",
        "interstitial_second",
        "native_second",
        "banner_second",
        "google_collapsible_banner_second",
        "rewarded_second",
        "app_open_second",
        "app_id_third",    
        "interstitial_third",
        "native_third",
        "banner_third",
        "google_collapsible_banner_third",
        "rewarded_third",
        "app_open_third",
        "app_id_with_ip",
        "interstitial_with_ip",
        "native_with_ip",
        "banner_with_ip",
        "google_collapsible_banner_with_ip",
        "rewarded_with_ip",
        "app_open_with_ip",
        "midium_rate_google_app_id",
        "midium_rate_google_interstitial",
        "midium_rate_google_native",
        "midium_rate_google_banner",
        "midium_rate_google_collapsible_banner",
        "midium_rate_google_rewarded",
        "midium_rate_google_app_open",
    ];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
