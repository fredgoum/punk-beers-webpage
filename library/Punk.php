<?php
// PUNK Client

Class Punk {

  public function __construct()
  {
    // What I've to do ?
  }

  // Get the API data of the 60 beers to display
  public function getBeers()
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://api.punkapi.com/v2/beers?page=4&per_page=2");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    echo($output);
    return $output;
  }

  // Get the API data of a beer
  public function getBeer($id)
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://api.punkapi.com/v2/beers/{$id}");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    echo($output);
    return $output;
  }
}
