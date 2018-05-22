<?php
##########################################################
##	Script name: connection.php							##
##	Description: Holds database connection details		##
##########################################################

function dbconnect($db)
{
	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	global $cxn;
	$cxn = mysqli_connect($host,$user,$pass,$db)
		or 
	die("could not connect");
}
function ehostdb()
{
	$host = "localhost";
	$user = "sgcfundn_pages";
	$pass = "paGes123";
	$db = "sgcfundn_teams";
	global $cxn;
	$cxn = mysqli_connect($host,$user,$pass,$db)
		or 
	die("could not connect");
}

function webhost000($db)
{
	$host = "localhost";
	$user = "a9872921_ash";
	$pass = "Georgeqw12";
	global $cxn;
	$cxn = mysqli_connect($host,$user,$pass,$db)
		or 
	die("could not connect");
}

function userlogin()
{
	$host = "192.168.115.75";
	$user = "root";
	$pass = "otpass123";
	$db = "userlogin";
	global $cxn;
	$cxn = mysqli_connect($host,$user,$pass,$db)
		or 
	die("could not connect");
}
function versions()
{
	$host = "192.168.115.52";
	$user = "otsupport";
	$pass = "0tsupp0rt";
	$db = "versions";
	global $cxn;
	$cxn = mysqli_connect($host,$user,$pass,$db)
		or 
	die("could not connect");
}

function getconfigxml()
{
	$ftp_server = "ftp.cmegroup.com";
	$local_file = "config.xml";
	$server_file = "/SBEFix/Production/Configuration/config.xml";

	$conn_id = ftp_connect($ftp_server, 21, 30) or die("Couldn't connect to $ftp_server");
	ftp_login($conn_id, "anonymous", "");
	ftp_pasv($conn_id, true);
	if(ftp_get($conn_id, $local_file, $server_file, FTP_ASCII)){
		return "latest config.xml received";
	}else{
		return "failed";
	}
}

?>
