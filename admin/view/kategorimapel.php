<?php  ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Kategori Mata Pelajaran Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Kategori Mata Pelajaran Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Kategori Mata Pelajaran Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?> 
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-list-alt"></i> Seluruh Kategori Mata Pelajaran</h3><span style="float:right;"><a class="btn btn-primary" data-target="#tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambah Kategori Mapel</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>KATEGORI MAPEL</th>
                  <th>MAPEL</th>
                  <th>POSISI</th>
                  <th style="text-align:center;">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT *,(select count(*) from mapel where c_katmapel=kategori_mapel.c_katmapel) as jmapel FROM kategori_mapel order by posisi asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['katmapel']; ?></td>
                  <td><?php echo $akh['jmapel']; ?></td>
                  <td><?php echo $akh['posisi']; ?></td>
                  <td align="center">
                  <a class="btn btn-circle btn-warning btn-sm" href="<?php echo $basead.'mapel/'.$akh['c_katmapel']; ?>">Mapel</a>
                  <a class="btn btn-circle btn-primary btn-sm" data-target="#edit<?php echo $akh['c_katmapel']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a onclick="return confirm('Yakin Menghapus Kategori Ini?')" href="<?php echo $basead; ?>a-control/<?php echo md5('hapuskatmapel'); ?>/<?php echo $akh['c_katmapel']; ?>" class="btn btn-circle btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="edit<?php echo $akh['c_katmapel']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%;">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-list-alt"></i> Edit Kategori Mapel</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('editkatmapel'); ?>/access" method="post">
        <input type="hidden" name="c_katmapel" class="form-control" value="<?php echo $akh['c_katmapel']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>KATEGORI MAPEL</label>
            <input type="text" name="katmapel" class="form-control" value="<?php echo $akh['katmapel']; ?>">
          </div>
          <div class="form-group">
            <label>POSISI</label>
            <input type="text" name="posisi" class="form-control" onkeypress="return hanyaangka(event)" value="<?php echo $akh['posisi']; ?>">
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
            <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-list-alt"></i> Tambah Kategori Mapel</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('addkatmapel'); ?>/access" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>KATEGORI MAPEL</label>
            <input type="text" name="katmapel" class="form-control">
          </div>
          <div class="form-group">
            <label>POSISI</label>
            <input type="text" name="posisi" class="form-control" onkeypress="return hanyaangka(event)">
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
