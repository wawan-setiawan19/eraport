        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Wali Murid Berhasil Disetting
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-star-empty"></i> Ganti Password Admin</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('gantipassword'); ?>/access">
            <input type="hidden" name="c_admin" class="form-control" value="<?php echo $na['c_admin']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>NAMA ADMIN</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $na['nama']; ?>">
                </div>
                <div class="form-group">
                  <label>USERNAME</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $na['username']; ?>">
                </div>
                <div class="form-group">
                  <label>PASSWORD LAMA</label>
                  <input type="password" name="passwordlama" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>PASSWORD BARU</label>
                  <input type="password" name="passwordbaru" class="form-control" required="">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan Perubahan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>