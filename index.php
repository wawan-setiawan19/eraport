<?php session_start(); 
if(isset($_SESSION['c_admin'])){ header('location:admin/'); }
else if(isset($_SESSION['c_guru'])){ header('location:guru/'); }
else if(isset($_SESSION['c_walikelas'])){ header('location:walikelas/'); }
else if(isset($_SESSION['c_walimurid'])){ header('location:walimurid/'); }
else{header('location:login');} ?>