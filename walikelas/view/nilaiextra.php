<?php $siswanya=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ")); ?>
<?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
<div style="display: none;" class="alert alert-success alert-dismissable">Nilai Extrakulikuler Berhasil Disimpan Ke Database
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
<?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
<div style="display: none;" class="alert alert-info alert-dismissable">Nilai Extrakulikuler Berhasil Di Setel Ulang
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
<?php } $_SESSION['pesan'] = '';?>

<div class="box box-info">
	<form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('inputnilaiextra'); ?>/access" method="post">
	<input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
	<input type="hidden" name="c_siswa" value="<?php echo $_GET['q'] ?>">
	<div id="inputnilaisik" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:35%;">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          <?php echo '<h4>Nilai Ekstrakulikuler</h4>'; ?>
        </div>
        <div class="modal-body">
          <h4>Anda Akan Menginputkan Nilai Ke Database</h4><br>Apakah Anda Yakin?
        </div>
        <div class="modal-footer text-center">
          <button class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</button> 
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
        </div>
      </div>
    </div>
  </div>
	<div class="box-header with-border">
    <h3 class="box-title">
      INPUT NILAI EXTRAKULIKULER | 
      NAMA : <?php echo $siswanya['nama']; ?> | 
      NISN : <?php echo $siswanya['nisn']; ?>
    </h3>
		<span class="pull-right">
			<a data-target="#inputnilaisik" data-toggle="modal" class="btn btn-success" href="">Simpan Nilai</a>&nbsp;&nbsp;
			<?php $ceknil=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiextra where c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_ta='$c_ta' ")); if($ceknil==NULL){ ?>
        <input type="reset" value="Kosongkan" class="btn btn-danger">
      <?php }else{ ?>
      <div id="setelulangsik" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:35%;">
          <div class="modal-content">
            <div class="modal-header text-center bg-red">
              <?php echo '<h4>Nilai Ekstrakulikuler</h4>'; ?>
            </div>
            <div class="modal-body">
              <h4>Anda Akan Melakukan Setel Ulang Nilai, Semua Nilai Akan Terhapus</h4><br>Apakah Anda Yakin?
            </div>
            <div class="modal-footer text-center">
              <a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('setelulangextra').'/'.$_GET['q'].'/'.$kel['c_kelas']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
              <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
            </div>
          </div>
        </div>
      </div>
        <a data-target="#setelulangsik" data-toggle="modal" class="btn btn-danger" href="">Setel Ulang Nilai</a>
      <?php } ?>
		</span>
	</div>
	<div class="box-body">
		<table id="" class="table table-stripped table-bordered table-hover">
			<thead>
				<tr><th width="5%">NO</th><th>EKSTRAKULIKULER</th><th width="10%">NILAI</th><th>KETERANGAN</th></tr>
			</thead>
			<tbody>
				<?php $extra= mysqli_query($con,"SELECT * FROM extra order by extra.extra asc "); 
        $no=1; foreach($extra as $hextra){
          $nilex= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiextra WHERE c_ta='$c_ta' and c_extra='$hextra[c_extra]' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' "));
        ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $hextra['extra']; ?></td>
          <td><input name="nilai[]" class="form-control" value="<?php echo $nilex['nilai']; ?>"></td>
					<td><textarea name="deskripsi[]" class="form-control"><?php echo $nilex['deskripsi']; ?></textarea></td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>
	</form>
</div>