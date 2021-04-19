<?php

//Test

//$api_url = 'https://209.18.114.71/aiportal/v1.1/stats';
$api_url = 'https://mocki.io/v1/fc536d53-024b-4ca4-ac4d-504ef93cb58f';

$json_data = file_get_contents($api_url); //read file

$data_response = json_decode($json_data); //decode json

var_dump($data_response);





