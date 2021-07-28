<div class="row mt-2">
	<div class="col-3">
	<a href="<?=('penjualandetail/proses/' . $penjualan['penjualan_id'])?>" 
	type="button" class="btn btn-primary">Tambah</a>
	</div>
</div>

<table class="table mt-2">
	<thead>
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Nama Barang</th>
			<th scope="col">Jumlah</th>
			<th scope="col">Diskon</th>
			<th scope="col">Harga Total</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($penjualandetail as $no => $p) {
				?>
		<tr>
			<th scope="row"><?= $no+1 ?></th>
			<td><?= $p['nama_barang']; ?></td>
			<td><?= $p['jumlah']; ?></td>
			<td><?= $p['diskon']; ?></td>
			<td><?= $p['harga_total']; ?></td>

			<td>
				<a href="<?=('penjualandetail/hapus/' . $p['penjualan_id'] . '/' . $p['penjualan_detail_id'])?>" class="btn btn-danger">Hapus</a>
			</td>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5><?date('Y-m-d')?>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="penjualan/simpanpenjualan" method="POST">
				<input type="hidden" name="tgl_penjualan" value="<?date('Y-m-d')?>">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
						<select class="form-select" name="pelanggan_id" aria-label="Default select example">
							<option selected>-- Pilih Pelanggan --</option>

							<?php foreach ($allpelanggan as $key => $pelanggan) { ?>

							<option value="<?=$pelanggan ['pelanggan_id']?>">
								<?=$pelanggan ['nama_pelanggan']?>
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
