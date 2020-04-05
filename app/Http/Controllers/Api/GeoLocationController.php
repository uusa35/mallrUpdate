<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Geocoder\Geocoder;

class GeoLocationController extends Controller
{
    public $client;
    public $geocoder;

    public function __construct()
    {
        $client = new \GuzzleHttp\Client();

        $this->geocoder = new Geocoder($client);
        $this->geocoder->setApiKey(config('geocoder.key'));
        $this->geocoder->setLanguage(request()->header('lang') ? request()->header('lang') : 'ar');
    }

    public function getAddressFromLocation(Request $request)
    {
        $validate = validator($request->all(), [
            'longitude' => 'required|min:4',
            'latitude' => 'required|min:4'
        ]);
        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()], 400);
        }
        $address = $this->geocoder->getAddressForCoordinates($request->latitude, $request->longitude);
        if($address) {
            return response()->json([
                'address' => $address['formatted_address'],
                'latitude' => $address['lat'],
                'longitude' => $address['lng'],
            ], 200);
        }
        return response()->json(['message' => trans('message.address_not_found')],400);
    }
}
