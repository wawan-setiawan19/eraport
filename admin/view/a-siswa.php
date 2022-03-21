<?php 
if(isset($_GET['q'])){
  $poskelas=mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[q]' ");$dkelas=mysqli_fetch_array($poskelas); 
}
?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Siswa Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Siswa Berhasil Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <?php if(isset($_GET['q'])){ ?>
              <div class="modal fade" id="modimp">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h5>IMPORT SISWA UNTUK KELAS <?php echo $dkelas['kelas']; ?></h5>
                      <p>Jika Belum Punya Template Import Silahkan Download <a href="<?php echo $base.'media/template/IMPORT SISWA.xlsx'; ?>">Disini</a></p>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('importsiswa'); ?>/access">
                    <input type="hidden" name="c_kelas" value="<?php echo $dkelas['c_kelas']; ?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Pilih File Import</label>
                        <input type="file" name="fileimport" class="form-control" required="">
                      </div>
                      <button class="btn bg-blue btn-sm">Lanjutkan</button>
                      <a data-dismiss="modal" class="btn btn-default btn-sm">Tutup</a>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Seluruh Siswa Kelas <?php echo $dkelas['kelas']; ?></h3><span style="float:right;"><a href="<?php echo $basead; ?>addsiswa/<?php echo $_GET['q']; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</a> <a data-toggle="modal" data-target="#modimp" class="btn bg-navy btn-sm">Import Siswa</a></span>
            <?php }else{?>
              <h3 class="box-title"></span>&nbsp;<i class="glyphicon glyphicon-user"></i> Seluruh Siswa</h3>
            <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>FOTO</th>
                <?php if(empty($_GET['q'])){
                  echo '<th width="12%">KELAS</th>';
                } ?>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th>GENDER</th>
                  <th>TTL</th>
                  <th width="25%">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php
if(isset($_GET['q'])){
  $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc ");
}else{
  $smk=mysqli_query($con,"SELECT * FROM siswa order by nama asc ");
}             $vr=1;while($akh=mysqli_fetch_array($smk)){ $kk=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' ")); ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <?php if($akh['foto_siswa']!=null){ ?>
                  <td><img src="<?php echo $base.$akh['foto_siswa']; ?>" style="width:60px; height: 60px;"></td>
                  <?php }else{ ?>
                  <td><img src="<?php echo $base.'media/fotosiswa/default.png'; ?>" style="width:60px; height: 60px;"></td>
                  <?php } ?>
                  <?php if(empty($_GET['q'])){
                    echo '<td>'.$kk['kelas'].'</td>';
                  }?>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><a href="<?php echo $basead; ?>nilaisiswa/<?php echo $akh['c_siswa'].'/'.$akh['c_kelas']; ?>"><?php echo $akh['nama']; ?></a></td>
                  <td><?php if($akh['jk']=='L'){echo 'Laki - Laki';}elseif($akh['jk']=='P'){echo 'Perempuan';} ?></td>
                  <td><?php echo $akh['temlahir'].', '.tgl($akh['tanglahir']).''; ?></td>
                  <td>
                  <a href="<?php echo $basead; ?>editwalimurid/<?php echo $akh['c_siswa']; ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-star-empty"></i> Wali Murid</a>
                  <a href="<?php echo $basead; ?>editsiswa/<?php echo $akh['c_siswa']; ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_siswa']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="hapus<?php echo $akh['c_siswa']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Siswa</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Ini, Akan Berpengaruh Pada</p>
          <b>1. Data Nilai Dari Siswa Tersebut Akan Terhapus<br>2. Data Setting Rapot Dari Siswa Tersebut Akan Terhapus<br>3. Data Jumlah Nilai Dari Siswa Tersebut Akan Terhapus<br>4. Data Walimurid Dari Siswa Tersebut Akan Terhapus<br>5. Data Ekstrakulikuler Dari Siswa Tersebut Akan Terhapus</b>
        </div>
        <div class="modal-footer">
        <?php if(isset($_GET['q'])){ ?>
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapussiswa').'/'.$akh['c_siswa']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
        <?php }else{ ?>
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapussiswa2').'/'.$akh['c_siswa']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
        <?php } ?><button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
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