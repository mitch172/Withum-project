<?php
    $class = $_GET['class'];

    if($class == "NH") {
        $id = $_GET['id'];
        $start = $_GET['start'];
        $name = $_GET['name'];
        $nickname = $_GET['nickname'];
        $title = $_GET['title'];
        $location = $_GET['location'];
        $computer = $_GET['computer'];
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

        $sql = "UPDATE newHires
            SET start='$start', name='$name', nickname='$nickname', title='$title', location='$location', computer='$computer', status='$status', serial='$serial', asset='$asset', tech='$tech', qc='$qc'
            WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            $url = "http://withumbuildproject.com/View Pages/viewNewHire.php";
            echo "<script>alert('Record has been updated successfully!')</script><meta http-equiv='Refresh' content='0; url=$url' />";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    } else {
        $id = $_GET['id'];
        $start = $_GET['start'];
        $name = $_GET['name'];
        $location = $_GET['location'];
        $buildLocation = $_GET['buildLocation'];
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
            $url = "http://withumbuildproject.com/View Pages/viewUpgrades.php";
            echo "<script>alert('Record has been updated successfully!')</script><meta http-equiv='Refresh' content='0; url=$url' />";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }
?>
