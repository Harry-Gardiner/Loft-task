<?php

require __DIR__ . "/../vendor/autoload.php";

class Bananas
{

    private $journeyData;

    public function __construct($json)
    {
        $this->journeyData = $json;
    }

    public function getJourneyData()
    {
        return $this->journeyData;
    }


}

// Read JSON file
$json = file_get_contents('./testdata.json');

//Decode JSON into PHP array
$jsonData = json_decode($json, true);

// get array of all "from" and "to" values
$fromPlaces = array_column($jsonData, 'from');
$toPlaces = array_column($jsonData, 'to');

dump($fromPlaces, $toPlaces);

