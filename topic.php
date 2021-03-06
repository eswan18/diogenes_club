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
      //Set up
      $topic = "TOPIC";

      //create a table with 4 rows
      $content_table = new bsb\HTML_Table([3, 3, 1, 3, 3], array("class" => content_table));
      
      $row = 0;
      $content_table->set_html($row, 0, '<h2 class="site_name"><a class="header" href="index.php">The Diogenes Club</a></h2>');

      $content_table->set_html($row, 2, '<img id="settings_icon" src="assets/images/settings_icon.png">
	      				<div id="user_label">USER</div>');
      
      $row++;
      $content_table->set_html($row, 0, '<form method="get" action="search.php"><span class="search"><input class="search" type="text" name="search" placeholder="Search for a topic"><span></form>');
      
      $row++;
      $content_table->set_html($row, 0, "<h1 class='page_title'>$topic</h1>");

      $row++;
      $content_table->set_html($row, 0, '<div class="spacer" id="index_spacer_under_search"/>');

      $row++;
      $content_table->set_html($row, 0, '<div class="content_bubble" id="gurus">
			<h2>Gurus</h2>
			<br><br><br><br><br>
		</div>
		<div class="content_bubble" id="mark_yourself">
			Are you an expert in this topic?
		</div>');
      $content_table->set_html($row, 1, '<div class="content_bubble" id="resources">
			<h2>Resources</h2>
			<br><br><br><br><br>
		</div>');
      $content_table->set_html($row, 2, '<div class="content_bubble" id="related_topics">
			<h2>Related Topics</h2>
			<br><br><br><br><br>
		</div>');
		
      
      //output the table's contents
      echo $content_table->output();
    ?>

  </body>
</html>
