<html>
  <head>
    <title>Builder's Work</title>
  </head>

  <body>
    <table width="75%">
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
    </table>
  </body>
</html>
