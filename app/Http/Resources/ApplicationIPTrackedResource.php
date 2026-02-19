<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationIPTrackedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $isHighEnabled = $this->ip_tracking;
        $isMediumEnabled = $this->midium_rate_ip_tracking;

        if ($isHighEnabled) {
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
        } else {
            return [
                'google'    => [
                    'app_id'                => !$isMediumEnabled ? $this->googleAds->app_id : $this->googleAds->app_id_with_ip,
                    'interstitial'          => !$isMediumEnabled ? $this->googleAds->interstitial : $this->googleAds->interstitial_with_ip,
                    'native'                => !$isMediumEnabled ? $this->googleAds->native : $this->googleAds->native_with_ip,
                    'banner'                => !$isMediumEnabled ? $this->googleAds->banner : $this->googleAds->banner_with_ip,
                    'rewarded'              => !$isMediumEnabled ? $this->googleAds->rewarded : $this->googleAds->rewarded_with_ip,
                    'app_open'              => !$isMediumEnabled ? $this->googleAds->app_open : $this->googleAds->app_open_with_ip,
                    'google_collapsible_banner'              => !$isMediumEnabled ? $this->googleAds->google_collapsible_banner : $this->googleAds->google_collapsible_banner_with_ip,
                    'app_id_second'         => !$isMediumEnabled ? $this->googleAds->app_id_second : $this->googleAds->app_id_with_ip,
                    'interstitial_second'   => !$isMediumEnabled ? $this->googleAds->interstitial_second : $this->googleAds->interstitial_with_ip,
                    'native_second'         => !$isMediumEnabled ? $this->googleAds->native_second : $this->googleAds->native_with_ip,
                    'banner_second'         => !$isMediumEnabled ? $this->googleAds->banner_second : $this->googleAds->banner_with_ip,
                    'rewarded_second'       => !$isMediumEnabled ? $this->googleAds->rewarded_second : $this->googleAds->rewarded_with_ip,
                    'app_open_second'       => !$isMediumEnabled ? $this->googleAds->app_open_second : $this->googleAds->app_open_with_ip,
                    'app_id_third'          => !$isMediumEnabled ? $this->googleAds->app_id_third : $this->googleAds->app_id_with_ip,
                    'interstitial_third'    => !$isMediumEnabled ? $this->googleAds->interstitial_third : $this->googleAds->interstitial_with_ip,
                    'native_third'          => !$isMediumEnabled ? $this->googleAds->native_third : $this->googleAds->native_with_ip,
                    'banner_third'          => !$isMediumEnabled ? $this->googleAds->banner_third : $this->googleAds->banner_with_ip,
                    'rewarded_third'        => !$isMediumEnabled ? $this->googleAds->rewarded_third : $this->googleAds->rewarded_with_ip,
                    'app_open_third'        => !$isMediumEnabled ? $this->googleAds->app_open_third : $this->googleAds->app_open_with_ip,
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
}
