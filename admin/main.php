<?php require 'componen/header.php'; ?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

<?php
  if(empty($_GET['on'])){require 'view/home.php';}
  else{
    $act=($_GET['on']);
    if($act=='kelas'){
      require 'view/a-kelas.php';
    }
    else if($act=='siswa'){
      require 'view/a-siswa.php';
    }
    else if($act=='addsiswa'){
      require 'view/a-addsiswa.php';
    }
    else if($act=='editsiswa'){
      require 'view/a-editsiswa.php';
    }
    else if($act=='guru'){
      require 'view/a-guru.php';
    }
    else if($act=='addguru'){
      require 'view/a-addguru.php';
    }
    else if($act=='editguru'){
      require 'view/a-editguru.php';
    }
    else if($act=='orangtua'){
      require 'view/a-orangtua.php';
    }
    else if($act=='walimurid'){
      require 'view/a-walimurid.php';
    }
    else if($act=='search'){
      require 'view/search.php';
    }
    else if($act=='mapel'){
      require 'view/a-mapel.php';
    }
    else if($act=='gurumapel'){
      require 'view/a-gurumapel.php';
    }
    else if($act=='addgurumapel'){
      require 'view/a-addgurumapel.php';
    }
    else if($act=='editgurumapel'){
      require 'view/a-editgurumapel.php';
    }
    else if($act=='walikelas'){
      require 'view/a-walikelas.php';
    }
    else if($act=='addwalikelas'){
      require 'view/a-addwalikelas.php';
    }
    else if($act=='editwalikelas'){
      require 'view/a-editwalikelas.php';
    }
    else if($act=='tahunakademik'){
      require 'view/a-ta.php';
    }
    else if($act=='tahunakademik'){
      require 'view/a-ta.php';
    }
    else if($act=='jenisnilai'){
      require 'view/a-tipenilai.php';
    }
    else if($act=='aspekket'){
      require 'view/a-aspekket.php';
    }
    else if($act=='aspekuh'){
      require 'view/a-aspekuh.php';
    }
    else if($act=='aspektug'){
      require 'view/a-aspektug.php';
    }
    else if($act=='walimurid'){
      require 'view/a-walimurid.php';
    }
    else if($act=='editwalimurid'){
      require 'view/a-editwalimurid.php';
    }
    else if($act=='setting'){
      require 'view/setting.php';
    }
    else if($act=='backup'){
      require 'view/a-backup.php';
    }
    else if($act=='extra'){
      require 'view/a-extra.php';
    }
    else if($act=='settinggurumapel'){
      require 'view/settinggurumapel.php';
    }
    else if($act=='nilaisiswa'){
      require 'view/nilaisiswa.php';
    }
    else if($act=='naikkelas'){
      require 'view/naikkelas.php';
    }
    else if($act=='gantipassword'){
      require 'view/gantipassword.php';
    }
    else if($act=='kategorimapel'){
      require 'view/kategorimapel.php';
    }
    else if($act=='mapelkelas'){
      require 'view/mapelkelas.php';
    }
    else if($act=='copyright'){
      require 'view/copyright.php';
    }
    else if($act=='mapelmd'){
      require 'view/mapelmd.php';
    }
    else if($act=='mapeltq'){
      require 'view/mapeltq.php';
    }
    else{
      require 'view/404.php';
    }
  }
?>
 </section>
    <!-- /.content -->
</div>
<?php require 'componen/footer.php'; ?>