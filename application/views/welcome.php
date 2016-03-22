<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Welcome to CodeIgniter!</h1>

<div id="body">
	<form method="post">
		 <label id="Timeslot" for="Timeslot">Timeslot: </label>
		<select name="dropdown_timeslot">
			{timeslots}
			<option value="{code}">{period}</option>
			{/timeslots}
		</select>

		 <br />
		 
		 <label id="Day" for="Day">Day of Week: </label>
		<select name="dropdown_day">
			{days}
			<option value="{code}">{day}</option>
			{/days}
		</select>

		<br />
		<br />

		<input type='submit' value='Search'>
	</form>
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>