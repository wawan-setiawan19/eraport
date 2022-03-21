<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Wali Kelas Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } else if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='gagal'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Gagal Menginputkan, Wali Kelas Sudah Ada
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-star-empty"></i> Tambah Wali Kelas</h3><span style="float:right;"><a href="<?php echo $basead.'walikelas'; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-th-list"></i> Lihat Wali Kelas</a></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('addwalikelas'); ?>/access">
              <div class="box-body">
                <div class="form-group">
                  <label>PILIH GURU</label>
                  <select name="c_guru" class="form-control" id="select2">
                    <option>-</option>
                    <?php $gu=mysqli_query($con,"SELECT * FROM guru order by nama asc ");
                    while($fgu=mysqli_fetch_array($gu)){
                      echo '<option value="'.$fgu['c_guru'].'">'.$fgu['nama'].'</option>';
                    }?>

                  </select>
                </div>
                <div class="form-group">
                  <label>PILIH KELAS</label>
                  <select name="c_kelas" class="form-control" id="select3">
                    <option>-</option>
                    <?php $kel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");
                    while($fkel=mysqli_fetch_array($kel)){
                      echo '<option value="'.$fkel['c_kelas'].'">'.$fkel['kelas'].'</option>';
                    }?>

                  </select>
                </div>
                <div class="form-group">
                  <label>TTD Walikelas</label>
                  <input type="text" required="" name="ttdwalikelas" class="form-control">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>USERNAME</label>
                      <input type="text" required="" name="username" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>PASSWORD</label>
                      <input type="text" required="" name="password" class="form-control">
                    </div>
                  </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan Wali Kelas</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
</div>