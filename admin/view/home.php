<?php
$jsi=mysqli_query($con,"SELECT * FROM siswa ");$hsi=mysqli_num_rows($jsi);
$jgu=mysqli_query($con,"SELECT * FROM guru ");$hgu=mysqli_num_rows($jgu);
$jwam=mysqli_query($con,"SELECT * FROM walimurid ");$hwam=mysqli_num_rows($jwam);
$jmapel=mysqli_query($con,"SELECT * FROM mapel ");$hmapel=mysqli_num_rows($jmapel);
$kelkel=mysqli_query($con,"SELECT * FROM kelas ");$jkelkel=mysqli_num_rows($kelkel);?>

<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <a href="<?php echo $basead; ?>siswa"><div class="info-box bg-blue">
      <span class="info-box-icon"><i class="glyphicon glyphicon-education"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">siswa</span>
          <span class="info-box-number"><?php echo $hsi; ?></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            E-RAPORT
          </span>
        </div>
    </div></a>
    <a href="<?php echo $basead; ?>guru"><div class="info-box bg-green">
      <span class="info-box-icon"><i class="glyphicon glyphicon-edit"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">guru</span>
          <span class="info-box-number"><?php echo $hgu; ?></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            E-RAPORT
          </span>
        </div>
    </div></a>
    <a href="<?php echo $basead; ?>walimurid"><div class="info-box bg-orange">
      <span class="info-box-icon"><i class="glyphicon glyphicon-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">wali murid</span>
          <span class="info-box-number"><?php echo $hwam; ?></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            E-RAPORT
          </span>
        </div>
    </div></a>
    <a href="<?php echo $basead; ?>kelas"><div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="glyphicon glyphicon-stats"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">kelas</span>
          <span class="info-box-number"><?php echo $jkelkel; ?></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            E-RAPORT
          </span>
        </div>
    </div></a>
    <a href="<?php echo $basead; ?>kategorimapel"><div class="info-box bg-fuchsia-active">
      <span class="info-box-icon"><i class="glyphicon glyphicon-list-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">mapel</span>
          <span class="info-box-number"><?php echo $hmapel; ?></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            E-RAPORT
          </span>
        </div>
    </div></a>
    <!--<div class="info-box bg-red">
      <span class="info-box-icon"><i class="glyphicon glyphicon-equalizer"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">data nilai</span>
          <span class="info-box-number"><?php echo $jdnil; ?></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            E-RAPORT
          </span>
        </div>
    </div>-->
  </div>
  <div class="col-xs-12 col-md-9 col-lg-9">
    <div class="box">
      <div class="box-header with-border bg-maroon">
        <h3 class="box-title"> <i class="glyphicon glyphicon-star-empty"></i> Peringkat Disetiap Kelas</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="5%">NO</th>
              <th>KELAS</th>
              <th>Peringkat 1</th>
              <th>Peringkat 2</th>
              <th>Peringkat 3</th>
            </tr>
          </thead>
          <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['kelas']; ?></td>
  <?php 
      $sql2=mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' and c_kelas='$akh[c_kelas]' order by nilaipresen desc limit 3"); $cie=mysqli_fetch_array($sql2);
      if($cie==NULL){
        echo '<td>-</td><td>-</td><td>-</td>';
      }
      else{
      $sql=mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' and c_kelas='$akh[c_kelas]' order by nilaipresen desc limit 3");
      while($hsql=mysqli_fetch_array($sql)){ 
        $siswa=mysqli_fetch_array(mysqli_query($con,"SELECT nisn,c_siswa,c_kelas,nama from siswa where c_siswa='$hsql[c_siswa]' "));?>
                  <td><a href="<?php echo $basead; ?>nilaisiswa/<?php echo $siswa['c_siswa'].'/'.$siswa['c_kelas']; ?>"><?php echo $siswa['nama']; ?></a></td>
  <?php } } ?>
                </tr>
<?php $vr++; } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="box">
      <div class="box-header with-border bg-maroon">
        <h3 class="box-title"> <i class="glyphicon glyphicon-star-empty"></i> Siswa Terbaik</h3>
      </div>
      <div class="box-body table-responsive">
        <table id="" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="5%">NO</th>
              <th>KELAS</th>
              <th>NAMA</th>
              <th>JUMLAH NILAI</th>
            </tr>
          </thead>
          <tbody>
  <?php 
      $sql=mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' order by nilaipresen desc limit 3"); $no=1;
      while($hsql=mysqli_fetch_array($sql)){ 
        $siswa=mysqli_fetch_array(mysqli_query($con,"SELECT c_kelas,nisn,nama from siswa where c_siswa='$hsql[c_siswa]' ")); $kelasnya=mysqli_fetch_array(mysqli_query($con,"SELECT kelas from kelas where c_kelas='$siswa[c_kelas]' ")); ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $kelasnya['kelas']; ?></td>
                    <td><?php echo $siswa['nama']; ?></td>
                    <td><?php echo $hsql['nilaipresen']; ?></td>
                  </tr>
  <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>





