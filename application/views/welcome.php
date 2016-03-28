<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Welcome to {siteTitle}!</h1>

<div id="body">
	{schemaValidateResults}
	{coursesTable}
	{daysTable}
	{timeslotsTable}
	<br />
	{searchForm}
	<br />
	{searchStatus}
	<br />
	{bingoStatus}
	<br />
	{searchResults}
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>