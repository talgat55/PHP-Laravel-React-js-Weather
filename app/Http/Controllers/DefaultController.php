<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiWeatherService;

class DefaultController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     */
    public function index(ApiWeatherService $apiWeatherService)
    {
        $apiKey = config('app.API_WEATHER');

        $data = $apiWeatherService->getDataByUrl('524901',$apiKey,'ru','metric');

        return view('index', compact('data'));
    }

}
