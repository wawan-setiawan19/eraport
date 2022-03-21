<?php
$siswa= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' "); foreach($siswa as $hsiswa);
$kelas= mysqli_query($con,"SELECT *,(SELECT c_guru from walikelas where c_kelas='$_GET[r]')as c_guru FROM kelas where c_kelas='$_GET[r]' "); foreach($kelas as $hkelas);
$guru= mysqli_query($con,"SELECT * from guru where c_guru='$hkelas[c_guru]' "); foreach($guru as $hguru);
$aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc "); $juh= mysqli_num_rows($aspekuh);
$content.='
<title>Ulangan Harian Kelas '.$hkelas['kelas'].'</title>
<h3 class="text-center">Ulangan Harian '.$hsiswa['nama'].' '.$ata['tahun'].' Semester '.$ata['semester'].'</h3>
<table border="1" cellpadding="2" style="font-size:12px; width: 100%;">
  <tr class="text-center">
    <td rowspan="2" width="5%">NO</td><td rowspan="2">MATA PELAJARAN</td><td rowspan="2">KKM</td><td colspan="'.$juh.'">ULANGAN HARIAN</td>
  </tr>';
  //mulai kategori mapel
    $content.='<tr>';
      $ko=1; foreach($aspekuh as $haspekuh){
        $content.='<td class="text-center">'.$ko.'</td>';
      $ko++; }
    $content.='</tr>';
    $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
    while($hex=mysqli_fetch_array($ex)){ $colkat =$juh+2;
      $mapel= mysqli_query($con,"SELECT *,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$_GET[r]' and c_katmapel='$hex[c_katmapel]' order by no asc "); 
      if(mysqli_num_rows($mapel)>0){
      $content.= '<tr><td></td><td colspan="'.$colkat.'"><b>'.$hex['katmapel'].'</b></td>';
        
      $content.= '</tr>';
        $no= 1; while($hmapel=mysqli_fetch_array($mapel)){
      	$content.='<tr>';
        $content.='<td width="5%" class="text-center">'.$no.'</td>';
        $content.='<td width="40%">'.$hmapel['mapel'].'</td>';	
        $content.='<td width="10%" class="text-center">'.$hmapel['sl'].'</td>';
        foreach($aspekuh as $haspekuh){
            $amniluh=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel='$hmapel[c_mapel]' "));
            if($amniluh['nilai']==NULL){
            	$bg= '';
            }else{
              if($amniluh['nilai']>=$hmapel['sl']){
                $bg= 'background-color:#4eee94;';
              }
              else{
                $bg= 'background-color:#ff3030;';
              }
            }
            $content.= '<td width="5%" class="text-center">'.$amniluh['nilai'].'</td>';
        }
        $content.='</tr>';
        $no++; }
      }
    }
$content.='
</table>
';
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



