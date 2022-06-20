      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Data Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
          <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
              <div style="display: none;" class="alert alert-info alert-dismissable">Data Di Setel Ulang
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
          <?php } $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            	<h4> <i class="glyphicon glyphicon-pencil"></i> SETTING DAPODIK<span class="pull-right"><div style="color:#428bca;">KELAS: <?php echo $kel['kelas']; ?></div><div style="color:#5cb85c;">MAPEL DINIYAH: <?php echo $md['nama_mapelmd']; ?></div><div style="">KKM: <?php echo $md['kkm_mapelmd']; ?></div></span></h4>
            </div>
            <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('inputdapodik'); ?>/access" method="post">
            <input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">NISN</th>
                  <th width="15%">NIS</th>
                  <th>NAMA</th>
                  <th width="10%">KELAS DAPODIK</th>
                  <th>WALI KELAS DAPODIK</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa  where c_kelas='$kel[c_kelas]' order by nama asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <input type="hidden" autocomplete="off" name="c_siswa[]" class="form-control" value="<?= $akh['c_siswa']?>">
                  <td><?php echo $vr; ?></td>
                  <td><input autocomplete="off" name="nisn[]" class="form-control" value="<?= $akh['nisn']?>"></td>
                  <td><input autocomplete="off" name="nis[]" class="form-control" value="<?= $akh['nis']?>"></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td><input autocomplete="off" name="kelas_dapodik[]" class="form-control" value="<?= $akh['kelas_dapodik']?>"></td>
                  <td><input name="walas_dapodik[]" class="form-control" value="<?= $akh['walas_dapodik']?>"></input></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
              <button class="btn btn-primary">Simpan Setting Dapodik</button>
              <?php $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_kelas='$kel[c_kelas]' ")); if($cekada!=null){ ?>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#setelulang">Setel Ulang</a>
              <?php } ?>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
              <div id="setelulang" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:35%;">
                  <div class="modal-content">
                    <div class="modal-header text-center bg-danger">
                      <?php echo '<h4>Data Dapodik</h4>'; ?>
                    </div>
                    <div class="modal-body">
                      <h4>Anda Akan Melakukan Setel Ulang Setting Dapodik (<?php echo $md['nama_mapelmd']; ?>), Semua Data Akan Terhapus</h4><br>Apakah Anda Yakin?
                    </div>
                    <div class="modal-footer text-center">
                      <a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('setelulangdapodik').'/'.$kel['c_kelas'].'/'.$md['id_mapelmd'].'/_'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                  </div>
                </div>
