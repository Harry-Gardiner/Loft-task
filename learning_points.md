- Arrays in PHP will also be converted into JSON when using the PHP function `json_encode()`:
- PHP >= 5.2.0 features a function, `json_decode()`, that decodes a JSON string into a PHP variable. By default it returns an object. The second parameter accepts a boolean that when set as true, tells it to return the objects as associative arrays.
- `array_search()` — Searches the array for a given value and returns the first corresponding key if successful
- `array_column()` — Return the values from a single column in the input array
- `end()` — Set the internal pointer of an array to its last element


Access
`dump($Banana->getJourneyData()[0]);` Gets a specific item from array
`dump($Banana->getJourneyData()[0]["from"]);` Gets a specific items value from array

