      <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Deskripsi Rapot Berhasil Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Deskripsi Rapot Berhasil Di Setel Ulang
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } $_SESSION['pesan'] = '';?>
      <div class="box">
            <!-- /.box-header -->
        <form action="<?php echo $basegu; ?>a-guru/<?php echo md5('inputdeskripsi'); ?>/access" method="post">
            <input type="hidden" name="c_kelas" value="<?php echo $_GET['q'] ?>">
            <input type="hidden" name="c_mapel" value="<?php echo $_GET['r'] ?>">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>Predikat</th>
                  <th width="30%">Deskripsi Pengetahuan</th>
                  <th width="30%">Deskripsi Keterampilan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;$predikat = 'A'; while($no < 4){
                  //ambilnilai untuk ditampilkan 
                  $amnil=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where predikat = '$predikat' and c_ta='$c_ta' and c_mapel='$_GET[r]' "));
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                      <input class="form-control" type="text" name="predikat[]" id="" value="<?= $predikat?>"/>
                    </td>
                    <td>
                      <textarea type="text" class="form-control" name="des_peng[]"><?php if($amnil['des_peng']==''){echo ' ';}else{ echo $amnil['des_peng']; } ?></textarea>
                    </td>
                    <td>
                      <textarea type="text" class="form-control" name="des_ket[]"><?php if($amnil['des_ket']==''){echo ' ';}else{ echo $amnil['des_ket']; } ?></textarea>
                    </td>
                  </tr>
                <?php $no++; $predikat++;} ?>
                </tbody>
              </table>
              <div id="inputdes" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:35%;">
                  <div class="modal-content">
                    <div class="modal-header text-center bg-green">
                      <?php echo '<h4>DESKRIPSI RAPOT</h4>'; ?>
                    </div>
                    <div class="modal-body">
                      <h4>Anda Akan Menyimpan Ke Database</h4><br>Apakah Anda Yakin?
                    </div>
                    <div class="modal-footer text-center">
                      <button class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</button> 
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer"><a data-target="#inputdes" data-toggle="modal" class="btn btn-success" href="">Simpan Nilai</a> &nbsp;&nbsp;
                <?php $ceknil=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where c_mapel='$_GET[r]' and c_ta='$c_ta' ")); if($ceknil==NULL){ ?>
                <input type="reset" value="Kosongkan" class="btn btn-danger">
              <?php }else{ ?>
              <div id="setelulangdes" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:35%;">
                  <div class="modal-content">
                    <div class="modal-header text-center bg-danger">
                      <?php echo '<h4>DESKRIPSI RAPOT</h4>'; ?>
                    </div>
                    <div class="modal-body">
                      <h4>Anda Akan Melakukan Setel Ulang Deskripsi Rapot</h4><br>Apakah Anda Yakin?
                    </div>
                    <div class="modal-footer text-center">
                      <a href="<?php echo $basegu; ?>a-guru/<?php echo md5('setelulangdes').'/'.$_GET['q'].'/'.$_GET['r'].'/_'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
                      <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                  </div>
                </div>
              </div>
                <a data-target="#setelulangdes" data-toggle="modal" class="btn btn-danger" href="">Setel Ulang Nilai</a>
              <?php } ?>
              </div>
            </form>
          </div>