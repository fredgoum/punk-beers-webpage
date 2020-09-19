<?php
// PUNK Client

Class Punk {

  private $curl;
  private $url;

  public function __construct()
  {
    $this->curl = curl_init();
    $this->url = "https://api.punkapi.com/v2/beers";
  }

  // Get the API data of the 60 beers to display
  public function getBeers()
  {
    curl_setopt($this->curl, CURLOPT_URL, "{$this->url}?page=1&per_page=5");
    return $this->sendRequest();
  }

  // Get the API data of a beer
  public function getBeer($id)
  {
    curl_setopt($this->curl, CURLOPT_URL, "{$this->url}/{$id}");
    return $this->sendRequest();
  }

  public function sendRequest()
  {
    try {
      curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
      $output = curl_exec($this->curl);
      curl_close($this->curl);
      return $output;
    } catch (Exception $error) {
      return $error;
    }
  }
}
