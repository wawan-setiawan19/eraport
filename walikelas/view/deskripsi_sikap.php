      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Deskripsi Sikap Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
          <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
              <div style="display: none;" class="alert alert-info alert-dismissable">Deskripsi Sikap Di Setel Ulang
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
          <?php } $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Deskripsi Sikap Siswa Kelas <?php echo $kel['kelas']; ?></h3>
            </div>
            <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('simpandeskripsisikap'); ?>/access" method="post">
            <input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">NISN</th>
                  <th>NAMA</th>
                  <th>DESKRIPSI SIKAP</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa left join deskripsi_sikap on (siswa.c_siswa=deskripsi_sikap.c_siswa and deskripsi_sikap.c_ta='$c_ta') where siswa.c_kelas='$kel[c_kelas]' order by nama asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td><input type="text" name="deskripsi[]" value="<?php echo $akh['deskripsi']; ?>" class="form-control" style="width:100%;"></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
              <button class="btn btn-primary">Simpan Deskripsi Sikap</button>
              <?php $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_sikap where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' ")); if($cekada!=null){ ?>
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
                      <?php echo '<h4>Deskripsi Sikap</h4>'; ?>
                    </div>
                    <div class="modal-body">
                      <h4>Anda Akan Melakukan Setel Ulang Deskirpsi Sikap, Semua Deskirpsi Akan Terhapus</h4><br>Apakah Anda Yakin?
                    </div>
                    <div class="modal-footer text-center">
                      <a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('ulangdeskripsisikap').'/'.$kel['c_kelas']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                  </div>
                </div>
