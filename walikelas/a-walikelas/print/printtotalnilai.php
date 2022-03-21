<?php
$siswa= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' "); foreach($siswa as $hsiswa);
$kelas= mysqli_query($con,"SELECT *,(SELECT c_guru from walikelas where c_kelas='$_GET[r]')as c_guru FROM kelas where c_kelas='$_GET[r]' "); foreach($kelas as $hkelas);
$guru= mysqli_query($con,"SELECT * from guru where c_guru='$hkelas[c_guru]' "); foreach($guru as $hguru);
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[r]' "));
$content.='
<title>Total Nilai Kelas '.$kel['kelas'].'</title>
<h3 class="text-center">Total Nilai '.$hsiswa['nama'].' '.$ata['tahun'].' Semester '.$ata['semester'].'</h3>
<table border="1" cellpadding="2" style="font-size:12px; width: 100%;">
  <tr class="text-center">
    <td width="5%">NO</td>
    <td width="30%">MATA PELAJARAN</td>
    <td width="10%">KKM</td>
    <td>UH</td>
    <td>TUGAS</td>
    <td>MID</td>
    <td>UAS</td>
    <td width="10%">NILAI ASLI</td>
    <td width="10%">NILAI AKHIR</td>
    <td>KETERAMPILAN</td>
  </tr>';
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  while($hex=mysqli_fetch_array($ex)){ 
    $pel=mysqli_query($con,"SELECT *,(SELECT sum(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT sum(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT sum(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $no=1;
    if(mysqli_num_rows($pel)>0){
      $content.= '<tr><td></td><td colspan="9"><b>'.$hex['katmapel'].'</b></td>';
        
      $content.= '</tr>';
      foreach($pel as $hpel){
      require '../view/rumus/nilaipersiswa.php';
      $content.='<tr class="text-center">';
      $content.='<td>'.$no++.'</td>';
      $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
      $content.='<td><b>'.$hpel['sl'].'</b></td>';
        if($hpel['nilaiuh']==0){ $nilaiuh= '-';}
        else{ $nilaiuh= $hpel['nilaiuh'];}
      $content.='<td>'.$hpel['nilaiuh'].'</td>';
        if($hpel['nilaitugas']==0){ $nilaitugas= '-';}
        else{ $nilaitugas= $hpel['nilaitugas'];}
      $content.='<td>'.$hpel['nilaitugas'].'</td>';
        if($hpel['nilaimid']==NULL){$nilaimid= '-';}
        else{ $nilaimid= $hpel['nilaimid'];}
      $content.= '<td>'.$hpel['nilaimid'].'</td>';
        if($hpel['nilaiuas']==NULL){$nilaiuas= '-';}
        else{ $nilaiuas= $hpel['nilaiuas'];}
      $content.='<td>'.$nilaiuas.'</td>';
      $content.='<td>'.$nilasli.'</td>';
      $content.='<td>'.$nilakhir.'</td>';
        if($hpel['nilaiket']==0){$nilaiket= '-';}
        else{$nilaiket= $hpel['nilaiket'];}
      $content.='<td>'.$nilaiket.'</td>';
      $content.='</tr>';
      }
    }
  }
$content.='</table>';
$content.='
<table width="100%">
  <tr>
    <td width="40%"></td><td width="35%"></td>
    <td width="25%">
      <p class="text-right">'.$aplikasi['alamat'].', '.tgl(date('d-m-Y')).'</p>
      <p class="text-center">Wali Kelas '.$hkelas['kelas'].'</p>
      <br>
      <p class="text-center"><u>'.$hguru['nama'].'</u><br>NIP. '.$hguru['nip'].'</p>
    </td>
  </tr>
</table>
';
?>