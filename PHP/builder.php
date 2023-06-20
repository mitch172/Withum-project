<html>
	<head>
		<title>Builder's Work</title>
		<style>
			body{
				background-color:beige;
				font-family:"Arial";
			}
			table{
				width:100%;
				margin-left:auto;
				margin-right:auto;
				font-size:25px;
			}
		</style>
	</head>
	
	<body>
		<h1>$_POST['name'] . "Builds"</h1>
		<table width="75%">
			<tr>
				<td width="50%"><table>
					<tr>
						<td width="33%">Name</td>
						<td width="33%">Tech</td>
						<td width="33%">QC</td>
					</tr>
					<?php
						$builder = $_POST['name'];
						$servername = "localhost";
						$username = "root";
						$password = "";
						$database = "withum";
						
						$connection = new mysqli($servername,$username,$password,$database);
						if($connection->connect_error) {
							die("Connection failed: " . $connection->connect_error);
						}
						
						$sql = "SELECT * from newHires ORDER BY start ASC WHERE tech='$builder' OR qc='$builder'";
						$result = $connection->query($sql);
						if(!$result) {
							die("Invalid query: " . $connection->error);
						}
						
						while($row = $result->fetch_assoc()) {
							echp "<tr>
								<td>" . $row['name'] . "</td>
								<td>" . $row['tech'] . "</td>
								<td>" . $row['qc'] . "</td>
							</td>";
						}
					?>
				</table></td>

			    <td width="50%"><table>
					<tr>
						<td width="33%">Name</td>
						<td width="33%">Tech</td>
						<td width="33%">QC</td>
					</tr>
					<?php
						$builder = $_POST['name'];
						$servername = "localhost";
						$username = "root";
						$password = "";
						$database = "withum";
						
						$connection = new mysqli($servername,$username,$password,$database);
						if($connection->connect_error) {
							die("Connection failed: " . $connection->connect_error);
						}
      
						$sql = "SELECT * from upgrades ORDER BY start ASC WHERE tech='$builder' OR qc='$builder'";
						$result = $connection->query($sql);
						if(!$result) {
							die("Invalid query: " . $connection->error);
						}
						
						while($row = $result->fetch_assoc()) {
							echp "<tr>
								<td>" . $row['name'] . "</td>
								<td>" . $row['tech'] . "</td>
								<td>" . $row['qc'] . "</td>
							</td>";
						}
					?>
				</table></td>
    			</tr>
   		</table>
	</body>
</html>
