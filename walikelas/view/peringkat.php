      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='akumulasi'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Akumulasi Nilai Berhasil Diproses
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"> <i class="glyphicon glyphicon-star-empty"></i> Peringkat Siswa Kelas <?php echo $kel['kelas']; ?></h3><span style="float:right;">
              <?php $cekjumnilra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' and c_kelas='$kel[c_kelas]' "));
              if($cekjumnilra==NULL){ ?>
                <a class="btn bg-blue" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('akumulasinilai').'/'.$kel['c_kelas']; ?>">Akumulasi Nilai</a>
              <?php }else{ ?>
               <a class="btn bg-purple" href="<?php echo $basewa; ?>a-walikelas/<?php echo md5('akumulasinilai').'/'.$kel['c_kelas']; ?>">Update Akumulasi Nilai</a>
              <?php }?><!--<a target="_blank" href="<?php echo $basewa; ?>printrapot?print=rapot&kelas=<?php echo $kel['c_kelas']; ?>&ta=<?php echo $c_ta; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print Rapot</a>--></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>PERINGKAT</th>
                  <th>NAMA</th>
                  <th>GENDER</th>
                  <th>TTL</th>
                  <th>TOTAL NILAI AKHIR</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM jumlahnilra where c_kelas='$kel[c_kelas]' AND c_ta='$c_ta' order by nilaipresen desc ");
  foreach($smk as $akh){$rin[]= $akh['nilaipresen'];} $rin[]= '';
  $vr=1; $peringkat=1; $ar=0; foreach($smk as $akh){
  $sis= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$akh[c_siswa]' "); foreach($sis as $hsis); ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td>Peringkat &nbsp;<?php echo $peringkat; ?></td>
                  <?php $ar2= $ar+1; if($rin[$ar]!=$rin[$ar2]){ $peringkat++; } ?>
                  <td><a href="<?php echo $basewa; ?>nilaisiswa/<?php echo $akh['c_siswa']; ?>"><?php echo $hsis['nama']; ?></a></td>
                  <td><?php if($hsis['jk']=='L'){echo 'Laki - Laki';}elseif($hsis['jk']=='P'){echo 'Perempuan';} ?></td>
                  <td><?php echo $hsis['temlahir'].', '.tgl($hsis['tanglahir']).''; ?></td>
                  <td><?php echo $akh['nilaipresen']; ?></td>
<?php $vr++; $ar++; } ?>
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