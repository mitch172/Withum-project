<html>
	<head>
		<title>View New Hires</title>
		<link rel = "stylesheet" type = "text/css" href = "..\style.css">
		<style>
			table{
				width:100%;
			}
		</style>
	</head>

	<body>
		<h1 align="center">New Hires List</h1>
		<hr>
		<table>
			<tr>
				<td width="15%">Start Date</td>
				<td width="15%">Full Name</td>
				<td width="10%">Preferred Name</td>
				<td width="10%">Job Title</td>
				<td width="10%">Office Location</td>
				<td width="10%">Computer Model</td>
				<td width="5%">Status</td>
				<td width="5%">S/N</td>
				<td width="5%">Asset</td>
				<td width="5%">Tech</td>
				<td width="5%">QC</td>
				<td width="5%"></td>
			</tr>
			<form action="..\PHP\singleNewHire.php" method="post">
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

					$ids = array();
					$count = 0;

					while($row = $result->fetch_assoc()) {
						$ids[$count] = $row['ID'];
						echo "<tr>
							<td>" . $row['start'] . "</td>
							<td>" . $row['name'] . "</td>
							<td>" . $row["nickname"] . "</td>
							<td>" . $row["title"] . "</td>
							<td>" . $row["location"] . "</td>
							<td>" . $row["computer"] . "</td>
							<td>" . $row["status"] . "</td>
							<td>" . $row["serial"] . "</td>
							<td>" . $row["asset"] . "</td>
							<td>" . $row["tech"] . "</td>
							<td>" . $row["qc"] . "</td>
							<input type='hidden' name='id' value='$ids[$count]'>
							<td><input type='submit' value='Update'></td>
						</tr>";

						$count = $count + 1;
					}
				?>
			</form>
		</table>

		<div class="home">
			<a href="..\index.html">Return to home</a>
		</div>
	</body>
</html>