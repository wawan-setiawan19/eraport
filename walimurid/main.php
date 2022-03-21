<?php require 'componen/header.php'; ?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

<?php
  if(empty($_GET['smkakh'])){require 'view/home.php';}
  else{
    $act=($_GET['smkakh']);
    if($act=='pesan'){
      require 'view/pesan.php';
    }
    else if($act=='guru'){
      require 'view/guru.php';
    }
    else if($act=='pesan'){
      require 'view/pesan.php';
    }
    else if($act=='nilaisikap'){
      require 'view/nilaisikap.php';
    }
    else if($act=='nilaiextra'){
      require 'view/nilaiextra.php';
    }
    else if($act=='prestasi'){
      require 'view/prestasi.php';
    }
    else if($act=='pkl'){
      require 'view/pkl.php';
    }
    else if($act=='profilsiswa'){
      require 'view/profilsiswa.php';
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