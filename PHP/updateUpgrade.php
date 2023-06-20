<?php
    $id = $_GET['id'];
    $start = $_GET['start'];
    $name = $_GET['name'];
    $location = $_GET['location'];
    $buildLocation = $row['buildLocation'];
    $computer = $_GET['computer'];
    $windows = $_GET['windows'];
    $status = $_GET['status'];
    $serial = $_GET['serial'];
    $asset = $_GET['asset'];
    $tech = $_GET['tech'];
    $qc = $_GET['qc'];

    //Update newHires table$servername = "localhost";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "withum";

    $conn = new mysqli($servername,$username,$password,$database);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE upgrades
        SET start='$start', name='$name', location='$location', buildLocation='$buildLocation', computer='$computer', windows='$windows', status='$status', serial='$serial', asset='$asset', tech='$tech', qc='$qc'
        WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        $url = "http://withumbuildproject.com/HTML/viewUpgrades.php";
        echo "<script>alert('Record has been updated successfully!')</script><meta http-equiv='Refresh' content='0; url=$url' />";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
?>
