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

    <!-- Call endpoint to get beers datas with JavaScript-->
    <script type="text/javascript">
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
    </script>

    <!-- Footer Page -->
    <?php include("../src/Home/Footer.php"); ?>
  </body>
</html>
