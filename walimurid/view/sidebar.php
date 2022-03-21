<div class="box box-widget widget-user-2">
  <div class="widget-user-header bg-primary">
    <p class="text-center" style="font-size: 20px;border-bottom: 1px solid #fff;">SISWA</p>
    <div class="widget-user-image">
      <img class="img-circle" src="<?php echo $base; ?>imgstatis/siswa.png" alt="User Avatar">
    </div>
    <h4 class="widget-user-username" style="font-size: 20px;"><?php echo $siswa['nama']; ?></h4>
    <h5 class="widget-user-desc"><?php echo $kelas['kelas']; ?> (<?php if($siswa['jk']=='L'){echo 'Laki - Laki';}elseif($siswa['jk']=='P'){echo 'Perempuan';} ?>)</h5>
    <h5></h5>
  </div>
  <div class="box-footer no-padding">
    <ul class="nav nav-stacked">
      
    </ul>
  </div>
</div>
<div class="box box-widget widget-user-2">
  <div class="widget-user-header bg-green">
    <p class="text-center" style="font-size: 20px;border-bottom: 1px solid #fff;">WALI MURID</p>
    <div class="widget-user-image">
      <img class="img-circle" src="<?php echo $base; ?>imgstatis/ortu.png" alt="User Avatar">
    </div>
    <h4 class="widget-user-username" style="font-size: 20px;"><?php echo $wali['nama']; ?></h4>
    <h5 class="widget-user-desc">Username : <?php echo $wali['username']; ?></h5>
  </div>
  <div class="box-footer no-padding">
    <ul class="nav nav-stacked">
      <!--<li><a>Total Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #428bca;" class="pull-right"><?php echo $pel; ?></span></a><li>
      <li><a>Poin Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #d9534f;" class="pull-right"><?php if($totalpel['total']>0){echo $totalpel['total'];}else{echo "0";} ?></span></a></li>-->
    </ul>
  </div>
</div>
<?php if($guru!=NULL){ ?>
<div class="box box-widget widget-user-2">
  <div class="widget-user-header bg-purple">
    <p class="text-center" style="font-size: 20px;border-bottom: 1px solid #fff;">WALI KELAS</p>
    <div class="widget-user-image">
      <img class="img-circle" src="<?php echo $base; ?>imgstatis/avatar1.png" alt="User Avatar">
    </div>
    <h4 class="widget-user-username" style="font-size: 20px;"><?php echo $guru['nama']; ?></h4>
    <h5 class="widget-user-desc"><a class="btn" style="background-color:none;border:1px solid#fff;color:#fff; ">Active</a></h5>
    <h5></h5>
  </div>
  <div class="box-footer no-padding">
    <ul class="nav nav-stacked">
      <!--<li><a>Total Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #428bca;" class="pull-right"><?php echo $pel; ?></span></a><li>
      <li><a>Poin Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #d9534f;" class="pull-right"><?php if($totalpel['total']>0){echo $totalpel['total'];}else{echo "0";} ?></span></a></li>-->
    </ul>
  </div>
</div>
<?php } ?>