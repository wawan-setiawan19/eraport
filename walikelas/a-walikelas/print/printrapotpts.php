<?php
include '../../../php/config.php';

function nilairaport($nilaitugas, $nilaiuh, $nilaimid, $nilaiuas){
  $nilaiakhirraport = ((($nilaitugas+$nilaiuh)/2)*0.5)+($nilaimid*0.25)+($nilaiuas*0.25);
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
        <td width="15%">Nama Sekolah</td>
        <td width="2%">:</td>
        <td width="56%">SMP ISLAM QURANI AL BAHJAH</td>
        <td width="15%">Kelas</td>
        <td width="2%">:</td>
        <td width="10%">'.$kelas.'</td>
      </tr>
      <tr>
        <td width="15%">Alamat</td>
        <td width="2%">:</td>
        <td width="56%">Jl. Pangeran Cakrabuana No. 179</td>
        <td width="15%">Semester</td>
        <td width="2%">:</td>
        <td width="10%">'.$semester.'</td>
      </tr>
      <tr>
        <td width="15%">Nama</td>
        <td width="2%">:</td>
        <td width="56%">'.$nama.'</td>
        <td width="15%">Tahun Pelajaran</td>
        <td width="2%">:</td>
        <td width="10%">'.$tahun.'</td>
      </tr>
      <tr>
        <td width="15%">No. Induk/ NISN</td>
        <td width="2%">:</td>
        <td width="56%">'.$nis.' / '.$nisn.'</td>
      </tr>
    </table>
    <hr style="height: 1px;border-width:0; background-color: black;">
    ';
}

$titimangsa = 'Cirebon, '.$ata['titimangsa_pts'];

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
      .nilai tr th,
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
    <div style="page-break-after: always">';
    //<center><img class="text-center" src="../kop/kop2.png" style="width:80%;height:100px;"></center>
    $content.='
    
    <br>
    <!-- table identitas -->
    '.header_identitas($kel['kelas'], $sem, $hsis['nama'], $ata['tahun'], $hsis['nisn'], $hsis['nis']).'
    <p class="text-center mt-3" style="font-weight: bold">LAPORAN HASIL PENILAIAN TENGAH SEMESTER</p>
    <b style="font-size: 13px; text-transform: uppercase;">A. Hasil Penilaian Mata Pelajaran Umum</b><br>
    <table style="font-size:12px; width: 100%" class="nilai">
      <tr class="text-center" style="font-weight: bold">
        <td width="2%">NO</td>
        <td width="50%">Mata Pelajaran</td>
        <td width="2%">KKM</td>
        <td width="3%">Nilai</td>
        <td>Terbilang</td>
      </tr>
      ';
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $romawi= 1;
  $allnilsmkir= array();
  $allnilket= array();
  $vr=1;
  while($hex=mysqli_fetch_array($ex)){ 
    $pel=mysqli_query($con,"SELECT *,(SELECT avg(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT avg(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
    // $vr=1;
    if(mysqli_num_rows($pel)>0){
      $content.= '';
      foreach($pel as $hpel){
        require '../view/rumus/nilairapot.php';
        $predikat = predikattambahan($hpel['nilaimid'], $hpel['sl']);
        $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where c_ta='$c_ta'and c_mapel='$hpel[c_mapel]' and predikat = '$predikat' "));
        $content.='<tr class="text-center">';
        $content.='<td>'.$vr.'</td>';
        $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
        $content.='<td>'.$hpel['sl'].'</td>';
        $content.='<td>'.$hpel['nilaimid'].'</td>';
        $content.='<td class="text-left" style="text-align:justify;">'.terbilang($hpel['nilaimid']).'</td>';
        $content.='</tr>';
        $vr++;
      }
    }
  $romawi++;
  }
  $content.='
  </table>';
  $content.='
      <br><b style="font-size: 13px;">B. Hasil Penilaian Mata Pelajaran Diniah</b><br>
      <table style="font-size:12px; width: 100%" class="nilai">
    <tr class="text-center" style="font-weight: bold">
    <td width="2%">NO</td>
    <td width="50%">Mata Pelajaran</td>
    <td width="2%">KKM</td>
    <td width="3%">Nilai</td>
    <td>Terbilang</td>
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
            <td class="text-center">'.$hmd['kkm_mapelmd'].'</td>
            <td class="text-center">'.$nilmd['nilai'].'</td>
            <td>'.terbilang($nilmd['nilai']).'</td>
          </tr>
          ';
      $vr++; }
  $content.='
  </table>
  </div>
  <div style="page-break-after: always">
    <b style="font-size: 12px;">C. Tahfidzul Quran</b><br>
    <table style="font-size:12px; width: 100%" class="nilai">
      <tr class="text-center">
        <th width="2%">No</th>
        <th width="10%">Capaian</th>
        <th width="10%">Juz/Jilid</th>
        <th width="40%">Surat</th>
        <th width="10%">Ayat/Hal</th>
        <th>Nilai PETA</th>
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
            <td class="text-center">'.$niltq['nilai_peta'].'</td>
          </tr>
          ';
      $vr++; }
    $content.='
  </table>
  <table style="font-size:12px; width: 100%; margin-top: 30px" cellpadding="5">
    <tr>
      <td width="25%">
        <div>Mengetahui</div>
        <div>Orang Tua/Wali</div>
        <div style="height: 70px"></div>
        <div>...........................</div>
      </td>
    </tr>
  </table>
  <table style="font-size:12px; width: 100%; margin-top: 30px" cellpadding="5">
        <tr>
          <td width="25%">
            <div>Mengetahui</div>
            <div>Wali Grade</div>
            <div style="height: 70px">
              <img src="'.$base.'media/ttd/'.$kel['ttdwaligrade'].'" width="100" height="50">
            </div>
            <div class="nama">'.$kel['waligrade'].'</div>
          </td>
          <td width="25%"></td>
          <td width="20%"></td>
          <td>
            <div>'.$titimangsa.'</div>
            <div>Wali Kelas,</div>
            <div style="height: 70px">
            <img src="'.$base.'media/ttd/'.$kel['ttdwalikelas'].'" width="100" height="50">
            </div>
            <div class="nama">'.$guru['nama'].'</div>
            <div>NIP.</div>
          </td>
        </tr>
    </table>
    <table style="font-size:12px; width: 100%;">
        <tr>
            <td width="37.5%"></td>
            <td>
                <div>Mengetahui</div>
                <div>Kepala Sekolah</div>
                <div style="height: 70px">
                    <img src="'.$base.'media/ttd/kepsek.jpg" height="70" alt="'.$base.'media/ttd/kepsek.jpg">
                  </div>
                <div class="nama">FIKRI RIZKY PRATAMA, S.Pd.</div>
                <div>NIP.</div>
            </td>
        </tr>
    </table>
  ';
  
    $footer = $kel['kelas'].'  |  '.strtoupper($hsis['nama']).'  |  '.$hsis['nisn'];
?>