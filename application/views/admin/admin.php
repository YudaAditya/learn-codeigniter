<?php $this->load->view("admin/_layouts/_header.php"); ?>

<body class="">

	<?php $this->load->view("admin/_layouts/_sidebar.php"); ?>
	<div class="main-content">
		<?php $this->load->view("admin/_layouts/_navbar.php"); ?>
		<?php $this->load->view("admin/_layouts/_card-info.php"); ?>

		<?php $this->load->view("admin/content/list-artikel.php"); ?>

	</div>
	<?php $this->load->view("admin/_layouts/_js.php"); ?>
	<script type="text/javascript">
		ambilData();

		function ambilData() {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url() . "admin/admin/ambildata" ?>',
				dataType: 'json',
				success: function(data) {
					console.log(data);
					var baris = '';
					for (var i = 0; i < data.length; i++) {
						baris += '<tr>' +
							'<td>' + data[i].id_artikel + '</td>' +
							'<td>' + data[i].judul + '</td>' +
							'<td>' + data[i].artikel + '</td>' +
							'<td>' + data[i].tanggal + '</td>' +
							'</tr>';
					}
					$('#target').html(baris);
				}
			});
		}
	</script>
	<script src="<?php echo base_url() . 'theme/modified/js/script.js' ?>"></script>

</body>

</html>
