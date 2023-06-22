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

                $connection = new mysqli($servername,$username,$password,$database);
                if($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                if(isset($_POST['delete'])) {
                    $delete = $_POST['delete'];
                    mysqli_query($connection,"DELETE FROM newHires WHERE id='$delete'");
                    mysqli_close($connection);
                    $url = "http://withumbuildproject.com/PHP/viewNewHire.php";
                    echo "<script>alert('Record has been deleted successfully!')</script><meta http-equiv='Refresh' content='0; url=$url' />";
                } else {
                    $id = $_POST['id'];
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

                        $selected = 'selected';
    
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
                                <td>Office Location: </td>";
            ?>
                                <td>
                                    <select name='location' value='$location'>
                                        <option value='BOS' <?php if($location == 'BOS') echo "selected:selected"; ?>>Boston</option>
                                        <option value='BRT' <?php if($location == 'BRT') echo "selected:selected"; ?>>Braintree</option>
                                        <option value='CAR' <?php if($location == 'CAR') echo "selected:selected"; ?>>Carlsbad</option>
                                        <option value='DC' <?php if($location == 'DC') echo "selected:selected"; ?>>DC</option>
                                        <option value='EB' <?php if($location == 'EB') echo "selected:selected"; ?>>East Brunswick</option>
                                        <option value='ENC' <?php if($location == 'ENC') echo "selected:selected"; ?>>Encino</option>
                                        <option value='IRV' <?php if($location == 'IRV') echo "selected:selected"; ?>>Irvine</option>
                                        <option value='NAS' <?php if($location == 'NAS') echo "selected:selected"; ?>>Nashville</option>
                                        <option value='NYC' <?php if($location == 'NYC') echo "selected:selected"; ?>>New York</option>
                                        <option value='ORL' <?php if($location == 'ORL') echo "selected:selected"; ?>>Orlando</option>
                                        <option value='PHI' <?php if($location == 'PHI') echo "selected:selected"; ?>>Philadelphia</option>
                                        <option value='POR' <?php if($location == 'POR') echo "selected:selected"; ?>>Portland</option>
                                        <option value='PRI' <?php if($location == 'PRI') echo "selected:selected"; ?>>Princeton</option>
                                        <option value='PRO' <?php if($location == 'PRO') echo "selected:selected"; ?>>Providence</option>
                                        <option value='RB' <?php if($location == 'RB') echo "selected:selected"; ?>>Red Bank</option>
                                        <option value='SB' <?php if($location == 'SB') echo "selected:selected"; ?>>Saddle Brooke</option>
                                        <option value='SF' <?php if($location == 'SF') echo "selected:selected"; ?>>San Francisco</option>
                                        <option value='SAR' <?php if($location == 'SAR') echo "selected:selected"; ?>>San Ramon</option>
                                        <option value='SEA' <?php if($location == 'SEA') echo "selected:selected"; ?>>Seattle</option>
                                        <option value='WHI' <?php if($location == 'WHI') echo "selected:selected"; ?>>Whippany</option>
                                        <option value='WOB' <?php if($location == 'WOB') echo "selected:selected"; ?>>Woburn</option>
                                        <option value='REM' <?php if($location == 'REM') echo "selected:selected"; ?>>Remote</option>
                                    </select>
                                </td>
                            </tr>
            <?php
                        echo "
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
                                <td>Tech: </td>";
            ?>
                                <td><select name='tech' value='$tech'>
                                        <option value='EM' <?php if($tech == 'EM') echo "selected:selected"; ?>>EM</option>
                                        <option value='BN' <?php if($tech == 'BN') echo "selected:selected"; ?>>BN</option>
                                        <option value='SF' <?php if($tech == 'SF') echo "selected:selected"; ?>>SF</option>
                                        <option value='KT' <?php if($tech == 'KT') echo "selected:selected"; ?>>KT</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>QC: </td>
                                <td><select name='qc' value='$qc'>
                                        <option value='EM' <?php if($qc == 'EM') echo "selected:selected"; ?>>EM</option>
                                        <option value='BN' <?php if($qc == 'BN') echo "selected:selected"; ?>>BN</option>
                                        <option value='SF' <?php if($qc == 'SF') echo "selected:selected"; ?>>SF</option>
                                        <option value='KT' <?php if($qc == 'KT') echo "selected:selected"; ?>>KT</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input class='submit' type='submit' value='Process'>
                    }
                }
            ?>
        </form>
    </body>
</html>
