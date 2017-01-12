<?php
	namespace Baker_Street_Boys;

	//Custom html table template for formatting purposes
	class HTML_Table {


		// $cols - List array. Each element is an int representing the
		// number of columns that should be present in that row
		public $cols;
		// $attrs - Associate array. Each key-value pair will
		// be assigned as a attribute-value pair in the <table> tag
		public $attrs;
		
		//Constructor	
		function __construct($cols, $attrs) {
			$this->$cols = $cols;
			$this->$attrs = $attrs;
			// TODO
			// Set up the table to have ncols =
			// least_common_denom of the values
			// in $cols
		}

		//Set the HTML of a table cell
		function set_html($x, $y, $html) {
			// TODO
			// Set the html of the requested cell
		}

		function get_html($x, $y) {
			// TODO
			// Get the html of the requested cell
			return $html;
		}
	}
?>
