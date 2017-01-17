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
      $content_table = new bsb\HTML_Table([3, 1, 3, 1, 2, 1], array("class" => content_table));
      
      $row = 0;
      $content_table->set_html($row, 2, '<img id="settings_icon" src="assets/images/settings_icon.png">
	      				<div id="user_label">USER</div>');
      
      $row = 1;
      $content_table->set_html($row, 0, "<h1 class='page_title'>The Diogenes Club</h1>");

      $row = 2;
      $content_table->set_html($row, 1, '<form method="get" action="search.php"><span class="search"><input class="search" type="text" name="search" placeholder="Search for a topic"><span></form>');
      
      $row = 3;
      $content_table->set_html($row, 0, '<div class="spacer" id="index_spacer_under_search"/>');
      
      $row = 4;
      $content_table->set_html($row, 0, '<div class="content_bubble" id="hot_topics">
		<h2>Hot Topics</h2>
		<br><br><br><br><br>
		</div>');
      $content_table->set_html($row, 1, '<div class="content_bubble" id="recently_perused">
		<h2>Recently Perused</h2>
		<br><br><br><br><br>
		</div>');
      
      $row = 5;
      $content_table->set_html($row, 0, 'Categories');

      //output the table's contents
      echo $content_table->output();
    ?>

  </body>
</html>
