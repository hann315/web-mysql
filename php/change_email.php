<!DOCTYPE html>
<html lang = "en">
<center>
<img src="logo.png" alt="Logo UMMI" style="width:175px"/>
<body bgcolor="#fff">
<?php include 'database.php'; ?>
<br/>
<?php

// collecting posted values from html form
$uid = $_POST['uid'];
$email_id = $_POST['email_id'];

// writing query to update email 
$query11 = "UPDATE student SET email_id = '$email_id' WHERE uid = '$uid' ";
    
// executing above query and storing result in a variable
$result11 = mysql_query($query11);

// checking to see that no empty fields were submitted
if (empty($uid) || empty($email_id)){
	echo "<h3>Terjadi kesalahan! Masukkan NIM dan alamat email baru!</h3><br/>";	
}
    
//displaying success message for email id update
else{
	echo "<h3>Alamat email mahasiswa (NIM: " . "$uid" . ") berhasil diubah menjadi ". "$email_id" . "</h3><br/>" ;
	//echo "<b>Database output</b><br/><br/>";
}
    
//closing mysql
mysql_close();

?>
<br/>

<!-- links to go to prev page and homepage -->
<a href="../update.html">Kembali ke laman sebelumnya</a><br/>
<a href="../index.html">Kembali ke laman utama</a>
</body>
</center>
</html>