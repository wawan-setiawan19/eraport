      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable"><?= $_SESSION['pesan_panjang'] ?>
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
          <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
              <div style="display: none;" class="alert alert-info alert-dismissable">Kompetensi Sikap Di Setel Ulang
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
          <?php } $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Kompetensi Sikap Siswa Kelas <?php echo $kel['kelas']; ?></h3>
            </div>
            <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('simpankompetensisikapnew'); ?>/access" method="post">
            <input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
            <input type="hidden" name="c_siswa" value="<?php echo $kel['c_kelas']; ?>">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <?php 
                $angkatan = explode(" ",$kel['kelas']);
                $smk=mysqli_query($con,"SELECT * FROM kompetensi_sikap where kompetensi_sikap.c_ta='$c_ta' and kompetensi_sikap.angkatan='$angkatan[0]'"); $vr=1;while($ulang=mysqli_fetch_array($smk)){$akh=$ulang;} ?>                
                  <tbody>
                    <tr>
                    <input type="hidden" name="angkatan" value="<?php echo $angkatan[0]; ?>">
                    <th>Angkatan</th>
                    <td><?php echo $angkatan[0]; ?></td>
                  </tr>
                  <tr>
                    <th>Beriman...</th>
                    <td><textarea name="spiritual" class="form-control" style="width:100%;"><?php echo $akh['spiritual']; ?></textarea></td>
                  </tr>
                  <tr>
                    <th>Berkebinekaan...</th>
                    <td><textarea name="sosial" class="form-control" style="width:100%;"><?php echo $akh['sosial']; ?></textarea></td>
                  </tr>
                  <tr>
                    <th>Bergotong...</th>
                    <td><textarea name="akhlak" class="form-control" style="width:100%;"><?php echo $akh['akhlak']; ?></textarea></td>
                  </tr>
                  <tr>
                    <th>Mandiri</th>
                    <td><textarea name="nilaispi" class="form-control" style="width:100%;"><?php echo $akh['nilaispi']; ?></textarea></td>
                  </tr>
                  <tr>
                    <th>Bernalar...</th>
                    <td><textarea name="nilaisos" class="form-control" style="width:100%;"><?php echo $akh['nilaisos']; ?></textarea></td>
                  </tr>
                  <tr>
                    <th>Kreatif</th>
                    <td><textarea name="nilaiakh" class="form-control" style="width:100%;"><?php echo $akh['nilaiakh']; ?></textarea></td>
                  </tr>
<?php 
// $vr++; } ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
              <button class="btn btn-primary">Simpan Kompetensi Sikap</button>
              <?php $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kompetensi_sikap where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' ")); if($cekada!=null){ ?>
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
                      <?php echo '<h4>Kompetensi Sikap</h4>'; ?>
                    </div>
                    <div class="modal-body">
                      <h4>Anda Akan Melakukan Setel Ulang Kompetensi Sikap, Semua Akan Terhapus</h4><br>Apakah Anda Yakin?
                    </div>
                    <div class="modal-footer text-center">
                      <a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('ulangkompetensisikap').'/'.$kel['c_kelas']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                  </div>
                </div>
