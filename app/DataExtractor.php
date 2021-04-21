<?php


use App\SQLiteConnection;
use App\Config;

class DataExtractor
{
    public $cpu;
    public $mem;
    public $api_url;
    public $inprogressJobs;
    public $queuedJobs;

    public function extractData()
    {
        $api_url = 'https://209.18.114.71/aiportal/v1.1/stats';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // verifying the ssl certificate

        $response = curl_exec($curl);
        $decode = json_decode($response, true); /// decodes data into JSON

        /// get server details
        $cpu = $decode['system']['cpu']; // cpu
        $mem = $decode['system']['mem']; // mem

        $welcomeJobsDelayed = $decode['welcome']['current-jobs-delayed']; // inprogress jobs
        $welcomedJobsReady = $decode['welcome']['current-jobs-ready'];// queued jobs
        $addedWelcomeResults = $welcomedJobsReady + $welcomeJobsDelayed;
        $welcomeResults = floatval($addedWelcomeResults);

        $ocrJobsDelayed = $decode['ocr']['current-jobs-delayed']; // inprogress jobs
        $ocrJobsReady = $decode['ocr']['current-jobs-ready'];// queued jobs
        $addedOcrResults = $ocrJobsDelayed + $ocrJobsReady;
        $ocrResults = floatval($addedOcrResults);

        $convertSourceDelayed = $decode['convertsource']['current-jobs-delayed']; // inprogress jobs
        $convertSourceJobsReady = $decode['convertsource']['current-jobs-ready'];// queued jobs
        $addedconvertSourceResults = $convertSourceDelayed + $convertSourceJobsReady;
        $convertSourceResults = floatval($addedconvertSourceResults);

        $langdetDelayed = $decode['langdet']['current-jobs-delayed']; // inprogress jobs
        $langdetJobsReady = $decode['langdet']['current-jobs-ready'];// queued jobs
        $addedLangdetSourceResults = $langdetDelayed + $langdetJobsReady;
        $langdetResults = floatval($addedLangdetSourceResults);

        $translateDelayed = $decode['translate']['current-jobs-delayed']; // inprogress jobs
        $translateJobsReady = $decode['translate']['current-jobs-ready'];// queued jobs
        $addedLangdetSourceResults = $translateDelayed + $translateJobsReady;
        $translateResults = floatval($addedLangdetSourceResults);


        //$system = $decode->system; /// system status
        var_dump($welcomeResults);

        curl_close($curl);

    }
}

$DataExtractor = new DataExtractor();
$DataExtractor->extractData();





