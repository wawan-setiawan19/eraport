      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Pengaturan Berhasil Diubah
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-cog"></i> Pengaturan Aplikasi</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('aplikasi'); ?>/access">
              <div class="box-body">
                <div class="form-group">
                  <label>NAMA SEKOLAH</label>
                  <input type="text" name="namasek" class="form-control" value="<?php echo $aplikasi['namasek']; ?>">
                </div>
                <div class="form-group">
                  <label>ALAMAT SEKOLAH</label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $aplikasi['alamat']; ?>">
                </div>
                <div class="form-group">
                  <label>LOGO SEKOLAH</label>
                  <input type="file" name="gambar" accept="jpeg" class="form-control">
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <label>KEPALA SEKOLAH</label>
                    <input type="text" name="kepsek" class="form-control" value="<?php echo $aplikasi['kepsek']; ?>">
                  </div>
                  <div class="col-xs-6">
                    <label>NIP KEPALA SEKOLAH</label>
                    <input type="text" name="nipkepsek" class="form-control" value="<?php echo $aplikasi['nipkepsek']; ?>">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <label>Apakah Nilai Akhir Dengan Sistem Bagi?</label><br>
                    <label><input <?php if($aplikasi['dibagi']=='YES'){echo 'checked';} ?> type="radio" name="dibagi" value="YES"> YA</label>&nbsp;&nbsp;
                    <label><input <?php if($aplikasi['dibagi']=='NO'){echo 'checked';} ?> type="radio" name="dibagi" value="NO"> TIDAK</label>
                  </div>
                  <div class="col-md-6">
                    <label>Dibagi Berapa?</label>
                    <input type="text" name="berapa" class="form-control" value="<?php echo $aplikasi['berapa']; ?>">
                  </div>
                </div>
                <br>
                  <div class="form-group">
                    <label>Apakah Akan Menghapus Data Dari Tahun Akademik Sebelumnya Setelah Tahun Akademik Baru Diaktifkan?</label><br>
                    <label><input <?php if($aplikasi['hapsetaktif']=='YES'){echo 'checked';} ?> type="radio" name="hapsetaktif" value="YES"> YA</label>&nbsp;&nbsp;
                    <label><input <?php if($aplikasi['hapsetaktif']=='NO'){echo 'checked';} ?> type="radio" name="hapsetaktif" value="NO"> TIDAK</label>
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
      </div>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='editkog'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Sistem Penilaian Berhasil Diubah
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="glyphicon glyphicon-cog"></i> Pengaturan Sistem Penilaian</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('kognitif'); ?>/access">
              <div class="box-body">
                <p>* <b>BOBOT PERSENTASE</b> Hanya Untuk Sistem <b>PERSENTASE</b></p>
                <table class="table table-bordered">
                  <thead><tr><th>JENIS NILAI</th><th>SISTEM NILAI</th><th width="15%">BOBOT PERSENTASE</th></tr></thead>
                  <tbody>
                    <?php $kog= mysqli_query($con,"SELECT * FROM tipekognitif order by c_tipekognitif asc ");foreach($kog as $hkog){ ?>
                      <input type="hidden" name="c_tipekognitif[]" value="<?php echo $hkog['c_tipekognitif']; ?>">
                      <tr>
                        <td><?php echo $hkog['ket'] ?></td>
                        <td>
                          <select name="tipe[]" class="form-control select" style="width:100%;">
                            <option <?php if($hkog['tipe']=='rata'){echo 'selected';} ?> value="rata">RATA-RATA</option>
                            <option <?php if($hkog['tipe']=='asli'){echo 'selected';} ?> value="asli">NILAI MURNI</option>
                            <option <?php if($hkog['tipe']=='persen'){echo 'selected';} ?> value="persen">PERSENTASE</option>
                          </select>
                        </td>
                        <td>
                          <div class="form-group has-feedback">
                            <span class="form-control-feedback">%</span>
                            <input autocomplete="off" type="" onkeyup="numberbox()" name="persen[]" class="form-control" onkeypress="return hanyaangka(event)" value="<?php if($hkog['persen']<1){echo '0';}else{ echo $hkog['persen']; } ?>">
                            
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan Sistem Penilaian</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>