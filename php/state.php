<!DOCTYPE html>
<html lang = "en">
<center>
<img src="logo.png" alt="Logo UMMI" style="width:175px"/>
<body bgcolor="#fff">
<br>
<style type="text/css">
table
	{
		font-family: Calibri;
		color: black;
		font-size: 12pt;
		font-style: normal;
		background-color: #eff3f6;
		border: 2px solid black
	}
	table.inner{border: 0px}
	
</style>
<?php include 'database.php'; ?>

<?php

$state = $_POST['state'];

$query7 = "select username, first_name, last_name, status, dept, city, zip_code from student where state = '$state' ";

$result7 = mysql_query($query7);
$num7 = mysql_num_rows($result7);

if(mysql_affected_rows() > 0){
	echo "<h3>Daftar mahasiswa dari provinsi" . " " . $state . "</h3>";
?>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama Pengguna</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status Kelulusan</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Program Studi</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Kota</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Kode Pos</b></font></td>
</tr>
<?php
$i = 0;
while($i < $num7){
	$username = mysql_result($result7, $i, "username"); 
	$first_name = mysql_result($result7, $i, "first_name");
	$last_name = mysql_result($result7, $i, "last_name");
	$status = mysql_result($result7, $i, "status");
	$dept = mysql_result($result7, $i, "dept");
	$city = mysql_result($result7, $i, "city");	
	$zip_code = mysql_result($result7, $i, "zip_code");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $city; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $zip_code; ?></font></td>
	</tr>
<?php $i++; } ?>
<?php mysql_close();?>
</table>
<br/>
<br/>
<a href="../state_search.html">Kembali ke laman sebelumnya</a><br/>
<a href="../index.html">Kembali ke laman utama</a>

<?php 
}
else{
	echo "<br/>";
	echo "<b>Terjadi kesalahan karena salah satu alasan berikut:</b><br/>1. Anda tidak memilih provinsi. Pilih salah satu provinsi di daftar.<br/>2. Tidak ada mahasiswa dari provinsi terpilih.<br/><br/>";
	echo "<a href='../state_search.html'>Kembali ke laman sebelumnya</a></br>";
	echo "<a href='../index.html'>Kembali ke laman utama</a>";
}
?>
<br/>
<br/>
</body>
</center>
</html>