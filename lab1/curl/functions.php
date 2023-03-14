<?php

function getData($city){ 

    $city = str_replace(' ' , "+" , $city );

    $api_key = "1aaa6ee36187dfb5c1be23764fba962f";
    $api_url = "https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$api_key."&units=metric";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL , $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

    $data = curl_exec($ch);
    $decoded = json_decode($data , true);
    curl_close($ch);
    return $decoded;

};

function filterCities($country){

    $countryCities = [];
    $cities = json_decode(file_get_contents('./city.list.json') , true);

    foreach($cities as $city){
        if($city['country'] == $country ){

            $countryCities[] = $city ;
        }  
    }

    return $countryCities;
}



?>