<?php $search=str_replace("_", " ", $_GET['q']); $c=mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ");$hcs=mysqli_fetch_array($c); $bul=date('m'); //echo $cnisn['nisn']; ?>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
    <div class="box box-info">
      <div class="box-body">
       <i class="glyphicon glyphicon-search"></i> Hasil Pencarian NISN Atau NAMA Adalah 
      <span style="text-transform: uppercase;"><?php echo $hcs['nama']; ?></span>
      </div>
    </div>
  </div>
</div>
<?php if($hcs==NULL){ ?>
  <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="box box-danger">
        <div class="box-body"> <i class="glyphicon glyphicon-search"></i> Tidak Ada Siswa Yang Sesuai Dengan NISN Atau NAMA <?php echo $search; ?></div>
      </div>
    </div>
  </div>
<?php }else { ?>
  <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="box box-danger">
        <div class="box-header">
           <i class="glyphicon glyphicon-search"></i> <span style="text-transform: uppercase;"> <?php echo $hcs['nama']; ?></span>
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
  $pel=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT count(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$_GET[r]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $no=1;
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
                <td><?php echo $nilakhir; ?></td>
                <td><?php if($hpel['nilaiket']==0){echo '-';}else{ ?><a data-target="#ket<?php echo $hpel['c_mapel']; ?>" data-toggle="modal" class="btn btn-success btn-xs" href="">Lihat</a><?php } ?></td>
              </tr>
<?php } ?>
            </tbody>
            </table>
            <?php } ?>
          </div>
      </div>
    </div>
  </div>
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
              <?php $aspektug= mysqli_query($con,"SELECT * FROM aspektug order by c_aspektug asc"); foreach($aspektug as $haspektug){ $amniltug=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$haspektug[c_aspektug]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel='$hpel[c_mapel]' ")); if($amniltug==NULL){} else{ ?>
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
              <?php $aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc"); foreach($aspekuh as $haspekuh){ $amniluh=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel='$hpel[c_mapel]' ")); if($amniluh==NULL){} else{ ?>
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
              <?php $aspekket= mysqli_query($con,"SELECT * FROM aspekket order by c_aspekket asc"); foreach($aspekket as $haspekket){ $amnilket=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiket where c_ta='$c_ta' and c_aspekket='$haspekket[c_aspekket]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel='$hpel[c_mapel]' ")); if($amnilket==NULL){} else{ ?>
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