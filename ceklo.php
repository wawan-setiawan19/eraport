<?php require 'php/config.php';
require 'php/function.php';
if(isset($_POST['username']) and isset($_POST['password'])){
  if($_POST['sebagai']=='admin'){
    $username= anti_injection($_POST['username']);
    $passencryp= md5(anti_injection($_POST['password']));
    $cek1=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin where username='$username' and password='$passencryp' "));
    if($cek1==NULL){
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:login');
    }
    else{
      session_start();
      $_SESSION['c_admin']=$cek1['c_admin'];
      header('location:admin/');
    }
  }
  else if($_POST['sebagai']=='walikelas'){
    $username= anti_injection($_POST['username']);
    $password= anti_injection($_POST['password']);
    $cek3=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walikelas where username='$username' and password='$password' "));
    if($cek3==NULL){
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:login');
    }
    else{
      session_start();
      $_SESSION['c_walikelas']=$cek3['c_walikelas'];
      header('location:walikelas/');
    }
  }
  else if($_POST['sebagai']=='guru'){
    $username= anti_injection($_POST['username']);
    $password= anti_injection($_POST['password']);
    $cek2=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where username='$username' and password='$password' "));
    if($cek2==NULL){
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:login');
    }else{
      session_start();
      $_SESSION['c_guru']=$cek2['c_guru'];
      header('location:guru/');
    }
  }
  else if($_POST['sebagai']=='walimurid'){
    $username= anti_injection($_POST['username']);
    $password= anti_injection($_POST['password']);
    $cek4=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walimurid where username='$username' and password='$password' "));
    if($cek4==NULL){
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:login');
    }else{
      session_start();
      $_SESSION['c_walimurid']=$cek4['c_walimurid'];
      header('location:walimurid/');
    }
  }
  else{header('location:login');}
}
else{header('location:login');}
?>