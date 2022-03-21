<?php
error_reporting(0);
$dbhost ='localhost';
$dbuser ='root';
$dbpass ='';
$dbname ='db_eraport';
$db_dsn = "mysql:dbname=$dbname;host=$dbhost";
try {
  $db = new PDO($db_dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
  echo 'Connection failed: '.$e->getMessage();
}
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//mysql_connect($dbhost,$dbuser,$dbpass);mysql_select_db($dbname);
/*css.plugin.hancon <?php echo $base; ?>*/
$base='http://localhost/eraport/';
/*control(link.redirect) <?php echo $basecon; ?>*/
$basead=$base.'admin/';
/*kelas(link.redirect) <?php echo $basekel; ?>*/
$basegu=$base.'guru/';
$basewa=$base.'walikelas/';
$basewam=$base.'walimurid/';

$aplikasi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM aplikasi limit 1"));
$ata=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tahunakademik where status='aktif' ")); $c_ta=$ata['c_ta'];
?>
