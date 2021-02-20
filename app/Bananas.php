<?php

require __DIR__ . "/../vendor/autoload.php";

class Bananas
{

    private $journey_data;

    public function __construct($json)
    {
        $this->journey_data = $json;
    }

    public function getJourneyData()
    {
        return $this->journey_data;
    }

}

// Read JSON file
$json = file_get_contents('./testdata.json');

//Decode JSON into PHP array
$json_data = json_decode($json, true);

$Banana = new Bananas($json_data);
dump($Banana->getJourneyData());
dump($Banana->getJourneyData()[0]);
dump($Banana->getJourneyData()[0]["from"]);

