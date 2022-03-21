<?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Nilai Ulangan Harian Berhasil Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Nilai Ulangan Harian Berhasil Di Setel Ulang
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } $_SESSION['pesan'] = '';?>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
        	<?php $aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc"); foreach($aspekuh as $haspekuh){ ?>
        		<li <?php if(isset($_SESSION['posuh']) and $_SESSION['posuh']==$haspekuh['c_aspekuh']){echo 'class="active"';} ?>><a href="#<?php echo $haspekuh['c_aspekuh']; ?>" data-toggle="tab"><?php echo $haspekuh['ket']; ?></a></li>
       		<?php } ?>
        </ul>
        <div class="tab-content">
          <!-- Font Awesome Icons -->
          <?php foreach($aspekuh as $haspekuh){ ?>
          <div class="tab-pane <?php if($_SESSION['posuh']==$haspekuh['c_aspekuh']){echo 'active';} ?>" id="<?php echo $haspekuh['c_aspekuh']; ?>">
          	<form action="<?php echo $basegu; ?>a-guru/<?php echo md5('inputnilaiuh'); ?>/access" method="post">
		        <input type="hidden" name="c_aspekuh" value="<?php echo $haspekuh['c_aspekuh']; ?>">
		        <input type="hidden" name="c_kelas" value="<?php echo $_GET['q'] ?>">
		        <input type="hidden" name="c_mapel" value="<?php echo $_GET['r'] ?>">
          		<table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th>NILAI <?php echo $haspekuh['ket'] ?></th>
                  <th>PREDIKAT</th>
                </tr>
                </thead>
                <tbody>
                <?php $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc "); $no=1; while($hlsis=mysqli_fetch_array($lsis)){
                  //ambilnilai untuk ditampilkan 
                  $amnil=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]'  and c_mapel='$_GET[r]' ")); ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hlsis['nisn']; ?></td>
                    <td><?php echo $hlsis['nama']; ?></td>
                    <td>
                      <input autocomplete="off" style="width:80px;" type="" onkeyup="numberbox()" name="nilaiuh[]" class="form-control" onkeypress="return hanyaangka(event)" value="<?php if($amnil['nilai']<1){echo '0';}else{ echo $amnil['nilai']; } ?>">
                    </td>
                    
                    <td><?php echo predikat($amnil['nilai'],$mapel['sl']); ?></td>
                  </tr>
                <?php $no++; } ?>
                </tbody>
              </table>
              <div id="inputnilaiuh<?php echo $haspekuh['c_aspekuh']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog" style="width:35%;">
							    <div class="modal-content">
							      <div class="modal-header text-center bg-success">
							        <?php echo '<h4>Nilai '.$haspekuh['ket'].'</h4>'; ?>
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
							<div class="box-footer"><a data-target="#inputnilaiuh<?php echo $haspekuh['c_aspekuh']; ?>" data-toggle="modal" class="btn btn-success" href="">Simpan Nilai</a> &nbsp;&nbsp;
		          	<?php $ceknil=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiuh where c_kelas='$_GET[q]' and c_mapel='$_GET[r]' and c_aspekuh='$haspekuh[c_aspekuh]' and c_ta='$c_ta' ")); if($ceknil==NULL){ ?>
		            <input type="reset" value="Kosongkan" class="btn btn-danger">
		          <?php }else{ ?>
							<div id="setelulang<?php echo $haspekuh['c_aspekuh']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog" style="width:35%;">
							    <div class="modal-content">
							      <div class="modal-header text-center bg-danger">
							        <?php echo '<h4>Nilai '.$haspekuh['ket'].'</h4>'; ?>
							      </div>
							      <div class="modal-body">
							        <h4>Anda Akan Melakukan Setel Ulang Nilai, Semua Nilai Akan Terhapus</h4><br>Apakah Anda Yakin?
							      </div>
							      <div class="modal-footer text-center">
							        <a href="<?php echo $basegu; ?>a-guru/<?php echo md5('setelulanguh').'/'.$_GET['q'].'/'.$_GET['r'].'/'.$haspekuh['c_aspekuh'].''; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
							        <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
							      </div>
							    </div>
							  </div>
							</div>
		            <a data-target="#setelulang<?php echo $haspekuh['c_aspekuh']; ?>" data-toggle="modal" class="btn btn-danger" href="">Setel Ulang Nilai</a>
		          <?php } ?>
		          </div>
            </form>
          </div>
          <?php } ?>
        </div>