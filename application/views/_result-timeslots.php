<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>Showing all results from the time slot facet</h2>
<table id="timeslotsResult" class="display">
	<thead>
		<tr>
			<th>Period</th>
			<th>Day</th>
			<th>Course Number</th>
			<th>Course Type</th>
			<th>Instructor</th>
			<th>Room Number</th>
		</tr>
	</thead>
	<tbody>
		{timeslotsFacet}
		<tr>
			<td>{periodStart} - {periodEnd}</td>
			<td>{day}</td>
			<td>{courseCode}</td>
			<td>{courseType}</td>
			<td>{instructor}</td>
			<td>{room}</td>
		</tr>
		{/timeslotsFacet}
	</tbody>
</table>
