<?php
$city="Toulouse";
$country="FR"; //Two digit country code
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=c568aac6ef8e8c92ab7b8ad8e75cfe9e&units=metric&lang=fr&cnt=3";
$json=file_get_contents($url);
$data=json_decode($json,true);
//Get current Temperature in Celsius
echo "La tmperature est de ".$data['main']['temp']."<br>";
//Get weather condition
echo $data['weather'][0]['main']."<br>";
//Get cloud percentage
echo $data['clouds']['all']."<br>";
//Get wind speed
echo $data['wind']['speed']."<br>";
echo $data['wind']['speed']."<br>";
?>