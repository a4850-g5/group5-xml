<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends MY_Controller {

	public function index($facet = "all") {
		$this->pageStyles[] = 'http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css';
		$this->pageScripts[] = 'http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js';
		$this->pageScripts[] = 'js_dataTable';
		
		$html_table = "";

		switch ($facet) {
			case "courses":
				$courseFacet = array();
				$courseFacet['coursesFacet'] = $this->timetable->getCourses();
				$html_table = $this->parser->parse('_result-course', $courseFacet, true);
				break;
			case "days":
				$dayFacet = array();
				$dayFacet['daysFacet'] = $this->timetable->getDays();
				$html_table = $this->parser->parse('_result-days', $dayFacet, true);
				break;
			case "timeslots":
				$timeFacet = array();
				$timeFacet['timeslotsFacet'] = $this->timetable->getTimeslots();
				$html_table = $this->parser->parse('_result-timeslots', $timeFacet, true);
				break;
			default:
				$html_table = "Unknown Facet to show.";
				break;
		}
		$this->data['theBody'] = $html_table;
		$this->data['pagebody'] = 'welcome';
		$this->render();
	}

}
