		<div class="mb-3 mt-4">
			<form action="pelanggan/editpelanggan" method="POST">
			<input type="hidden" name="pelanggan_id" value="<?=$pelanggan['nama_pelanggan']?>">
			
			<label for="exampleFormControlInput1" class="form-label">Nama pelanggan</label>
			<input type="text" name="nama_pelanggan" class="form-control" id="exampleFormControlInput1" placeholder="nama_pelanggan" value="<?=$pelanggan['nama_pelanggan']?>">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">No Telp</label>
			<input type="number" name="no_telp"class="form-control" id="exampleFormControlInput1" placeholder="no_telp" value="<?=$pelanggan['no_telp']?>">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Alamat</label>
			<textarea name="alamat" class="form-control" id="exampleFormControlInput1" rows="3"> <?=$pelanggan['alamat']?></textarea>
		</div>

		<div class="mb-3">
			<buttom type="submit" class="btn btn-primary">Edit</buttom>
		</div>
		</form>