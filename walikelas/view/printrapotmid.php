          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-print"></i> Print Rapot MID Per-Siswa <?php echo $kel['kelas']; ?></h3>
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
                    <a target="_blank" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('printrapotmidsiswa').'/'.$akh['c_siswa'].'/'.$kel['c_kelas']; ?>" class="btn btn-sm btn-success">Print MID</a>
                  </td>
                </tr>
                <?php $vr++; } ?>
              </tbody>
            </table>
          </div>
      </div>