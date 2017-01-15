<!DOCTYPE html>
<html>
  <head>
    <title>The Diogenes Club</title>
    <script src='http://code.jquery.com/jquery-latest.min.js'></script>
    <link rel='stylesheet' type='text/css' href='css/main.css'>
    <?php
      //Import framework and libraries
      require_once('libs/Baker_Street_Boys.php');
      use Baker_Street_Boys as bsb;
      require_once('libs/General_Lib.php');
      use General_Lib as lib;
    ?>
  </head>

  <body>

    <?php
      if (isset($_GET['search'])) {
	$search = $_GET['search'];
      }
      echo htmlentities($search);
    ?>

  </body>
</html>
