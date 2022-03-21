<?php $siswanya=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ")); ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Prestasi Siswa <?php echo $siswanya['nama']; ?></h3>
            <span class="pull-right"><a href="#" data-toggle="modal" data-target="#addprestasi" class="btn btn-primary btn-sm">Tambah Prestasi</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>Ekstrakulikuler</th>
                  <th>Keterangan</th>
                  <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM prestasi left join extra on (prestasi.c_extra=extra.c_extra) where prestasi.c_siswa='$_GET[q]' "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['extra']; ?></td>
                  <td><?php echo $akh['ket']; ?></td>
                  <td><a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('hapusprestasi').'/'.$akh['c_prestasi'].'/'.$_GET['q']; ?>" class="btn btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus Prestasi?');prestasi"><i class="fa fa-remove"></i></a></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
              <div id="addprestasi" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:35%;">
                  <div class="modal-content">
                    <div class="modal-header text-center bg-danger">
                      Tambah Data Prestasi
                    </div>
                    <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('addprestasi'); ?>/access" method="post">
                    <input type="hidden" name="c_siswa" value="<?php echo $_GET['q']; ?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="">Ekstrakurikuler</label>
                        <select name="c_extra" id="" class="form-control select" style="width:100%;">
                          <option value="">Pilih</option>
                          <?php $exnya= mysqli_query($con,"SELECT * FROM extra order by extra asc "); while($hexnya= mysqli_fetch_array($exnya)){ echo '<option value="'.$hexnya['c_extra'].'">'.$hexnya['extra'].'</option>'; } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="ket">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary">Simpan</button>
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                    </form>
                  </div>
                </div>
