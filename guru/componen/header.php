<?php date_default_timezone_set('Asia/Jakarta');$date=date('Y-m-d'); require '../php/config.php'; require '../php/function.php'; session_start(); if(empty($_SESSION['c_guru'])){header('location:../login');} $na=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$_SESSION[c_guru]' ")); $ata=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tahunakademik where status='aktif' ")); $c_ta=$ata['c_ta'];?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Aplikasi Rapot By Rino Oktavianto">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>GURU E-RAPORT</title>
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="<?php echo $base; ?>imgstatis/logo2.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/plugins/iCheck/flat/blue.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Java Script -->
  <script src="<?php echo $base; ?>theme/js/jquery-3.1.0.min.js"></script>
  <!-- Izi Alert-->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/izi/dist/css/iziToast.min.css">
  <script type="text/javascript" src="<?php echo $base; ?>theme/izi/dist/js/iziToast.min.js"></script>
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
    .uppercase{
      text-transform: uppercase;
    }
  </style>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="skin-blue sidebar-mini fixed sidebar-mini">
<!--modal ganti foto-->
<!--<script type="text/javascript">
  $(document).ready(function(){
    iziToast.show({timeout:5000,color:'blue',title: 'Sedang Mengambil Data...',position: 'topLeft',pauseOnHover: true,transitionIn: false,progressBarColor:'#fff'});
  });
</script>-->
<script src="<?php echo $base; ?>php/olahangka.js"></script>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>VR</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Guru E-RAPORT</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $base; ?>theme/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $na['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $base; ?>theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $na['nama']; ?> - Guru
                  <small><?php echo $ata['tahun']; ?> Semester <?php echo $ata['semester']; ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" onclick="modlogout()" class="btn btn-default btn-flat">Keluar</a>
                </div>
                <script type="text/javascript">
                  function modlogout(){
                    $('#modlogout').modal('show');
                  }
                </script>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <div class="modal fade" id="modlogout">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center">
          Anda YAKIN Akan Keluar Dari Aplikasi?
          <br><br><a href="<?php echo $basegu; ?>a-guru/<?php echo md5('logout'); ?>/access" class="btn bg-red btn-xs">Ya</a> <a data-dismiss="modal" class="btn bg-blue btn-xs">Tidak</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $base; ?>theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $na['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo tgl(date('d-m-Y')); ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="<?php echo $basegu; ?>">
            <i class="glyphicon glyphicon-th"></i> <span>Dashboard</span>
          </a>
        </li>
      <?php $lkel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");while($hlkel=mysqli_fetch_array($lkel)){ 
        $jma=mysqli_query($con,"SELECT * FROM gurumapel where c_guru='$_SESSION[c_guru]' and c_kelas='$hlkel[c_kelas]' ");
        $jmapel=mysqli_num_rows($jma); if($jmapel>0) { ?>
        <li class="treeview <?php if(empty($_GET['r'])){}else if($_GET['q']==$hlkel['c_kelas']){echo 'active';} ?> ">
          <a href="#">
            <i class="glyphicon glyphicon-stats"></i>
            <span><?php echo $hlkel['kelas']; ?></span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue"><?php echo $jmapel; ?></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php while($hmapel=mysqli_fetch_array($jma)){ 
            $map=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaitugas,(SELECT count(nilai) FROM nilaimid where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaimid,(SELECT count(nilai) FROM nilaiuas where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaiuas FROM mapel where c_mapel='$hmapel[c_mapel]' "); foreach($map as $hmap);
              if($hmap['nilaiuh']==0){$peruh= 0;}else{$peruh= 25;}
              if($hmap['nilaitugas']==0){$pertugas= 0;}else{$pertugas= 25;}
              if($hmap['nilaimid']==0){$permid= 0;}else{$permid= 25;}
              if($hmap['nilaiuas']==0){$peruas= 0;}else{$peruas= 25;}
              $presentase = $peruh+$pertugas+$permid+$peruas;
            ?>
              <li <?php if(empty($_GET['r'])){}else if($_GET['r']==$hmapel['c_mapel']){echo 'class="active"';} ?>><a href="<?php echo $basegu.'inputnilai/'.$hlkel['c_kelas'].'/'.$hmapel['c_mapel'].'/_'; ?>"><?php echo $hmap['mapel']; ?>
              <span class="pull-right-container">
                <?php
                if($presentase>=0 and $presentase<=25){$bg='bg-red';}
                else if($presentase>=26 and $presentase<=50){$bg='bg-yellow';}
                else if($presentase>=51 and $presentase<=75){$bg='bg-blue';}
                else if($presentase==100){$bg='bg-green';}
                ?>
                <small class="label pull-right <?php echo $bg; ?>"><?php echo $presentase; ?>%</small>
              </span>
              </a></li>
            <?php } ?>
          </ul>
        </li>
      <?php } } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>