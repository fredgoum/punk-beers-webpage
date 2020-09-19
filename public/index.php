<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="static/beer-mug.png" title="Punk Beers">
    <title>Punk Beers</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <!-- Navigation bar -->
    <?php include("../src/App/NavigationBar.php"); ?>

    <!-- Beers List -->
    <?php include("../src/App/BeersList.php"); ?>
    
    <!-- Footer Page -->
    <?php include("../src/App/Footer.php"); ?>

    <!-- JavaScript classes -->
    <script type="text/javascript" src="js/View.js"></script>
    <script type="text/javascript" src="js/Beers.js"></script>
    <script type="text/javascript" src="js/Main.js"></script>
  </body>
</html>
