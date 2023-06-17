<html>
    <head>
        <title>Single New Hire</title>
        <link rel = "stylesheet" type = "text/css" href = "..\style.css">
    </head>

    <body>
        <?php
            $id = $_POST['id'];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "withum";

            $connection = new mysqli($servername,$username,$password,$database);
            if($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * from newHires WHERE ID='$id'";
            $result = $connection->query($sql);
            if(!$result) {
                die("Invalid query: " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
                echo "<table>
                    <tr>
                        <td>Start date: </td>
                        <td width='70%'>" . $row['start'] . "</td>
                    </tr>
                    <tr>
                        <td>Full Name: </td>
                        <td>" . $row['name'] . "</td>
                    </tr>
                    <tr>
                        <td>Preferred Name: </td>
                        <td>" . $row['nickname'] . "</td>
                    </tr>
                    <tr>
                        <td>Job Title: </td>
                        <td>" . $row['title'] . "</td>
                    </tr>
                    <tr>
                        <td>Office Location: </td>
                        <td>" . $row['location'] . "</td>
                    </tr>
                    <tr>
                        <td>Computer Model: </td>
                        <td>" . $row['computer'] . "</td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td>" . $row['status'] . "</td>
                    </tr>
                    <tr>
                        <td>S/N: </td>
                        <td>" . $row['serial'] . "</td>
                    </tr>
                    <tr>
                        <td>Asset: </td>
                        <td>" . $row['asset'] . "</td>
                    </tr>
                    <tr>
                        <td>Tech: </td>
                        <td>" . $row['tech'] . "</td>
                    </tr>
                    <tr>
                        <td>QC: </td>
                        <td>" . $row['qc'] . "</td>
                    </tr>
                </table>";
            }
        ?>
    </body>
</html>