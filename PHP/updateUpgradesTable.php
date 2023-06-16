<?php
	$servername	='localhost';
    	$username	='root';
   	$password	='';
   	$db_name	= 'my_db';
	$tbl_name	= 'upgrades';

	mysql_connect("$servername", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
	$result = mysql_query($sql);

	$html_account = $_POST['beforeChangeAccount'];
	$html_ID = $_POST['id'];
	$html_status = $_POST['status'];
	$html_serial = $_POST['serial'];
	$html_asset = $_POST['asset'];
	$html_tech = $_POST['tech'];
	$html_qc = $_POST['qc'];

	$sql = "UPDATE upgrades SET status=$html_status WHERE id=$html_ID";
	$sql = "UPDATE upgrades SET serial=$html_serial WHERE id=$html_ID";
	$sql = "UPDATE upgrades SET asset=$html_asset WHERE id=$html_ID";
	$sql = "UPDATE upgrades SET tech=$html_tech WHERE id=$html_ID";
	$sql = "UPDATE upgrades SET qc=$html_qc WHERE id=$html_ID";
?>