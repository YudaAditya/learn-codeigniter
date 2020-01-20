<div id="container" class="table-responsive">
	<div class="container ">
		<div class="card shadow">
			<div class="row">
				<div class="col">
					<h4 class="text-black">Sort by</h4>
				</div>
				<div class="col-11">
					<?php echo form_open('admin/artikel/bytag') ?>
					<div class="input-group">
						<select class="form-control" name="sort">
							<option value="Normal">Pilih tag</option>
							<option value="Horor">Horor</option>
							<option value="Comedy">Comedy</option>
						</select>
						<div class="input-group-append">
							<input class="btn btn-primary" type="submit" value="pilih" name="pilih">
						</div>
					</div>
					<?php echo form_close() ?>
				</div>



			</div>
			<div id="container" class="row">
				<div class="col">

					<table id="mydata" class="table align-items-center">
						<thead class="thead-bold">
							<tr>
								<th scope="col">
									no
								</th>
								<th scope="col">
									id
								</th>
								<th scope="col">
									Title
								</th>
								<th scope="col">
									Artikel
								</th>
								<th scope="col">
									tag
								</th>
								<th scope="col">
									Gambar
								</th>
								<th scope="col">
									Tanggal
								</th>
								<th scope="col">
									Harga
								</th>
							</tr>
						</thead>

						<tbody id="data" class="list">
							<?php $this->load->view("admin/content/hasil_search"); ?>


						</tbody>
					</table>
				</div>
			</div>
			<div class="container text-right">
				<a href="<?php echo base_url() . 'admin/artikel/tambah_artikel' ?>"><button type="button" class="btn btn-primary">Tambah Artikel</button></a>
			</div>


		</div>
		<div class="container">
			<?php echo $halaman; ?>
		</div>
	</div>

</div>
