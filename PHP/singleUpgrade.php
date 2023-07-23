<html>
	<head>
		<title>Single Upgrade</title>
		<style>
			body{
				background-color:beige;
				font-family:"Arial";
				font-size:14px;
			}
			table{
				width:75%;
				margin-left:auto;
				margin-right:auto;
			}
			select{
				width:100%;
			}
			input{
				width:100%;
			}
			td.title{
				width:15%;
			}
			input.submit{
				position:absolute;
				left:45%;
				right:45%;
				width:10%;
			}
		</style>
    </head>

	<body>
		<form action="updateUpgrade.php" method="get">
		    <?php
				//Outline SQL login
				$servername = "localhost";
				$username = "root";
				$password = "";
				$database = "withum";

				//Establish connection
				$connection = new mysqli($servername,$username,$password,$database);
				if($connection->connect_error) {
					die("Connection failed: " . $connection->connect_error);
				}
				
				//If delete button pressed, delete processed entry
				if(isset($_POST['delete'])) {
					$delete = $_POST['delete'];
					mysqli_query($connection,"DELETE FROM upgrades WHERE id='$delete'");
					mysqli_close($connection);
					$url = "http://withumbuildproject.com/PHP/viewUpgrades.php";
					echo "<script>alert('Record has been deleted successfully!')</script><meta http-equiv='Refresh' content='0; url=$url' />";
				
				//Else, process entry into update page
				} else {
					$id = $_POST['id'];
					$sql = "SELECT * from upgrades WHERE ID='$id'";
					$result = $connection->query($sql);
					if(!$result) {
						die("Invalid query: " . $connection->error);
					}
				
					//Gather entry's data from table as variables and display in input fields
					while ($row = $result->fetch_assoc()) {
						$start = $row['start'];
						$name = $row['name'];
						$location = $row['location'];
						$buildLocation = $row['buildLocation'];
						$computer = $row['computer'];
						$windows = $row['windows'];
						$status = $row['status'];
						$serial = $row['serial'];
						$asset = $row['asset'];
						$tech = $row['tech'];
						$qc = $row['qc'];
						
						$selected = 'selected';
				
						echo "
							<table>
								<input type='hidden' name='id' value='$id'>
								<tr>
									<td class='title'>Start date: </td>
									<td width='70%'><input type='date' name='start' value='$start'></td>
								</tr>
								<tr>
									<td>Full Name: </td>
									<td><input type='text' name='name' value='$name'></td>
								</tr>
								<tr>
									<td>Office Location: </td>
									<td><input type='text' name='location' value='$location'></td>
								</tr>
								<tr>
									<td>Build Location: </td>
									<td><input type='text' name='buildLocation' value='$buildLocation'></td>
								</tr>
								<tr>
									<td>Computer Model: </td>
									<td><input type='text' name='computer' value='$computer'></td>
								</tr>
								<tr>
									<td>Windows: </td>
									<td><input type='text' name='windows' value='$windows'></td>
								</tr>
								<tr>
									<td>Status: </td>
									<td><input type='text' name='status' value='$status'></td>
								</tr>
								<tr>
									<td>S/N: </td>
									<td><input type='text' name='serial' value='$serial'></td>
								</tr>
								<tr>
									<td>Asset: </td>
									<td><input type='text' name='asset' value='$asset'></td>
								</tr>
								<tr>
									<td>Tech: </td>
									<td><input type='text' name='tech' value='$tech'></td>
								</tr>
								<tr>
									<td>QC: </td>
									<td><input type='text' name='qc' value='$qc'></td>
								</tr>
							</table>
						";
					}
				}
			?>
			<input class='submit' type='submit' value='Process'>
		</form>
	</body>
</html>