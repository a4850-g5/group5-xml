<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Welcome to CodeIgniter!</h1>

<div id="body">

	<select name="dropdown_timeslot">
		{timeslots}
		<option value="{code}">{period}</option>
		{/timeslots}
	</select>

	<select name="dropdown_day">
		{days}
		<option value="{code}">{day}</option>
		{/days}
	</select>

	<br />
	<br />

	<input type='submit' value='Search' onclick="searchFunction()">

</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>