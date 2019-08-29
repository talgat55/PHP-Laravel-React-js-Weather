<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiWeatherService;
class ApiController extends Controller
{

    /**
     * Get data from API
     * @param ApiWeatherService $apiWeatherService
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ApiWeatherService $apiWeatherService,Request $request)
    {
        $city = $request->get('q');
        $unity = $request->get('units');
        return response()->json($apiWeatherService->getRedyData($city,'ru',$unity));
    }

    public function check(ApiWeatherService $apiWeatherService,Request $request)
    {
        $city = $request->get('q');
        $unity = $request->get('units');
        return response()->json($apiWeatherService->getRedyData('Киев','ru','metric'));
    }
}
