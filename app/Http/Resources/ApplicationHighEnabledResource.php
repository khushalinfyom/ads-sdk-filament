<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationHighEnabledResource extends JsonResource
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
                'app_id'                => !empty($this->googleAds->app_id_with_ip) ? $this->googleAds->app_id_with_ip : $this->googleAds->app_id,
                'interstitial'          => !empty($this->googleAds->interstitial_with_ip) ? $this->googleAds->interstitial_with_ip : $this->googleAds->interstitial,
                'native'                => !empty($this->googleAds->native_with_ip) ? $this->googleAds->native_with_ip : $this->googleAds->native,
                'banner'                => !empty($this->googleAds->banner_with_ip) ? $this->googleAds->banner_with_ip : $this->googleAds->banner,
                'rewarded'              => !empty($this->googleAds->rewarded_with_ip) ? $this->googleAds->rewarded_with_ip : $this->googleAds->rewarded,
                'app_open'              => !empty($this->googleAds->app_open_with_ip) ? $this->googleAds->app_open_with_ip : $this->googleAds->app_open,
                'google_collapsible_banner'              => !empty($this->googleAds->app_open_with_ip) ? $this->googleAds->google_collapsible_banner_with_ip : $this->googleAds->google_collapsible_banner,
                'app_id_second'         => !empty($this->googleAds->app_id_with_ip) ? $this->googleAds->app_id_with_ip : $this->googleAds->app_id_second,
                'interstitial_second'   => !empty($this->googleAds->interstitial_with_ip) ? $this->googleAds->interstitial_with_ip : $this->googleAds->interstitial_second,
                'native_second'         => !empty($this->googleAds->native_with_ip) ? $this->googleAds->native_with_ip : $this->googleAds->native_second,
                'banner_second'         => !empty($this->googleAds->banner_with_ip) ? $this->googleAds->banner_with_ip : $this->googleAds->banner_second,
                'rewarded_second'       => !empty($this->googleAds->rewarded_with_ip) ? $this->googleAds->rewarded_with_ip : $this->googleAds->rewarded_second,
                'app_open_second'       => !empty($this->googleAds->app_open_with_ip) ? $this->googleAds->app_open_with_ip : $this->googleAds->app_open_second,
                'app_id_third'          => !empty($this->googleAds->app_id_with_ip) ? $this->googleAds->app_id_with_ip : $this->googleAds->app_id_third,
                'interstitial_third'    => !empty($this->googleAds->interstitial_with_ip) ? $this->googleAds->interstitial_with_ip : $this->googleAds->interstitial_third,
                'native_third'          => !empty($this->googleAds->native_with_ip) ? $this->googleAds->native_with_ip : $this->googleAds->native_third,
                'banner_third'          => !empty($this->googleAds->banner_with_ip) ? $this->googleAds->banner_with_ip : $this->googleAds->banner_third,
                'rewarded_third'        => !empty($this->googleAds->rewarded_with_ip) ? $this->googleAds->rewarded_with_ip : $this->googleAds->rewarded_third,
                'app_open_third'        => !empty($this->googleAds->app_open_with_ip) ? $this->googleAds->app_open_with_ip : $this->googleAds->app_open_third,
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
