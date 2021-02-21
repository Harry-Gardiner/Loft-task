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

// $Banana = new Bananas($jsonData);
// dump(sort($Banana->getJourneyData()));
// dump($Banana->getJourneyData());

// dump($jsonData[0]["from"] === $jsonData[3]["to"]);

function cmp($a, $b)
{
    if($a["to"] === $b["from"]){
        return 1;
    }
    return 0;
}

// usort($jsonData, "cmp");

usort($jsonData, "cmp");
dump($jsonData);



