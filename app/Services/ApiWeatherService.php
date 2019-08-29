<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 27.08.19
 * Time: 18:15
 */
namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class ApiWeatherService
{

    /**
     * Get data from api
     * @param string $cityName
     * @param null $apiKey
     * @param string $lang
     * @param string $units
     * @return mixed
     */
    public function getDataByUrl($cityName = '', $apiKey = null, $lang = 'en', $units = 'metric')
    {
        $response = Curl::to("http://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$apiKey&lang=$lang&units=$units")
            ->asJson()
            ->get();
//        $response  = '{"coord":{"lon":37.62,"lat":55.75},"weather":[{"id":800,"main":"Clear","description":"ясно","icon":"01d"}],"base":"stations","main":{"temp":294.15,"pressure":1020,"humidity":52,"temp_min":294.15,"temp_max":294.15},"visibility":10000,"wind":{"speed":6,"deg":340},"clouds":{"all":0},"dt":1566910978,"sys":{"type":1,"id":9029,"message":0.0109,"country":"RU","sunrise":1566872633,"sunset":1566923937},"timezone":10800,"id":524901,"name":"Moscow","cod":200}' ;

        return $response;
    }

    /**
     * Get direction winter and return text
     * @param string $number
     * @return string
     */
    public function getDirectionWinter($number = ''){
        if($number > '348.75' &&  $number <= '360'  || $number >= '0' &&  $number <= '11.25' ){
            $output = 'Северный';
        }else if($number > '11.25' &&  $number <= '33.75' ){
            $output = 'Северо-северо-восточный';
        }else if($number > '33.75' &&  $number <= '56.25' ){
            $output = 'Северо-восточный';
        }else if($number > '56.25' &&  $number <= '78.75' ){
            $output = 'Востоко-северо-восточный';
        }else if($number > '78.75' &&  $number <= '101.25' ){
            $output = 'Восточный';
        }else if($number > '101.25' &&  $number <= '123.75' ){
            $output = 'Востоко-юго-восточный';
        }else if($number > '123.75' &&  $number <= '146.25' ){
            $output = 'Юго-восточный';
        }else if($number > '146.25' &&  $number <= '168.75' ){
            $output = 'Юго-юго-восточный';
        }else if($number > '168.75' &&  $number <= '191.25' ){
            $output = 'Южный';
        }else if($number > '191.25' &&  $number <= '213.75' ){
            $output = 'Юго-юго-западный';
        }else if($number > '213.75' &&  $number <= '236.25' ){
            $output = 'Юго-западный';
        }else if($number > '236.25' &&  $number <= '258.75' ){
            $output = 'Западо-юго-западный';
        }else if($number > '258.75' &&  $number <= '281.25' ){
            $output = 'Западный';
        }else if($number > '281.25' &&  $number <= '303.75' ){
            $output = 'Западо-северо-западный';
        }else if($number > '303.75' &&  $number <= '326.25' ){
            $output = 'Северо-западный';
        }else if($number > '326.25' &&  $number <= '348.75' ){
            $output = 'Северо-северо-западный';
        }else{
            $output = 'Штиль';
        }

        return $output;
    }

    /**
     * Response redy data
     * @param null $cityName
     * @param string $lang
     * @param string $units
     * @return mixed
     */
    public function  getRedyData($cityName = null,  $lang = 'ru', $units = 'imperial'){

        $apiKey = config('app.API_WEATHER');
        $data = $this->getDataByUrl($cityName, $apiKey, $lang, $units);
        if($data->cod =='200'){
            if(isset($data->wind->deg)){
                $inputValue = $data->wind->deg;
            }else{
                $inputValue = '';
            }

            $data->wind->deg = $this->getDirectionWinter($inputValue);
        }else{
            $data = '';
        }

        return $data;
    }

}
?>

