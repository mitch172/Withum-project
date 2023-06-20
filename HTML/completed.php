<html>
	<head>
		<title>Completed</title>
		<style>
			body{
				background-color:beige;
				font-family:"Arial";
			}
			table{
				width:75%;
				margin-left:auto;
				margin-right:auto;
				font-size:25px;
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
		</style>
	</head>

	<body>
		<h1 align="center">Completed Builds</h1>
		<hr>
		<table>
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
	
				$sql = "SELECT * from newHires ORDER BY start ASC WHERE status='Complete'";
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

				$sql = "SELECT * from upgrades ORDER BY start ASC WHERE status='Complete'";
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
		</table>
		<div class="home">
			<a href="..\index.html">Return to home</a>
		</div>
	</body>
</html>
