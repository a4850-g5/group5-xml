<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index() {
		$form = array();
		$form['days'] = $this->days_dropdown();
		$form['timeslots'] = $this->timeslot_dropdown();
		$this->data['theBody'] = $this->parser->parse('_searchForm', $form, true);

		$this->data['pagebody'] = 'welcome';
		$this->render();
	}

}
