<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2>Showing all results from the course facet</h2>
<table id="courseResult" class="display">
	<thead>
		<tr>
			<th>Course Number</th>
			<th>Course Type</th>
			<th>Instructor</th>
			<th>Room Number</th>
			<th>Day</th>
			<th>Period</th>
		</tr>
	</thead>
	<tbody>
		{coursesFacet}
		<tr>
			<td>{courseCode}</td>
			<td>{courseType}</td>
			<td>{instructor}</td>
			<td>{day}</td>
			<td>{periodStart} - {periodEnd}</td>
			<td>{room}</td>
		</tr>
		{/coursesFacet}
	</tbody>
</table>
