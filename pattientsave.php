<!DOCTYPE html>
<html>
<body>
	<?php include 'database.php';?>
	<?php

	//create a variable
	$firstname=$_POST['firstname'];
	$surname=$_POST['surname'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$result = mysqli_query($connect, "select name from patient where firstname='$firstname'");
	//execute the querry

	if ($password != $password2){
		echo "<script language='javascript'>
		alert('password does not match')
		location.href='patient.php';
		echo </script>";
		exit();

	} 

	else{

		$query = "INSERT INTO patients (firstname, surname, password) VALUES('$firstname', '$surname', '$password')";
		if (mysqli_query($connect, $query)){
			echo "<script language='javascript'>
				alert('Member details added')
				location.href='patient.php';
				echo </script>";

		} else{
			echo "Error: " . $query . "<br>" . mysqli_error($connect);
		}

	}
	?>
</body>
</html>