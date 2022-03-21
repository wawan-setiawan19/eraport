<?php $siswa= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' "); foreach($siswa as $hsiswa); ?>
  <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="box box-danger">
        <div class="box-header with-border"> <i class="glyphicon glyphicon-user"></i> 
          <span style="text-transform: uppercase;"> NILAI SISWA <?php echo $hsiswa['nama']; ?></span>
          <span style="float:right;"><!--<a target="_blank" href="<?php echo $basewa; ?>printnilaisiswa?print=nilaisiswa&kelas=<?php echo $kel['c_kelas']; ?>&ta=<?php echo $c_ta; ?>&siswa=<?php echo $hcs['c_siswa']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print</a>--></span>
        </div>
            <div class="box-body">
              <?php $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
              while($hex=mysqli_fetch_array($ex)){ ?>
              <h3><b style="color:#d81b60;"><?php echo $hex['katmapel']; ?></b></h3>
              <table class="table table-bordered table-hover">
              <thead>
               <tr>
                  <th width="5%">NO</th>
                  <th width="25%">MATA PELAJARAN</th>
                  <th width="10%">KKM</th>
                  <th>UH</th>
                  <th>TUGAS</th>
                  <th>MID</th>
                  <th>UAS</th>
                  <th width="10%">NILAI ASLI</th>
                  <th width="10%">NILAI AKHIR</th>
                  <th>KETERAMPILAN</th>
                </tr>
              </thead>
              <tbody>
<?php 
  $pel=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT count(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $no=1;
    foreach($pel as $hpel){
    require 'view/rumus/nilaipersiswa.php';
?>
               <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $hpel['mapel']; ?></td>
                <td><b><?php echo $hpel['sl']; ?></b></td> 
                <td><?php if($hpel['nilaiuh']==0){echo '-';}else{ ?><a data-target="#uh<?php echo $hpel['c_mapel']; ?>" data-toggle="modal" class="btn btn-success btn-xs" href="">Nilai UH</a><?php } ?></td>
                <td><?php if($hpel['nilaitugas']==0){echo '-';}else{ ?><a data-target="#tugas<?php echo $hpel['c_mapel']; ?>" data-toggle="modal" class="btn btn-success btn-xs" href="">Nilai Tugas</a><?php } ?></td>
                <td><?php if($hpel['nilaimid']==NULL){echo '-';}else{ echo $hpel['nilaimid'];} ?></td>
                <td><?php if($hpel['nilaiuas']==NULL){echo '-';}else{ echo $hpel['nilaiuas'];} ?></td>
                <td><?php echo $nilasli; ?></td>
                <td><?php echo koma($nilakhir); ?></td>
                <td><?php if($hpel['nilaiket']==0){echo '-';}else{ ?><a data-target="#ket<?php echo $hpel['c_mapel']; ?>" data-toggle="modal" class="btn btn-success btn-xs" href="">Lihat</a><?php } ?></td>
              </tr>
<?php } ?>
            </tbody>
            </table>
            <br>
<?php foreach($pel as $hpel){ ?>
  <div id="tugas<?php echo $hpel['c_mapel']; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          Nilai Tugas (<?php echo $hpel['mapel']; ?>)
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr><th>KETERANGAN</th><th>NILAI</th></tr>
            </thead>
            <tbody>
              <?php $aspektug= mysqli_query($con,"SELECT * FROM aspektug order by c_aspektug asc"); foreach($aspektug as $haspektug){ $amniltug=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$haspektug[c_aspektug]' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel='$hpel[c_mapel]' ")); if($amniltug==NULL){} else{ ?>
                <tr>
                  <td><?php echo $haspektug['ket'] ?></td>
                  <td><?php echo $amniltug['nilai']; ?></td>
                </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer text-center">
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="uh<?php echo $hpel['c_mapel']; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          Nilai Ulangan Harian (<?php echo $hpel['mapel']; ?>)
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr><th>KETERANGAN</th><th>NILAI</th></tr>
            </thead>
            <tbody>
              <?php $aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc"); foreach($aspekuh as $haspekuh){ $amniluh=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel='$hpel[c_mapel]' ")); if($amniluh==NULL){} else{ ?>
                <tr>
                  <td><?php echo $haspekuh['ket'] ?></td>
                  <td><?php echo $amniluh['nilai']; ?></td>
                </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer text-center">
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="ket<?php echo $hpel['c_mapel']; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          Nilai Keterampilan (<?php echo $hpel['mapel']; ?>)
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr><th>KETERANGAN</th><th>NILAI</th></tr>
            </thead>
            <tbody>
              <?php $aspekket= mysqli_query($con,"SELECT * FROM aspekket order by c_aspekket asc"); foreach($aspekket as $haspekket){ $amnilket=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiket where c_ta='$c_ta' and c_aspekket='$haspekket[c_aspekket]' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel='$hpel[c_mapel]' ")); if($amnilket==NULL){} else{ ?>
                <tr>
                  <td><?php echo $haspekket['ket'] ?></td>
                  <td><?php echo $amnilket['nilai']; ?></td>
                </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer text-center">
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
<?php } ?>
    <h3><b style="color:#d81b60;">Madrasah Diniyah</b></h3>
    <table class="table table-bordered">
      <tr class="text-center">
        <th width="2%" rowspan="2">No</th>
        <th rowspan="2" width="20%">Kitab</th>
        <th rowspan="2" width="2%">KKM</th>
        <th colspan="3">Nilai</th>
      </tr>
      <tr class="text-center">
        <th width="3%">Angka</th>
        <th width="5%">Predikat</th>
        <th>Keterangan</th>
      </tr>
      <?php 
      $md=mysqli_query($con,"SELECT * FROM mapelmd_kelas left join mapelmd on (mapelmd.id_mapelmd=mapelmd_kelas.id_mapelmd) where c_kelas='$kel[c_kelas]' order by nama_mapelmd asc "); $vr=1;
      while($hmd=mysqli_fetch_array($md)){
        $nilmd= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimd where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and id_mapelmd='$hmd[id_mapelmd]' "));
          echo '
          <tr>
            <td class="text-center">'.$vr.'</td>
            <td>'.$hmd['nama_mapelmd'].'</td>
            <td class="text-center"><b>'.$hmd['kkm_mapelmd'].'</b></td>
            <td class="text-center">'.koma($nilmd['nilai']).'</td>
            <td class="text-center">'.predikattambahan($nilmd['nilai'],$hmd['kkm_mapelmd']).'</td>
            <td>'.$nilmd['deskripsi'].'</td>
          </tr>
          ';
      $vr++; }
      ?>
    </table>
    <h3><b style="color:#d81b60;">Tahfidzul Quran</b></h3>
    <table class="table table-bordered">
      <tr class="text-center">
        <th width="2%">No</th>
        <th width="20%">Capaian</th>
        <th width="10%">Juz/Jilid</th>
        <th width="10%">Surat</th>
        <th width="10%">Ayat/Hal</th>
        <th>Deskripsi</th>
      </tr>
      <?php 
      $md=mysqli_query($con,"SELECT * FROM mapeltq_kelas left join mapeltq on (mapeltq.id_mapeltq=mapeltq_kelas.id_mapeltq) where c_kelas='$kel[c_kelas]' order by nama_mapeltq asc "); $vr=1;
      while($hmd=mysqli_fetch_array($md)){
        $niltq= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitq where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and id_mapeltq='$hmd[id_mapeltq]' "));
          echo '
          <tr>
            <td class="text-center">'.$vr.'</td>
            <td>'.$hmd['nama_mapeltq'].'</td>
            <td class="text-center">'.$niltq['juz'].'</td>
            <td class="text-center">'.$niltq['surat'].'</td>
            <td class="text-center">'.$niltq['ayat'].'</td>
            <td>'.$niltq['deskripsi'].'</td>
          </tr>
          ';
      $vr++; }
      ?>
    </table>
         </div>    
        </div>
      </div>
    </div>