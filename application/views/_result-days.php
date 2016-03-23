<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>Showing all results from the day facet</h2>
<table id="daysResult" class="display">
	<thead>
		<tr>
			<th>Day</th>
			<th>Period</th>
			<th>Course Number</th>
			<th>Course Type</th>
			<th>Instructor</th>
			<th>Room Number</th>
		</tr>
	</thead>
	<tbody>
		{daysFacet}
		<tr>
			<td>{day}</td>
			<td>{periodStart} - {periodEnd}</td>
			<td>{courseCode}</td>
			<td>{courseType}</td>
			<td>{instructor}</td>
			<td>{room}</td>
		</tr>
		{/daysFacet}
	</tbody>
</table>
