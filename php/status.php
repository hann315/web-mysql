<!DOCTYPE html>
<html lang = "en">
<center>
<img src="logo.png" alt="Logo UMMI" style="width:175px"/>
<body bgcolor="#fff">
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

$status = $_POST['status'];

$query4 = "select uid, username, first_name, last_name, dept from student where status = '$status' ";

$result4 = mysql_query($query4);
$num4 = mysql_num_rows($result4);
if(mysql_affected_rows() > 0){
	echo "<h3>Daftar mahasiswa dengan status kelulusan: " . " " . "$status" . "</h3>";
//echo "<b>Database output</b><br/><br/>";
?>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>NIM</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama Pengguna</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Program Studi</b></font></td>
</tr>
<?php
$i = 0;
while($i < $num4){
	$uid = mysql_result($result4, $i, "uid");
	$username = mysql_result($result4, $i, "username"); 
	$first_name = mysql_result($result4, $i, "first_name");
	$last_name = mysql_result($result4, $i, "last_name");
	$dept = mysql_result($result4, $i, "dept");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $uid; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
	</tr>

<?php $i++;} ?>
<?php mysql_close(); ?>
</table>
<br/>
<br/>
<a href="../status_search.html">Kembali ke laman sebelumnya</a><br/>
<a href="../index.html">Kembali ke laman utama</a>
<?php 
}
else{
	echo "<b>Terjadi kesalahan karena salah satu alasan berikut:</b><br/>1. Anda tidak memilih status kelulusan. Pilih salah satu program studi di daftar.<br/>2. Tidak ada mahasiswa di status kelulusan yang dipilih.<br/><br/><br/>";
	echo "<a href='../status_search.html'>Kembali ke laman sebelumnya</a></br>";
	echo "<a href='../index.html'>Kembali ke laman utama</a>";
}
?>

</body>
</center>
</html>