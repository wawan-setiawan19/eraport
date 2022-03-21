<?php require 'componen/header.php'; ?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
<?php
  if(empty($_GET['on'])){require 'view/home.php';}
  else{
    $act=($_GET['on']);
    if($act=='inputnilai'){
      require 'view/inputnilai.php';
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