<?php  ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='aktif'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Tahun Akademik Berhasil Diaktifkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Tahun Akademik Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Tahun Akademik Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Tahun Akademik Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?> 
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-calendar"></i> Tahun Akademik</h3><span style="float:right;"><a class="btn btn-primary" data-target="#tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambah Tahun Akademik</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>TAHUN</th>
                  <th>SEMESTER</th>
                  <th>STATUS</th>
                  <th style="text-align:center;">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM tahunakademik order by tahun desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['tahun']; ?></td>
                  <td><?php echo $akh['semester']; ?></td>
                  <td><?php if($akh['status']=='aktif'){ echo 'AKTIF';}else{?>
                    <span style="color: #d9534f;">TIDAK AKTIF</span> <span class="pull-right"><a class="btn btn-circle bg-purple btn-sm" data-target="#aktif<?php echo $akh['c_ta']; ?>" data-toggle="modal">Aktifkan</a></span><?php } ?></td>
                  <td align="center">
                    <a class="btn btn-circle btn-primary btn-sm" data-target="#edit<?php echo $akh['c_ta']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <?php if($akh['status']=='aktif'){}else{ ?>
                    
                    <?php } ?>
                  </td>
                </tr>
<div id="edit<?php echo $akh['c_ta']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%;">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-calendar"></i> Edit Tahun Akademik</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('editta'); ?>/access" method="post">
        <input type="hidden" name="c_ta" class="form-control" value="<?php echo $akh['c_ta']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>TAHUN AKADEMIK</label>
            <input type="text" name="tahun" class="form-control" value="<?php echo $akh['tahun']; ?>">
          </div>
          <div class="form-group">
            <label>SEMESTER</label>
            <input type="text" name="semester" class="form-control" value="<?php echo $akh['semester']; ?>">
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
<div id="aktif<?php echo $akh['c_ta']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Mengaktifkan Tahun Akademik <?php echo $akh['tahun']; ?> Semester <?php echo $akh['semester']; ?></h4>
        </div>
        <div class="modal-body">
          <?php if($aplikasi['hapsetaktif']=='YES'){ ?>
            <p>Anda Akan Mengaktifkan Tahun Akademik Ini, Dengan <b>Data Dari Tahun Akademik Sebelumnya (<?php echo $ata['tahun'].' Semester '.$ata['semester'] ?>) Akan Terhapus</b></p>
          <?php } else if($aplikasi['hapsetaktif']=='NO'){ ?>
            <p>Anda Akan Mengaktifkan Tahun Akademik Ini</p>
          <?php } ?>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('aktifkan').'/'.$akh['c_ta'].''; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Aktifkan Sekarang</a> 
          <button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
        </div>
    </div>
</div>
<!-- hapus kelas-->
<div id="hapus<?php echo $akh['c_ta']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Tahun Akademik</h4>
        </div>
        <div class="modal-body">
          <?php if($aplikasi['hapsetaktif']=='YES'){ ?>
            <p>Anda Akan Menghapus Tahun Akademik Ini, Dengan <b>Data Dari Tahun Akademik Sebelumnya (<?php echo $ata['tahun'].' Semester '.$ata['semester'] ?>) Akan Terhapus</b></p>
          <?php } else if($aplikasi['hapsetaktif']=='NO'){ ?>
            <p>Anda Akan Menghapus Tahun Akademik Ini</p>
          <?php } ?>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapusta').'/'.$akh['c_ta']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
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
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-calendar"></i> Tambah Tahun Akademik</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('addta'); ?>/access" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>TAHUN AKADEMIK</label>
            <input type="text" name="tahun" class="form-control">
          </div>
          <div class="form-group">
            <label>SEMESTER</label>&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="semester" value="1"> 1(Satu)</label>&nbsp;&nbsp;
            <label><input type="radio" name="semester" value="2"> 2(Dua)</label>
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
