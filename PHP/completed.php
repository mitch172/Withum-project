<html>
	<head>
		<title>Completed</title>
		<style>
			body{
				background-color:beige;
				font-family:"Arial";
			}
			select{
				width:100%;
			}
			input{
				width:100%;
			}
			input.buttons{
				width:100%;
			}
			td.title{
				width:25%;
			}
			a{
				font-size:20px;
				text-align:center;
				display:inline-block;
				text-decoration:none;
				background-color:#eee;
				border:2px outset #ccc;
				color:black;
				margin:5px;
				width:100%;
			}
			div.home{
				position:absolute;
				bottom:0px;
				left:40%;
				right:40%;
			}
			a.header{
				position:absolute;
				top:0px;
				left:0px;
				right:90%;
				width:10%;
			}
		</style>
	</head>

	<body>
		<h1 align="center">Completed Builds</h1>
		<hr>
		<table width="100%">
			<tr>
				<td width="50%"><table width="100%">
					<tr>
						<td width="100%">New Hires</td>
					<tr>
						<td width="10%">Date</td>
						<td width="40%">Name</td>
						<td width="25%">Tech</td>
						<td width="25%">QC</td>
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
			
						$sql = "SELECT * from newHires WHERE status='Complete' ORDER BY start ASC";
						$result = $connection->query($sql);
						if(!$result) {
							die("Invalid query: " . $connection->error);
						}
			
						while($row = $result->fetch_assoc()) {
							echo "<tr>
								<td>" . $row['start'] . "</td>
								<td>" . $row['name'] . "</td>
								<td>" . $row['tech'] . "</td>
								<td>" . $row['qc'] . "</td>
							</tr>";
						}
					?>
				</table></td>
				
				<td width="50%"><table width="100%">
					<tr>
						<td width="100%">Upgrades/Rebuilds</td>
					<tr>
						<td width="10%">Date</td>
						<td width="40%">Name</td>
						<td width="25%">Tech</td>
						<td width="25%">QC</td>
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
			
						$sql = "SELECT * from upgrades WHERE status='Complete' ORDER BY start ASC";
						$result = $connection->query($sql);
						if(!$result) {
							die("Invalid query: " . $connection->error);
						}
		
						while($row = $result->fetch_assoc()) {
							echo "<tr>
								<td>" . $row['start'] . "</td>
								<td>" . $row['name'] . "</td>
								<td>" . $row['tech'] . "</td>
								<td>" . $row['qc'] . "</td>
							</tr>";
						}
					?>
				</table></td>
			</tr>
		</table>
		<a class="header" href="..\index.html">Return to home</a>
	</body>
</html>
