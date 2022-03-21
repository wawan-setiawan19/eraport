<?php  ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Kelas Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Kelas Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Kelas Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?> 
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-stats"></i> Seluruh Kelas</h3><span style="float:right;"><a class="btn btn-circle btn-primary" data-target="#tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambah Kelas</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>KELAS</th>
                  <th>Wali Grade</th>
                  <th>TTD</th>
                  <th>Murokib</th>
                  <th>TTD</th>

                  <th>SISWA</th>
                  <th width="15%">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){ $jsis=mysqli_num_rows(mysqli_query($con,"SELECT * from siswa where c_kelas='$akh[c_kelas]' ")); ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['kelas']; ?>
                    <span class="pull-right"><a href="<?php echo $basead; ?>mapelkelas/<?php echo $akh['c_kelas']; ?>" class="btn btn-xs bg-maroon">Mapel Kelas</a></span>
                  </td>
                  <td><?php echo $akh['waligrade']; ?>
                  <td><?php echo $akh['ttdwaligrade']; ?>
                  <td><?php echo $akh['murokib']; ?>
                  <td><?php echo $akh['ttdmurokib']; ?>
                  <td width="25%"><?php echo $jsis; ?> Siswa
                    <span class="pull-right"><a href="<?php echo $basead; ?>naikkelas/<?php echo $akh['c_kelas']; ?>" class="btn btn-xs bg-maroon">Naik Kelas</a></span>
                  </td>
                  <td>
                  <a class="btn btn-success btn-xs" href="<?php echo $basead; ?>siswa/<?php echo $akh['c_kelas']; ?>"><i class="glyphicon glyphicon-user"></i> Lihat Siswa</a>
                  <a class="btn btn-circle btn-primary btn-xs" data-target="#edit<?php echo $akh['c_kelas']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-circle btn-danger btn-xs" data-target="#hapus<?php echo $akh['c_kelas']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="edit<?php echo $akh['c_kelas']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%;">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-stats"></i> Edit Kelas</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('editkelas'); ?>/access" method="post">
        <input type="hidden" name="c_kelas" class="form-control" value="<?php echo $akh['c_kelas']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>KELAS</label>
            <input type="text" name="kelas" class="form-control" value="<?php echo $akh['kelas']; ?>">
          </div>
          <div class="form-group">
            <label>Wali Grade</label>
            <input type="text" name="waligrade" class="form-control" value="<?php echo $akh['waligrade']; ?>">
          </div>
          <div class="form-group">
            <label>TTD Wali Grade</label>
            <input type="text" name="ttdwaligrade" class="form-control" value="<?php echo $akh['ttdwaligrade']; ?>">
          </div>
          <div class="form-group">
            <label>Murokib</label>
            <input type="text" name="murokib" class="form-control" value="<?php echo $akh['murokib']; ?>">
          </div>
          <div class="form-group">
            <label>TTD Murokib</label>
            <input type="text" name="ttdmurokib" class="form-control" value="<?php echo $akh['ttdmurokib']; ?>">
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
<div id="hapus<?php echo $akh['c_kelas']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Kelas</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Kelas <?php echo $akh['kelas']; ?>, Akan Berpengaruh Pada</p>
          <b>1. Siswa Dari Kelas Tersebut Akan Terhapus<br>2. Data Nilai Dari Kelas Tersebut Akan Terhapus<br>3. Data Setting Rapot Dari Kelas Tersebut Akan Terhapus<br>4. Data Jumlah Nilai Dari Kelas Tersebut Akan Terhapus<br>5. Data Walimurid Dari Kelas Tersebut Akan Terhapus<br>6. Data Pengguna Aplikasi Untuk Guru Mapel Dari Kelas Tersebut Akan Terhapus<br>7. Data Pengguna Aplikasi Untuk Walikelas Dari Kelas Tersebut Akan Terhapus<br>8. Data Ekstrakulikuler Siswa Dari Kelas Tersebut Akan Terhapus</b>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapuskelas').'/'.$akh['c_kelas']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
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
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-stats"></i> Tambah Kelas</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('addkelas'); ?>/access" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>KELAS</label>
            <input type="text" name="kelas" class="form-control">
          </div>
          <div class="form-group">
            <label>Wali Grade</label>
            <input type="text" name="waligrade" class="form-control" >
          </div>
          <div class="form-group">
            <label>TTD Wali Grade</label>
            <input type="text" name="ttdwaligrade" class="form-control" >
          </div>
          <div class="form-group">
            <label>Murokib</label>
            <input type="text" name="murokib" class="form-control" >
          </div>
          <div class="form-group">
            <label>TTD Murokib</label>
            <input type="text" name="ttdmurokib" class="form-control" >
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
