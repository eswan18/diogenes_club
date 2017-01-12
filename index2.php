<!DOCTYPE html>
<html>
  <head>
    <title>The Diogenes Club</title>
    <script src='http://code.jquery.com/jquery-latest.min.js'></script>
    <link rel='stylesheet' type='text/css' href='css/main.css'>
    <?php
      //Import Framework
      require_once('libs/Baker_Street_Boys.php');
      use Baker_Street_Boys as bsb;
    ?>
  </head>

  <body>

    <?php
      bsb\hudson();
      //create a table with 5 rows, with 3,3,3,2,and1 cols respectively
      #$content_table = bsb\make_table(array("class" => content_table), cols = (3, 3, 3, 2, 1));
      $content_table = new bsb\HTML_Table([3, 3, 3, 2, 1], array("class" => content_table));
      // Row 0
      $content_table->set_html(0, 2, 'Settings and Login Icons');
      // Row 1
      $content_table->set_html(1, 1, "<h1 class='page_title'>The Diogenes Club</h1>");
      // Row 2
      $content_table->set_html(2, 1, 'Search bar');
      // Row 3
      $content_table->set_html(3, 0, 'Hot Topics');
      $content_table->set_html(3, 1, 'Recently Perused');
      // Row 4
      $content_table->set_html(4, 0, 'Categories');
      
      //set up the table's contents
      echo $content_table;
    ?>

  </body>
</html>