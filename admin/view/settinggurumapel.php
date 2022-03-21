<?php $ss=mysqli_fetch_array(mysqli_query($con,"SELECT c_guru,nama from guru where c_guru='$_GET[q]' ")); ?>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
  <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='berhasil'){?>
    <div style="display: none;" class="alert alert-success alert-dismissable">Perubahan Berhasil Disimpan
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
  <?php } $_SESSION['pesan'] = '';?>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"> <i class="glyphicon glyphicon-cog"></i> Setting Pengguna Guru Mapel Dari <?php echo $ss['nama']; ?></h3>
    </div>
    <div class="box-body">
      <form action="<?php echo $basead; ?>a-control/<?php echo md5('settinggurumapel'); ?>/access" method="post">
        <input type="hidden" name="c_guru" value="<?php echo $ss['c_guru']; ?>">
        <div class="box-body">
          <p><label>Pilih Mata Pelajaran Untuk Guru Tersebut</label></p>
          <?php $ex=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");
          while($hex=mysqli_fetch_array($ex)){ ?>
            <div class="box-header"><b style="color:#d81b60;">KELAS <?php echo $hex['kelas']; ?></b></div>
            <div class="box-body">
              <div class="row">
              <?php $ckex=mysqli_query($con,"SELECT *,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel FROM mapel_kelas where c_kelas='$hex[c_kelas]' order by mapel asc "); 
              while($hckex=mysqli_fetch_array($ckex)){ ?>
                <?php $ckgmap=mysqli_fetch_array(mysqli_query($con,"SELECT c_gurumapel from gurumapel where c_guru='$ss[c_guru]' and c_mapel='$hckex[c_mapel]' and c_kelas='$hex[c_kelas]' ")); $wesada=mysqli_fetch_array(mysqli_query($con,"SELECT c_gurumapel from gurumapel where c_mapel='$hckex[c_mapel]' and c_kelas='$hex[c_kelas]' "));
                if($ckgmap==NULL){$v='';}else{$v='checked';?>

                <div class="col-md-4"><label><input type="checkbox" <?php echo $v; ?> name="mapel[]" value="<?php echo $hckex['c_mapel'].'_'.$hex['c_kelas']; ?>"> <?php echo $hckex['mapel']; ?></label></div>
                <?php }if($wesada==NULL){ ?>

                <div class="col-md-4"><label><input type="checkbox" <?php echo $v; ?> name="mapel[]" value="<?php echo $hckex['c_mapel'].'_'.$hex['c_kelas']; ?>"> <?php echo $hckex['mapel']; ?></label></div>
              <?php } }?> 
              </div>
            </div>

          <?php } ?>
          </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Simpan Guru Mapel</button>
        </div>
      </form>
    </div>
  </div>
</div>