<?php $siswanya=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$siswa[c_siswa]' ")); ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="fa fa-asterisk"></i> Prestasi Siswa <?php echo $siswa['nama']; ?></h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>Ekstrakulikuler</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM prestasi left join extra on (prestasi.c_extra=extra.c_extra) where prestasi.c_siswa='$siswa[c_siswa]' "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['extra']; ?></td>
                  <td><?php echo $akh['ket']; ?></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->