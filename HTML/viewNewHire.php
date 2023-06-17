<?php
	if(isset($_POST['updateNewHires'])) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "withum";

		$connection = new mysqli($servername,$username,$password,$database);
		if($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}

		$sql = "SELECT * from newHires ORDER BY start ASC";
		$result = $connection->query($sql);
		if(!$result) {
			die("Invalid query: " . $connection->error);
		}

		while($row = $result->fetch_assoc()) {
			$id = $_POST['id'];
			$start = $_POST['start'];
			$status = $_POST['status'];
			$serial = $_POST['serial'];
			$asset = $_POST['asset'];
			$tech = $_POST['tech'];
			$qc = $_POST['qc'];
			
			$connection = new mysqli($servername,$username,$password,$database);

			$sql = "UPDATE newHires SET
				start='$start',
				status='$status',
				serial='$serial',
				asset='$asset',
				tech='$tech',
				qc='$qc'
			WHERE ID='$id'";
		}
	}
?>

<html>
	<head>
		<title>View New Hires</title>
		<link rel = "stylesheet" type = "text/css" href = "..\style.css">
		<style>
			table{
				width:100%;
			}
			button{
				font-size:20px;
			}
		</style>
	</head>

	<body>
		<h1 align="center">New Hires List</h1>
		<hr>
		<table>
			<tr>
				<td width="10%">Start Date</td>
				<td width="15%">Full Name</td>
				<td width="15%">Preferred Name</td>
				<td width="10%">Job Title</td>
				<td width="10%">Office Location</td>
				<td width="15%">Computer Model</td>
				<td width="5%">Status</td>
				<td width="5%">S/N</td>
				<td width="5%">Asset</td>
				<td width="5%">Tech</td>
				<td width="5%">QC</td>
			</tr>
			<form action="viewNewHire.php" method="post">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$database = "withum";

					$connection = new mysqli($servername,$username,$password,$database);
					if($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error);
					}

					$sql = "SELECT * from newHires ORDER BY start ASC";
					$result = $connection->query($sql);
					if(!$result) {
						die("Invalid query: " . $connection->error);
					}

					while($row = $result->fetch_assoc()) {
						$id = $row['ID'];
						$start = $row['start'];
						$status = $row['status'];
						$serial = $row['serial'];
						$asset = $row['asset'];
						$tech = $row['tech'];
						$qc = $row['qc'];

						echo "<tr>
							<input type='hidden' name ='id' value='$id'>
							<td><input type='date' name='start' value='$start'></td>
							<td>" . $row["name"] . "</td>
							<td>" . $row["nickname"] . "</td>
							<td>" . $row["title"] . "</td>
							<td>" . $row["location"] . "</td>
							<td>" . $row["computer"] . "</td>
							<td><input type='text' name='status' value='$status'></td>
							<td><input type='text' name='serial' value='$serial'></td>
							<td><input type='text' name='asset' value='$asset'></td>
							<td>
								<select name='tech' value='$tech'>
									<option value=''></option>
									<option value='BN'>BN</option>
									<option value='EM'>EM</option>
									<option value='KT'>KT</option>
									<option value='SF'>SF</option>
								</select>
							</td>
							<td>
								<select name='qc' value='$qc'>
									<option value=''></option>
									<option value='BN'>BN</option>
									<option value='EM'>EM</option>
									<option value='KT'>KT</option>
									<option value='SF'>SF</option>
								</select>
							</td>
						</tr>";
					}
				?>
				<div class="update">
					<input type="submit" name="updateNewHires" value="Update">
				</div>
			</form>
		</table>

		<div class="home">
			<a href="..\index.html">Return to home</a>
		</div>
	</body>
</html>