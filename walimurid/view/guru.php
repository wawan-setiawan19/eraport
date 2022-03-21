    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-edit"></i> Seluruh Guru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NIP</th>
                  <th>NAMA</th>
                  <th>TTL</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM guru order by nama asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nip']; ?></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td><?php echo $akh['temlahir'].', '.tgl($akh['tanglahir']).''; ?></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->