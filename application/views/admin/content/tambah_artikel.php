<?php $this->load->view("admin/_layouts/_header.php"); ?>

<body>
	<?php $this->load->view("admin/_layouts/_sidebar.php"); ?>
	<div class="main-content">
		<?php $this->load->view("admin/_layouts/_navbar.php"); ?>
		<div class="header pb-8 pt-5 pt-md-8">
			<div class="container-fluid">
				<div class="header-body">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<form action="<?php echo site_url('admin/artikel/add') ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<h4 class="text-black">Judul</h4>
									<input type="text" name="judul" class="form-control form-control-alternative <?php echo form_error('judul') ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" placeholder="name@example.com">
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<h4 class="text-black">Tag</h4>
									<select class="form-control" name="tag">
										<option value="Horor">Horor</option>
										<option value="Comedy">Comedy</option>
									</select>
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('tag') ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<h4 class="text-black">harga</h4>
									<input type="number" name="harga" class="form-control form-control-alternative <?php echo form_error('harga') ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" placeholder="1000000">
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<h4 class="text-black">Artikel</h4>
									<textarea name="artikel" class="form-control <?php echo form_error('artikel') ? 'is-invalid' : '' ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Write a large text here ..."></textarea>
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('artikel') ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<h4 class="text-black">Gambar</h4>

									<input class="form-control" type="file" name="gambar">

								</div>
							</div>
						</div>
				</div>
				<div class="row">
					<button type="submit" class="btn btn-icon btn-3 btn-danger btn-block">
						<span class="btn-inner--icon"><i class="fas fa-save"></i></span>

						<span class="btn-inner--text">Simpan</span>
					</button>
				</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>
