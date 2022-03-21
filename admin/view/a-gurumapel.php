      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Pengguna Guru Mapel Berhasil Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-star-empty"></i> Seluruh Pengguna Guru Mapel</h3><span style="float:right;"><a href="<?php echo $basead; ?>addgurumapel" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Guru Mapel</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>GURU</th>
                  <th>KELAS</th>
                  <th>MAPEL</th>
                  <th width="10%">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM gurumapel ");$vr=1;while($akh=mysqli_fetch_array($smk)){  $kel=mysqli_fetch_array(mysqli_query($con,"SELECT kelas from kelas where c_kelas='$akh[c_kelas]' "));  $gm=mysqli_fetch_array(mysqli_query($con,"SELECT nama from guru where c_guru='$akh[c_guru]' ")); $mp=mysqli_fetch_array(mysqli_query($con,"SELECT mapel from mapel where c_mapel='$akh[c_mapel]' ")); ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $gm['nama']; ?></td>
                  <td><?php echo $kel['kelas']; ?></td>
                  <td><?php echo $mp['mapel']; ?></td>
                  <td align="center"><a class="btn btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_gurumapel']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="hapus<?php echo $akh['c_gurumapel']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Guru Mapel</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda Yakin Akan Menghapus Data Ini</p>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapusgurumapel').'/'.$akh['c_gurumapel']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
          <button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
        </div>
        </div>
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