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
<br/>
<br/>
<br/>
<?php

$username = $_POST['username'];

$query17 = "select username, first_name, last_name, dept, status from student where username = '$username' ";

$result17 = mysql_query($query17);
$num17 = mysql_num_rows($result17);

if (mysql_affected_rows() > 0){
	echo "<h3>Mahasiswa dengan nama pengguna " . "<i>$username</i>" . ") memiliki detail berikut:</h3><br/>";
//echo "<b>Database output</b><br/><br/>";
?>
<table border="1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama Pengguna<b/></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Nama</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Program Studi</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status Kelulusan<b/></font></td>
</tr>
<?php
$i = 0;
while($i < $num17){
	$username = mysql_result($result17, $i, "username");
	$first_name = mysql_result($result17, $i, "first_name"); 
	$last_name = mysql_result($result17, $i, "last_name");
	$dept = mysql_result($result17, $i, "dept");
	$status = mysql_result($result17, $i, "status");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	</tr>
</table>
<?php $i++;}?>
<?php mysql_close(); ?>

<br/>
<br/>
<br/>
<a href="../username_search.html">Kembali ke laman sebelumnya</a><br/>
<a href="../index.html">Kembali ke laman utama</a>
<?php
}
else{
	echo "<h3>Nama pengguna ini tidak ada di pangkalan data!</h3>";
	echo "<a href='../username_search.html'>Kembali ke laman sebelumnya</a></br>";
	echo "<a href='../index.html'>Kembali ke laman utama</a>";
}
?>

</body>
</center>
</html>