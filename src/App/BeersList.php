<div>
  <div id="beers-list">
    <!-- Beers List Background -->
    <div id="beers-background"></div>
    <!-- Beers List -->
    <div id="beers">
      <div class="display-flex-center">
        <div id="left-beers"></div>
        <div id="right-beers"></div>
      </div>
    </div>
  </div>

  <!-- Display Beer Details -->
  <div id="beer-details"></div>
</div>

<script type="text/javascript">
  let background = '';
  for (let i = 0; i < 12; i++) {
    background = background + 
    `<div id="background">
      <b>BEERS</b>
    </div>`
  }
  document.getElementById("beers-background").innerHTML = background;
</script>
