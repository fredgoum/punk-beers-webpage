// Manages the app view
class View {
  /**
   * Display all beers
   * @param {Array} beers list of all beers to display
   */
  displayBeers(beers) {
    let leftBeers = "";
    let rightBeers = "";
    for (let i = 0; i < beers.length; i++) {
      const beer = beers[i];
      if (i % 2 == 0) {
        leftBeers = leftBeers + 
        "<div class='display-flex' id='left-beer-info-img'>" + 
          "<div id='left-beer-info'>"+
            `<div id='left-beer-name'><b>${beer.name}</b></div>
            <div id='left-beer-tagline'><b>${beer.tagline}</b></div>
            <button class='btn-see-more' type="button" id='btn-see-more${beer.id}' style='float: right;'>
              <span class="see-more"><b>SEE MORE</b></span>
            </button>` + 
          "</div>" + 
          "<div id='left-beer-img-container'>" +
            `<img id='left-beer-img' src=${beer.image_url} alt='beer image'>` +
          "</div>"+
        "</div>";
      } else {
        rightBeers = rightBeers + 
        "<div class='display-flex' id='right-beer-info-img'>" +
          "<div id='right-beer-img-container'>" + 
            `<img id='right-beer-img' src=${beer.image_url} alt='beer image'>` +
          "</div>" + 
          "<div id='right-beer-info'>"+
          ` <div id='right-beer-name'><b>${beer.name}</b></div>
            <div id='right-beer-tagline'><b>${beer.tagline}</b></div>
            <button class='btn-see-more' type="button" id='btn-see-more${beer.id}' style='float: left;'>
              <span class="see-more"><b>SEE MORE</b></span>
            </button>` + 
          "</div>" +
        "</div>";
      }
    }
    document.getElementById("left-beers").innerHTML = leftBeers;
    document.getElementById("right-beers").innerHTML = rightBeers;
  }

  /**
   * Display a beer details
   * @param {Object} beer beer object data
   */
  displayBeerDetails(beer) {
    let beerDetailsContent = "";
    // Get malt ingredient to display
    let maltIngredients = "";
    beer.ingredients.malt.forEach(ingredient => {
      maltIngredients += `<div id="malt-ingredients">${ingredient.name}</div>`
    });
    // Get beer details informations
    beerDetailsContent = beerDetailsContent + 
    `<div class='display-flex-center'>
      <div id='beer-detail-img-content'>
        <div id="beer-detail-background">
          <b>${beer.name}</b>
        </div>
        <img id='beer-detail-img' src=${beer.image_url} alt='beer image'>
      </div>
      <div id='beer-detail-infos'>
        <div id="beer-detail-name"><b>${beer.name}</b></div>
        <div id="beer-detail-tagline"><b>${beer.tagline}</b></div>
        <div id="beer-description">${beer.description}</div>

        <div id="specifications"><b>SPECIFICATIONS</b></div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div><b>FIRST BREWED</b></div>
          <div>${beer.first_brewed}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div><b>ABV</b></div>
          <div>${beer.abv}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div><b>IBU</b></div>
          <div>${beer.ibu}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div><b>EBC / SRM</b></div>
          <div>
            <span>${beer.ebc}</span>
            <span>${beer.srm}</span>
          </div>
        </div>
        <div class="hyphen"></div>

        <div id="ingredients"><b>INGREDIENTS</b></div>
        <div class="beer-detail-lane">
          <div><b>MALT</b></div>
          <div>${maltIngredients}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div><b>YEAST</b></div>
          <div>${beer.ingredients.yeast}</div>
        </div>
        <div class="hyphen"></div>
      </div>
    </div>`
    document.getElementById("beer-details").innerHTML=beerDetailsContent;
  }
}
