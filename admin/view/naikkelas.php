<?php $poskelas=mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[q]' ");$dkelas=mysqli_fetch_array($poskelas);  ?>          
        <div class="box box-info">
            <div class="box-header with-border">
            <?php if(isset($_GET['q'])){ ?>
              <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Setting Siswa Naik Kelas Dari <?php echo $dkelas['kelas']; ?></h3><!--<span style="float:right;"><a href="<?php echo $basead; ?>addsiswa/<?php echo $_GET['q']; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</a></span>
            <?php }else{?>
              <h3 class="box-title"></span>&nbsp;<i class="glyphicon glyphicon-user"></i> Seluruh Siswa</h3>
            <?php } ?>-->
            </div>
            <!-- /.box-header -->
          <form action="<?php echo $basead; ?>a-control/<?php echo md5('naikkelas'); ?>/access" method="post">
            <input type="hidden" name="kelasasal" value="<?php echo $_GET['q']; ?>">
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%" align="center">NO</th>
                  <th><i class="glyphicon glyphicon-ok"></i></th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th>GENDER</th>
                  <th>TTL</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc "); $vr=1; foreach($smk as $akh){ ?>                
                <tr>
                  <td align="center"><?php echo $vr; ?></td>
                  <td><input type="checkbox" name="c_siswa[]" value="<?php echo $akh['c_siswa']; ?>"></td>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><a href="<?php echo $basead; ?>nilaisiswa/<?php echo $akh['c_siswa'].'/'.$akh['c_kelas']; ?>"><?php echo $akh['nama']; ?></a></td>
                  <td><?php if($akh['jk']=='L'){echo 'Laki - Laki';}elseif($akh['jk']=='P'){echo 'Perempuan';} ?></td>
                  <td><?php echo $akh['temlahir'].', '.tgl($akh['tanglahir']).''; ?></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer">
<div id="naikkelas" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Siswa Naik Kelas</h4>
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</button>
          <button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
        </div>
        </div>
    </div>
</div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Naik Ke Kelas</label>
                  <select class="form-control select" style="width:100%;" required="" name="kelasbaru">
                    <option>Pilih Kelas</option>
                    <?php $kels= mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");
                    foreach($kels as $hkels){ ?>
                      <option value="<?php echo $hkels['c_kelas']; ?>"> <?php echo $hkels['kelas']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Pastikan Telah Memilih Siswa dan Kelas</label><br>
                  <a data-target="#naikkelas" data-toggle="modal" class="btn bg-maroon">Proses Naik Kelas</a data-target="#edit<?php echo $akh['c_kelas']; ?>" data-toggle="modal">
                </div>
              </div>
            </div>
          </form>
        </div>
          