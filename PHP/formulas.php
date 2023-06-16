<?php
	include_once 'db.php';
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

		//Insert into newHires table
		$sql = "INSERT INTO newHires (start,name,nickname,title,location,computer) VALUES ('$start','$name','$nickname','$title','$location','$computer')";
		if (mysqli_query($conn, $sql)) {
			echo "New record has been added successfully !";
		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
		mysqli_close($conn);
	// If input is an upgrade or rebuild
	} else {
		// Initialize account and variables
		$name    	= $_POST['full_name'];
		$location 	= $_POST['location'];
		$build_location = "RB";
		$computer 	= $_POST['computer'];
		$windows 	= $_POST['windows'];

		//Insert into upgrades table
		$sql = "INSERT INTO upgrades (name,location,buildLocation,computer,windows) VALUES ('$name','$location','$build_location','$computer','$windows')";
		if (mysqli_query($conn, $sql)) {
			echo "New record has been added successfully !";
		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>