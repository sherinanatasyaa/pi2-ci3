

		<div class="row mt-2">
		<div class="col-3">
			<a href=barang/create class="btn btn-success">Tambah</a>
		</div>
		</div>

		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Nama Barang</th>
					<th scope="col">Harga Barang</th>
					<th scope="col">Stok</th>
					<th scope="col">Keterangan</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
			foreach ($allbarang as $no => $barang) {
				?>
				<tr>
					<th scope="row"><?= $no+1 ?></th>
					<td><?= $barang['nama_barang']; ?></td>
					<td><?= $barang['harga_barang']; ?></td>
					<td><?= $barang['stok']; ?></td>
					<td><?= $barang['keterangan']; ?></td>

					<td>
						<a href="<?=('barang/edit/' . $barang['barang_id'])?>" class="btn btn-warning">Edit</a>
						<a href="<?=('barang/hapus/' . $barang['barang_id'])?>" class="btn btn-danger">Hapus</a>
				</tr>
				<?php
	}
		?>

			</tbody>
		</table>