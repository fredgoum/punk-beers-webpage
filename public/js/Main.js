// Instanciation of classes
const beers = new Beers();
const view = new View();

// Launch app
start();

/**
 * Gets api data of all beers and displays in the view
 */
function start() {
  const beersApiData = beers.getBeers();

  beersApiData.then((response) => {
    const allBeers = response;
    view.displayBeers(allBeers); // display list of beers

    // Gets btns see more
    var els = document.querySelectorAll('*[id^="btn-see-more"]');
    for (let i = 0; i < els.length; i++) {
      const selectedBeerId = parseInt(els[i].id.slice(-1), 10);
      els[i].onclick = getBeer(selectedBeerId);
    }
  }).catch((error) => {
    console.log(error);
  });
}

/**
 * Gets api data of a beer and displays in the view
 * @param {*} selectedBeerId 
 */
function getBeer(selectedBeerId) {
  return function() {
    toggleBeerDetails(); // toggle between beers list and a beer details

    const selectedBeerApiData = beers.getBeer(selectedBeerId);

    selectedBeerApiData.then((response) => {
      const beer = response.shift();
      view.displayBeerDetails(beer); // display selected beer details
    }).catch((error) => {
      console.log(error);
    });
  }
}

/**
 * Toggle between list of beers and selected beer details
 */
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
