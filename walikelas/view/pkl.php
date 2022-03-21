<?php $siswanya=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ")); ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> PKL Siswa <?php echo $siswanya['nama']; ?></h3>
            <span class="pull-right"><a href="#" data-toggle="modal" data-target="#addpkl" class="btn btn-primary btn-sm">Tambah PKL</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>MITRA DU/DI</th>
                  <th>LOKASI</th>
                  <th>LAMA</th>
                  <th>KETERANGAN</th>
                  <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM pkl where c_siswa='$_GET[q]' "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['mitradudi']; ?></td>
                  <td><?php echo $akh['lokasi']; ?></td>
                  <td><?php echo $akh['lama']; ?> Bulan</td>
                  <td><?php echo $akh['ket']; ?></td>
                  <td><a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('hapuspkl').'/'.$akh['c_pkl'].'/'.$_GET['q']; ?>" class="btn btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus PKL?');"><i class="fa fa-remove"></i></a></td>
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
              <div id="addpkl" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:35%;">
                  <div class="modal-content">
                    <div class="modal-header text-center bg-danger">
                      Tambah Data PKL
                    </div>
                    <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('addpkl'); ?>/access" method="post">
                    <input type="hidden" name="c_siswa" value="<?php echo $_GET['q']; ?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="">Mitra DU/DI</label>
                        <input type="text" class="form-control" name="mitradudi">
                      </div>
                      <div class="form-group">
                        <label for="">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi">
                      </div>
                      <div class="form-group">
                        <label for="">Lama Bulanya</label>
                        <input type="text" class="form-control" name="lama">
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
