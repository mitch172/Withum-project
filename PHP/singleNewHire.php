<html>
    <head>
        <title>Single New Hire</title>
        <link rel = "stylesheet" type = "text/css" href = "..\style.css">
    </head>

    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "withum";
            $id = $_POST['id'];

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
                $start = $row['start'];
                $name = $row['name'];
                $nickname = $row['nickname'];
                $title = $row['title'];
                $location = $row['location'];
                $computer = $row['computer'];
                $status = $row['status'];
                $serial = $row['serial'];
                $asset = $row['asset'];
                $tech = $row['tech'];
                $qc = $row['qc'];

                echo "<table>
                    <tr>
                        <td>Start date: </td>
                        <td width='70%'><input type='date' name='start' value='$start'></td>
                    </tr>
                    <tr>
                        <td>Full Name: </td>
                        <td><input type='text' name='start' value='$name'></td>
                    </tr>
                    <tr>
                        <td>Preferred Name: </td>
                        <td><input type='text' name='start' value='$nickname'></td>
                    </tr>
                    <tr>
                        <td>Job Title: </td>
                        <td><input type='text' name='start' value='$title'></td>
                    </tr>
                    <tr>
                        <td>Office Location: </td>
                        <td><select name='location' value='$location'>
                                <option value='BOS'>Boston</option>
                                <option value='BRT'>Braintree</option>
                                <option value='CAR'>Carlsbad</option>
                                <option value='DC'>DC</option>
                                <option value='EB'>East Brunswick</option>
                                <option value='ENC'>Encino</option>
                                <option value='IRV'>Irvine</option>
                                <option value='NAS'>Nashville</option>
                                <option value='NYC'>New York</option>
                                <option value='ORL'>Orlando</option>
                                <option value='PHI'>Philadelphia</option>
                                <option value='POR'>Portland</option>
                                <option value='PRI'>Princeton</option>
                                <option value='PRO'>Providence</option>
                                <option value='RB'>Red Bank</option>
                                <option value='SB'>Saddle Brooke</option>
                                <option value='SF'>San Francisco</option>
                                <option value='SAR'>San Ramon</option>
                                <option value='SEA'>Seattle</option>
                                <option value='WHI'>Whippany</option>
                                <option value='WOB'>Woburn</option>
                                <option value='REM'>Remote</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Computer Model: </td>
                        <td><input type='text' name='start' value='$computer'></td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td><input type='text' name='start' value='$status'></td>
                    </tr>
                    <tr>
                        <td>S/N: </td>
                        <td><input type='text' name='start' value='$serial'></td>
                    </tr>
                    <tr>
                        <td>Asset: </td>
                        <td><input type='text' name='start' value='$asset'></td>
                    </tr>
                    <tr>
                        <td>Tech: </td>
                        <td><select name='location' value='$tech'>
                                <option value='N/A'></option>
                                <option value='EM'>EM</option>
                                <option value='BN'>BN</option>
                                <option value='SF'>SF</option>
                                <option value='KT'>KT</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>QC: </td>
                        <td><select name='location' value='$qc'>
                                <option value='N/A'></option>
                                <option value='EM'>EM</option>
                                <option value='BN'>BN</option>
                                <option value='SF'>SF</option>
                                <option value='KT'>KT</option>
                            </select>
                        </td>
                    </tr>
                </table>";
            }
        ?>
    </body>
</html>