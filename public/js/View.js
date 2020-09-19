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
        "<div class='display-flex'>" + 
          "<div id='left-beer-info'>"+
            `<div>
            <div id='left-beer-name'>${beer.name}</div>
            <div id='left-beer-tagline'>${beer.tagline}</div>
              <div id='left-beer-brewed'>${beer.first_brewed}</div>
              <button class='btn-see-more' type="button" id='btn-see-more${beer.id}' style='float: right;'>
                <span class="see-more">SEE MORE</span>
              </button>
            </div>` + 
          "</div>" + 
          "<div id='left-beer-img'>" +
            `<img src=${beer.image_url} alt='beer image'>` +
          "</div>"+
        "</div>";
      } else {
        rightBeers = rightBeers + 
        "<div class='display-flex'>" +
          "<div id='right-beer-img'>" + 
            `<img src=${beer.image_url} alt='beer image'>` +
          "</div>" + 
          "<div id='right-beer-info'>"+
          ` <div id='right-beer-name'>${beer.name}</div>
            <div id='right-beer-tagline'>${beer.tagline}</div>
            <div id='right-beer-brewed'>${beer.first_brewed}</div>
            <button class='btn-see-more' type="button" id='btn-see-more${beer.id}'>
              <span class="see-more">SEE MORE</span>
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
    `<div class='display-flex'>
      <div id='beer-detail-img-content'>
        <img id='beer-detail-img' class=" bg-text" src=${beer.image_url} alt='beer image'>
      </div>
      <div id='beer-detail-infos'>
        <div id="beer-detail-name">${beer.name}</div>
        <div id="beer-description">${beer.description}</div>

        <div id="specifications">SPECIFICATIONS</div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div>FIRST BREWED</div>
          <div>${beer.first_brewed}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div>ABV</div>
          <div>${beer.abv}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div>IBU</div>
          <div>${beer.ibu}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div>EBC / SRM</div>
          <div>
            <span>${beer.ebc}</span>
            <span>${beer.srm}</span>
          </div>
        </div>
        <div class="hyphen"></div>

        <div id="ingredients">INGREDIENTS</div>
        <div class="beer-detail-lane">
          <div>MALT</div>
          <div>${maltIngredients}</div>
        </div>
        <div class="hyphen"></div>
        <div class="beer-detail-lane">
          <div>YEAST</div>
          <div>${beer.ingredients.yeast}</div>
        </div>
        <div class="hyphen"></div>
      </div>
    </div>`
    document.getElementById("beer-details").innerHTML=beerDetailsContent;
  }
}
