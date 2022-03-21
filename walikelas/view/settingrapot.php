<?php $ss=mysqli_fetch_array(mysqli_query($con,"SELECT c_siswa,nama from siswa where c_siswa='$_GET[q]' ")); ?>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"> <i class="glyphicon glyphicon-cog"></i> Setting Rapot Siswa <?php echo $ss['nama']; ?></h3>
    </div>
<?php $rs=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' and c_siswa='$ss[c_siswa]' ")); 
if($rs==NULL){
?>
      <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('settingrapot'); ?>/access" method="post">
        <input type="hidden" name="c_ta" value="<?php echo $c_ta; ?>">
        <input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
        <input type="hidden" name="c_siswa" value="<?php echo $akh['c_siswa']; ?>">
<?php }else{ ?>
      <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('editsettingrapot'); ?>/access" method="post">
        <input type="hidden" name="c_ta" value="<?php echo $rs['c_ta']; ?>">
        <input type="hidden" name="c_kelas" value="<?php echo $rs['c_kelas']; ?>">
        <input type="hidden" name="c_siswa" value="<?php echo $rs['c_siswa']; ?>">
<?php } ?>
        <div class="box-body">
          <p>Ketidakhadiran</p>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>SAKIT (S)</label>
                <input type="text" name="s" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $rs['s']; ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>IZIN (I)</label>
                <input type="text" name="i" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $rs['i']; ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>ALPA (A)</label>
                <input type="text" name="a" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $rs['a']; ?>">
              </div>
            </div>
          </div>
          <p>*Kosongi Bila Tidak Ada</p>
          <p>Catatan untuk perhatian orang tua/wali</p>
            <div class="form-group">
              <textarea name="catatan" class="form-control"><?php echo $rs['catatan']; ?></textarea>
            </div>
          <p>Kepribadian</p>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>KELAKUKAN</label>
                <select name="kelakuan" class="form-control">
                  <option <?php if($rs['kelakuan']=='Baik'){echo 'selected';} ?> value="Baik">Baik</option>
                  <option <?php if($rs['kelakuan']=='Cukup'){echo 'selected';} ?> value="Cukup">Cukup</option>
                  <option <?php if($rs['kelakuan']=='Kurang'){echo 'selected';} ?> value="Kurang">Kurang</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>KERAJINAN</label>
                <select name="kerajinan" class="form-control">
                  <option <?php if($rs['kerajinan']=='Baik'){echo 'selected';} ?> value="Baik">Baik</option>
                  <option <?php if($rs['kerajinan']=='Cukup'){echo 'selected';} ?> value="Cukup">Cukup</option>
                  <option <?php if($rs['kerajinan']=='Kurang'){echo 'selected';} ?> value="Kurang">Kurang</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>KERAPIAN</label>
                <select name="kerapian" class="form-control">
                  <option <?php if($rs['kerapian']=='Baik'){echo 'selected';} ?> value="Baik">Baik</option>
                  <option <?php if($rs['kerapian']=='Cukup'){echo 'selected';} ?> value="Cukup">Cukup</option>
                  <option <?php if($rs['kerapian']=='Kurang'){echo 'selected';} ?> value="Kurang">Kurang</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Simpan Rapot</button>
        </div>
      </form>
    </div>
  </div>
</div>