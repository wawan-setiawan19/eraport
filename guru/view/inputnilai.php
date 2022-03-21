<script type="text/javascript">
  $('#numberbox').keyup(function(){
    if($(this).val()<100){
      alert("Maksimal Nilai Adalah 100");
      $(this).val(100);
    }
  });
</script>
<?php 
if(isset($_GET['q']) and isset($_GET['r'])){
  $kelas=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[q]' ")); $mapel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM mapel where c_mapel='$_GET[r]' "));
}
?>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box box-danger">
            <div class="box-body">
              <h4> <i class="glyphicon glyphicon-pencil"></i> INPUT NILAI RAPORT<span class="pull-right"><div style="color:#428bca;">KELAS: <?php echo $kelas['kelas']; ?></div><div style="color:#5cb85c;">MATA PELAJARAN: <?php echo $mapel['mapel']; ?></div><div style="">KKM: <?php echo $mapel['sl']; ?></div></span></h4>
              &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/uh'; ?>" <?php if($_GET['v']=='uh'){echo 'class="btn btn-primary btn-sm"';}else {echo 'class="btn btn-default btn-sm"';} ?>>ULANGAN HARIAN</a>
              &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/tugas'; ?>" <?php if($_GET['v']=='tugas'){echo 'class="btn btn-primary btn-sm"';}else {echo 'class="btn btn-default btn-sm"';} ?>>TUGAS</a>
              &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/mid'; ?>" <?php if($_GET['v']=='mid'){echo 'class="btn btn-primary btn-sm"';}else {echo 'class="btn btn-default btn-sm"';} ?>>PTS</a>
              &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/uas'; ?>" <?php if($_GET['v']=='uas'){echo 'class="btn btn-primary btn-sm"';}else {echo 'class="btn btn-default btn-sm"';} ?>>PAS</a>
              &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/hasilnilai'; ?>" <?php if($_GET['v']=='hasilnilai'){echo 'class="btn btn-primary btn-sm"';}else {echo 'class="btn btn-default btn-sm"';} ?>>HASIL NILAI</a>
         			&nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/keterampilan'; ?>" <?php if($_GET['v']=='keterampilan'){echo 'class="btn btn-primary btn-sm"';}else {echo 'class="btn btn-default btn-sm"';} ?>>KETERAMPILAN</a>
              &nbsp;<a href="<?php echo $basegu.'inputnilai/'.$_GET['q'].'/'.$_GET['r'].'/deskripsirapot'; ?>" <?php if($_GET['v']=='deskripsirapot'){echo 'class="btn btn-primary btn-sm"';}else {echo 'class="btn btn-default btn-sm"';} ?>>DESKRIPSI RAPOT</a>
              &nbsp;<a data-toggle="modal" data-target="#modimpnil" class="btn bg-navy btn-sm">Import Nilai</a>
            </div>
          </div>
<?php 
if($_GET['v']=='_'){}
else if($_GET['v']=='uh'){ require 'view/inputnilaiuh.php'; }
else if($_GET['v']=='tugas'){ require 'view/inputnilaitugas.php'; }
else if($_GET['v']=='mid'){ require 'view/inputnilaimid.php'; }
else if($_GET['v']=='uas'){ require 'view/inputnilaiuas.php'; }
else if($_GET['v']=='hasilnilai'){ require 'view/hasilnilaimapel.php'; }
else if($_GET['v']=='keterampilan'){ require 'view/inputnilaiket.php'; }
else if($_GET['v']=='deskripsirapot'){ require 'view/inputdeskripsirapot.php'; }

?>
              <div class="modal fade" id="modimpnil">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h5>IMPORT NILAI SISWA</h5><h5>MAPEL <?php echo $mapel['mapel']; ?></h5><h5>KELAS <?php echo $kelas['kelas']; ?></h5>
                      <p>Jika Belum Punya Template Import Silahkan Download <a href="<?php echo $basegu.'a-guru/'.md5('templatenilai').'/'.$mapel['c_mapel'].'/'.$kelas['c_kelas']; ?>">Disini</a></p>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basegu; ?>a-guru/<?php echo md5('importnilai'); ?>/access">
                    <input type="hidden" name="c_kelas" value="<?php echo $kelas['c_kelas']; ?>">
                    <input type="hidden" name="c_mapel" value="<?php echo $mapel['c_mapel']; ?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Pilih File Import</label>
                        <input type="file" name="fileimport" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label><input type="checkbox" name="nilaiuh" value="ya"> Nilai Ulangan Harian</label><br>
                        <label><input type="checkbox" name="nilaitug" value="ya"> Nilai Tugas</label><br>
                        <label><input type="checkbox" name="nilaimid" value="ya"> Nilai PTS</label><br>
                        <label><input type="checkbox" name="nilaiuas" value="ya"> Nilai PAS</label><br>
                        <label><input type="checkbox" name="hasilnilai" value="ya"> Hasil Nilai</label><br>
                        <label><input type="checkbox" name="nilaiket" value="ya"> Nilai Keterampilan</label><br>
                        
                      </div>
                      <button class="btn bg-blue btn-sm">Lanjutkan</button>
                      <a data-dismiss="modal" class="btn btn-default btn-sm">Tutup</a>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
    </div>
  </div>
  <!-- /.row -->