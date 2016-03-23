<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 */
class MY_Controller extends CI_Controller {

	protected $data = array();   // parameters for view components
	protected $id;  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct() {
		parent::__construct();
		$this->data = array();
		$this->data['siteTitle'] = 'ACIT 4850 - Group 05'; // our default title
		$this->errors = array();
		$this->data['pageTitle'] = 'Welcome';   // our default page
		// This special line of code will check if the application is running in a folder or not
		// i.e.:  gamebot5.local will not return anything, whereas localhost/gamebot5 will return /gamebot5
		$this->data['appRoot'] = (strlen(dirname($_SERVER['SCRIPT_NAME'])) === 1 ? "" : dirname($_SERVER['SCRIPT_NAME']));

		/**
		 * Add in additional CSS files used by using:
		 * 
		 * 		$this->pageStyles[] = 'string';
		 * 
		 * in the INDIVIDUAL controllers.
		 * 
		 * You can specify:
		 * 	local css files (in the css folder) by just the filename WITHOUT the .css extension
		 * 	CDN Hotlinks by the full url (including http)
		 */
		// Set global styles to load on all pages
		$this->pageStyles = array();

		/**
		 * Add in additional JS files used by using
		 * 
		 * 		$this->pageScripts[] = 'string';
		 * 
		 * You can specify:
		 * 	local js files (in the js folder) by just the filename WITHOUT the .js extension
		 * 	CDN Hotlinks by the full url (including http)
		 */
		// set global scripts to load on all pages
		$this->pageScripts = array('https://code.jquery.com/jquery-2.2.0.min.js');
	}

	/**
	 * Render this page
	 */
	function render() {
		// CI Parser to insert into template
		$this->data['loadScripts'] = "";

		// Check if we need to load any JavaScript files
		if (!empty($this->pageScripts)) {
			// at least one value was provided to the pageScripts array
			// Make sure only unique values are in the array
			$this->pageScripts = array_unique($this->pageScripts);
			$scripts = array();
			foreach ($this->pageScripts as $js) {
				// Check if the value is a local file or a hotlink
				if (strpos($js, "http") === false) {
					// Did not detect http, therefore it's a local file (hopefully)
					// NOTE:  We aren't checking for file existence
					$temp['link'] = $this->data['appRoot'] . "/assets/js/" . $js . ".js";
				} else {
					// Detected http, attempt to validate link via PHP Validation
					if (filter_var($js, FILTER_VALIDATE_URL)) {
						// Link validated by PHP
						$temp['link'] = $js;
					} else {
						// Invalid Link... Do nothing.
					}
				}
				// Add into the proper array for CI Parsing
				$scripts['scripts'][] = $temp;
			}

			// Parse and return html string
			$this->data['loadScripts'] = $this->parser->parse('__js', $scripts, true);
		}

		// CI Parser to insert into template
		$this->data['loadStyles'] = "";

		// Check if we need to load any CSS files
		if (!empty($this->pageStyles)) {
			// at least one value was provided to the pageStyles array
			// Make sure only unique values are in the array
			$this->pageStyles = array_unique($this->pageStyles);
			$styles = array();
			foreach ($this->pageStyles as $css) {
				// check if the value is a local file or a hotlink
				if (strpos($css, "http") === false) {
					// Did not detect http, therefore it's a local file (hopefully)
					// NOTE:  We aren't checking for file existence
					$temp['link'] = $this->data['appRoot'] . "/assets/css/" . $css . ".css";
				} else {
					// Detected http, attempt to validate link via PHP Validation
					if (filter_var($css, FILTER_VALIDATE_URL)) {
						// Link validated by PHP
						$temp['link'] = $css;
					} else {
						// Invalid Link... Do nothing.
					}
				}

				// Add into proper array for CI Parsing
				$styles['styles'][] = $temp;
			}

			// Parse and return html string
			$this->data['loadStyles'] = $this->parser->parse('__css', $styles, true);
		}

		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

	//dropdowns
	public function timeslot_dropdown() {
		$timeslots = array();

		foreach ($this->schedule->periods() as $periods) {
			$timeslots[] = array(
				'code' => $periods->code,
				'period' => $periods->name
			);
		}
		return $timeslots;
	}

	public function days_dropdown() {
		$day = array();

		foreach ($this->schedule->days() as $days) {
			$day[] = array(
				'code' => $days->code,
				'day' => $days->name
			);
		}
		return $day;
	}

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
