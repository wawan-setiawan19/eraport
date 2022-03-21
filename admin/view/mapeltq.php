<?php  ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Tahfidzul Quran Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Tahfidzul Quran Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Tahfidzul Quran Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?> 
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-list-alt"></i> Tahfidzul Quran</h3><span style="float:right;"><a class="btn btn-circle btn-primary" data-target="#tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tahfidzul Quran</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>Nama Capaian</th>
                  <th style="text-align:center;">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM mapeltq order by nama_mapeltq asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nama_mapeltq']; ?></td>
                  <td align="center">
                  <a class="btn btn-circle btn-primary btn-sm" data-target="#edit<?php echo $akh['id_mapeltq']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-circle btn-danger btn-sm" data-target="#hapus<?php echo $akh['id_mapeltq']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="edit<?php echo $akh['id_mapeltq']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-wrench"></i> Edit Tahfidzul Quran</h4>
        </div>
        <form method="post" action="<?php echo $basead; ?>a-control/<?php echo md5('editmapeltq'); ?>/access">
        <input type="hidden" name="id_mapeltq" class="form-control" value="<?php echo $akh['id_mapeltq']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Tahfidzul Quran</label>
            <input type="text" name="nama_mapeltq" class="form-control" value="<?php echo $akh['nama_mapeltq']; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button> 
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</a>
        </div>
        </form>
    </div>
</div>
</div>
<!-- hapus kelas-->
<div id="hapus<?php echo $akh['id_mapeltq']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Tahfidzul Quran</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Ini, Akan Berpengaruh Pada</p>
          <b>1. Seluruh Data Nilai Dari <?php echo $akh['nama_mapeltq']; ?> Tersebut Akan Terhapus</b>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapusmapeltq').'/'.$akh['id_mapeltq']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
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
<div id="tambah" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%;">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-wrench"></i> Tambah Tahfidzul Quran</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('addmapeltq'); ?>/access" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Tahfidzul Quran</label>
            <input type="text" name="nama_mapeltq" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button> 
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</a>
        </div>
        </form>
    </div>
</div>
</div>