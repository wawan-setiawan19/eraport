<?php $ed=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM gurumapel where c_gurumapel='$_GET[q]' ")); ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Guru Mapel Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } else if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='gagal'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Gagal Mengedit, Mapel Sudah Ada Gurunya
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-star-empty"></i> Edit Guru Mapel</h3><span style="float:right;"><a href="<?php echo $basead.'gurumapel'; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-th-list"></i> Lihat Guru Mapel</a></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('editgurumapel'); ?>/access">
              <input type="hidden" name="c_gurumapel" value="<?php echo $ed['c_gurumapel']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>PILIH GURU</label>
                  <select name="c_guru" class="form-control" id="select2">
                    <option>-</option>
                    <?php $gu=mysqli_query($con,"SELECT * FROM guru order by nama asc ");
                    while($fgu=mysqli_fetch_array($gu)){?>
                      <option <?php if($fgu['c_guru']==$ed['c_guru']){ echo 'selected';}?> value="<?php echo $fgu['c_guru']; ?>"><?php echo $fgu['nama'];?></option>
                    <?php }?>

                  </select>
                </div>
                <div class="form-group">
                  <label>PILIH KELAS</label>
                  <select name="c_kelas" class="form-control" id="select3">
                    <option>-</option>
                    <?php $kel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc ");
                    while($fkel=mysqli_fetch_array($kel)){?>
                      <option <?php if($fkel['c_kelas']==$ed['c_kelas']){ echo 'selected';}?> value="<?php echo $fkel['c_kelas']; ?>"><?php echo $fkel['kelas'];?></option>
                    <?php }?>

                  </select>
                </div>
               <div class="form-group">
                  <label>PILIH MATA PELAJARAN</label>
                  <select name="c_mapel" class="form-control" id="select4">
                    <option>-</option>
                    <?php $map=mysqli_query($con,"SELECT * FROM mapel order by mapel asc ");
                    while($fmap=mysqli_fetch_array($map)){?>
                     <option <?php if($fmap['c_mapel']==$ed['c_mapel']){ echo 'selected';}?> value="<?php echo $fmap['c_mapel']; ?>"><?php echo $fmap['mapel'];?></option>
                    <?php }?>

                  </select>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan Guru Mapel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
</div>