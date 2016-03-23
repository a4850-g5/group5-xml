<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Results by Course Number</h1>
<table id="courseResult">
	<thead>
		<tr>
			<th>Course Number</th>
			<th>Instructor</th>
			<th>Room Number</th>
			<th>Day</th>
			<th>Course type</th>
			<th>Period</th>
		</tr>
	</thead>
	<tbody>
		{coursesFacet}
		<tr>
			<td>{courseCode}</td>
			<td>{instructor}</td>
			<td>{room}</td>
			<td>{day}</td>
			<td>{courseType}</td>
			<td>{periodStart} - {periodEnd}</td>
		</tr>
		{/coursesFacet}
	</tbody>
</table>
