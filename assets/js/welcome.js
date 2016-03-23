$(document).ready(function () {
	$('#courseResult').DataTable({
		'searching': false,
		'paging': false
	});
	$('#daysResult').DataTable({
		'searching': false,
		'paging': false
	});
	$('#timeslotsResult').DataTable({
		'searching': false,
		'paging': false
	});
	$('#searchResult').DataTable({
		'searching': false,
		'paging': false,
		'columns': [
			{"orderable": false},
			null,
			null,
			null,
			null,
			null,
			null
		],
		'order': [
			[1, 'asc']
		]
	});
});