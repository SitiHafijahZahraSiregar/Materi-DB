<?php
include "koneksi.php";
session_start();
if ($_SESSION['status'] != "login") {
    header("location:index.php");
}
$query_mysql = mysqli_query($mysqli, "SELECT * FROM mahasiswa");
$nomor = 1;
echo "<a href='tambah.php'>tambah</a><br>";?>

<body style="background-color:  #ffe4e1">

<table border="2px">
		<th>No</th>
		<th>Nama</th>
		<th>NPM</th>
		<th>Alamat</th>
		<th>No Sepatu</th>
		<th>Aksi</th>

<?php while ($data = mysqli_fetch_array($query_mysql)) { //menampilkan data yang dimasukkan
?>
	
    <tr>
        <td><?php echo $nomor++; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['npm']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['nomor_sepatu']; ?></td>
        <td>
        	<a href="update.php?id=<?=$data['id'];?>">Update</a>
        	<a href="delete.php?id=<?=$data['id'];?>" onclick="return konfirmasiHapus();">Delete</a>
        </td>
    </tr>
    
<?php
}

?>
</table>
<br>

<a href="logout.php">LOGOUT</a> 

<script>
  function konfirmasiHapus() {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      return true;
    } else {
      return false;
    }
  }
</script>