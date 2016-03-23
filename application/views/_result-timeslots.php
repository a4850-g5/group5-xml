<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div id="container">
		<h1>Results by Time period</h1>
			<table id="timeslotsResult">
			<thead>
				<tr>
					<th>Period</th>
					<th>Course Number</th>
					<th>Instructor</th>
					<th>Room Number</th>
					<th>Day</th>
					<th>Course type</th>
				</tr>
			</thead>
			<tbody>
			{timeslotsFacet}
			   <tr>
					<td>{periodStart} - {periodEnd}</td>
					<td>{courseCode}</td>
					<td>{instructor}</td>
					<td>{room}</td>
					<td>{day}</td>
					<td>{courseType}</td>
				</tr>
			{/timeslotsFacet}
			</tbody>
			</table>
