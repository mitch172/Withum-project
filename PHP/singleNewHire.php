<html>
    <head>
        <title>Single New Hire</title>
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
        <form action="updateNewHire.php" method="get">
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

                if(isset($_POST['delete'])) {
                    mysqli_query($connection,"DELETE FROM newHires WHERE id='$id'");
                    mysqli_close($connection);
                } else {
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
                                <td>Preferred Name: </td>
                                <td><input type='text' name='nickname' value='$nickname'></td>
                            </tr>
                            <tr>
                                <td>Job Title: </td>
                                <td><input type='text' name='title' value='$title'></td>
                            </tr>
                            <tr>
                                <td>Office Location: </td>
                                <td><select name='location' value='$location'>
                                        <option value='BOS' <?php if ($row[location] == 'BOS') echo ' selected="selected"'>>Boston</option>
                                        <option value='BRT' <?php if ($row[location] == 'BRT') echo ' selected="selected"'>>Braintree</option>
                                        <option value='CAR' <?php if ($row[location] == 'CAR') echo ' selected="selected"'>>Carlsbad</option>
                                        <option value='DC' <?php if ($row[location] == 'DC') echo ' selected="selected"'>>DC</option>
                                        <option value='EB' <?php if ($row[location] == 'EB') echo ' selected="selected"'>>East Brunswick</option>
                                        <option value='ENC' <?php if ($row[location] == 'ENC') echo ' selected="selected"'>>Encino</option>
                                        <option value='IRV' <?php if ($row[location] == 'IRV') echo ' selected="selected"'>>Irvine</option>
                                        <option value='NAS' <?php if ($row[location] == 'NAS') echo ' selected="selected"'>>Nashville</option>
                                        <option value='NYC' <?php if ($row[location] == 'NYC') echo ' selected="selected"'>>New York</option>
                                        <option value='ORL' <?php if ($row[location] == 'ORL') echo ' selected="selected"'>>Orlando</option>
                                        <option value='PHI' <?php if ($row[location] == 'PHI') echo ' selected="selected"'>>Philadelphia</option>
                                        <option value='POR' <?php if ($row[location] == 'POR') echo ' selected="selected"'>>Portland</option>
                                        <option value='PRI' <?php if ($row[location] == 'PRI') echo ' selected="selected"'>>Princeton</option>
                                        <option value='PRO' <?php if ($row[location] == 'PRO') echo ' selected="selected"'>>Providence</option>
                                        <option value='RB' <?php if ($row[location] == 'RB') echo ' selected="selected"'>>Red Bank</option>
                                        <option value='SB' <?php if ($row[location] == 'SB') echo ' selected="selected"'>>Saddle Brooke</option>
                                        <option value='SF' <?php if ($row[location] == 'SF') echo ' selected="selected"'>>San Francisco</option>
                                        <option value='SAR' <?php if ($row[location] == 'SAR') echo ' selected="selected"'>>San Ramon</option>
                                        <option value='SEA' <?php if ($row[location] == 'SEA') echo ' selected="selected"'>>Seattle</option>
                                        <option value='WHI' <?php if ($row[location] == 'WHI') echo ' selected="selected"'>>Whippany</option>
                                        <option value='WOB' <?php if ($row[location] == 'WOB') echo ' selected="selected"'>>Woburn</option>
                                        <option value='REM' <?php if ($row[location] == 'REM') echo ' selected="selected"'>>Remote</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Computer Model: </td>
                                <td><input type='text' name='computer' value='$computer'></td>
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
                                        <option value='' <?php if ($row[tech] == '') echo ' selected="selected"'></option>
                                        <option value='EM' <?php if ($row[tech] == 'EM') echo ' selected="selected"'>>EM</option>
                                        <option value='BN' <?php if ($row[tech] == 'BN') echo ' selected="selected"'>>BN</option>
                                        <option value='SF' <?php if ($row[tech] == 'SF') echo ' selected="selected"'>>SF</option>
                                        <option value='KT' <?php if ($row[tech] == 'KT') echo ' selected="selected"'>>KT</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>QC: </td>
                                <td><select name='qc' value='$qc'>
                                        <option value='' <?php if ($row[tech] == '') echo ' selected="selected"'>></option>
                                        <option value='EM' <?php if ($row[tech] == 'EM') echo ' selected="selected"'>>EM</option>
                                        <option value='BN' <?php if ($row[tech] == 'BN') echo ' selected="selected"'>>BN</option>
                                        <option value='SF' <?php if ($row[tech] == 'SF') echo ' selected="selected"'>>SF</option>
                                        <option value='KT' <?php if ($row[tech] == 'KT') echo ' selected="selected"'>>KT</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input class='submit' type='submit' value='Process'>";
                    }
                }
            ?>
        </form>
    </body>
</html>
