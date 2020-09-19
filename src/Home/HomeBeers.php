<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beers List</title>
  </head>
  <body>
    <!-- Navigation bar -->
    <?php include("../src/Home/NavigationBar.php"); ?>

    <!-- Beers List -->
    <div id="beers-list">
      <div id="left-beers"></div>
      <div id="right-beers"></div>
    </div>

    <!-- Display Beer Details -->
    <div id="beer-details" style="display: none;"></div>

    <script type="text/javascript">
      // Call endpoint to get beers datas with JavaScript
      async function call() {
        const url = "http://localhost:8000/endpoint.php?request=getBeers";
        let apiData = [];
        try {
          const res = await fetch(url);
          if (! res.ok) throw new Error(res.status);
          const data = await res.json();
          if (data.length) apiData = data;
        } catch (error) {
          console.log(error);
        }
        const result = await apiData;
        
        let leftBeers = "";
        let rightBeers = "";
        for (let i = 0; i < result.length; i++) {
          const beer = result[i];
          if (i % 2 == 0) {
            leftBeers = leftBeers + 
            "<div class='display-flex'>" + 
              "<div id='left-beer-info'>"+
                `<div>
                <div id='left-beer-name'>${beer.name}</div>
                <div id='left-beer-tagline'>${beer.tagline}</div>
                  <div id='left-beer-brewed'>${beer.first_brewed}</div>
                  <button type="button" id='right-btn-see-more'
                          onclick="toggleBeerDetails(); selectedBeer(${beer.id});">
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
                <button type="button" id='left-btn-see-more'
                        onclick="toggleBeerDetails(); selectedBeer(${beer.id});">
                  <span class="see-more">SEE MORE</span>
                </button>` + 
              "</div>" +
            "</div>";
          }
        }
        document.getElementById("left-beers").innerHTML = leftBeers;
        document.getElementById("right-beers").innerHTML = rightBeers;
      }
      window.load = call();

      // Toggle between list of beers and selected beer details
      function toggleBeerDetails() {
        const beersList = document.getElementById("beers-list");
        const beerDetails = document.getElementById("beer-details");
        const buttonX = document.getElementById("button-x");
        if (beersList.style.display === "none") {
          beersList.style.display = "block";
          beerDetails.style.display = "none";
          buttonX.style.display = "none";
        } else {
          beersList.style.display = "none";
          beerDetails.style.display = "block";
          buttonX.style.display = "block";
        }
      }

      // Display selected beer details
      async function selectedBeer(beerId) {
        console.log(beerId);
        console.log('rr');
        const url = `http://localhost:8000/endpoint.php?request=getBeer&id=${beerId}`;
        let apiData = [];
        try {
          const res = await fetch(url);
          if (! res.ok) throw new Error(res.status);
          const data = await res.json();
          if (data.length) apiData = data;
        } catch (error) {
          console.log(error);
        }
        const result = await apiData;

        const beer = result[0];
        let beerDetailsContent = "";
        if (beer) {
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
    </script>

    <!-- Footer Page -->
    <?php include("../src/Home/Footer.php"); ?>
  </body>
</html>
