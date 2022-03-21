<?php $siswanya=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ")); ?>
<?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
<div style="display: none;" class="alert alert-success alert-dismissable">Nilai Sikap Berhasil Disimpan Ke Database
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
<?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
<div style="display: none;" class="alert alert-info alert-dismissable">Nilai Sikap Berhasil Di Setel Ulang
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
<?php } $_SESSION['pesan'] = '';?>

<div class="box box-info">
	<form action="<?php echo $basewa; ?>a-walikelas/<?php echo md5('inputnilaisik'); ?>/access" method="post">
	<input type="hidden" name="c_kelas" value="<?php echo $kel['c_kelas']; ?>">
	<input type="hidden" name="c_siswa" value="<?php echo $_GET['q'] ?>">
	<div id="inputnilaisik" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:35%;">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          <?php echo '<h4>Nilai Sikap</h4>'; ?>
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
      INPUT NILAI SIKAP | 
      NAMA : <?php echo $siswanya['nama']; ?> | 
      NISN : <?php echo $siswanya['nisn']; ?>
    </h3>
		<span class="pull-right">
			<a data-target="#inputnilaisik" data-toggle="modal" class="btn btn-success" href="">Simpan Nilai</a>&nbsp;&nbsp;
			<?php $ceknil=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaisikap where c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_ta='$c_ta' ")); if($ceknil==NULL){ ?>
        <input type="reset" value="Kosongkan" class="btn btn-danger">
      <?php }else{ ?>
      <div id="setelulangsik" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:35%;">
          <div class="modal-content">
            <div class="modal-header text-center bg-danger">
              <?php echo '<h4>Nilai Sikap</h4>'; ?>
            </div>
            <div class="modal-body">
              <h4>Anda Akan Melakukan Setel Ulang Nilai, Semua Nilai Akan Terhapus</h4><br>Apakah Anda Yakin?
            </div>
            <div class="modal-footer text-center">
              <a href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('setelulangsik').'/'.$_GET['q'].'/'.$kel['c_kelas']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
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
		<table id="example1" class="table table-stripped table-bordered">
			<thead>
				<tr><th width="5%">NO</th><th>ASPEK SIKAP</th><th>NILAI SIKAP</th><th>PREDIKAT</th></tr>
			</thead>
			<tbody>
				<?php $aspsi= mysqli_query($con,"SELECT * FROM aspeksikap where c_kelas='$kel[c_kelas]' order by ket asc "); $no=1; foreach($aspsi as $haspsi){ 
				$amnil=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaisikap where c_ta='$c_ta' and c_aspeksikap='$haspsi[c_aspeksikap]' and c_siswa='$siswanya[c_siswa]' and c_kelas='$wali[c_kelas]' ")); ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $haspsi['ket']; ?></td>
					<td><input autocomplete="off" style="width:80px;" type="" onkeyup="numberbox()" name="nilaisik[]" class="form-control" onkeypress="return hanyaangka(event)" value="<?php if($amnil['nilai']<1){echo '0';}else{ echo $amnil['nilai']; } ?>"></td>
					<?php
          if($amnil['nilai']>=90 and $amnil['nilai']<=100){
            $predikat='A';
          }
          else if($amnil['nilai']>=80 and $amnil['nilai']<=89){
            $predikat='B+';
          }
          else if($amnil['nilai']>=70 and $amnil['nilai']<=79){
            $predikat='B';
          }
          else if($amnil['nilai']>=41 and $amnil['nilai']<=69){
            $predikat='C';
          }
          else if($amnil['nilai']>0 and $amnil['nilai']<=40){
            $predikat='D';
          }
          else{$predikat='-';}
          ?>
          <td><?php echo $predikat; ?></td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>
	</form>
</div>