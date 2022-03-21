<?php
if($ata['semester']=='1'){$sem= 'Ganjil';}else if($ata['semester']=='2'){$sem= 'Genap';}
$kelas= mysqli_query($con,"SELECT *,(SELECT c_guru from walikelas where c_kelas='$_GET[r]')as c_guru FROM kelas where c_kelas='$_GET[r]' "); foreach($kelas as $hkelas);
$guru= mysqli_fetch_array(mysqli_query($con,"SELECT * from guru where c_guru='$kel[c_guru]' "));
$smk=mysqli_query($con,"SELECT * FROM jumlahnilra where c_kelas='$kel[c_kelas]' order by nilaipresen desc");//limit 1 dihapus dan diganti desc
foreach($smk as $akh){$rin[]= $akh['nilaipresen'];} $rin[]= '';
$peringkat=1; $ar=0;
foreach($smk as $akh){
  $deskripsi_sikap= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_sikap where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' "));
  $sis= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$akh[c_siswa]' "); foreach($sis as $hsis);
  $content.='
    <title>Rapot Kelas '.$hkelas['kelas'].'</title>
    <div style="page-break-after: always;">';
    //<center><img class="text-center" src="../kop/kop2.png" style="width:80%;height:100px;"></center>
    $content.='<h3 class="text-center">LAPORAN HASIL BELAJAR PESERTA DIDIK<br>ULANGAN AKHIR SEMESTER</h3>
    <table width="100%">
      <tr>
        <td>
          <p class="text-left">Nama Sekolah<br>Alamat<br>Nama Peserta Didik</p>
        </td>
        <td>
          <p class="text-left">
            : '.$aplikasi['namasek'].'<br>
            : '.$aplikasi['alamat'].'<br>
            : '.$hsis['nama'].'
          </p>
        </td>
        <td>
          <p class="text-left">
          NISN<br>Kelas / Semester<br>Tahun Pelajaran
          </p>
        </td>
        <td>
          <p class="text-left">
            : '.$hsis['nisn'].'<br>
            : '.$kel['kelas'].' / '.$sem.'<br>
            : '.$ata['tahun'].'
          </p>
        </td>
      </tr>
    </table>
    <p>CAPAIAN HASIL BELAJAR</p>
    <h5>A. Sikap</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">
      <tr>
        <td>
          <p class="text-left" style="padding-top:-18px;padding-bottom:-18px;">'.$deskripsi_sikap['deskripsi'].'</p>
        </td>
      </tr>
    </table>
    <h5>B. Pengetahuan dan Keterampilan</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">
      <tr class="text-center">
        <td width="2%" rowspan="2">NO</td>
        <td rowspan="2" width="20%">Mata Pelajaran</td>
        <td rowspan="2" width="2%">KKM</td>
        <td colspan="3">Pengetahuan</td>
        <td colspan="3">Keterampilan</td>
      </tr>
      <tr class="text-center">
        <td width="2%">Angka</td>
        <td width="5%">Predikat</td>
        <td>Deskripsi</td>
        <td width="2%">Angka</td>
        <td width="5%">Predikat</td>
        <td>Deskripsi</td>
      </tr>';
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $romawi= 1;
  while($hex=mysqli_fetch_array($ex)){ 
    $pel=mysqli_query($con,"SELECT *,(SELECT sum(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT sum(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
    $vr=1;
    if(mysqli_num_rows($pel)>0){
      $content.= '<tr><td class="text-center"><b>'.romawi($romawi).'</b></td><td colspan="8"><b>'.$hex['katmapel'].'</b></td>';
        
      $content.= '</tr>';
      foreach($pel as $hpel){
        require '../view/rumus/nilairapot.php';
        $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where c_ta='$c_ta' and c_mapel='$hpel[c_mapel]' "));
        $content.='<tr class="text-center">';
        $content.='<td>'.$vr.'</td>';
        $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
        $content.='<td><b>'.$hpel['sl'].'</b></td>';
        $content.='<td>'.koma($nilakhir).'</td>';
        $content.='<td>'.predikattambahan($nilakhir,$hpel['sl']).'</td>';
        $content.='<td class="text-left">'.$deskripsi['des_peng'].'</td>';
        $content.='<td>'.koma($hpel['nilaiket']).'</td>';
        $content.='<td>'.predikattambahan($hpel['nilaiket'],$hpel['sl']).'</td>';
        $content.='<td class="text-left">'.$deskripsi['des_ket'].'</td>';
        $content.='</tr>';
        $vr++;
      }
    }
  $romawi++;
  }
  /*$content.='<tr class="text-center">';
  $content.='<td colspan="3">Total Nilai</td>';
  $content.='<td>'.$akh['nilaipresen'].'</td>';
  if($peringkat<=10){
    $content.='<td colspan="5">Peringkat '.$peringkat.'</td>';
  }else{
    $content.='<td></td>';
  }
  $content.='</tr>';
  $ar2= $ar+1; if($rin[$ar]!=$rin[$ar2]){ $peringkat++; }
  $ar++;*/
  $content.='
  </table>
  </div>
  ';
  $content.='
  <div style="page-break-after: always;">';
    /*<table width="100%">
      <tr>
        <td>
          <p class="text-left">Nama Sekolah<br>Alamat<br>Nama Peserta Didik</p>
        </td>
        <td>
          <p class="text-left">
            : '.$aplikasi['namasek'].'<br>
            : '.$aplikasi['alamat'].'<br>
            : '.$hsis['nama'].'
          </p>
        </td>
        <td>
          <p class="text-left">
          NISN<br>Kelas / Semester<br>Tahun Pelajaran
          </p>
        </td>
        <td>
          <p class="text-left">
            : '.$hsis['nisn'].'<br>
            : '.$kel['kelas'].' / '.$sem.'<br>
            : '.$ata['tahun'].'
          </p>
        </td>
      </tr>
    </table>*/
    $content.='
    <h5>C. Praktek Kerja Lapangan</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">';
      $pkl= mysqli_query($con,"SELECT * FROM pkl where c_siswa='$akh[c_siswa]' ");
      if($pkl==null){
        $content.= '<tr><td>-</td></tr>';
      }
      else{
        $content.= '
        <tr class="text-center bg-yellow">
          <td width="2%">No</td><td>Mita DU/DI</td><td>Lokasi</td><td>Lamanya (Bulan)</td><td>Keterangan</td>
        </tr>';
        $no= 1;
        while($hpkl= mysqli_fetch_array($pkl)){
          $content.= '
          <tr>
            <td class="text-center">'.$no.'</td><td>'.$hpkl['mitradudi'].'</td><td>'.$hpkl['lokasi'].'</td><td>'.$hpkl['lama'].' Bulan</td><td>'.$hpkl['ket'].'</td>
          </tr>';
        $no++; }
      }
    $content.= '
    </table>';
    $content.='
    <h5>D. Ekstra Kurikuler</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">';
      $extra= mysqli_query($con,"SELECT * FROM nilaiextra left join extra on(nilaiextra.c_extra=extra.c_extra) where c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' ");
      if($extra==null){
        $content.= '<tr><td>-</td></tr>';
      }
      else{
        $content.= '
        <tr class="text-center bg-yellow">
          <td width="2%">No</td><td>Kegiatan Ekstrakurikuler</td><td>Keterangan</td>
        </tr>';
        $no= 1;
        while($hextra= mysqli_fetch_array($extra)){
          $content.= '
          <tr>
            <td class="text-center">'.$no.'</td><td>'.$hextra['extra'].'</td><td>'.$hextra['nilai'].'</td></td>
          </tr>';
        $no++; }
      }
    $content.= '
    </table>';
    $content.='
    <h5>E. Prestasi</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">';
      $pres= mysqli_query($con,"SELECT * FROM prestasi left join extra on(prestasi.c_extra=extra.c_extra) where c_siswa='$akh[c_siswa]' ");
      if($pres==null){
        $content.= '<tr><td>-</td></tr>';
      }
      else{
        $content.= '
        <tr class="text-center bg-yellow">
          <td width="2%">No</td><td>Kegiatan Ekstrakurikuler</td><td>Keterangan</td>
        </tr>';
        $no= 1;
        while($hpres= mysqli_fetch_array($pres)){
          $content.= '
          <tr>
            <td class="text-center">'.$no.'</td><td>'.$hpres['extra'].'</td><td>'.$hpres['ket'].'</td></td>
          </tr>';
        $no++; }
      }
    $content.= '
    </table>';
    $setra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' limit 1 "));
    $content.='
    <h5>F. Ketidakhadiran</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">
      <tr class="text-center">
        <td width="33%">SAKIT (S)</td><td width="33%">IZIN (I)</td><td width="33%">ALFA (A)</td>
      </tr>
      <tr class="text-center">';
      if($setra==NULL){
        $content.= '<td>- Hari</td><td>- Hari</td><td>- Hari</td>';
      }else{
        $content.= '<td>'.$setra['s'].' Hari</td><td>'.$setra['i'].' Hari</td><td>'.$setra['a'].' Hari</td>';
      }
      $content.='
      </tr>
    </table>';
    /*<h5 class="text-left">C. KEPRIBADIAN/KARAKTER</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">
      <tr class="text-center">
        <td width="33%">KELAKUAN</td><td width="33%">KERAJINAN</td><td width="33%">KERAPIAN</td>
      </tr>
      <tr class="text-center">';
      if($setra==NULL){
        $content.= '<td>-</td><td>-</td><td>-</td>';
      }else{
        $content.= '<td>'.$setra['kelakuan'].'</td><td>'.$setra['kerajinan'].'</td><td>'.$setra['kerapian'].'</td>';
      }
      $content.='
      </tr>
    </table>*/
    $content.='
    <h5>G. Catatan Wali Kelas</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">
      <tr class="text-center">';
      if($setra==NULL){
        $content.= '<td>-</td>';
      }else{
        $content.= '<td>'.$setra['catatan'].'</td>';
      }
      $content.='  
      </tr>
    </table>';
    $content.='
    <h5>H. Tanggapan Orang tua/Wali</h5>
    <table border="1" cellpadding="2" style="font-size:11px;">
      <tr>
        <td><br><br><br></td> 
      </tr>
    </table>';
    if($ata['semester']=='1'){

    }
    else if($ata['semester']=='2'){
      $content.= '
      <p><b>Keputusan :</b></p>
      <p>Berdasarkan hasil yang dicapai pada semester 1 dan 2,peserta didik ditettapkan<br>Naik ke Kelas .......... (........................)<br>TInggal di Kelas .......... (........................)</p>';
    }
     $content.='
    <div style="position: absolute;bottom: 20;right: 0;">
    <table style="width:100%; font-size:13px; font-weight:bold;">
      <tr>
        <td width="35%" class="text-center">
          Wali Murid
        </td>
        <td width="30%">
        </td>
        <td width="35%" class="text-center">
          Wali Kelas
        </td>

      </tr>
    </table>
    <br><br><br>
    <table style="width:100%; font-size:13px; font-weight:bold;">
      <tr>
        <td width="35%" class="text-center">
          <br>................
        </td>
        <td width="30%">
        </td>
        <td width="35%" class="text-center">
          <u>'.$guru['nama'].'</u><br>NIP : '.$guru['nip'].'
        </td>

      </tr>
    </table>
    <p class="text-center" style="font-size:14px;">
    Mengetahui : <br>
    <b>Kepala Sekolah</b>
    <br><br><br><br>
    <u>'.$aplikasi['kepsek'].'</u><br>NIP. '.$aplikasi['nipkepsek'].'
    </p>
    </div>
  </div>
  ';
}
?>

