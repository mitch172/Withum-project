<?php
	$servername='localhost';
    $username='root';
    $password='';
    $dbname = "withum";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");

	if(!$conn){
		die('Could not Connect MySql Server:' .mysql_error());
	}
	
	$class = $_POST['filename'];

	// If input is a new hire
	if($class == "NH") {
		// Initialize account and variables
		$start    = $_POST['start_date']; 
		$name     = $_POST['full_name']; 
		$nickname = $_POST['nickname']; 
		$title    = $_POST['title'];
		$location = $_POST['location'];
		$computer = $_POST['computer'];
		$status = "";
		$serial = "";
		$asset = "";
		$tech = "";
		$qc = "";

		//Insert into newHires table
		$sql = "INSERT INTO newHires
			(start,name,nickname,title,location,computer,status,serial,asset,tech,qc) VALUES
			('$start','$name','$nickname','$title','$location','$computer','$status','$serial','$asset','$tech','$qc')";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('New record has been added successfully!')</script>";
			header("Location: ..\HTML\newHire.html");
		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
		exit();
	// If input is an upgrade or rebuild
	} else {
		// Initialize account and variables
		$name    	= $_POST['full_name'];
		$location 	= $_POST['location'];
		$build_location = "RB";
		$computer 	= $_POST['computer'];
		$windows 	= $_POST['windows'];

		//Insert into upgrades table
		$sql = "INSERT INTO upgrades
			(name,location,buildLocation,computer,windows) VALUES
			('$name','$location','$build_location','$computer','$windows')";
		if (mysqli_query($conn, $sql)) {
			echo "New record has been added successfully !";
		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>