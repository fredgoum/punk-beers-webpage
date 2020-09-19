<?php
// Endpoint

  include('../library/Punk.php');
  $punk = new Punk();

  if($_GET["request"] == "getBeers" && !isset($_GET["id"])) {

    $beers = $punk->getBeers();
    echo($beers);

  } else if ($_GET["request"] == "getBeer" && isset($_GET["id"])) {

    $id = $_GET["id"];
    $beer = $punk->getBeer($id);
    echo($beer);
  }
?>
