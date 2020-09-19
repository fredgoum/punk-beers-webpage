<!-- Navigation bar -->
<nav>
  <div class="display-flex-space" style="height: 180px;">
    <!-- B letter -->
    <div id="B">B</div>
    <!-- Btn close -->
    <div id="button-x">
      <button style="height: 120px; cursor: pointer;" onclick=closeBeerDetails()>X</button>
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
