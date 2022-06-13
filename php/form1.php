<!DOCTYPE html>
<html lang = "en">
<center>
<body bgcolor="#fff">
<?php include 'database.php'; ?>

<?php

//collecting values from html form
$uid = mysqli_real_escape_string($connect, $_POST['uid']);
$username = mysqli_real_escape_string($connect, $_POST['username']);
$first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
$last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
$status = mysqli_real_escape_string($connect, $_POST['status']);
$dept = mysqli_real_escape_string($connect, $_POST['dept']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);
$birth_day = mysqli_real_escape_string($connect, $_POST['birth_day']);
$birth_month = mysqli_real_escape_string($connect, $_POST['birth_month']);
$birth_year = mysqli_real_escape_string($connect, $_POST['birth_year']);
$email_id = mysqli_real_escape_string($connect, $_POST['email_id']);
$phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
$address = mysqli_real_escape_string($connect, $_POST['address']);
$city = mysqli_real_escape_string($connect, $_POST['city']);
$zip_code = mysqli_real_escape_string($connect, $_POST['zip_code']);
$state = mysqli_real_escape_string($connect, $_POST['state']);	

//query to check if uid already exists
$imp_query = "select first_name, last_name from student where uid = '$uid' ";
//executing above query and storing results in variable
$uid_check = mysqli_query($connect, $imp_query);
$num = mysqli_num_rows($uid_check);
//loop tp check that no empty fields are present
if(empty($uid) || empty($username) || empty($first_name) || empty($last_name) || empty($_POST['status']) || empty($dept) || empty($gender) || empty($birth_day) || empty($birth_month) || empty($birth_year) || empty($email_id) || empty($phone_number) || empty($address) || empty($city) || empty($zip_code) || empty($state)){
	//header('Location: enroll.html');
	echo "<h3>Error has occured. Please check all fields.</h3>";
	echo "<a href='enroll.html'>Go back to previous page</a><br/>";
	echo "<a href='homepage.html'>Go back to homepage</a><br/>";
	
}else{
    //if uid exists, display error message and dont enroll student
    if($num > 0){
    echo "<br/>Error: Already enrolled. The University ID you entered exists in the SIS database.<br/>";
        $first_name = mysqli_fetch_assoc($uid_check, 0, "first_name"); 
        $last_name = mysqli_fetch_assoc($uid_check, 0, "last_name");
        echo "<h3>The student ". "<i>$first_name $last_name</i>" . " was enrolled with the University ID " .$uid . ".</h3>";
    echo "<a href='enroll.html'>Go back to previous page</a><br/>";
	echo "<a href='homepage.html'>Go back to homepage</a><br/>";
    mysqli_close($connect);
}
else
{
    //no error, enroll student and display success message
	$query1 = "INSERT INTO student (uid, username, first_name, last_name, status, dept, gender, birth_day, birth_month, birth_year, email_id, phone_number, address, city, zip_code, state)
	VALUES ('$uid','$username','$first_name','$last_name','$status','$dept','$gender','$birth_day','$birth_month','$birth_year','$email_id','$phone_number','$address','$city','$zip_code','$state')";

	$result = mysqli_query($connect, $query1);
	if($result){
		echo "<h2><b>Student (". "$first_name $last_name" .") was successfully added to the SIS database.<b></h2>";
	}
	else{
		echo "<p>Unable to add student to SIS database";
	}	
	echo "<br/>";
	echo "<a href='../enroll.html'>Add another student</a><br/>";
	echo "<a href='../homepage.html'>Go back to homepage</a>";
} 
}
?>
</body>
</center>
</html>