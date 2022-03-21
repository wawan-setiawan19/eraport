            <div class="box">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th>UH</th>
                  <th>TUGAS</th>
                  <th>PTS</th>
                  <th>PAS</th>
                  <th width="10%">NILAI ASLI</th>
                  <th width="10%">NILAI AKHIR</th>
                  <th>KETERAMPILAN</th>                
                </tr>
                </thead>
                <tbody>
                <?php $lsis=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[q]' and c_mapel='$_GET[r]') as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[q]' and c_mapel='$_GET[r]') as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[q]' and c_mapel='$_GET[r]') as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[q]' and c_mapel='$_GET[r]') as nilaiuas,(SELECT count(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[q]' and c_mapel='$_GET[r]') as nilaiket FROM siswa where c_kelas='$_GET[q]' order by nama asc "); $no=1; foreach($lsis as $hlsis){
                  require 'view/rumus/nilaipermapel.php';
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $hlsis['nisn']; ?></td>
                    <td><?php echo $hlsis['nama']; ?></td>
                    <td><?php if($hlsis['nilaiuh']==0){echo '-';}else{ ?><a data-target="#uh<?php echo $hlsis['c_siswa']; ?>" data-toggle="modal" class="btn btn-success btn-xs" href="">Nilai UH</a><?php } ?></td>
                    <td><?php if($hlsis['nilaitugas']==0){echo '-';}else{ ?><a data-target="#tugas<?php echo $hlsis['c_siswa']; ?>" data-toggle="modal" class="btn btn-success btn-xs" href="">Nilai Tugas</a><?php } ?></td>
                    <td><?php if($hlsis['nilaimid']==NULL){echo '-';}else{ echo $hlsis['nilaimid'];} ?></td>
                    <td><?php if($hlsis['nilaiuas']==NULL){echo '-';}else{ echo $hlsis['nilaiuas'];} ?></td>
                    <td><?php echo $nilasli; ?></td>
                    <td><?php echo koma($nilakhir); ?></td>
                    <td><?php if($hlsis['nilaiket']==0){echo '-';}else{ ?><a data-target="#ket<?php echo $hlsis['c_siswa']; ?>" data-toggle="modal" class="btn btn-success btn-xs" href="">Lihat</a><?php } ?></td>
                  </tr>                  
                <?php $no++; } ?>
                </tbody>
              </table>
            </div>
<?php foreach($lsis as $hlsis){ ?>
  <div id="tugas<?php echo $hlsis['c_siswa']; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          Nilai Tugas (<?php echo $hlsis['nama']; ?>)
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr><th>KETERANGAN</th><th>NILAI</th></tr>
            </thead>
            <tbody>
              <?php $aspektug= mysqli_query($con,"SELECT * FROM aspektug order by c_aspektug asc"); foreach($aspektug as $haspektug){ $amniltug=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$haspektug[c_aspektug]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' ")); if($amniltug==NULL){} else{ ?>
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
  <div id="uh<?php echo $hlsis['c_siswa']; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          Nilai Ulangan Harian (<?php echo $hlsis['nama']; ?>)
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr><th>KETERANGAN</th><th>NILAI</th></tr>
            </thead>
            <tbody>
              <?php $aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc"); foreach($aspekuh as $haspekuh){ $amniluh=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' ")); if($amniluh==NULL){} else{ ?>
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
  <div id="ket<?php echo $hlsis['c_siswa']; ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center bg-blue">
          Nilai Keterampilan (<?php echo $hlsis['nama']; ?>)
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr><th>KETERANGAN</th><th>NILAI</th></tr>
            </thead>
            <tbody>
              <?php $aspekket= mysqli_query($con,"SELECT * FROM aspekket order by c_aspekket asc"); foreach($aspekket as $haspekket){ $amnilket=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiket where c_ta='$c_ta' and c_aspekket='$haspekket[c_aspekket]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' ")); if($amnilket==NULL){} else{ ?>
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