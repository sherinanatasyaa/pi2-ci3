		<div class="mb-3 mt-4">
			<form action="barang/editbarang" method="POST">
			<input type="hidden" name="barang_id" value="<?=$barang['nama_barang']?>">
			
				<label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
				<input type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1" placeholder="nama_barang" value="<?=$barang['nama_barang']?>">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
			<input type="number" name="harga_barang"class="form-control" id="exampleFormControlInput1" placeholder="harga_barang" value="<?=$barang['harga_barang']?>">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Stok</label>
			<input type="number" name="stok" class="form-control" id="exampleFormControlInput1" placeholder="stok" value="<?=$barang['stok']?>">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Keterangan</label>
			<textarea name="keterangan" class="form-control" id="exampleFormControlInput1" rows="3"> <?=$barang['keterangan']?></textarea>
		</div>

		<div class="mb-3">
			<buttom type="submit" class="btn btn-primary">Edit</buttom>
		</div>
		</form>