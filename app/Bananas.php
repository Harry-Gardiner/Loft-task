<?php

require __DIR__ . "/../vendor/autoload.php";

class Bananas
{

    private $journeyData;
    private $toPlaces;
    private $fromPlaces;
    private $startLocation;
    private $orderedArray = [];
    private $outputJson;

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

    public function findStartingLocation() : array
    {
        $start = array_diff($this->fromPlaces,$this->toPlaces);
        $startIndex = array_search($start[1], array_column($this->journeyData, 'from'));
        return $this->startLocation = $this->journeyData[$startIndex];
    }

    public function setOrderdArray() : void
    {
        array_push($this->orderedArray, $this->startLocation);
    }

    public function getOrderdArray() : array
    {
       return $this->orderedArray; 
    }

    public function removeStartFromData()
    {
        $int = array_search($this->startLocation,$this->journeyData);
        array_splice($this->journeyData, $int, 1);
    }

    public function loopAndOrder()
    {
        while (sizeof($this->journeyData) > 0) {
            // loop over data
            foreach ($this->journeyData as $key => $value) {
                //for each object check if "from" value is the same as the last "to" value in the new ordered array 
                if ($value["from"] === end($this->orderedArray)["to"]) {
                    //If true, 1) push object into new ordered array and 2) remove object from original array
                    array_push($this->orderedArray, $this->journeyData[$key]);   
                    array_splice($this->journeyData, $key, 1);
                    break;
                }
            }
        }
    }

    public function outputJson() 
    {
        // get all "to" destinations in correct order
        $toDestinations = array_column($this->orderedArray, 'to');
        array_unshift($toDestinations, $this->startLocation['from']);
        $this->outputJson = json_encode($toDestinations, JSON_UNESCAPED_UNICODE);
    }

    public function getOutputJson()
    {
        return $this->outputJson;
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
$Banana->getToPlaces();
// Get start location array 
$Banana->findStartingLocation();
// Update orderd array with starting destination
$Banana->setOrderdArray();
$Banana->getOrderdArray();
// Remove 1st item from data before its looped
$Banana->removeStartFromData();
// Loop over journey data and pass items in correct order to orderedArray
$Banana->loopAndOrder();
// Take orderdArray and get all "to" values and return these as an array. Prepend start "from" destination to array. Return array as JSON, req Unicode due to characters. 
$Banana->outputJson();
dump($Banana->getOutputJson());



// LOGIC
// Read JSON file
// $json = file_get_contents('./testdata.json');
// dump($json);
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




