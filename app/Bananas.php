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

// get starting location of Bananas
$start = array_diff($fromPlaces,$toPlaces);

// Get starting object key
$startObject = array_search($start[1], array_column($jsonData, 'from'));  // returns 1 

// Create new result array with starting object
$orderedArray = [$jsonData[$startObject]];

// Remove start from data array before we loop
array_splice($jsonData, $startObject, 1);

//loop and sort
// $number = 4;
while (sizeof($jsonData) > 0) {
    // dump($jsonData);
    foreach ($jsonData as $key => $value) {
        if ($value["from"] === end($orderedArray)["to"]) {
            array_push($orderedArray, $jsonData[$key]) ;   
            array_splice($jsonData, $key, 1);
            break;
        }
    }
    // dump($jsonData);
};



dump($orderedArray);

