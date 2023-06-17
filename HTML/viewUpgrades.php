<?php
	if(isset($_POST['updateUpgrades'])) {
		
	}
?>

<html>
	<head>
		<title>View Upgrades</title>
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
		<h1 align="center">Upgrades/Rebuilds List</h1>
		<hr>
		<table>
			<tr>
				<td width="10%">Start Date</td>
				<td width="15%">Full Name</td>
				<td width="15%">Office Location</td>
				<td width="10%">Build Location</td>
				<td width="15%">Computer Model</td>
				<td width="10%">Windows</td>
				<td width="5%">Status</td>
				<td width="5%">S/N</td>
				<td width="5%">Asset</td>
				<td width="5%">Tech</td>
				<td width="5%">QC</td>
			</tr>
			<form action="viewUpgrades.php" method="post">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$database = "withum";

					$connection = new mysqli($servername,$username,$password,$database);
					if($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error);
					}

					$sql = "SELECT * from upgrades";
					$result = $connection->query($sql);
					if(!$result) {
						die("Invalid query: " . $connection->error);
					}

					while($row = $result->fetch_assoc()) {
						$start = $row['start'];
						$status = $row['status'];
						$serial = $row['serial'];
						$asset = $row['asset'];
						$tech = $row['tech'];
						$qc = $row['qc'];

						echo "<tr>
							<td><input type='date' value='$start'></td>
							<td>" . $row["name"] . "</td>
							<td>" . $row["location"] . "</td>
							<td>" . $row["buildLocation"] . "</td>
							<td>" . $row["computer"] . "</td>
							<td>" . $row["windows"] . "</td>
							<td><input type='text' value='$status'></td>
							<td><input type='text' value='$serial'></td>
							<td><input type='text' value='$asset'></td>
							<td>
								<select value='$tech'>
									<option value=''></option>
									<option value='BN'>BN</option>
									<option value='EM'>EM</option>
									<option value='KT'>KT</option>
									<option value='SF'>SF</option>
								</select>
							</td>
							<td>
								<select value='$qc'>
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
					<input type="submit" name="updateUpgrades" value="Update">
				</div>
			</form>
		</table>

		<div class="home">
			<a href="..\index.html">Return to home</a>
		</div>
	</body>
</html>