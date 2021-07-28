<div class="row mt-2">
	<div class="col-3">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
			Tambah
		</button>
	</div>
</div>

<table class="table mt-2">
	<thead>
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Pelanggan</th>
			<th scope="col">Tanggal Penjualan</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($allpenjualan as $no => $penjualan) {
				?>
		<tr>
			<th scope="row"><?= $no+1 ?></th>
			<td><?= $penjualan['nama_pelanggan']; ?></td>
			<td><?= $penjualan['tgl_penjualan']; ?></td>
			<td><?= $penjualan['keterangan']; ?></td>

			<td>
				<a href="<?=('penjualan/edit/' . $penjualan['penjualan_id'])?>" class="btn btn-warning">Edit</a>
				<a href="<?=('penjualan/hapus/' . $penjualan['penjualan_id'])?>" class="btn btn-danger">Hapus</a>
		</tr>
		<?php
	}
		?>

	</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan
					<?date('YY-MM-DD')?>
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="penjualan/simpanpenjualan" method="POST">
				<input type="hidden" name="tgl_penjualan" value="<?date('YY-MM-DD')?>">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
						<select class="form-select" name="pelanggan_id" aria-label="Default select example">
							<option selected>-- Pilih Pelanggan --</option>

							<?php foreach ($allpelanggan as $key => $pelanggan) { ?>

							<option value="<?$pelanggan ['pelanggan_id']?>">
								<?$pelanggan ['nama_pelanggan']?>
							</option>

							<?php } ?>

						</select>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Keterangan</label>
						<textarea name="keterangan" class="form-control" id="exampleFormControlInput1"
							rows="3"></textarea>
					</div>

					<div class="mb-3">
						<buttom type="submit" class="btn btn-primary">Submit</buttom>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
