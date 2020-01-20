$(document).ready(function () {

	// $('#tombolCari').hide();

	var table = $('#mydata').DataTable();

	$('#keyword').on('keyup', function () {
		table.search(this.value).draw();
	});
	console.log(table);

});
