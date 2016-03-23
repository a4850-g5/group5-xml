<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<form method="post" action="/search">
		 <label for="Timeslot">Timeslot: </label>
		<select  id="Timeslot" name="dropdown_timeslot">
			{timeslots}
			<option value="{code}">{period}</option>
			{/timeslots}
		</select>

		 <br />
		 
		 <label for="Day">Day of Week: </label>
		<select  id="Day" name="dropdown_day">
			{days}
			<option value="{code}">{day}</option>
			{/days}
		</select>

		<br />
		<br />

		<input type='submit' value='Search'>
	</form>
</div>