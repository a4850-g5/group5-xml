<?php

/**
 * Model for Timetable XML document
 */
class Timetable extends CI_Model {

	protected $xml = null;   // SimpleXMLObject's import of xml file
	protected $timeslots = array();  // Timeslots facet
	protected $days = array();   // Days facet
	protected $courses = array();  // Courses facet

	public function __construct()
	{
		parent::__construct();
		// Load XML File, parsing all entities as well.
		$this->xml = simplexml_load_file(DATAPATH . 'master.xml', "SimpleXMLElement", LIBXML_NOENT);

		// Build list of bookings by courses
		// $course is the parent
		// $booking is the common inner group of elements
		foreach ($this->xml->courses->course as $course)
		{
			foreach ($course->booking as $booking)
			{
				$this->courses[] = new Booking($booking, $course);
			}
		}

		// Build list of bookings by days
		// $day is the parent
		// $booking is the common inner group of elements
		foreach ($this->xml->days->day as $day)
		{
			foreach ($day->booking as $booking)
			{
				$this->days[] = new Booking($booking, $day);
			}
		}

		// Build list of bookings by timeslots
		// $day is the parent
		// $booking is the common inner group of elements
		foreach ($this->xml->timeslots->period as $timeslot)
		{
			foreach ($timeslot->booking as $booking)
			{
				$this->timeslots[] = new Booking($booking, $timeslot);
			}
		}
	}

	//--------------------------------------------------
	//	Public Accessors
	//--------------------------------------------------

	/**
	 * Returns the php array for bookings generated from courses.xml
	 */
	public function getCourses()
	{
		return $this->courses;
	}

	/**
	 * Returns the php array for bookings generated from days.xml
	 */
	public function getDays()
	{
		return $this->days;
	}

	/**
	 * Returns the php array for bookings generated from timeslots.xml
	 */
	public function getTimeslots()
	{
		return $this->timeslots;
	}

}

class Booking extends CI_Model {

	public $day = "";   // Day of the Week
	public $periodStart = ""; // Period Start Time
	public $periodEnd = "";  // Period End Time
	public $courseCode = ""; // Course Code
	public $courseType = ""; // Course Type
	public $room = "";   // Location for booking
	public $instructor = ""; // Instructor for booking

	public function __construct($record, $parent)
	{
		// Set values from the data provided
		
		// Additional conversion:  Trim outside whitespaces, and convert to lowercase.
		$this->day = strtolower(trim((String) (isset($record->day['which']) ? $record->day['which'] : $parent['which'])));

		// Additional conversion:  Trim outside whitespaces
		$this->periodStart = trim((String) (isset($record->period['start']) ? $record->period['start'] : $parent['start']));

		// Additional conversion:  Trim outside whitespaces
		$this->periodEnd = trim((String) (isset($record->period['end']) ? $record->period['end'] : $parent['end']));

		// Additional conversion:  Trim ALL spaces, convert to uppercase
		$this->courseCode = strtoupper(str_replace(" ", "", (String) (isset($record->courseCode) ? $record->courseCode : $parent['courseCode'])));

		// Additional conversion:  Trim outside whitespaces, convert first letter of each word to uppercase
		$this->courseType = ucwords(trim((String) $record->courseType));

		// Additional conversion:  Trim ALL spaces, convert to uppercase
		$this->room = strtoupper(str_replace(" ", "", (String) $record->room));

		// Additional conversion:  Trim outside whitespaces, convert first letter of each word to uppercase
		$this->instructor = ucwords(trim((String) $record->instructor));
	}

}
