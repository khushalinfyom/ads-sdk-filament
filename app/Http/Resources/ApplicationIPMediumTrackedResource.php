<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationIPMediumTrackedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'google'    => [
                'app_id'                => !empty($this->googleAds->midium_rate_google_app_id) ? $this->googleAds->midium_rate_google_app_id : $this->googleAds->app_id,
                'interstitial'          => !empty($this->googleAds->midium_rate_google_interstitial) ? $this->googleAds->midium_rate_google_interstitial : $this->googleAds->interstitial,
                'native'                => !empty($this->googleAds->midium_rate_google_native) ? $this->googleAds->midium_rate_google_native : $this->googleAds->native,
                'banner'                => !empty($this->googleAds->midium_rate_google_banner) ? $this->googleAds->midium_rate_google_banner : $this->googleAds->banner,
                'rewarded'              => !empty($this->googleAds->midium_rate_google_rewarded) ? $this->googleAds->midium_rate_google_rewarded : $this->googleAds->rewarded,
                'app_open'              => !empty($this->googleAds->midium_rate_google_app_open) ? $this->googleAds->midium_rate_google_app_open : $this->googleAds->app_open,
                'google_collapsible_banner'              => !empty($this->googleAds->midium_rate_google_app_open) ? $this->googleAds->midium_rate_google_collapsible_banner : $this->googleAds->google_collapsible_banner,

                'app_id_second'         => !empty($this->googleAds->midium_rate_google_app_id) ? $this->googleAds->midium_rate_google_app_id : $this->googleAds->app_id_second,
                'interstitial_second'   => !empty($this->googleAds->midium_rate_google_interstitial) ? $this->googleAds->midium_rate_google_interstitial : $this->googleAds->interstitial_second,
                'native_second'         => !empty($this->googleAds->midium_rate_google_native) ? $this->googleAds->midium_rate_google_native : $this->googleAds->native_second,
                'banner_second'         => !empty($this->googleAds->midium_rate_google_banner) ? $this->googleAds->midium_rate_google_banner : $this->googleAds->banner_second,
                'rewarded_second'       => !empty($this->googleAds->midium_rate_google_rewarded) ? $this->googleAds->midium_rate_google_rewarded : $this->googleAds->rewarded_second,
                'app_open_second'       => !empty($this->googleAds->midium_rate_google_app_open) ? $this->googleAds->midium_rate_google_app_open : $this->googleAds->app_open_second,
                'app_id_third'          => !empty($this->googleAds->midium_rate_google_app_id) ? $this->googleAds->midium_rate_google_app_id : $this->googleAds->app_id_third,
                'interstitial_third'    => !empty($this->googleAds->midium_rate_google_interstitial) ? $this->googleAds->midium_rate_google_interstitial : $this->googleAds->interstitial_third,
                'native_third'          => !empty($this->googleAds->midium_rate_google_native) ? $this->googleAds->midium_rate_google_native : $this->googleAds->native_third,
                'banner_third'          => !empty($this->googleAds->midium_rate_google_banner) ? $this->googleAds->midium_rate_google_banner : $this->googleAds->banner_third,
                'rewarded_third'        => !empty($this->googleAds->midium_rate_google_rewarded) ? $this->googleAds->midium_rate_google_rewarded : $this->googleAds->rewarded_third,
                'app_open_third'        => !empty($this->googleAds->midium_rate_google_app_open) ? $this->googleAds->midium_rate_google_app_open : $this->googleAds->app_open_third,
                'display_time'          => $this->display_time,
                'place_add'             => $this->place_add,
            ],
            'facebook'  => [
                'interstitial' => $this->facebook->interstitial,
                'native'       => $this->facebook->native,
                'banner'       => $this->facebook->banner,
            ],
            'start_ups' => [
                'app_id' => $this->startUp->app_id,
            ],
            'qureka'  => [
                'interstitial' => $this->qureka->interstitial ?? null,
                'interstitial_image' => $this->qureka->interstitial_image ?? null,
                'native'       => $this->qureka->native ?? null,
                'native_image' => $this->qureka->native_image ?? null,
                'banner'       => $this->qureka->banner ?? null,
                'banner_image' => $this->qureka->banner_image ?? null,
            ],
        ];
    }
}
