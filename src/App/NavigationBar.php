<!-- Navigation bar -->
<nav>
  <div style="height: 110px; display: flex; justify-content: space-between; width: 100%;">
    <!-- B letter -->
    <div id="B"><b>B</b></div>
    <!-- Btn close -->
    <div id="button-x" style="padding-top: 20px;" onclick=closeBeerDetails()>
      <b style="height: 120px; cursor: pointer; font-size: 50px;">X</b>
    </div>
    <!-- Beer icone -->
    <div id="🍺">🍺</div>
  </div>
  <div class="hyphen"></div>
</nav>

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
