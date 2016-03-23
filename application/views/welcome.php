<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Welcome to CodeIgniter!</h1>

<div id="body">
	<a href="/show/courses">List of all Bookings within the Courses facet</a><br />
	<a href="/show/days">List of all Bookings within the Days facet</a><br />
	<a href="/show/timeslots">List of all Bookings within the Timeslots facet</a><br />
	<br />
	{theBody}
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>