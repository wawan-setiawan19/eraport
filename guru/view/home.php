<?php $lkel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");while($hlkel=mysqli_fetch_array($lkel)){ 
  $jma=mysqli_query($con,"SELECT * FROM gurumapel where c_guru='$_SESSION[c_guru]' and c_kelas='$hlkel[c_kelas]' ");
  $jmapel=mysqli_num_rows($jma); if($jmapel>0) {
  while($hmapel=mysqli_fetch_array($jma)){ 
    $map=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaitugas,(SELECT count(nilai) FROM nilaimid where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaimid,(SELECT count(nilai) FROM nilaiuas where c_ta='$c_ta' and c_kelas='$hlkel[c_kelas]' and c_mapel='$hmapel[c_mapel]') as nilaiuas FROM mapel where c_mapel='$hmapel[c_mapel]' "); foreach($map as $hmap);
      if($hmap['nilaiuh']==0){$peruh= 0;}else{$peruh= 25;}
      if($hmap['nilaitugas']==0){$pertugas= 0;}else{$pertugas= 25;}
      if($hmap['nilaimid']==0){$permid= 0;}else{$permid= 25;}
      if($hmap['nilaiuas']==0){$peruas= 0;}else{$peruas= 25;}
      $presentase = $peruh+$pertugas+$permid+$peruas;
      $jinputnilai= $hmap['nilaiuh']+$hmap['nilaitugas']+$hmap['nilaimid']+$hmap['nilaiuas'];
?>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="<?php echo $basegu.'inputnilai/'.$hlkel['c_kelas'].'/'.$hmapel['c_mapel'].'/_'; ?>">
                <?php
                if($presentase>=0 and $presentase<=25){$bg='bg-red';}
                else if($presentase>=26 and $presentase<=50){$bg='bg-yellow';}
                else if($presentase>=51 and $presentase<=75){$bg='bg-blue';}
                else if($presentase==100){$bg='bg-green';}
                ?>
                <div class="info-box <?php echo $bg; ?>">
                  <span class="info-box-icon" style="font-size: 20px;"><?php echo $presentase; ?>%</span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo $hmap['mapel']; ?></span>
                    <span class="info-box-number"><?php echo $hlkel['kelas']; ?></span>

                    <div class="progress">
                      <div class="progress-bar" style="width: <?php echo $presentase; ?>%"></div>
                    </div>
                        <span class="progress-description">
                          <?php echo $jinputnilai; ?> Nilai Telah Diinputkan
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                </a>
              </div>
            <?php } ?>
      <?php } } ?>