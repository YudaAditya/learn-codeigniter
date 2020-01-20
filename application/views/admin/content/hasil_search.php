				<?php if (!empty($artikels)) { ?>
					<?php foreach ($artikels as $artikel) : ?>

						<tr>
							<th scope="row" class="name">
								<div class="media align-items-center">
									<div class="media-body">
										<span class="mb-0 text-sm"><?php echo ++$offset; ?></span>
									</div>
								</div>
							</th>
							<th scope="row" class="name">
								<div class="media align-items-center">
									<div class="media-body">
										<span class="mb-0 text-sm"><?php echo $artikel['id_artikel'] ?></span>
									</div>
								</div>
							</th>
							<td class="budget">
								<?php echo $artikel['judul'] ?>
							</td>
							<td class="status">
								<?php echo $artikel['artikel'] ?>
							</td>
							<td class="status">
								<?php echo $artikel['tag'] ?>
							</td>
							<td class="status">
								<img src="<?php echo base_url('upload/artikel/' . $artikel['gambar']) ?>" width="64" />
							</td>
							<td class="completion">
								<?php echo $artikel['tanggal'] ?>
							</td>
							<td>Rp <?php echo number_format($artikel['harga'], 2, ',', '.'); ?></td>
							<td class="text-right">
								<div class="dropdown">
									<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item" href="<?php echo site_url('admin/artikel/edit/' . $artikel['id_artikel']) ?>"><i class="far fa-edit text-blue"></i>Edit</a>
										<a onclick="deleteConfirm('<?php echo site_url('admin/artikel/delete/' . $artikel['id_artikel']) ?>')" class="dropdown-item" href="#!"><i class="fas fa-trash text-red"></i>Hapus</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php } else { // Jika data tidak ada
					echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
				} ?>
