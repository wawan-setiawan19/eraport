          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-print"></i> Print Nilai Per-Mapel <?php echo $kel['kelas']; ?></h3><span style="float:right;"><!--<a target="_blank" href="<?php echo $basewa; ?>printrapot?print=rapot&kelas=<?php echo $kel['c_kelas']; ?>&ta=<?php echo $c_ta; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print Rapot</a>--></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>MATA PELAJARAN</th>
                  <th>KKM</th>
                  <th width="10%">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM mapel order by mapel asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['mapel']; ?></td>
                  <td><?php echo $akh['sl']; ?></td>
                  <td><a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('exportpermapel').'/'.$akh['c_mapel'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm bg-maroon">Export Nilai</a></td>
                </tr>
                <?php $vr++; } ?>
              </tbody>
            </table>
          </div>
      </div>