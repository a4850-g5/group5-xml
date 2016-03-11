<?php

class Timetable extends CI_Model{
	protected $xml = null;
	protected $timeslots = array();
	protected $period = array();
	protected $booking=array();
	protected $day=array();
	protected $days = array();
	protected $courses = array();
}

class Booking extends CI_Model{
	public $day = "";
	public $period="";
	public $courseCode="";
	public $courseType="";
	public $room="";
	public $instructor="";
}