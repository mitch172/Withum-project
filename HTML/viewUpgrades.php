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
					echo "<tr>
						<td><input type='date'>" . $row["start"] . "</td>
						<td>" . $row["name"] . "</td>
						<td>" . $row["location"] . "</td>
						<td>" . $row["buildLocation"] . "</td>
						<td>" . $row["computer"] . "</td>
						<td>" . $row["windows"] . "</td>
						<td>" . $row["status"] . "</td>
						<td>" . $row["serial"] . "</td>
						<td>" . $row["asset"] . "</td>
						<td>" . $row["tech"] . "</td>
						<td>" . $row["qc"] . "</td>
					</tr>";
				}
			?>
		</table>

		<div class="home">
			<a href="index.html">Return to home</a>
		</div>
	</body>
</html>