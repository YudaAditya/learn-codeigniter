<?php $this->load->view("admin/_layouts/_header.php"); ?>

<body>
	<?php $this->load->view("admin/_layouts/_sidebar.php"); ?>
	<div class="main-content">
		<?php $this->load->view("admin/_layouts/_navbar.php"); ?>
		<div class="header  pb-8 pt-5 pt-md-8">
			<div class="container-fluid">
				<div class="header-body">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>
					<?php foreach ($artikel as $artikel) { ?>
						<form action="<?php echo site_url('admin/artikel/update') ?>" method="post" enctype="multipart/form-data">
							<h3 display-3><?php echo $artikel->id_artikel ?></h3>
							<input type="hidden" name="id" class="form-control form-control-alternative" value="<?php echo $artikel->id_artikel ?>">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<h4 class="text-black">Judul</h4>
										<input type="text" name="judul" class="form-control form-control-alternative 
                                    <?php echo form_error('judul') ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" value="<?php echo $artikel->judul ?>">
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
											<option value="<?php echo $artikel->tag ?>"><?php echo $artikel->tag ?></option>
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
										<h4 class="text-black">Harga (RP)</h4>
										<input type="text" name="harga" class="form-control form-control-alternative <?php echo form_error('tag') ? 'is-invalid' : '' ?>" id="exampleFormControlInput1" value="<?php echo $artikel->harga ?>">
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
										<textarea name="artikel" class="form-control <?php echo form_error('artikel') ? 'is-invalid' : '' ?>" id="exampleFormControlTextarea1" rows="3"><?php echo $artikel->artikel ?></textarea>
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
										<div class="custom-file">
											<div class="col-sm-3">
												<img src="<?php echo base_url() . 'upload/artikel/' . $artikel->gambar; ?>" class="img-thumbnail" />
											</div>
											<div class="col-sm-9">
												<input type="file" class="custom-file-input" name="gambar" value="<?php echo $artikel->gambar; ?>"></input>
												<label class="custom-file-label"></label>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="row">
								<button type="submit" name="btn-save" class="btn btn-icon btn-info btn-block">
									<span class="btn-inner--icon"><i class="fas fa-save"></i></span>

									<span class="btn-inner--text">Simpan</span>
								</button>
								<!-- <button type="submit" class="btn btn-outline-danger btn-block">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>

                                <span class="btn-inner--text">Hapus</span>
                            </button> -->
							</div>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
