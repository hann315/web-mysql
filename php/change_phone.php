<!DOCTYPE html>
<html lang = "en">
<center>
<img src="logo.png" alt="Logo UMMI" style="width:175px"/>
<body bgcolor="#fff">
<br>

<!-- including file for database connection -->
<?php include 'database.php'; ?>
<br/>
<?php

// collecting posted values from html form
$uid = $_POST['uid'];
$phone_number = $_POST['phone_number'];

//writing query to update phone number
$query12 = "UPDATE student SET phone_number = '$phone_number' WHERE uid = '$uid' ";

//executing above query and storing the result in a variable
$result12 = mysql_query($query12);

//checking to see that no fields were empty
if (empty($uid) || empty($phone_number)){
	echo "<h3>Terjadi kesalahan! Masukkan NIM dan nomor HP baru.</h3><br/>";
	
}

//displaying success message for phone number update
else{
	echo "<h3>Nomor HP mahasiswa dengan NIM: " . "$uid" . " berhasil diubah menjadi ". $phone_number . "</h3><br/>" ;
	//echo "<b>Database output</b><br/><br/>";
	
}

// closing mysql
mysql_close();

?>
<br/>

<!-- links to go to prev page and homepage -->
<a href="../update.html">Kembali ke laman sebelumnya</a><br/>
<a href="../index.html">Kembali ke laman utama</a>
</body>
</center>
</html>