<?php 
$md=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilai_ijazah where c_kelas='$_GET[q]' "));
?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Nilai Ijazah Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
          <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
              <div style="display: none;" class="alert alert-info alert-dismissable">Nilai Ijazah Di Setel Ulang
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
          <?php } $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            	<h4> <i class="glyphicon glyphicon-pencil"></i> INPUT NILAI IJAZAH<span class="pull-right"><div style="color:#428bca;">KELAS: <?php echo $kel['kelas']; ?></div><div style="color:#5cb85c;">MAPEL Ijazah: <?php echo $md['nama_mapelmd']; ?></div><div style="">KKM: <?php echo $md['kkm_mapelmd']; ?></div></span></h4>
            </div>
            <form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('inputnilaiijazah'); ?>/access" method="post">
            <input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="15%">NISN</th>
                  <th>NAMA</th>
                  <th width="10%">Nilai</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa left join nilai_ijazah on (siswa.c_siswa=nilai_ijazah.c_siswa and nilai_ijazah.c_ta='$c_ta') where siswa.c_kelas='$kel[c_kelas]' order by nama asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td><input autocomplete="off" name="nilai[]" class="form-control" onkeypress="return hanyaangka(event)" value="<?php if($akh['nilai']<1){echo '0';}else{ echo $akh['nilai']; } ?>"></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
              <button class="btn btn-primary">Simpan Nilai Ijazah</button>
              <?php $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilai_ijazah where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' ")); if($cekada!=null){ ?>
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
                      <?php echo '<h4>Nilai Ijazah</h4>'; ?>
                    </div>
                    <div class="modal-body">
                      <h4>Anda Akan Melakukan Setel Ulang Nilai Ijazah</h4><br>Apakah Anda Yakin?
                    </div>
                    <div class="modal-footer text-center">
                      <a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('setelulangmd').'/'.$kel['c_kelas'].'/'.$md['id_mapelmd'].'/_'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                  </div>
                </div>
