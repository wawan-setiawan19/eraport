      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Aspek Fisik Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
          <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
              <div style="display: none;" class="alert alert-info alert-dismissable">Aspek Fisik Di Setel Ulang
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
          <?php } $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Aspek Fisik Siswa Kelas <?php echo $kel['kelas']; ?></h3>
            </div>
            <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('simpanaspekfisik'); ?>/access" method="post">
            <input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NAMA</th>
                  <th width="15%">Penglihatan</th>
                  <th width="15%">Pendengaran</th>
                  <th width="15%">Gigi</th>
                  <th width="15%">Lainnya</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa left join aspek_fisik on (siswa.c_siswa=aspek_fisik.c_siswa and aspek_fisik.c_ta='$c_ta') where siswa.c_kelas='$kel[c_kelas]' order by nama asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td><input type="text" name="penglihatan[]" value="<?php echo $akh['penglihatan']; ?>" class="form-control" style="width:100%;"></td>
                  <td><input type="text" name="pendengaran[]" value="<?php echo $akh['pendengaran']; ?>" class="form-control" style="width:100%;"></td>
                  <td><input type="text" name="gigi[]" value="<?php echo $akh['gigi']; ?>" class="form-control" style="width:100%;"></td>
                  <td><input type="text" name="lainnya[]" value="<?php echo $akh['lainnya']; ?>" class="form-control" style="width:100%;"></td>

                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
              <button class="btn btn-primary">Simpan Aspek Fisik</button>
              <?php $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM aspek_fisik where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' ")); if($cekada!=null){ ?>
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
                      <?php echo '<h4>Aspek Fisik</h4>'; ?>
                    </div>
                    <div class="modal-body">
                      <h4>Anda Akan Melakukan Setel Ulang Aspek Fisik, Semua Akan Terhapus</h4><br>Apakah Anda Yakin?
                    </div>
                    <div class="modal-footer text-center">
                      <a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('ulangaspekfisik').'/'.$kel['c_kelas']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                  </div>
                </div>
