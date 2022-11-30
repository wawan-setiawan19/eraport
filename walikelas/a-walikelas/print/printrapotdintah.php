<?php

function nilairaport($nilaitugas, $nilaiuh, $nilaimid, $nilaiuas){
  $nilaiakhirraport = (($nilaitugas*0.35)+($nilaiuh*0.35)+($nilaimid*0.15)+($nilaiuas*0.15));
  return $nilaiakhirraport;
}

function predikat_label($nilai){
    if($nilai == 'A'){
        $predikat = 'Sangat Baik';
    }else if($nilai == 'B'){
        $predikat = 'Baik';
    }else if($nilai == 'C'){
        $predikat = 'Cukup';
    }
    return $predikat;
}

function header_identitas($kelas, $semester, $nama, $tahun, $nis, $nisn){
  return '<table width="100%" style="font-size:13px; width: 100%;" class="identitas">
    <tr>
      <td width="15%">Nama</td>
      <td width="2%">:</td>
      <td width="56%">'.$nama.'</td>
      <td width="15%">Kelas</td>
      <td width="2%">:</td>
      <td width="10%">'.$kelas.'</td>
    </tr>
    <tr>
      <td width="15%">NIS/ NISN</td>
      <td width="2%">:</td>
      <td width="56%">'.$nis.' / '.$nisn.'</td>
      <td width="15%">Fase</td>
      <td width="2%">:</td>
      <td width="10%">D</td>
    </tr>
    <tr>
      <td width="15%">Nama Sekolah</td>
      <td width="2%">:</td>
      <td width="56%">SMP ISLAM QURANI AL BAHJAH</td>
      <td width="15%">Semester</td>
      <td width="2%">:</td>
      <td width="10%">'.$semester.'</td>
    </tr>
    <tr>
      <td width="15%">Alamat</td>
      <td width="2%">:</td>
      <td width="56%">Jl. Pangeran Cakrabuana No. 179</td>
      <td width="15%">Tahun Pelajaran</td>
      <td width="2%">:</td>
      <td width="10%">'.$tahun.'</td>
    </tr>
  </table>
  <hr style="height: 1px;border-width:0; background-color: black;">
  ';
}

if($ata['semester']=='1'){$sem= '1 (Satu)';}else if($ata['semester']=='2'){$sem= '2 (Dua)';}
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT *,(SELECT c_guru from walikelas where c_kelas='$_GET[r]') as c_guru,(SELECT ttdwalikelas from walikelas where c_kelas='$_GET[r]') as ttdwalikelas FROM kelas where c_kelas='$_GET[r]' "),MYSQLI_ASSOC);
$guru= mysqli_fetch_array(mysqli_query($con,"SELECT * from guru where c_guru='$kel[c_guru]' "),MYSQLI_ASSOC);
$smk=mysqli_query($con,"SELECT * FROM jumlahnilra where c_kelas='$kel[c_kelas]' and c_siswa='$_GET[q]' order by nilaipresen desc limit 1 ");//limit 1 dihapus dan diganti desc
foreach($smk as $smk){$rin[]= $smk['nilaipresen'];} $rin[]= '';
$peringkat=1; $ar=0;

$deskripsi_sikap= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_sikap where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' "));
  $komsi= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kompetensi_sikap where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' "));
  $sis= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$smk[c_siswa]' "); foreach($sis as $hsis);
  $csis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walimurid where c_siswa='$hsis[c_siswa]' "));
  

$predikat_spiritual = predikat_label($komsi['nilaispi']);
$predikat_sosial = predikat_label($komsi['nilaisos']);

  
  $content .= '<title>Rapot '.$hsis['nama'].'</title>';
  $content.='
    <style>
      .nilai,
      .nilai tr,
      .nilai tr td {
        border: 1px solid black;
      }
      .nilai{
        border-collapse: collapse;
      }
      td{
        padding: 5px 10px;
      }

        .identitas{
            margin-bottom: 15px;
            border: none;
        }
        
        .identitas td {
            padding: 3px 0;
        }
        .title-sikap{
            margin-top:20px;
        }
        .nama{
            font-weight : bold;
            text-decoration: underline;
        }
    </style
  
  </footer>
  <body style="font-family: verdana, arial, sans-serif;">
   <p>'.$PAGE_NUM.'</p>';
    //<center><img class="text-center" src="../kop/kop2.png" style="width:80%;height:100px;"></center>
    $angkatan = explode(" ",$kel['kelas']);
    $titimangsa = 'Cirebon, '.$ata['titimangsa_rapot'];
    if ($angkatan[0] == 'IX') {
      $keputusan="LULUS";
    }elseif ($angkatan[0] == 'VIII') {
      $keputusan="NAIK KE KELAS : IX (SEMBILAN)";
      $hasil_semester="pada semester 1 dan 2";
      $break = '</div><div>';
    }else{
      $keputusan="NAIK KE KELAS : VIII (DELAPAN)";
      $hasil_semester="pada semester 1 dan 2";
      $break = '</div><div>';
    };
    $content.=header_identitas($kel['kelas'], $sem, $hsis['nama'], $ata['tahun'], $hsis['nisn'], $hsis['nis']);
    $content.='
  <div style="page-break-after: always;">
  <div class="text-center">CAPAIAN HASIL BELAJAR DINIYAH DAN TAHFIDZ</div>
    <b style="font-size: 13px;">A. Madrasah Diniyah</b><br>
    <table style="font-size: 12px; width:100%" class="nilai">
      <tr class="text-center">
        <td width="2%" rowspan="2">No</td>
        <td rowspan="2" width="20%">Kitab</td>
        <td rowspan="2" width="2%">KKM</td>
        <td colspan="3">Nilai</td>
      </tr>
      <tr class="text-center">
        <td width="3%">Angka</td>
        <td width="10%">Predikat</td>
        <td>Keterangan</td>
      </tr>';
      $allnilmd= array();
      $md=mysqli_query($con,"SELECT * FROM mapelmd_kelas left join mapelmd on (mapelmd.id_mapelmd=mapelmd_kelas.id_mapelmd) where c_kelas='$kel[c_kelas]' order by nama_mapelmd asc "); $vr=1;
      while($hmd=mysqli_fetch_array($md)){
        $nilmd= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimd where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapelmd='$hmd[id_mapelmd]' "));
          $allnilmd[]= $nilmd['nilai'];

          $content.= '
          <tr>
            <td class="text-center">'.$vr.'</td>
            <td>'.$hmd['nama_mapelmd'].'</td>
            <td class="text-center"><b>'.$hmd['kkm_mapelmd'].'</b></td>
            <td class="text-center">'.koma($nilmd['nilai']).'</td>
            <td class="text-center">'.predikattambahan($nilmd['nilai'],$hmd['kkm_mapelmd']).'</td>
            <td>'.$nilmd['deskripsi'].'</td>
          </tr>
          ';
      $vr++; }
      $content.= '<tr class="text-center">
    <td colspan="3">Rata-Rata</td>
    <td>'.koma(rata($allnilmd)).'</td>
    <td></td>
    <td></td>
  </tr>
  </table>
  </div>';
  $content.='
  <div style="page-break-after: always;">
    <b style="font-size: 12px;">B. Tahfidzul Quran</b><br>
    <table style="font-size: 12px; width:100%" class="nilai">
      <tr class="text-center">
        <td width="2%">No</td>
        <td width="20%">Capaian</td>
        <td width="9.5%">Juz/Jilid</td>
        <td width="10%">Surat</td>
        <td width="10%">Ayat/Hal</td>
        <td>Deskripsi</td>
      </tr>
      ';
      $md=mysqli_query($con,"SELECT * FROM mapeltq_kelas left join mapeltq on (mapeltq.id_mapeltq=mapeltq_kelas.id_mapeltq) where c_kelas='$kel[c_kelas]' order by nama_mapeltq asc "); $vr=1;
      while($hmd=mysqli_fetch_array($md)){
        $niltq= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitq where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapeltq='$hmd[id_mapeltq]' "));
          $content.= '
          <tr>
            <td class="text-center">'.$vr.'</td>
            <td>'.$hmd['nama_mapeltq'].'</td>
            <td class="text-center">'.$niltq['juz'].'</td>
            <td class="text-center">'.$niltq['surat'].'</td>
            <td class="text-center">'.$niltq['ayat'].'</td>
            <td>'.$niltq['deskripsi'].'</td>
          </tr>
          ';
      $vr++; }
    $content.='
  </table>';
    $content.='
    <table style="font-size:12px; width: 100%; margin-top: 30px" cellpadding="5">
        <tr>
          <td width="25%">
            <div>Mengetahui</div>
            <div>Orang Tua/Wali</div>
            <div style="height: 70px"></div>
            <div>...........................</div>
          </td>
          <td width="25%"></td>
          <td width="20%"></td>
          <td>
            <div>'.$titimangsa.'</div>
            <div>Wali Kelas,</div>
            <div style="height: 70px"></div>
            <div class="nama">'.$guru['nama'].'</div>
            <div>NIP.</div>
          </td>
        </tr>
    </table>
    <table style="font-size:12px; width: 100%; margin-top: 30px" cellpadding="5">
        <tr>
          <td width="25%">
            <div>Koordinator Tahfidz</div>
            <div style="height: 70px"></div>
            <div>Ust. Fajar Arif Putra</div>
          </td>
          <td width="25%"></td>
          <td width="20%"></td>
          <td>
            <div>Koordinator Diniyah Formal</div>
            <div style="height: 70px"></div>
            <div class="nama">Ust. Aji</div>
          </td>
        </tr>
    </table>
    <table style="font-size:12px; width: 100%;">
        <tr>
            <td width="37.5%"></td>
            <td>
                <div>Mengetahui</div>
                <div>Kepala Sekolah</div>
                <div style="height: 70px"></div>
                <div class="nama">FIKRI RIZKY PRATAMA, S.Pd.</div>
                <div>NIP.</div>
            </td>
        </tr>
    </table>
    </div>';
  //   $content.='
  // < style="page-break-after: always;">
  //   <b style="font-size: 13px;">Madrasah Diniyah</b><br>
  //   <table style="font-size: 12px; width: 100%; margin-top: 10px; margin-bottom: 10px;" class="nilai">
  //     <tr class="text-center">
  //       <td width="2%" rowspan="2">No</td>
  //       <td rowspan="2" width="20%">Kitab</td>
  //       <td rowspan="2" width="2%">KKM</td>
  //       <td colspan="3">Nilai</td>
  //     </tr>
  //     <tr class="text-center">
  //       <td width="3%">Angka</td>
  //       <td width="10%">Predikat</td>
  //       <td>Keterangan</td>
  //     </tr>';
  //     $allnilmd= array();
  //     $md=mysqli_query($con,"SELECT * FROM mapelmd_kelas left join mapelmd on (mapelmd.id_mapelmd=mapelmd_kelas.id_mapelmd) where c_kelas='$kel[c_kelas]' order by nama_mapelmd asc "); $vr=1;
  //     while($hmd=mysqli_fetch_array($md)){
  //       $nilmd= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimd where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapelmd='$hmd[id_mapelmd]' "));
  //         $allnilmd[]= $nilmd['nilai'];

  //         $content.= '
  //         <tr>
  //           <td class="text-center">'.$vr.'</td>
  //           <td>'.$hmd['nama_mapelmd'].'</td>
  //           <td class="text-center"><b>'.$hmd['kkm_mapelmd'].'</b></td>
  //           <td class="text-center">'.koma($nilmd['nilai']).'</td>
  //           <td class="text-center">'.predikattambahan($nilmd['nilai'],$hmd['kkm_mapelmd']).'</td>
  //           <td>'.$nilmd['deskripsi'].'</td>
  //         </tr>
  //         ';
  //     $vr++; }
  //     $content.= '<tr class="text-center">
  //   <td colspan="3">Rata-Rata</td>
  //   <td>'.koma(rata($allnilmd)).'</td>
  //   <td></td>
  //   <td></td>
  // </tr>';
  // $content.='
  // </table>
  //   <b style="font-size: 12px;">Tahfidzul Quran</b><br>
  //   <table style="font-size: 12px; width:100%; margin: 10px 0;" class="nilai">
  //     <tr class="text-center">
  //       <td width="2%">No</td>
  //       <td width="20%">Capaian</td>
  //       <td width="9.5%">Juz/Jilid</td>
  //       <td width="10%">Surat</td>
  //       <td width="10%">Ayat/Hal</td>
  //       <td>Deskripsi</td>
  //     </tr>
  //     ';
  //     $md=mysqli_query($con,"SELECT * FROM mapeltq_kelas left join mapeltq on (mapeltq.id_mapeltq=mapeltq_kelas.id_mapeltq) where c_kelas='$kel[c_kelas]' order by nama_mapeltq asc "); $vr=1;
  //     while($hmd=mysqli_fetch_array($md)){
  //       $niltq= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitq where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapeltq='$hmd[id_mapeltq]' "));
  //         $content.= '
  //         <tr>
  //           <td class="text-center">'.$vr.'</td>
  //           <td>'.$hmd['nama_mapeltq'].'</td>
  //           <td class="text-center">'.$niltq['juz'].'</td>
  //           <td class="text-center">'.$niltq['surat'].'</td>
  //           <td class="text-center">'.$niltq['ayat'].'</td>
  //           <td>'.$niltq['deskripsi'].'</td>
  //         </tr>
  //         ';
  //     $vr++; }
  //   $content.='
  // </table>';
  // $content .='
  //     <div >
  //       <!-- <p class="text-center" style="font-size: 12px;">Cirebon, '.tgl(date('d-m-Y')).'</p> -->
  //       <p class="text-center" style="font-size: 12px;">Cirebon, 15 Juni 2022</p>
  //       <br><br>
  //       <table style="width:100%; font-size:13px;">
  //     <tr>
  //       <td valign="top" width="50%" class="text-center">
  //         Wali Grade
  //         <br><br><br><br><br><br>
  //         <u><b>'.$kel['waligrade'].'</b></u>
  //       </td>

  //       <td valign="top" width="50%" class="text-center">
  //         Wali Kelas
  //         <br><br><br><br><br><br>
  //         <u><b>'.$guru['nama'].'</b></u>
  //       </td>
  //     </tr>
  //   </table>
  //   <table style="width:100%; font-size:13px; margin-top:10px;">
  //     <tr>
  //       <td valign="top" width="47%" class="text-center">
  //         <br>
  //         Kepala SMP Islam Qurani Al Bahjah
  //         <br><br><br><br><br><br>
  //         <u><b>Fikri Rizky Pratama, S.Pd.</b></u>
  //       </td>
  //       <td valign="top" width="6%" class="text-center">
  //         Mengetahui,
  //       </td>
  //       <td valign="top" width="47%" class="text-center">
  //         <br>
  //         Kepala Pondok Al Bahjah
  //         <br><br><br><br><br><br>
  //         <u><b>Muhammad Subhan, Lc.</b></u>
  //       </td>
  //     </tr>
  //   </table>
  //   </div
  // ';
    $footer = $kel['kelas'].'  |  '.strtoupper($hsis['nama']).'  |  '.$hsis['nisn'];
?>