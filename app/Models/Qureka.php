<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Qureka extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "application_id",
        "interstitial",
        "native",
        "banner",
        "admob_click_gap"
    ];

    const QUREKA_INTERSTITIAL_IMAGE = 'qureka_interstitial_image';
    const QUREKA_NATIVE_IMAGE = 'qureka_native_image';
    const QUREKA_BANNER_IMAGE = 'qureka_banner_image';

    public function application(){
        return $this->belongsTo(Application::class);
    }

    protected $appends = ['interstitial_image','native_image','banner_image'];

    public function getInterstitialImageAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::QUREKA_INTERSTITIAL_IMAGE)->first();

        if (!empty($media)) {

            return $media->getFullUrl();
        }

        return asset('images/avatar.png');
    }
    public function getNativeImageAttribute(): string
    {
        $media = $this->getMedia(self::QUREKA_NATIVE_IMAGE)->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return asset('images/avatar.png');
    }
    public function getBannerImageAttribute(): string
    {
        $media = $this->getMedia(self::QUREKA_BANNER_IMAGE)->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return asset('images/avatar.png');
    }
}
