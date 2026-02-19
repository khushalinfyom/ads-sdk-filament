<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
                'app_id'                => $this->googleAds->app_id,
                'interstitial'          => $this->googleAds->interstitial,
                'native'                => $this->googleAds->native,
                'banner'                => $this->googleAds->banner,
                'google_collapsible_banner'  => $this->googleAds->google_collapsible_banner,
                'rewarded'              => $this->googleAds->rewarded,
                'app_open'              => $this->googleAds->app_open,
                'app_id_second'         => $this->googleAds->app_id_second,
                'interstitial_second'   => $this->googleAds->interstitial_second,
                'native_second'         => $this->googleAds->native_second,
                'banner_second'         => $this->googleAds->banner_second,
                'google_collapsible_banner_second'  => $this->googleAds->google_collapsible_banner_second,
                'rewarded_second'       => $this->googleAds->rewarded_second,
                'app_open_second'       => $this->googleAds->app_open_second,
                'app_id_third'          => $this->googleAds->app_id_third,
                'interstitial_third'    => $this->googleAds->interstitial_third,
                'native_third'          => $this->googleAds->native_third,
                'banner_third'          => $this->googleAds->banner_third,
                'google_collapsible_banner_third'  => $this->googleAds->google_collapsible_banner_third,
                'rewarded_third'        => $this->googleAds->rewarded_third,
                'app_open_third'        => $this->googleAds->app_open_third,
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
                "admob_click_gap" => $this->qureka->admob_click_gap ?? null,
                'banner_image' => $this->qureka->banner_image ?? null,
            ],
        ];
    }
}
