<?php 
include "../../koneksi.php"; 
	$id_kategori=@$_GET['id_kategori'];
	$modal=mysqli_query($db,"SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'");
	while($r=mysqli_fetch_array($modal)){
?>
   <!--modal dialog -->
    <div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading" align="center">Edit Data Kategori</div>
					<div class="panel-body">

						<form method="POST" action="kategori/kategori_edit.php">
							<div class="form-group" hidden="">
								<label for="id">id</label>
									<input type="text" id="id" class="form-control" placeholder="" name="id_kategori" value="<?php echo $r['id_kategori']; ?>">
							</div>
							
							<div class="form-group" >
								<label for="nama_kategori">Nama Kategori</label>
									<input type="text" id="nama_kategori" class="form-control" placeholder="Masukkan Username" name="nama_kategori" value="<?php echo $r['nama_kategori']; ?>" required oninvalid="this.setCustomValidity('nama kategori tidak boleh kosong')" oninput="setCustomValidity('')">	
							</div>
									<div class="modal-footer">
									   <input type="submit" class="btn btn-success" value="Simpan" name="simpan">
									   <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="window.location.href=window.location.href;">Batal</button>
									 </div>
							</form>
 <?php
		}
		?>
	  <?php
	if(isset($_POST['simpan'])){
	$id_kategori			=$_POST['id_kategori'];
	$nama_kategori		=$_POST['nama_kategori'];

		$query = mysqli_query( $db, "SELECT * FROM tb_kategori WHERE nama_kategori='$nama_kategori'" );
									$cek = mysqli_num_rows( $query );
									if ( $cek > 0 ) {
										echo "<script> alert('Data sudah pernah diinput, Coba Periksa Lagi!');window.location='../index.php?page=kategori';</script>";

									} else {
										mysqli_query( $db, "UPDATE tb_kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'" )or die( $db->error );
										echo "<script>window.location='../index.php?page=kategori';</script>";

									}
		
	}
										 
?>
							</div>
						</div>
					</div>

				</div>
<!-- end modal dialog -->