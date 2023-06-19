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
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "withum";
                $id = $_POST['id'];

                $connection = new mysqli($servername,$username,$password,$database);
                if($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * from upgrades WHERE ID='$id'";
                $result = $connection->query($sql);
                if(!$result) {
                    die("Invalid query: " . $connection->error);
                }

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

                    echo "<table>
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
                            <td>Office Location: </td>
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
                            <td><select name='tech' value='$tech'>
                                    <option value=''></option>
                                    <option value='EM'>EM</option>
                                    <option value='BN'>BN</option>
                                    <option value='SF'>SF</option>
                                    <option value='KT'>KT</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>QC: </td>
                            <td><select name='qc' value='$qc'>
                                    <option value=''></option>
                                    <option value='EM'>EM</option>
                                    <option value='BN'>BN</option>
                                    <option value='SF'>SF</option>
                                    <option value='KT'>KT</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input class='submit' type='submit' value='Process'>";
                }
            ?>
        </form>
    </body>
</html>