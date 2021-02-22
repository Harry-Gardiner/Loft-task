<?php

require __DIR__ . "/../vendor/autoload.php";

class Bananas
{

    private $journeyData;
    private $toPlaces;
    private $fromPlaces;

    public function __construct($json)
    {
        $this->journeyData = json_decode($json, true);
    }

    public function getJourneyData() : array
    {
        return $this->journeyData;
    }

    public function setFromPlaces() : void
    {
        $this->fromPlaces = array_column($this->journeyData, 'from');
    }
    
    public function getFromPlaces() : array
    {
        return $this->fromPlaces;
    }

    public function setToPlaces() : void
    {
        $this->toPlaces = array_column($this->journeyData, 'to');
    }
    
    public function getToPlaces() : array
    {
        return $this->toPlaces;
    }


}

$json = file_get_contents('./testdata.json');
$Banana = new Bananas($json);
$Banana->getJourneyData();
// Get array of "from" values
$Banana->setFromPlaces();
$Banana->getFromPlaces();
// Get array of "to" values
$Banana->setToPlaces();
dump($Banana->getToPlaces());


// Read JSON file
//$json = file_get_contents('./testdata.json');

//Decode JSON into PHP array
//$jsonData = json_decode($json, true);

// get array of all "from" and "to" values
//$fromPlaces = array_column($jsonData, 'from');
//$toPlaces = array_column($jsonData, 'to');

// get starting location of Bananas
//$start = array_diff($fromPlaces,$toPlaces);

// Get starting object key
//$startObject = array_search($start[1], array_column($jsonData, 'from'));  // returns 1 

// Create new result array with starting object
//$orderedArray = [$jsonData[$startObject]];

// Remove start from data array before we loop
//array_splice($jsonData, $startObject, 1);

//loop and sort
// while (sizeof($jsonData) > 0) {
//     // loop over data
//     foreach ($jsonData as $key => $value) {
//         //for each object check if "from" value is the same as the last "to" value in the new ordered array 
//         if ($value["from"] === end($orderedArray)["to"]) {
//             //If true, 1) push object into new ordered array and 2) remove object from original array
//             array_push($orderedArray, $jsonData[$key]);   
//             array_splice($jsonData, $key, 1);
//             break;
//         }
//     }
// };




