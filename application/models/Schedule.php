<?php

/**
 * Description of Schedule
 *
 * @author Kenneth
 */
class Schedule extends CI_Model {
	
	protected $xml = null;
	protected $days = array();
	protected $periods = array();
	
	// Constructor
	public function __construct() {
		parent::__construct();
		$this->xml = simplexml_load_file(DATAPATH . 'schedule.xml');
		
		// Build list of days (weekdays)
		foreach ($this->xml->days->day as $day) {
			// Approach 1 - using Associative Key-Value array pairs
			//$this->days[(string) $day['code']] = (string) $day;
			
			// Approach 2 - using class objects
			$record = new stdClass();
			$record->code = (string) $day['code'];
			$record->name = (string) $day;
			$this->days[$record->code] = $record;
		}
		
		// Build list of periods
		foreach ($this->xml->periods->period as $period) {
			// Approach 1 - using Associative Key-Value array pairs
			//$this->periods[(string) $period['code']] = (string) $period;
			
			// Approach 2 - using class objects
			$record = new stdClass();
			$record->code = (string) $period['code'];
			$record->name = (string) $period;
			$this->periods[$record->code] = $record;
		}
		
	}
	
	// Retreive list of days (weekdays)
	function days() {
		return $this->days;
	}
	
	// Retrieve a day record (for code)
	function getDay($code) {
		if (isset($this->days[$code])) {
			return $this->days[$code];
		} else {
			return null;
		}
	}
	
	// Retrieve list of periods
	function periods() {
		return $this->periods;
	}
	
	// Retrieve a period record
	function getPeriod($code) {
		if (isset($this->periods[$code])) {
			return $this->periods[$code];
		} else {
			return null;
		}
	}
}
