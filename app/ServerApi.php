<?php


use App\SQLiteConnection;
use App\Config;

class ServerApiConnector
{
    public $api_url;
    public $memStatus;
    public $inprogressJobs;
    public $queuedJobs;
    public $mem;


    public function ApiOneConnect()
    {
        $api_url = 'https://209.18.114.71/aiportal/v1.1/stats';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // verifying the ssl certificate


        $response = curl_exec($curl);


        $decode = json_decode($response, true); /// decodes data into JSON
    }

    public function extractData($decode, $curl)
    {

        /// get server details
        $cpu = $decode['system']['cpu']; // cpu
        $mem = $decode['system']['mem']; // mem

        $inProgressJobs = $decode['ocr']['current-watching']; // inprogress jobs
        $queuedJobs = $decode['ocr']['current-waiting']; // queued jobs

        //$system = $decode->system; /// system status

        curl_close($curl);

    }
}

(new ServerApiConnector())->ApiOneConnect();
(new ServerApiConnector())->extractData();



