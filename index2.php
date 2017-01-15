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
      //create a table with 5 rows, with 3,3,3,2,and1 cols respectively
      $content_table = new bsb\HTML_Table([3, 3, 3, 2, 1], array("class" => content_table));
      // Row 0
      $content_table->set_html(0, 2, 'Settings and Login Icons');
      // Row 1
      $content_table->set_html(1, 1, "<h1 class='page_title'>The Diogenes Club</h1>");
      // Row 2
      $content_table->set_html(2, 1, '<form method="get" action="search.php"><span class="search"><input class="search" type="text" name="search" placeholder="Search..."></span></form>');
      // Row 3
      $content_table->set_html(3, 0, 'Hot Topics');
      $content_table->set_html(3, 1, 'Recently Perused');
      // Row 4
      $content_table->set_html(4, 0, 'Categories');


      //set up the table's contents
      echo $content_table->output();
    ?>

  </body>
</html>
