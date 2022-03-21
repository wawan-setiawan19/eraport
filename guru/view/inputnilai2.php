<script type="text/javascript">
  $('#numberbox').keyup(function(){
    if($(this).val()<100){
      alert("Maksimal Nilai Adalah 100");
      $(this).val(100);
    }
  });
  }
</script>
<?php 
if(isset($_GET['q']) and isset($_GET['r'])){
  $kelas=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[q]' ")); $mapel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM mapel where c_mapel='$_GET[r]' "));
}
?>
<?php /*jumlah tipe nilai*/ $jtn=mysqli_query($con,"SELECT * FROM tipenilai");$hjtn=mysqli_num_rows($jtn); $js=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' ");$hjs=mysqli_num_rows($js);
/*rumusnya*/$harus=$hjtn*$hjs; echo ''; if($hjs==0){$persenan=0;}else{$persenan=100/$harus;}
/*nilai yg ada di database*/ $jn=mysqli_query($con,"SELECT * FROM nilai where c_ta='$c_ta' and c_mapel='$_GET[r]' and c_kelas='$_GET[q]' and nilai>0 "); $hjn=mysqli_num_rows($jn);
$presentase=number_format($hjn*$persenan);
?>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box box-danger">
            <div class="box-body">
              <h4> <i class="glyphicon glyphicon-pencil"></i> INPUT NILAI RAPORT<span class="pull-right"><div style="color:#428bca;">KELAS: <?php echo $kelas['kelas']; ?></div><div style="color:#5cb85c;">MATA PELAJARAN: <?php echo $mapel['mapel']; ?></div><div style="">KKM: <?php echo $mapel['sl']; ?></div></span></h4>
<?php $pro=mysqli_query($con,"SELECT * FROM tipenilai order by p asc ");$vr=1;while($duk=mysqli_fetch_array($pro)){ 
    if(empty($_GET['v'])){?>
      &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/'.$duk['c_tipenilai']; ?>" class="btn btn-default"><?php echo $duk['tipe']; ?></a>
    <?php } else{
      if($duk['c_tipenilai']==$_GET['v']){ ?>
        &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/'.$duk['c_tipenilai']; ?>" class="btn btn-primary"><?php echo $duk['tipe']; ?></a>
      <?php }else{ ?>
        &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/'.$duk['c_tipenilai']; ?>" class="btn btn-default"><?php echo $duk['tipe']; ?></a>
    <?php } } ?>
<?php } ?>
    <?php if($_GET['v']=='lihathasil'){?>
      &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/lihathasil'; ?>" class="btn btn-primary">Lihat Hasil Nilai ( <?php echo $presentase; ?>% )</a>
    <?php } else{ ?>
      &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/lihathasil'; ?>" class="btn btn-default">Lihat Hasil Nilai ( <?php echo $presentase; ?>% )</a>
    <?php } ?>
            </div>
          </div>
<?php if($_GET['v']=='_'){}
      else if($_GET['v']=='lihathasil'){?>
          <div class="box box-info">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <?php $lihtip=mysqli_query($con,"SELECT * FROM tipenilai order by p asc ");while($hlihtip=mysqli_fetch_array($lihtip)){echo '<th width="10%">'.$hlihtip['tipe'].'</th>';} ?>
                </tr>
                </thead>
                <tbody>
                <?php $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc "); $no=1; while($hlsis=mysqli_fetch_array($lsis)){ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hlsis['nisn']; ?></td>
                    <td><?php echo $hlsis['nama']; ?></td>
                      <?php $lihtip=mysqli_query($con,"SELECT * FROM tipenilai order by p asc ");while($hlihtip=mysqli_fetch_array($lihtip)){ 
                        $nil=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilai where c_ta='$c_ta' and c_tipenilai='$hlihtip[c_tipenilai]' and c_siswa='$hlsis[c_siswa]' and c_mapel='$_GET[r]' and c_kelas='$_GET[q]' "));
                        if($nil['nilai']<1){echo '<td><b></b></td>';}else{
                          if($nil['nilai'] < $mapel['sl']){
                            echo '<td><b style="color:#d9534f;">'.$nil['nilai'].'</b></td>';
                          }
                          else if($nil['nilai'] == $mapel['sl']){
                            echo '<td><b style="color:#428bca;">'.$nil['nilai'].'</b></td>';
                          }
                          else{
                            echo '<td><b>'.$nil['nilai'].'</b></td>';
                          } 
                        }                      
                      } ?>
                  </tr>
                <?php $no++; } ?>
                </tbody>
              </table>
            </div>
          </div>
      <?php }else{ ?>
      <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='selesai'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Nilai Berhasil Disimpan Ke Database
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='ulang'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Nilai Berhasil Di Setel Ulang
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php } $_SESSION['pesan'] = '';?>
      <div class="box box-info">
            <!-- /.box-header -->
        <form action="<?php echo $basegu; ?>a-guru/<?php echo md5('inputnilai'); ?>/access" method="post">
        <input type="hidden" name="c_tipenilai" value="<?php echo $_GET['v'] ?>">
        <input type="hidden" name="c_kelas" value="<?php echo $_GET['q'] ?>">
        <input type="hidden" name="c_mapel" value="<?php echo $_GET['r'] ?>">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <?php $htin=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tipenilai where c_tipenilai='$_GET[v]' "));echo '<th width="30%">'.$htin['tipe'].' ('.$htin['ket'].')</th>'; ?>
                  <th>PREDIKAT</th>
                </tr>
                </thead>
                <tbody>
                <?php $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc "); $no=1; while($hlsis=mysqli_fetch_array($lsis)){
                  //ambilnilai untuk ditampilkan 
                  $amnil=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilai where c_ta='$c_ta' and c_tipenilai='$_GET[v]' and c_siswa='$hlsis[c_siswa]' and c_mapel='$_GET[r]' and c_kelas='$_GET[q]' ")); ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hlsis['nisn']; ?></td>
                    <td><?php echo $hlsis['nama']; ?></td>
                    <td>
                      <input autocomplete="off" style="width:80px;" type="" onkeyup="numberbox()" name="nilsiswa[]" class="form-control" onkeypress="return hanyaangka(event)" value="<?php if($amnil['nilai']<1){}else{ echo $amnil['nilai']; } ?>">
                    </td>
                    
                    <td><?php echo predikat($amnil['nilai']); ?></td>
                  </tr>
                <?php $no++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
<div id="inputnilai" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:35%;">
    <div class="modal-content">
      <div class="modal-header text-center bg-success">
        <?php echo '<h4>'.$htin['tipe'].' ('.$htin['ket'].')</h4>'; ?>
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
            <div class="box-footer"><a data-target="#inputnilai" data-toggle="modal" class="btn btn-success" href="">Simpan Nilai</a> &nbsp;&nbsp;
          <?php $ceknil=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilai where c_kelas='$_GET[q]' and c_mapel='$_GET[r]' and c_tipenilai='$_GET[v]' ")); if($ceknil==NULL){ ?>
            <input type="reset" value="Kosongkan" class="btn btn-danger"></div>
        </form>
          <?php }else{ ?>
<div id="setelulang" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:35%;">
    <div class="modal-content">
      <div class="modal-header text-center bg-danger">
        <?php echo '<h4>'.$htin['tipe'].' ('.$htin['ket'].')</h4>'; ?>
      </div>
      <div class="modal-body">
        <h4>Anda Akan Melakukan Setel Ulang Nilai, Semua Nilai Akan Terhapus</h4><br>Apakah Anda Yakin?
      </div>
      <div class="modal-footer text-center">
        <a href="<?php echo $basegu; ?>a-guru/<?php echo md5('setelulang').'/'.$_GET['q'].'/'.$_GET['r'].'/'.$_GET['v'].''; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
        <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</a>
      </div>
    </div>
  </div>
</div>
            <a data-target="#setelulang" data-toggle="modal" class="btn btn-danger" href="">Setel Ulang Nilai</a>
          <?php } ?>
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
<?php } ?>