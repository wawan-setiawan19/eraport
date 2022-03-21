<?php  ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Jenis Nilai Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Jenis Nilai Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Jenis Nilai Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?> 
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-wrench"></i> Jenis Nilai Akademik</h3><span style="float:right;"><a class="btn btn-circle btn-primary" data-target="#tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambah Jenis Nilai</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>JENIS NILAI</th>
                  <th>KETERANGAN</th>
                  <th>SISTEM</th>
                  <th>PRESENTASE</th>
                  <th>POSISI</th>
                  <th style="text-align:center;">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM tipenilai order by bobot asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['tipe']; ?></td>
                  <td><?php echo $akh['ket']; ?></td>
                  <td><?php if($akh['sistem']=='rata'){echo 'RATA-RATA';}else if($akh['sistem']=='asli'){echo 'NILAI ASLI';}else if($akh['sistem']=='persen'){ echo 'PERSENTASE';} ?></td>
                  <td><?php if($akh['sistem']=='persen'){echo $akh['bobot'].'%';}else{ echo '-';} ?></td>
                  <td><?php echo $akh['p']; ?></td>
                  <td align="center">
                  <a class="btn btn-circle btn-primary btn-sm" data-target="#edit<?php echo $akh['c_tipenilai']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-circle btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_tipenilai']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="edit<?php echo $akh['c_tipenilai']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%;">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-wrench"></i> Edit Jenis Nilai</h4>
        </div>
        <form method="post" action="<?php echo $basead; ?>a-control/<?php echo md5('edittipenilai'); ?>/access">
        <input type="hidden" name="c_tipenilai" class="form-control" value="<?php echo $akh['c_tipenilai']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>JENIS NILAI</label>
            <input type="text" name="tipe" class="form-control" value="<?php echo $akh['tipe']; ?>">
          </div>
          <div class="form-group">
            <label>KETERANGAN</label>
            <input type="text" name="ket" class="form-control" value="<?php echo $akh['ket']; ?>">
          </div>
          <div class="form-group">
            <label>PENILAIAN DEGAN SISTEM</label>
            <select class="form-control select" name="sistem" style="width:100%;">
              <option>Pilih</option>
              <option <?php if($akh['sistem']=='rata')echo 'selected'; ?> value="rata"> RATA-RATA</option>
              <option <?php if($akh['sistem']=='asli')echo 'selected'; ?> value="asli"> NILAI ASLI</option>
              <option <?php if($akh['sistem']=='persen')echo 'selected'; ?> value="persen"> PERSENTASE</option>
            </select>
          </div>
          <div class="form-group">
            <label>JUMLAH PRESENTASE (%) Tidak Harus Diisi</label>
            <input type="text" name="bobot" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $akh['bobot']; ?>">
          </div>
          <div class="form-group">
            <label>POSISI</label>
            <input type="text" name="p" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $akh['p']; ?>">
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
<div id="hapus<?php echo $akh['c_tipenilai']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Jenis Nilai</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Ini, Akan Berpengaruh Pada</p>
          <b>1. Seluruh Data Nilai Dari Jenis Nilai Tersebut Akan Terhapus</b>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapustipenilai').'/'.$akh['c_tipenilai']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
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
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-wrench"></i> Tambah Jenis Nilai</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('addtipenilai'); ?>/access" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>JENIS NILAI</label>
            <input type="text" name="tipe" class="form-control">
          </div>
          <div class="form-group">
            <label>KETERANGAN</label>
            <input type="text" name="ket" class="form-control">
          </div>
          <div class="form-group">
            <label>PENILAIAN DEGAN SISTEM</label>
            <select class="form-control select" name="sistem" style="width:100%;">
              <option>Pilih</option>
              <option value="rata"> RATA-RATA</option>
              <option value="asli"> NILAI ASLI</option>
              <option value="persen"> PERSENTASE</option>
            </select>
          </div>
          <div class="form-group">
            <label>JUMLAH PRESENTASE (%) Tidak Harus Diisi</label>
            <input type="text" name="bobot" class="form-control" onkeypress="return hanyaangka(event)">
          </div>
          <div class="form-group">
            <label>POSISI</label>
            <input type="text" name="p" class="form-control" onkeypress="return hanyaangka(event)">
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