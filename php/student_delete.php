<!DOCTYPE html>
<html lang = "en">
<body bgcolor="#fff">
<center>
<img src="logo.png" alt="Logo UMMI" style="width:175px"/>
<?php include 'database.php'?>

<?php
$uid = $_POST['uid'];
$query9 = "DELETE FROM student WHERE uid = '$uid' ";

mysql_query($query9);

if(mysql_affected_rows() > 0){
	echo "<h3>Mahasiswa dengan NIM " ."$uid". " berhasil dihapus dari pangkalan data. </h3></br>";	
	echo "<a href='../delete.html'>Hapus mahasiswa lain</a></br>";
	echo "<a href='../index.html'>Kembali ke laman utama</a>";
}
else
{
	echo "<h3>NIM tidak cocok! Masukkan kembali NIM yang benar!</h3>";
	echo "<a href='../delete.html'>Hapus mahasiswa lain</a></br>";
	echo "<a href='../index.html'>Kembali ke laman utama</a>";
}

?>

</body>
</center>
</html>