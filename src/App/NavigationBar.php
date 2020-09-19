<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <!-- Navigation bar -->
    <nav>
      <div class="display-flex-space" style="height: 180px;">
        <!-- B letter -->
        <div id="B">B</div>
        <!-- Btn close beeer details -->
        <div id="button-x">
          <button style="height: 120px; cursor: pointer;" onclick=closeBeerDetails()>X</button>
        </div>
        <!-- Beer icone -->
        <div id="🍺">🍺</div>
      </div>
      <div class="hyphen"></div>
    </nav>
  </body>

  <script type="text/javascript">
    // Close Beer Details Modal
    function closeBeerDetails() {
      const beersList = document.getElementById("beers-list");
      const beerDetails = document.getElementById("beer-details");
      const buttonX = document.getElementById("button-x");
      if (beersList.style.display === "none") {
        beersList.style.display = "flex";
        beerDetails.style.display = "none";
        buttonX.style.display = "none";
      } else {
        beersList.style.display = "none";
        beerDetails.style.display = "block";
        buttonX.style.display = "block";
      }
    }
  </script>
</html>
