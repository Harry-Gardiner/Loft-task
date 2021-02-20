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

$Banana = new Bananas($jsonData);
dump($Banana->getJourneyData());
dump($Banana->getJourneyData()[0]);
dump($Banana->getJourneyData()[0]["from"]);

