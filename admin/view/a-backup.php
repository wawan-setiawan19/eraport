<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
    <div class="box box-danger">
    	<div class="box-header with-border"> <i class="glyphicon glyphicon-download-alt"></i> Backup Database</div>
      <div class="box-body">
      	<a data-target="#backup" data-toggle="modal" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Backup Sekarang</a>
			</div>
			<div class="box-footer">*File Hasil Backup Akan Tersimpan Di <b><?php echo $basead; ?>backupdb/</b> Pada Online File Manager </div>
    </div>
  </div>
</div>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='backup'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Database Berhasil Di BackUp
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-floppy-saved"></i> Data Backup Database</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>TANGGAL</th>
                  <th>NAMA FILE</th>
                  <th width="20%">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM backup order by c_backup desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['at']; ?></td>
                  <td><?php echo $akh['file']; ?></td>
                  <td><a href="<?php echo $basead.'backupdb/'.$akh['file'];?>" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-download-alt"></i> Download</a> <a class="btn btn-sm btn-danger" href="<?php echo $basead; ?>a-control/<?php echo md5('hapusbackup').'/'.$akh['c_backup']; ?>"> <i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
<div id="backup" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:35%;">
    <div class="modal-content">
      <div class="modal-header text-center bg-danger">
       	<h3>Konfirmasi <i class="glyphicon glyphicon-warning-sign"></i></h3>
      </div>
      <div class="modal-body">
        <h5>Apakah Anda Yakin Akan Membackup DATABASE ?</h5>
      </div>
      <div class="modal-footer text-center">
        <a href="<?php echo $basead; ?>a-control/<?php echo md5('backupdb'); ?>/access" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
        <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
      </div>
    </div>
  </div>
</div>
