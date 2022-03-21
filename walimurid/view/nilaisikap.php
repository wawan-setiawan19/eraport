
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-edit"></i> Nilai Sikap <?php echo $siswa['nama']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>Aspek Sikap</th>
                  <th>Nilai</th>
                  <th>Predikat</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sikap= mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaisikap where c_ta='$c_ta' and c_aspeksikap=aspeksikap.c_aspeksikap and c_siswa='$siswa[c_siswa]' and c_kelas='$siswa[c_kelas]') as nilai FROM aspeksikap where c_kelas='$siswa[c_kelas]' order by ket asc "); $rt=1;
                foreach($sikap as $hsikap){ ?>           
                <tr>
                  <td><?php echo $rt; ?></td>
                  <td><?php echo $hsikap['ket']; ?></td>
                  <td><?php echo $hsikap['nilai']; ?></td>
                  <td><?php echo predikat($hsikap['nilai']); ?></td>
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