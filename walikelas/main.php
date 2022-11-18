<?php require 'componen/header.php'; ?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
<?php
  if(empty($_GET['on'])){require 'view/siswa.php';}
  else{
    $act=($_GET['on']);
    if($act=='totalnilai'){
      require 'view/totalnilai.php';
    }
    else if($act=='nilaipelajaran'){
      require 'view/nilaipelajaran.php';
    }
    else if($act=='siswa'){
      require 'view/siswa.php';
    }
    else if($act=='search'){
      require 'view/search.php';
    }
    else if($act=='walimurid'){
      require 'view/walimurid.php';
    }
    else if($act=='settingwalimurid'){
      require 'view/settingwalimurid.php';
    }
    else if($act=='settingrapot'){
      require 'view/settingrapot.php';
    }
    else if($act=='aspeksikap'){
      require 'view/aspeksikap.php';
    }
    else if($act=='nilaisikap'){
      require 'view/nilaisikap.php';
    }
    else if($act=='nilaisiswa'){
      require 'view/nilaisiswa.php';
    }
    else if($act=='exportpersiswa'){
      require 'view/exportpersiswa.php';
    }
    else if($act=='exportpermapel'){
      require 'view/exportpermapel.php';
    }
    else if($act=='exporttamra'){
      require 'view/exporttamra.php';
    }
    else if($act=='peringkat'){
      require 'view/peringkat.php';
    }
    else if($act=='nilaiextra'){
      require 'view/nilaiextra.php';
    }
    else if($act=='printpersiswa'){
      require 'view/printpersiswa.php';
    }
    else if($act=='printpermapel'){
      require 'view/printpermapel.php';
    }
    else if($act=='printrapot'){
      require 'view/printrapot.php';
    }
    else if($act=='printrapotmid'){
      require 'view/printrapotmid.php';
    }
    else if($act=='printrapotdapodik'){
      require 'view/printrapotdapodik.php';
    }
    else if($act=='printrapotmerdeka'){
      require 'view/printrapotmerdeka.php';
    }
    else if($act=='printskl'){
      require 'view/printskl.php';
    }
    else if($act=='printrapotpts'){
      require 'view/printrapotpts.php';
    }
    else if($act=='deskripsisikap'){
      require 'view/deskripsi_sikap.php';
    }
    else if($act=='pkl'){
      require 'view/pkl.php';
    }
    else if($act=='prestasi'){
      require 'view/prestasi.php';
    }
    else if($act=='aspekfisik'){
      require 'view/aspekfisik.php';
    }
    else if($act=='berattinggi'){
      require 'view/berattinggi.php';
    }
    else if($act=='kompetensisikap'){
      require 'view/kompetensisikap.php';
    }
    else if($act=='settingdapodik'){
      require 'view/settingdapodik.php';
    }
    else if($act=='nilaimapelmd'){
      require 'view/mapelmd.php';
    }
    else if($act=='nilaiijazah'){
      require 'view/nilaiijazah.php';
    }
    else if($act=='nilaimapeltq'){
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