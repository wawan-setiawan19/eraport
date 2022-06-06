<?php date_default_timezone_set('Asia/Jakarta');
$date=date('Y-m-d'); require '../php/config.php'; 
require '../php/function.php'; session_start(); 
if(empty($_SESSION['c_walikelas'])){
  header('location:../login');
  }
$wali=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walikelas where c_walikelas='$_SESSION[c_walikelas]' ")); 
$na=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$wali[c_guru]' ")); 
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$wali[c_kelas]' ")); 
$ata=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tahunakademik where status='aktif' ")); 
$c_ta=$ata['c_ta']; //$setting=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM setting limit 1 "));*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Aplikasi Rapot By Rino Oktavianto">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <title>WALI KELAS E-RAPORT</title>
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
<body class="skin-purple sidebar-mini fixed sidebar-mini" 
oncontextmenu="return false">
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
      <span class="logo-lg"><b>WaliKelas</b></span>
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
                  <?php echo $na['nama']; ?>
                  <small>Wali Kelas <?php echo $kel['kelas']; ?></small>
                  <?php echo $ata['tahun']; ?> Semester <?php echo $ata['semester']; ?>
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
          <br><br><a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('logout'); ?>/access" class="btn bg-red btn-xs">Ya</a> <a data-dismiss="modal" class="btn bg-blue btn-xs">Tidak</a>
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
          <a href="<?php echo $basewa; ?>siswa">
            <i class="glyphicon glyphicon-duplicate"></i> <span>Raport Siswa</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $basewa; ?>peringkat">
            <i class="glyphicon glyphicon-star-empty"></i> <span>Peringkat Siswa</span>
          </a>
        </li>
        <!--<li>
          <a href="<?php echo $basewa; ?>totalnilai">
            <i class="glyphicon glyphicon-file"></i> <span>Hasil Total Nilai</span>
          </a>
        </li>-->
        <li>
          <a href="<?php echo $basewa; ?>walimurid">
            <i class="glyphicon glyphicon-user"></i> <span>Wali Murid</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $basewa; ?>deskripsisikap">
            <i class="glyphicon glyphicon-refresh"></i> <span>Deskripsi Sikap</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Mata Pelajaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<?php $map=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT count(nilai) FROM nilaimid where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT count(nilai) FROM nilaiuas where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel FROM mapel_kelas where c_kelas='$kel[c_kelas]' order by no asc "); foreach($map as $hmap){ 
  if($hmap['nilaiuh']==0){$peruh= 0;}else{$peruh= 25;}
  if($hmap['nilaitugas']==0){$pertugas= 0;}else{$pertugas= 25;}
  if($hmap['nilaimid']==0){$permid= 0;}else{$permid= 25;}
  if($hmap['nilaiuas']==0){$peruas= 0;}else{$peruas= 25;}
  $presentase = $peruh+$pertugas+$permid+$peruas;
?>
            <li>
              <a href="<?php echo $basewa; ?>nilaipelajaran/<?php echo $hmap['c_mapel']; ?>">
                <span><?php echo $hmap['mapel']; ?></span>
                <span class="pull-right-container">
                  <?php
                    if($presentase>=0 and $presentase<=25){$bg='bg-red';}
                    else if($presentase>=26 and $presentase<=50){$bg='bg-yellow';}
                    else if($presentase>=51 and $presentase<=75){$bg='bg-blue';}
                    else if($presentase==100){$bg='bg-green';}
                    ?>
                  <small class="label pull-right <?php echo $bg; ?>"><?php echo $presentase; ?>%</small>
                </span>
              </a>
            </li>
          <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Madrasah Diniyah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php $smk=mysqli_query($con,"SELECT * FROM mapelmd_kelas left join mapelmd on (mapelmd.id_mapelmd=mapelmd_kelas.id_mapelmd) where c_kelas='$kel[c_kelas]' order by nama_mapelmd asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>
            <li>
              <a href="<?php echo $basewa; ?>nilaimapelmd/<?php echo $akh['id_mapelmd'].'?kelas='.$kel['c_kelas']; ?>">
                <span><?php echo $akh['nama_mapelmd']; ?></span>
              </a>
            </li>
          <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Tahfidzul Quran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php $smk=mysqli_query($con,"SELECT * FROM mapeltq_kelas left join mapeltq on (mapeltq.id_mapeltq=mapeltq_kelas.id_mapeltq) where c_kelas='$kel[c_kelas]' order by nama_mapeltq asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>
            <li>
              <a href="<?php echo $basewa; ?>nilaimapeltq/<?php echo $akh['id_mapeltq'].'?kelas='.$kel['c_kelas']; ?>">
                <span><?php echo $akh['nama_mapeltq']; ?></span>
              </a>
            </li>
          <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-log-in"></i>
            <span>Eksport</span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="<?php echo $basewa; ?>exportpersiswa"><i class="glyphicon glyphicon-star-empty"></i> Export Nilai Per-Siswa</a></li>
            <li ><a href="<?php echo $basewa; ?>exportpermapel"><i class="glyphicon glyphicon-star-empty"></i> Export Nilai Per-Mapel</a></li>
            <li ><a href="<?php echo $basewa; ?>exporttamra"><i class="glyphicon glyphicon-star-empty"></i> Export Tambahan Rapot</a></li>
            <li ><a href="<?php echo $basewa; ?>nilaiijazah"><i class="glyphicon glyphicon-star-empty"></i> Nilai Ijazah</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-print"></i>
            <span>Print</span>
          </a>
          <ul class="treeview-menu">
            <!-- <li ><a href="<?php echo $basewa; ?>printpersiswa"><i class="glyphicon glyphicon-star-empty"></i> Print Nilai Per-Siswa</a></li> -->
            <li ><a href="<?php echo $basewa; ?>printrapotmid"><i class="glyphicon glyphicon-star-empty"></i> Print Rapot Format Pondok (ttd manual)</a></li>
            <li ><a href="<?php echo $basewa; ?>printrapot"><i class="glyphicon glyphicon-star-empty"></i> Print Rapot Format Pondok (ttd auto)</a></li>
            <li ><a href="<?php echo $basewa; ?>printrapotdapodik"><i class="glyphicon glyphicon-star-empty"></i> Print Rapot Format Dapodik</a></li>
            <li ><a href="<?php echo $basewa; ?>printrapotpts"><i class="glyphicon glyphicon-star-empty"></i> Print Rapot PTS</a></li>
            <li ><a href="<?php echo $basewa; ?>printskl"><i class="glyphicon glyphicon-star-empty"></i> Print SKL</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Tambahan</span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="<?php echo $basewa; ?>aspekfisik"><i class="fa fa-question"></i> Aspek Fisik</a></li>
            <li ><a href="<?php echo $basewa; ?>berattinggi"><i class="fa fa-question"></i> Tinggi & Berat Badan</a></li>
            <li ><a href="<?php echo $basewa; ?>kompetensisikap"><i class="fa fa-question"></i> Kompetensi Sikap</a></li>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>