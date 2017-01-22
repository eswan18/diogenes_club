<?php
	namespace Baker_Street_Boys;
	require_once('libs/General_Lib.php');
	use General_Lib as lib;
	use Exception;

	//Custom html table template for formatting purposes
	class HTML_Table {
		// $attrs - Associate array. Each key-value pair will
		// be assigned as a attribute-value pair in the <table> tag
		public $attrs;
		// $ncol - total number of columns in the real HTML table
		// (as opposed to the representation)
		public $ncol;
		// $content - the html table cells
		public $content;
		
		//Constructor	
		function __construct($cols, $attrs) {
			$this->attrs = $attrs;
			// Set up the table to have ncols =
			// least_common_denom of the values
			// in $cols
			$this->ncol = lib\lcm_array($cols);
			$this->nrow = count($cols);

			// Initialize the content
			for ($i = 0; $i < $this->nrow; $i++) {
				// Calculate how wide each cell should be in the current column
				$cell_width = $this->ncol / $cols[$i];
				// Create each "column"
				for ($j = 0; $j < $cols[$i]; $j++) {
					$this->content[$i][$j] = "";
				}
			}
		}

		//Set the HTML of a table cell
		function set_html($x, $y, $html) {
			if (isset($this->content[$x][$y])) {
				$this->content[$x][$y] = $html;
			}
			else {
				throw new \Exception('Attempt to set HTML_Table cell that does not exist');
			}
		}

		//Get the html of a requested cell
		function get_html($x, $y) {
			return $this->content[$x][$y];
		}

		//print the html table
		function output() {
			// Create an HTML-ready string of attributes
			// for the table tag
			$attr_string = "";
			foreach($this->attrs as $key => $value) {
				$attr_string .= "$key='$value'";
			}
			//Print the table itself
			$html = "<table $attr_string>";
			for($i = 0; $i < $this->nrow; $i++) {
				$row_html = "<tr>";
				// Calculate how wide each cell should be in the current column
				$cell_width = $this->ncol / count($this->content[$i]);
				// Print each "column"
				for ($j = 0; $j < count($this->content[$i]); $j++) {
					$cell_html = "<td colspan='$cell_width'>";
					$cell_html .= $this->content[$i][$j];
					$cell_html .= "</td>";
					$row_html .= $cell_html;
				}
				$row_html .= "</tr>";
				$html .= $row_html;
			}
			$html .= "</table>";
			return $html;
		}
	}
?>
