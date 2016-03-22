<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 * 	- or -
	 * 		http://example.com/index.php/welcome/index
	 * 	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->data['timeslots'] = $this->timeslot_dropdown();
		$this->data['days'] = $this->days_dropdown();

		$this->data['pagebody'] = 'welcome';
		$this->render();
	}

	private function timeslot_dropdown() {
		$timeslots = array();

		foreach ($this->schedule->periods() as $periods) {
			$timeslots[] = array(
				'code' => $periods->code,
				'period' => $periods->name
			);
		}
		return $timeslots;
	}

	private function days_dropdown() {
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
