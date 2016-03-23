<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

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
		$this->data['searchResults'] = "";
		$results = array();

		//Search Parameters
		$searchDay = $this->input->post('dropdown_day');
		$searchPeriod = $this->input->post('dropdown_timeslot');

		//Search Results
		$dayResult = $this->timetable->searchDays($searchDay, $searchPeriod);
		$timeslotsResult = $this->timetable->searchTimeslots($searchDay, $searchPeriod);
		$courseResult = $this->timetable->searchCourses($searchDay, $searchPeriod);

		if (count($dayResult) === 1 && count($courseResult) === 1 && count($timeslotsResult) === 1) {

			//check for bingo
			if ($dayResult[0] == $timeslotsResult[0] && $dayResult[0] == $courseResult[0]) {
				$bingo = $dayResult[0];
				// bingo results
				$bingo->type = "BINGO!!!";

				$results['results'][] = get_object_vars($bingo);
			} else {
				// one result, but mismatched information
				$dayResult[0]->type = "Day Facet:  ";
				$courseResult[0]->type = "Course Facet:  ";
				$timeslotsResult[0]->type = "Timeslots Facet:  ";

				$results['results'][] = get_object_vars($dayResult[0]);
				$results['results'][] = get_object_vars($courseResult[0]);
				$results['results'][] = get_object_vars($timeslotsResult[0]);
			}
		} else {
			foreach ($dayResult as $result) {
				$result->type = "Day Facet:  ";

				$results['results'][] = get_object_vars($result);
			}

			foreach ($courseResult as $result) {
				$result->type = "Course Facet:  ";

				$results['results'][] = get_object_vars($result);
			}

			foreach ($timeslotsResult as $result) {
				$result->type = "Timeslot Facet:  ";

				$results['results'][] = get_object_vars($result);
			}
		}
		$this->data['searchResults'] = $this->parser->parse('_searchResult', $results, true);

		$this->data['pagebody'] = 'search';
		$this->render();
	}

}
