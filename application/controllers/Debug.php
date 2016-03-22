<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends MY_Controller {

	/**
	 * DEBUG CONTROLLER for schedule
	 *
	 */
	public function index()
	{
		echo "<h3>Data Dump of Days array</h3><br />";
		print_r($this->schedule->days());
		echo "<br /><br />";
		echo "<h3>Data Dump of Periods array</h3><br />";
		print_r($this->schedule->periods());
		die();
	}

}
