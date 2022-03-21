      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='chat'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Percakapan Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-user"></i> Seluruh Wali Murid</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>SISWA</th>
                  <th>WALI MURID</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$wali[c_kelas]' order by nama asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){ $csis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walimurid where c_siswa='$akh[c_siswa]' "));
?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td><?php echo $csis['nama']; ?></td>
                  <td><?php echo $csis['username']; ?></td>
                  <td><?php echo $csis['password']; ?></td>
                  <td width="20%">

                    <a href="<?php echo $basewa; ?>settingwalimurid/<?php echo $akh['c_siswa'].''; ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-cog"></i> Setting Wali Murid</a>
                  </td>
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