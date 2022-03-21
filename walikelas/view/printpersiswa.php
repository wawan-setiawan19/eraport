          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-print"></i> Print Nilai Per-Siswa <?php echo $kel['kelas']; ?></h3><span style="float:right;"><!--<a target="_blank" href="<?php echo $basewa; ?>printrapot?print=rapot&kelas=<?php echo $kel['c_kelas']; ?>&ta=<?php echo $c_ta; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print Rapot</a>--></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th width="10%">GENDER</th>
                  <th>TTL</th>
                  <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$kel[c_kelas]' order by nama asc "); $vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><a href="<?php echo $basewa; ?>nilaisiswa/<?php echo $akh['c_siswa']; ?>"><?php echo $akh['nama']; ?></a></td>
                  <td><?php if($akh['jk']=='L'){echo 'Laki - Laki';}elseif($akh['jk']=='P'){echo 'Perempuan';} ?></td>
                  <td><?php echo $akh['temlahir'].', '.tgl($akh['tanglahir']).''; ?></td>
                  <td>
                    <a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('printsisniluh').'/'.$akh['c_siswa'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm bg-maroon">Nilai UH</a>
                    <a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('printsisniltug').'/'.$akh['c_siswa'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm bg-maroon">Nilai Tugas</a>
                    <a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('printsisnilmid').'/'.$akh['c_siswa'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm bg-maroon">Nilai MID</a>
                    <a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('printsisniluas').'/'.$akh['c_siswa'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm bg-maroon">Nilai UAS</a>
                    <a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('printsisnilket').'/'.$akh['c_siswa'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm bg-maroon">Nilai Keterampilan</a>
                  </td>
                </tr>
                <?php $vr++; } ?>
              </tbody>
            </table>
          </div>
      </div>