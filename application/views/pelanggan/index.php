		<div class="row mt-2">
		<div class="col-3">
			<a href=pelanggan/create class="btn btn-success">Tambah</a>
		</div>
		</div>

		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Nama Pelanggan</th>
					<th scope="col">No Telp</th>
					<th scope="col">Alamat</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
			foreach ($allpelanggan as $no => $pelanggan) {
				?>
				<tr>
					<th scope="row"><?= $no+1 ?></th>
					<td><?= $pelanggan['nama_pelanggan']; ?></td>
					<td><?= $pelanggan['no_telp']; ?></td>
					<td><?= $pelanggan['alamat']; ?></td>

					<td>
						<a href="<?=('pelanggan/edit/' . $pelanggan['pelanggan_id'])?>" class="btn btn-warning">Edit</a>
						<a href="<?=('pelanggan/hapus/' . $pelanggan['pelanggan_id'])?>" class="btn btn-danger">Hapus</a>
				</tr>
				<?php
	}
		?>

			</tbody>
		</table>