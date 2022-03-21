<?php session_start(); if(empty($_SESSION['c_admin'])){header('location:../login');} require '../php/config.php';
$rep=str_replace(" ", "_", $_GET['search']);
$c=mysqli_query($con,"SELECT * FROM siswa where nisn='$_GET[search]' or nama like'%$_GET[search]%' ");$hcs=mysqli_fetch_array($c);
if($hcs==NULL){
	header('location:search/_/_');
}else{
	header('location:search/'.$hcs['c_siswa'].'/'.$hcs['c_kelas'].'');
}
//echo $hcs['c_kelas'];
?>
