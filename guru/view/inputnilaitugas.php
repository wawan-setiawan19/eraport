<?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Nilai Tugas Berhasil Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Nilai Tugas Berhasil Di Setel Ulang
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } $_SESSION['pesan'] = '';?>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
        	<?php $aspektug= mysqli_query($con,"SELECT * FROM aspektug order by c_aspektug asc"); foreach($aspektug as $haspektug){ ?>
        		<li <?php if(isset($_SESSION['postug']) and $_SESSION['postug']==$haspektug['c_aspektug']){echo 'class="active"';} ?>><a href="#<?php echo $haspektug['c_aspektug']; ?>" data-toggle="tab"><?php echo $haspektug['ket']; ?></a></li>
       		<?php } ?>
        </ul>
        <div class="tab-content">
          <!-- Font Awesome Icons -->
          <?php foreach($aspektug as $haspektug){ ?>
          <div class="tab-pane <?php if($_SESSION['postug']==$haspektug['c_aspektug']){echo 'active';} ?>" id="<?php echo $haspektug['c_aspektug']; ?>">
          	<form action="<?php echo $basegu; ?>a-guru/<?php echo md5('inputnilaitug'); ?>/access" method="post">
		        <input type="hidden" name="c_aspektug" value="<?php echo $haspektug['c_aspektug']; ?>">
		        <input type="hidden" name="c_kelas" value="<?php echo $_GET['q'] ?>">
		        <input type="hidden" name="c_mapel" value="<?php echo $_GET['r'] ?>">
          		<table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th>NILAI <?php echo $haspektug['ket'] ?></th>
                  <th>PREDIKAT</th>
                </tr>
                </thead>
                <tbody>
                <?php $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc "); $no=1; while($hlsis=mysqli_fetch_array($lsis)){
                  //ambilnilai untuk ditampilkan 
                  $amnil=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$haspektug[c_aspektug]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' ")); ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hlsis['nisn']; ?></td>
                    <td><?php echo $hlsis['nama']; ?></td>
                    <td>
                      <input autocomplete="off" style="width:80px;" type="" onkeyup="numberbox()" name="nilaitug[]" class="form-control" onkeypress="return hanyaangka(event)" value="<?php if($amnil['nilai']<1){echo '0';}else{ echo $amnil['nilai']; } ?>">
                    </td>
                    
                    <td><?php echo predikat($amnil['nilai'],$mapel['sl']); ?></td>
                  </tr>
                <?php $no++; } ?>
                </tbody>
              </table>
              <div id="inputnilaitug<?php echo $haspektug['c_aspektug']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog" style="width:35%;">
							    <div class="modal-content">
							      <div class="modal-header text-center bg-green">
							        <?php echo '<h4>Nilai '.$haspektug['ket'].'</h4>'; ?>
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
							<div class="box-footer"><a data-target="#inputnilaitug<?php echo $haspektug['c_aspektug']; ?>" data-toggle="modal" class="btn btn-success" href="">Simpan Nilai</a> &nbsp;&nbsp;
		          	<?php $ceknil=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitugas where c_kelas='$_GET[q]' and c_mapel='$_GET[r]' and c_aspektug='$haspektug[c_aspektug]' and c_ta='$c_ta' ")); if($ceknil==NULL){ ?>
		            <input type="reset" value="Kosongkan" class="btn btn-danger">
		          <?php }else{ ?>
							<div id="setelulang<?php echo $haspektug['c_aspektug']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog" style="width:35%;">
							    <div class="modal-content">
							      <div class="modal-header text-center bg-danger">
							        <?php echo '<h4>Nilai '.$haspektug['ket'].'</h4>'; ?>
							      </div>
							      <div class="modal-body">
							        <h4>Anda Akan Melakukan Setel Ulang Nilai, Semua Nilai Akan Terhapus</h4><br>Apakah Anda Yakin?
							      </div>
							      <div class="modal-footer text-center">
							        <a href="<?php echo $basegu; ?>a-guru/<?php echo md5('setelulangtug').'/'.$_GET['q'].'/'.$_GET['r'].'/'.$haspektug['c_aspektug'].''; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
							        <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
							      </div>
							    </div>
							  </div>
							</div>
		            <a data-target="#setelulang<?php echo $haspektug['c_aspektug']; ?>" data-toggle="modal" class="btn btn-danger" href="">Setel Ulang Nilai</a>
		          <?php } ?>
		          </div>
            </form>
          </div>
          <?php } ?>
        </div>