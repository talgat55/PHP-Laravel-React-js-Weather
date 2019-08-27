<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 27.08.19
 * Time: 18:15
 */
namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class ApiWeatherService {

    public function getDataByUrl( $idCity = null, $apiKey = null, $lang = 'en', $units = 'imperial' )
    {
//        $response = Curl::to("http://api.openweathermap.org/data/2.5/weather?id=$idCity&appid=$apiKey&lang=$lang&units=$units")
//            ->get();
        $response  = '{"coord":{"lon":37.62,"lat":55.75},"weather":[{"id":800,"main":"Clear","description":"ясно","icon":"01d"}],"base":"stations","main":{"temp":294.15,"pressure":1020,"humidity":52,"temp_min":294.15,"temp_max":294.15},"visibility":10000,"wind":{"speed":6,"deg":340},"clouds":{"all":0},"dt":1566910978,"sys":{"type":1,"id":9029,"message":0.0109,"country":"RU","sunrise":1566872633,"sunset":1566923937},"timezone":10800,"id":524901,"name":"Moscow","cod":200}';

        return $response;
    }
}
?>

