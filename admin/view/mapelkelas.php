<?php $kelas=mysqli_fetch_array(mysqli_query($con,"SELECT * from kelas where c_kelas='$_GET[q]' ")); ?>
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
  <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='berhasil'){?>
    <div style="display: none;" class="alert alert-success alert-dismissable">Perubahan Berhasil Disimpan
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
  <?php } $_SESSION['pesan'] = '';?>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"> <i class="glyphicon glyphicon-cog"></i> Setting Mapel Untuk Kelas <?php echo $kelas['kelas']; ?></h3>
    </div>
    <div class="box-body">
        <div class="box-body">
          <p><label>Pilih Mata Pelajaran Untuk Kelas Tersebut</label></p>
          <?php $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
          while($hex=mysqli_fetch_array($ex)){ ?>
            <form action="<?php echo $basead; ?>a-control/<?php echo md5('settingmapelkelas'); ?>/access" method="post">
            <!--<form action="" method="get">-->
            <input type="hidden" name="c_kelas" value="<?php echo $kelas['c_kelas']; ?>">
            <input type="hidden" name="c_katmapel" value="<?php echo $hex['c_katmapel']; ?>">
            <p><b style="color:#d81b60;"><?php echo $hex['katmapel']; ?></b></p>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="input-group">
                  <select class="form-control select input-sm" multiple="multiple" name="c_mapel[]">
                    <?php $smk=mysqli_query($con,"SELECT *,(select no from mapel_kelas where c_mapel=mapel.c_mapel and c_kelas='$kelas[c_kelas]') as no,(select count(*) from mapel_kelas where c_mapel=mapel.c_mapel and c_kelas='$kelas[c_kelas]') as ada FROM mapel where c_katmapel='$hex[c_katmapel]' order by no asc ");while($akh=mysqli_fetch_array($smk)){ if($akh['ada']>0){ $sel='selected';}else{$sel=''; }
                      echo '<option '.$sel.' value="'.$akh['c_mapel'].'">'.$akh['mapel'].'</option>';
                    } ?>
                  </select>
                  <span class="input-group-btn">
                    <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                  </span>
                </div>
              </div>
            </div>
            <br>
            <?php $mapelkel= mysqli_query($con,"SELECT *,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel FROM mapel_kelas where c_kelas='$kelas[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); if(mysqli_num_rows($mapelkel)>0){ ?>
              <label>Urutan Mapel</label>
                <?php while($mapk= mysqli_fetch_array($mapelkel)){ ?>
                <div class="">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <a class="btn btn-default btn-sm"><?php echo $mapk['mapel']; ?></a>
                    </div>
                    <!-- /btn-group -->
                    <input type="number" class="form-control input-sm" style="width:100px;" min="1" name="no[]" value="<?php echo $mapk['no']; ?>">
                  </div>
                </div>
                <?php } } ?>
            </form>
            <br>
          <?php } ?>
          <!-- mapel diniyah -->
          <form action="<?php echo $basead; ?>a-control/<?php echo md5('settingmapelmd'); ?>/access" method="post">
            <!--<form action="" method="get">-->
            <input type="hidden" name="c_kelas" value="<?php echo $kelas['c_kelas']; ?>">
            <p><b style="color:#d81b60;">MAPEL DINIYAH</b></p>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="input-group">
                  <select class="form-control select input-sm" multiple="multiple" name="id_mapelmd[]">
                    <?php $smk=mysqli_query($con,"SELECT *,(select count(id) from mapelmd_kelas where c_kelas='$kelas[c_kelas]' and id_mapelmd=mapelmd.id_mapelmd) as ada FROM mapelmd order by nama_mapelmd asc ");
                    while($akh=mysqli_fetch_array($smk)){ if($akh['ada']>0){ $sel='selected';}else{$sel=''; }
                      echo '<option '.$sel.' value="'.$akh['id_mapelmd'].'">'.$akh['nama_mapelmd'].'</option>';
                    } ?>
                  </select>
                  <span class="input-group-btn">
                    <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                  </span>
                </div>
              </div>
            </div>
          </form>
            <br>
          <!-- mapel tahfidzul quran -->
          <form action="<?php echo $basead; ?>a-control/<?php echo md5('settingmapeltq'); ?>/access" method="post">
            <!--<form action="" method="get">-->
            <input type="hidden" name="c_kelas" value="<?php echo $kelas['c_kelas']; ?>">
            <p><b style="color:#d81b60;">MAPEL TAHFIDZUL QURAN</b></p>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="input-group">
                  <select class="form-control select input-sm" multiple="multiple" name="id_mapeltq[]">
                    <?php $smk=mysqli_query($con,"SELECT *,(select count(id) from mapeltq_kelas where c_kelas='$kelas[c_kelas]' and id_mapeltq=mapeltq.id_mapeltq) as ada FROM mapeltq order by nama_mapeltq asc ");
                    while($akh=mysqli_fetch_array($smk)){ if($akh['ada']>0){ $sel='selected';}else{$sel=''; }
                      echo '<option '.$sel.' value="'.$akh['id_mapeltq'].'">'.$akh['nama_mapeltq'].'</option>';
                    } ?>
                  </select>
                  <span class="input-group-btn">
                    <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                  </span>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>