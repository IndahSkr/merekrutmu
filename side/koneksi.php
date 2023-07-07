<?php
// $dbhost = "rsi-singkil.co.id";
$dbhost = "localhost";
// $dbuname = "rsisingk_indah";
$dbuname = "root";
// $dbpw = "indahsirs477";
$dbpw = "";
$dbname = "new_recruit2";
// $dbname = "recruitmu";

$koneksi = mysqli_connect($dbhost, $dbuname, $dbpw, $dbname);

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>