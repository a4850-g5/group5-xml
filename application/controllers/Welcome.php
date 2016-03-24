<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		$this->data['pageTitle'] = "Home - Welcome";

		$this->data['coursesTable'] = $this->getBookings("courses");
		$this->data['daysTable'] = $this->getBookings("days");
		$this->data['timeslotsTable'] = $this->getBookings("timeslots");

		$this->data['searchForm'] = $this->searchForm();
		$this->data['searchStatus'] = "Select values from dropdown and click [Search] to begin.";
		$this->data['bingoStatus'] = "";
		$this->data['searchResults'] = "";

		$this->data['pagebody'] = 'welcome';
		$this->render();
	}

	public function search()
	{
		$this->data['pageTitle'] = "Search Results";

		$this->data['coursesTable'] = $this->getBookings("courses");
		$this->data['daysTable'] = $this->getBookings("days");
		$this->data['timeslotsTable'] = $this->getBookings("timeslots");

		$this->data['searchForm'] = $this->searchForm();

		//Search Parameters
		$searchDay = $this->input->post('dropdown_day');
		$searchPeriod = $this->input->post('dropdown_timeslot');

		$this->data['searchStatus'] = "Here's whats happening on [ " . $this->schedule->getDay($searchDay);
		$this->data['searchStatus'] .= " ] during this time: [ " . $this->schedule->getPeriod($searchPeriod) . " ]";
		$this->data['bingoStatus'] = "";
		$this->data['searchResults'] = "";

		//Search Results
		$courseResult = $this->timetable->searchCourses($searchDay, $searchPeriod);
		$dayResult = $this->timetable->searchDays($searchDay, $searchPeriod);
		$timeslotsResult = $this->timetable->searchTimeslots($searchDay, $searchPeriod);

		// Results to display
		$results = array();
		if (is_null($courseResult) && is_null($dayResult) & is_null($timeslotsResult))
		{
			// All Searches came up null - no courses starting with search parameters specified.
			// Note that we are not checking if a booking is in progress with those parameters.

			$this->data['searchResults'] = "Search results came up empty - there seems to be nothing happening during the day and time selected.";
		} else
		{
			// at least one of the search returned a Booking object
			if (count($dayResult) === 1 && count($courseResult) === 1 && count($timeslotsResult) === 1)
			{
				//check for bingo
				if ($dayResult[0] == $timeslotsResult[0] && $dayResult[0] == $courseResult[0])
				{
					// It's a bingo!  Randomly take one of the Booking objects to display
					$bingo = $dayResult[0];
					// bingo results
					$bingo->type = "BINGO!!!";

					$this->data['bingoStatus'] = "It's a Bingo - all three facets returned the exact same Booking object detail.";
					// Transform the Booking object into an associative array.
					$results['results'][] = get_object_vars($bingo);
				} else
				{
					$this->data['bingoStatus'] = "It's NOT a bingo - here's what I found based on the search parameters...";

					// one result from each facet, but mismatched information
					$courseResult[0]->type = "From the Course Facet:  ";
					$dayResult[0]->type = "From the Day Facet:  ";
					$timeslotsResult[0]->type = "From the Timeslots Facet:  ";

					// Transform the Booking objects into an associative array.
					$results['results'][] = get_object_vars($courseResult[0]);
					$results['results'][] = get_object_vars($dayResult[0]);
					$results['results'][] = get_object_vars($timeslotsResult[0]);
				}
			} else
			{
				$this->data['bingoStatus'] = "It's NOT a bingo - here's what I found based on the search parameters...";

				// More than one results from a table was returned
				// Get all Course Result(s) to display if any
				if (isset($courseResult))
				{
					foreach ($courseResult as $result)
					{
						$result->type = "From the Course Facet:  ";

						// Transform the Booking object into an associative array.
						$results['results'][] = get_object_vars($result);
					}
				}

				// Get all Day Result(s) to display if any
				if (isset($dayResult))
				{
					foreach ($dayResult as $result)
					{
						$result->type = "From the Day Facet:  ";

						// Transform the Booking object into an associative array.
						$results['results'][] = get_object_vars($result);
					}
				}

				// Get all Timeslot Result(s) to display if any
				if (isset($timeslotsResult))
				{
					foreach ($timeslotsResult as $result)
					{
						$result->type = "From the Timeslots Facet:  ";

						// Transform the Booking object into an associative array.
						$results['results'][] = get_object_vars($result);
					}
				}
			}
			$this->data['searchResults'] = $this->parser->parse('_searchResult', $results, true);
		}

		$this->data['pagebody'] = 'welcome';
		$this->render();
	}

	/**
	 * Gets the facet data, parse and return the html code.
	 */
	public function getBookings($facet = "")
	{
		switch ($facet)
		{
			case "courses":
				return $this->parser->parse('_result-course', array("coursesFacet" => $this->timetable->getCourses()), true);
			case "days":
				return $this->parser->parse('_result-days', array("daysFacet" => $this->timetable->getDays()), true);
			case "timeslots":
				return $this->parser->parse('_result-timeslots', array("timeslotsFacet" => $this->timetable->getTimeslots()), true);
			default:
				return "Unknown Facet to show.";
		}
	}

	/**
	 * Prepares and returns the HTML search form
	 */
	public function searchForm()
	{
		$form = array();
		$form['days'] = $this->daysDropdown();
		$form['timeslots'] = $this->timeslotDropdown();

		return $this->parser->parse('_searchForm', $form, true);
	}

	/**
	 * Gets and prepares the array for the timeslot dropdown list
	 */
	public function timeslotDropdown()
	{

		$timeslots = array();

		foreach ($this->schedule->periods() as $periods)
		{
			$timeslots[] = array(
				'code'	 => $periods->code,
				'period' => $periods->name
			);
		}
		return $timeslots;
	}

	/**
	 * Gets and prepares the array for the days dropdown list
	 */
	public function daysDropdown()
	{
		$day = array();

		foreach ($this->schedule->days() as $days)
		{
			$day[] = array(
				'code'	 => $days->code,
				'day'	 => $days->name
			);
		}
		return $day;
	}

}
