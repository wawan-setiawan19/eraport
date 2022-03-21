<?php $eg=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$_GET[q]' ")); ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
<?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
<script type="text/javascript">
  $(document).ready(function(){
    iziToast.show({timeout:5000,color:'green',title: 'Berhasil Edit Guru',position: 'topLeft',pauseOnHover: true,transitionIn: false,progressBarColor:'#fff'});
  });
</script>
<?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-edit"></i> Edit Data Guru</h3><span style="float:right;"><a href="<?php echo $basead.'guru'; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-th-list"></i> Lihat Guru</a></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('editguru'); ?>/access">
             <input type="hidden" name="c_guru" class="form-control" value="<?php echo $eg['c_guru']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="nip" class="form-control" value="<?php echo $eg['nip']; ?>">
                </div>
                <div class="form-group">
                  <label>NAMA</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $eg['nama']; ?>">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ALAMAT LAHIR</label>
                      <input type="text" required="" name="alamat" class="form-control" value="<?php echo $eg['temlahir']; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>TANGGAL LAHIR</label>
                      <div class="controls input-append date form_date" data-date="1998-10-14" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                          <input class="form-control" type="text" name="tl" value="<?php echo $eg['tanglahir']; ?>" required="">
                          <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>USERNAME</label>
                      <input type="text" required="" name="username" class="form-control" value="<?php echo $eg['username']; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>PASSWORD</label>
                      <input type="text" required="" name="password" class="form-control" value="<?php echo $eg['password']; ?>">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
</div>
<!-- jQuery 2.2.3 -->
<script src="<?php echo $base; ?>theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>theme/datetime/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $base; ?>theme/datetime/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>