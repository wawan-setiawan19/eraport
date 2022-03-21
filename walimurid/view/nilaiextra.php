
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-edit"></i> Nilai Extra <?php echo $siswa['nama']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>Extra</th>
                  <th>Nilai</th>
                  <th>Predikat</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $extra= mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaiextra where c_ta='$c_ta' and c_extra=extra.c_extra and c_siswa='$siswa[c_siswa]' and c_kelas='$siswa[c_kelas]') as nilai FROM extra order by extra asc "); $rt=1;
                foreach($extra as $hextra){ ?>           
                <tr>
                  <td><?php echo $rt; ?></td>
                  <td><?php echo $hextra['extra']; ?></td>
                  <td><?php echo $hextra['nilai']; ?></td>
                  <td><?php echo predikat($hextra['nilai']); ?></td>
                </tr>
                <?php $rt++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>