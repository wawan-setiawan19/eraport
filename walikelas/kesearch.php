<?php session_start(); if(empty($_SESSION['c_walikelas'])){header('location:../login');}
$rep=str_replace(" ", "_", $_GET['search']);
header('location:search/'.$rep.'');
?>
