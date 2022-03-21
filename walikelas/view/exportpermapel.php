          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Export Nilai Per-Mapel <?php echo $kel['kelas']; ?></h3><span style="float:right;"><!--<a target="_blank" href="<?php echo $basewa; ?>printrapot?print=rapot&kelas=<?php echo $kel['c_kelas']; ?>&ta=<?php echo $c_ta; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print Rapot</a>--></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
              while($hex=mysqli_fetch_array($ex)){ ?>
              <h3><b style="color:#d81b60;"><?php echo $hex['katmapel']; ?></b></h3>
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="40%">MATA PELAJARAN</th>
                  <th>KKM</th>
                  <th width="10%">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT *,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['mapel']; ?></td>
                  <td><?php echo $akh['sl']; ?></td>
                  <td><a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('exportpermapel').'/'.$akh['c_mapel'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm bg-maroon">Export Nilai</a></td>
                </tr>
                <?php $vr++; } ?>
              </tbody>
            </table>
            <?php } ?>
          </div>
      </div>