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

                $connection = new mysqli($servername,$username,$password,$database);
                if($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                if(isset($_POST['delete'])) {
                    $delete = $_POST['delete'];
                    mysqli_query($connection,"DELETE FROM upgrades WHERE id='$delete'");
                    mysqli_close($connection);
                    $url = "http://withumbuildproject.com/PHP/viewUpgrades.php";
                    echo "<script>alert('Record has been deleted successfully!')</script><meta http-equiv='Refresh' content='0; url=$url' />";
                } else {
                    $id = $_POST['id'];
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
                                <td>Office Location: </td>
                                <td><select name='location' value='$location'>
                                        <option value='BOS' <?php if(strcmp($location,'BOS') !== 0) echo 'selected=$selected'?>Boston</option>
                                        <option value='BRT' <?php if(strcmp($location,'BRT') !== 0) echo 'selected=$selected'?>Braintree</option>
                                        <option value='CAR' <?php if(strcmp($location,'CAR') !== 0) echo 'selected=$selected'?>Carlsbad</option>
                                        <option value='DC' <?php if(strcmp($location,'DC') !== 0) echo 'selected=$selected'?>DC</option>
                                        <option value='EB' <?php if(strcmp($location,'EB') !== 0) echo 'selected=$selected'?>East Brunswick</option>
                                        <option value='ENC' <?php if(strcmp($location,'ENC') !== 0) echo 'selected=$selected'?>Encino</option>
                                        <option value='IRV' <?php if(strcmp($location,'IRV') !== 0) echo 'selected=$selected'?>Irvine</option>
                                        <option value='NAS' <?php if(strcmp($location,'NAS') !== 0) echo 'selected=$selected'?>Nashville</option>
                                        <option value='NYC' <?php if(strcmp($location,'NYC') !== 0) echo 'selected=$selected'?>New York</option>
                                        <option value='ORL' <?php if(strcmp($location,'ORL') !== 0) echo 'selected=$selected'?>Orlando</option>
                                        <option value='PHI' <?php if(strcmp($location,'PHI') !== 0) echo 'selected=$selected'?>Philadelphia</option>
                                        <option value='POR' <?php if(strcmp($location,'POR') !== 0) echo 'selected=$selected'?>Portland</option>
                                        <option value='PRI' <?php if(strcmp($location,'PRI') !== 0) echo 'selected=$selected'?>Princeton</option>
                                        <option value='PRO' <?php if(strcmp($location,'PRO') !== 0) echo 'selected=$selected'?>Providence</option>
                                        <option value='RB' <?php if(strcmp($location,'RB') !== 0) echo 'selected=$selected'?>Red Bank</option>
                                        <option value='SB' <?php if(strcmp($location,'SB') !== 0) echo 'selected=$selected'?>Saddle Brooke</option>
                                        <option value='SF' <?php if(strcmp($location,'SF') !== 0) echo 'selected=$selected'?>San Francisco</option>
                                        <option value='SAR' <?php if(strcmp($location,'SAR') !== 0) echo 'selected=$selected'?>San Ramon</option>
                                        <option value='SEA' <?php if(strcmp($location,'SEA') !== 0) echo 'selected=$selected'?>Seattle</option>
                                        <option value='WHI' <?php if(strcmp($location,'WHI') !== 0) echo 'selected=$selected'?>Whippany</option>
                                        <option value='WOB' <?php if(strcmp($location,'WOB') !== 0) echo 'selected=$selected'?>Woburn</option>
                                        <option value='REM' <?php if(strcmp($location,'REM') !== 0) echo 'selected=$selected'?>Remote</option>
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
                                        <option value='' <?php echo $tech == ''?'selected':'';?></option>
                                        <option value='EM' <?php echo $tech == 'EM'?'selected':'';?>EM</option>
                                        <option value='BN' <?php echo $tech == 'BN'?'selected':'';?>BN</option>
                                        <option value='SF' <?php echo $tech == 'SF'?'selected':'';?>SF</option>
                                        <option value='KT' <?php echo $tech == 'KT'?'selected':'';?>KT</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>QC: </td>
                                <td><select name='qc' value='$qc'>
                                        <option value='' <?php echo $qc == ''?'selected':'';?></option>
                                        <option value='EM' <?php echo strcmp($qc == 'EM')?'selected':'';?>EM</option>
                                        <option value='BN' <?php echo $qc == 'BN'?'selected':'';?>BN</option>
                                        <option value='SF' <?php echo $qc == 'SF'?'selected':'';?>SF</option>
                                        <option value='KT' <?php echo $qc == 'KT'?'selected':'';?>KT</option>
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
