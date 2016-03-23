<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Results by Days of the week</h1>
<table id="daysResult">
	<thead>
		<tr>
			<th>Day</th>
			<th>Course Number</th>
			<th>Instructor</th>
			<th>Room Number</th>
			<th>Course type</th>
			<th>Period</th>
		</tr>
	</thead>
	<tbody>
		{daysFacet}
		<tr>
			<td>{day}</td>
			<td>{courseCode}</td>
			<td>{instructor}</td>
			<td>{room}</td>
			<td>{courseType}</td>
			<td>{periodStart} - {periodEnd}</td>
		</tr>
		{/daysFacet}
	</tbody>
</table>

