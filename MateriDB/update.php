<!DOCTYPE html>
<html>
	<head>
		<title>Update Page</title>

		<body style="background-color: #FFDAB9">
	</head>
	<style type="text/css">
		label {
		  display: block;
		  margin-bottom: 3px;
		}
		input{
			display: block;
  			box-sizing: border-box;
  			margin-bottom: 3px;
		}
		.btn {
		    display: inline-block;
		    line-height: 1.5;
		    text-align: center;
		    text-decoration: none;
		    white-space: nowrap;
		    border: 1px solid #007bff;
		    border-radius: 0.25rem;
		    background-color: #007bff;
		    color: #fff;
		  }

		.btn:hover {
		    background-color: #0069d9;
		    border-color: #0062cc;
		    color: #fff;
		}

		.btn:focus {
		    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
		}
	</style>
	<body>
		<?php
			include 'koneksi.php';
			$id = $_GET['id'];
			$query = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id='$id'");
			$data = mysqli_fetch_array($query);

			if (isset($_POST['alamat'])) {
				$update = mysqli_query($mysqli, "UPDATE mahasiswa SET nama = '".$_POST['nama']."', npm = '".$_POST['npm']."', alamat = '".$_POST['alamat']."', nomor_sepatu = '".$_POST['no_spt']."' WHERE id = '$id'");
				if ($update) {
					header('Location: home.php');
				}
			}
		?>
		<form method="POST">
			<label for="nama">Nama</label>
			<input type="text" name="nama" id="nama" value="<?=$data['nama']?>" required>

			<label for="npm">NPM</label>
			<input type="text" name="npm" id="npm" value="<?=$data['npm']?>" required>

			<label for="alamat">Alamat</label>
			<input type="text" name="alamat" id="alamat" value="<?=$data['alamat']?>" required>

			<label for="no_spt">Nomor Sepatu</label>
			<input type="text" name="no_spt" id="no_spt" value="<?=$data['nomor_sepatu']?>" required>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</body>
</html>