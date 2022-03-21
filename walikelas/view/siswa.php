      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='setting'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Setting Rapot Berhasil
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='akumulasi'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Akumulasi Nilai Berhasil Diproses
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Siswa Berhasil Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Seluruh Siswa Kelas <?php echo $kel['kelas']; ?></h3><span style="float:right;">
              <?php $cekjumnilra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' "));
              if($cekjumnilra==NULL){ ?>
                <a class="btn bg-blue" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('akumulasinilai').'/'.$kel['c_kelas']; ?>">Akumulasi Nilai</a>
              <?php }else{ ?>
               <a class="btn bg-purple" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('akumulasinilai').'/'.$kel['c_kelas']; ?>">Update Akumulasi Nilai</a>
              <?php }?>
              <!--<a target="_blank" href="<?php echo $basewa; ?>printrapot?print=rapot&kelas=<?php echo $kel['c_kelas']; ?>&ta=<?php echo $c_ta; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print Rapot</a>--></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>FOTO</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th>GENDER</th>
                  <th>TTL</th>
                  <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$kel[c_kelas]' order by nama asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <?php if($akh['foto_siswa']!=null){ ?>
                  <td><img src="<?php echo $base.$akh['foto_siswa']; ?>" style="width:60px; height: 60px;"></td>
                  <?php }else{ ?>
                  <td><img src="<?php echo $base.'media/fotosiswa/default.png'; ?>" style="width:60px; height: 60px;"></td>
                  <?php } ?>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><a href="<?php echo $basewa; ?>nilaisiswa/<?php echo $akh['c_siswa']; ?>"><?php echo $akh['nama']; ?></a></td>
                  <td><?php if($akh['jk']=='L'){echo 'Laki - Laki';}elseif($akh['jk']=='P'){echo 'Perempuan';} ?></td>
                  <td><?php echo $akh['temlahir'].', '.tgl($akh['tanglahir']).''; ?></td>
                  <td>
                    <!--<a href="<?php echo $basewa; ?>nilaisikap/<?php echo $akh['c_siswa']; ?>" class="btn btn-sm bg-maroon">Nilai Sikap</a>-->
                    <!-- <a href="<?php echo $basewa; ?>pkl/<?php echo $akh['c_siswa']; ?>" class="btn btn-sm bg-blue">PKL</a> -->
                    <a href="<?php echo $basewa; ?>nilaiextra/<?php echo $akh['c_siswa']; ?>" class="btn btn-sm bg-navy">Ekstra</a>
                    <a href="<?php echo $basewa; ?>prestasi/<?php echo $akh['c_siswa']; ?>" class="btn btn-sm bg-yellow">Prestasi</a>
                    <?php /*cek rapotsiswa*/$crs=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' and c_siswa='$akh[c_siswa]' "));
                    if($crs==NULL){?>
                      <a class="btn btn-danger btn-sm" data-target="#kehadiran<?php echo $akh['c_siswa']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-question-sign"></i> Setting Rapot</a>
                    <?php }else{?>
                      <a class="btn btn-success btn-sm" href="<?php echo $basewa; ?>settingrapot/<?php echo $akh['c_siswa']; ?>"><i class="glyphicon glyphicon-ok-sign"></i> Setting Rapot</a>
                    <?php } ?>
                  </td>
                </tr>
<div id="kehadiran<?php echo $akh['c_siswa']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-red">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-cog"></i> </h4>
        </div>
<?php $rs=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' and c_siswa='$akh[c_siswa]' ")); 
if($rs==NULL){
?>
      <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('settingrapot'); ?>/access" method="post">
        <input type="hidden" name="c_ta" value="<?php echo $c_ta; ?>">
        <input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
        <input type="hidden" name="c_siswa" value="<?php echo $akh['c_siswa']; ?>">
<?php }else{ ?>
      <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('editsettingrapot'); ?>/access" method="get">
        <input type="hidden" name="c_ta" value="<?php echo $rs['c_ta']; ?>">
        <input type="hidden" name="c_kelas" value="<?php echo $rs['c_kelas']; ?>">
        <input type="hidden" name="c_siswa" value="<?php echo $rs['c_siswa']; ?>">
<?php } ?>
        <div class="modal-body">
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
        <div class="modal-footer">
          <button class="btn btn-success">Simpan Rapot</button>
        </div>
      </form>
    </div>
</div>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->