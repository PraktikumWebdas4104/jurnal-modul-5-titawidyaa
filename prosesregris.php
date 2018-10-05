<body bgcolor="pink" align="center">
<form method="POST">
<table>
	<tr>
		<td>NIM :</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>NAMA :</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>EMAIL:</td>
		<td><input type="email" name="email"></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="DAFTAR"></td>
	</tr>
</table>
</form>
</body>

<?php 
	if(isset($_POST['submit'])){
		include("koneksiDB.php");
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$status=true;

		if (!is_int($nim) and (strlen($nim)<10) or (strlen($nim)>10)) {
			echo("NIM harus angka dan 10 karakter");
			$status=false;
		}

		if (!preg_match('/^[a-z A-Z]$/i', $nama) and strlen($nama)>25) {
			echo("Nama harus huruf dengan maksimal 25 karakter");
			$status=false;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo("Email sesuai ketentuan email pada umumnya");
			$status=false;
		}
		if($status){
			$sql=mysqli_query($koneksi,"INSERT INTO mahasiswa
				VALUES ($nim, '$nama', '$email')");
		}
	}
 ?>
