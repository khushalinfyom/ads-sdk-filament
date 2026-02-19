<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ApplicationHighEnabledResource;
use App\Http\Resources\ApplicationIPMediumTrackedResource;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Country;
use App\Models\CountryMediumRate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ApplicationAPIController extends AppBaseController
{
    /**
     * Display the specified resource.
     *
     * @param   $pkgName
     * @return Response
     */
    public function getData($pkgName, Request $request)
    {
        $application = Application::where('package_name', $pkgName)->first();

        if (!$application->midium_rate_ip_tracking) {
            $ip = $request->ip();
            $data = $this->getCountryCode($ip);
            if (isset($data['error'])) {
                return $this->sendResponse([new ApplicationResource($application)], 'Data retrivied successfully');
            }
            $countryCode = $data['countryCode'];
            $countryExists = CountryMediumRate::where('medium_rate_countries_code', $countryCode)->exists();
            if ($countryExists) {
                return $this->sendResponse([new ApplicationResource($application)], 'Data retrivied successfully');
            }
        }


        if ($application->ip_tracking) {
            $ip = $request->ip();
            $data = $this->getCountryCode($ip);
            if (isset($data['error'])) {
                return $this->sendResponse([new ApplicationResource($application)], 'Data retrivied successfully');
            }
            $countryCode = $data['countryCode'];
            $countryExists = Country::where('code', $countryCode)->exists();
            if ($countryExists) {
                return $this->sendResponse([new ApplicationHighEnabledResource($application)], 'Data retrivied successfully');
            }

            $countryExists = CountryMediumRate::where('medium_rate_countries_code', $countryCode)->exists();
            if ($countryExists) {
                return $this->sendResponse([new ApplicationIPMediumTrackedResource($application)], 'Data retrivied successfully');
            }
        }

        return $this->sendResponse([new ApplicationResource($application)], 'Data retrivied successfully');
    }

    public function getCountryCode($ip)
    {
        try {
            $url = file_get_contents("https://api.ipinfo.io/lite/$ip?token=03dde7fbcea6c3");
            $countryCode = json_decode($url)->country_code;
            Log::info("Retrieved country code for ipinfo.io: $countryCode");

            return [
                'countryCode' => $countryCode
            ];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            try {
                $url = file_get_contents("http://ipwho.is/$ip");
                $countryCode = json_decode($url)->country_code;
                Log::info("Retrieved country code for ipwho.is: $countryCode");

                return [
                    'countryCode' => $countryCode
                ];
            } catch (\Exception $e) {
                Log::error($e->getMessage());

                try {
                    $url = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);
                    $countryCode = json_decode($url)->geoplugin_countryCode;
                    Log::info("Retrieved country code for geoplugin.net: $countryCode");

                    return [
                        'countryCode' => $countryCode
                    ];
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    return [
                        'error' => true
                    ];
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param   $pkgName
     * @return Response
     */
    public function getCountry(Request $request)
    {
        $ip = $request->ip();
        $url = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);
        $data = json_decode($url);

        $data = [
            'countryCode' => $data->geoplugin_countryCode,
            'countryName' => $data->geoplugin_countryName,
            'region' => $data->geoplugin_regionName,
            'regionCode' => $data->geoplugin_regionCode,
            'city' => $data->geoplugin_city,
            'timezone' => $data->geoplugin_timezone,
        ];

        return $this->sendResponse($data, 'Data retrieved successfully.');
    }
}
