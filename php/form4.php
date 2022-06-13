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
<style type="text/css">
table
	{
		font-family: Calibri;
		color: black;
		font-size: 15pt;
		font-style: normal;
		background-color: #eff3f6;
		border: 2px solid black
	}
	table.inner{border: 0px}
</style>
<?php include 'database.php'; ?>

<?php

$uid = $_POST['uid'];	
$query8 = "SELECT username, first_name, last_name, status, dept FROM student where uid = '$uid' ";

$result8 = mysql_query($query8);
$num8 = mysql_num_rows($result8);
if(mysql_affected_rows()>0)
{
echo "<h3>Mahasiswa yang memiliki NIM " .$uid. " dengan informasi berikut akan dihapus PERMANEN dari pangkalan data.</h3>";
?>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama Pengguna</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status Kelulusan</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Program Studi</b></font></td>
</tr>

<?php
$i = 0;
while($i < $num8)
{
	$username = mysql_result($result8, $i, "username");
	$first_name = mysql_result($result8, $i, "first_name");
	$last_name = mysql_result($result8, $i, "last_name");
	$status = mysql_result($result8, $i, "status");
	$dept = mysql_result($result8, $i, "dept");
?>
<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
</tr>
<?php $i++; }?>
<?php mysql_close(); ?>
</table>
<br/>
<br/>
<br/>
<form action = "student_delete.php" method = "POST" >
<table cellpadding = "10">
<tr>
<td>Masukkan Kembali NIM:</td>
<td><input type="text" name="uid" maxlength="10"/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type = "submit" value = "Hapus" tabindex = "4"></td></tr>
</table>
</form>
<br/>

<button onclick="window.location.href='../delete.html'">Batal</button>

<br/>
<br/>
<br/>
<a href="../index.html">Kembali ke laman utama</a>
<?php	
}
else{
	echo "<br/>";
	echo "<h3>NIM tidak ada di pangkalan data!</h3>";
	echo "<a href='../delete.html'>Kembali ke laman sebelumnya</a><br/>";
	echo "<a href='../index.html'>Kembali ke laman utama</a><br/>";
}
?>


</body>
</center>
</html>