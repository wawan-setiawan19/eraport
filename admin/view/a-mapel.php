<?php $katmapel= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kategori_mapel where c_katmapel='$_GET[q]' ")); ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Mata Pelajaran Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Mata Pelajaran Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Mata Pelajaran Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?> 
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-list-alt"></i> Seluruh Mata Pelajaran - <?php echo $katmapel['katmapel']; ?></h3><span style="float:right;"><a class="btn btn-primary" data-target="#tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambah Mapel</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>KODE MAPEL</th>
                  <th>MATA PELAJARAN</th>
                  <th width="10%">KKM</th>
                  <th style="text-align:center;">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM mapel where c_katmapel='$_GET[q]' order by mapel asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['c_mapel']; ?></td>
                  <td><?php echo $akh['mapel']; ?></td>
                  <td><?php echo $akh['sl']; ?></td>
                  <td align="center">
                  <a class="btn btn-circle btn-primary btn-sm" data-target="#edit<?php echo $akh['c_mapel']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-circle btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_mapel']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="edit<?php echo $akh['c_mapel']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%;">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-list-alt"></i> Edit Mata Pelajaran</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('editmapel'); ?>/access" method="post">
        <input type="hidden" name="c_mapel" class="form-control" value="<?php echo $akh['c_mapel']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>MATA PELAJARAN</label>
            <input type="text" name="mapel" class="form-control" value="<?php echo $akh['mapel']; ?>">
          </div>
          <div class="form-group">
            <label>NILAI STANDART KELULUSAN</label>
            <input type="text" name="sl" class="form-control" value="<?php echo $akh['sl']; ?>">
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
<div id="hapus<?php echo $akh['c_mapel']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Mata Pelajaran</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Ini, Akan Berpengaruh Pada</p>
          <b>1. Data Pengguna Aplikasi Untuk Mata Pelajaran Tersebut Akan Terhapus<br>2. Data Nilai Dari Mata Pelajaran Tersebut Akan Terhapus</b>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapusmapel').'/'.$akh['c_mapel']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
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
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-list-alt"></i> Tambah Mata Pelajaran</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('addmapel'); ?>/access" method="post">
        <input type="hidden" name="c_katmapel" class="form-control" value="<?php echo $_GET['q']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>MATA PELAJARAN</label>
            <input type="text" name="mapel" class="form-control">
          </div>
          <div class="form-group">
            <label>NILAI STANDART KELULUSAN</label>
            <input type="text" name="sl" class="form-control">
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
