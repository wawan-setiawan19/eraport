<?php

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

$titimangsa = 'Cirebon, 24 Desember 2021';

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
   <p>'.$PAGE_NUM.'</p>
    <div style="page-break-after: always">';
    //<center><img class="text-center" src="../kop/kop2.png" style="width:80%;height:100px;"></center>
    $content.='
    
    <br>
    <!-- table identitas -->
    '.header_identitas($hsis['kelas_dapodik'], $sem, $hsis['nama'], $ata['tahun'], $hsis['nisn'], $hsis['nis']).'
    <p class="text-center mt-3" style="font-weight: bold">PENCAPAIAN KOMPETENSI PESERTA DIDIK</p>
    <!-- page 1 -->
    <div><b style="font-size: 13px;">A. Sikap</b></div>
    <div class="title-sikap"><b style="font-size: 12px;">1. Sikap Spiritual</b></div>
    <table style="font-size:12px; width: 100%" class="nilai">
        <tr class="text-center font-weight-bold">
          <td width="15%">Predikat</td>
          <td>Deskripsi</td>
        </tr>
        <tr>
            <td class="text-center">'.$predikat_spiritual.'</td>
            <td style="text-align:justify;">'.$komsi['spiritual'].'</td>
        </tr>
    </table>
    
    <div class="title-sikap"><b style="font-size: 12px;">2. Sikap Sosial</b></div>
    
    <table style="font-size:12px; width: 100%" class="nilai">
        <tr class="text-center font-weight-bold">
          <td width="15%">Predikat</td>
          <td>Deskripsi</td>
        </tr>
        <tr>
            <td class="text-center">'.$predikat_sosial.'</td>
            <td style="text-align:justify;">'.$komsi['sosial'].'</td>
        </tr>
    </table>
    
    <table style="font-size:12px; width: 100%; margin-top: 100px" cellpadding="5">
        <tr>
          <td width="70%"></td>
          <td>
            <div>'.$titimangsa.'</div>
            <div>Wali Kelas,</div>
            <div style="height: 70px"></div>
            <div class="nama">'.$hsis['walas_dapodik'].'</div>
            <div>NIP.</div>
          </td>
        </tr>
    </table>
    <!-- akhir page 1 -->
    </div>
    
    <!-- page 2 -->
    <div style="page-break-after: always;">
    '.header_identitas($hsis['kelas_dapodik'], $sem, $hsis['nama'], $ata['tahun'], $hsis['nisn'], $hsis['nis']).'
    <b style="font-size: 13px; text-transform: uppercase;">B. Pengetahuan dan Keterampilan</b><br>
    <table style="font-size:12px; width: 100%" class="nilai">
      <tr class="text-center" style="font-weight: bold">
        <td width="2%" rowspan="2">NO</td>
        <td rowspan="2" width="18%">Mata Pelajaran</td>
        <td rowspan="2" width="2%">KKM</td>
        <td colspan="3">Pengetahuan</td>
      </tr>
      <tr class="text-center" style="font-weight: bold">
        <td width="3%">Nilai</td>
        <td width="5%">Predikat</td>
        <td>Deskripsi</td>
      </tr>
      ';
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $romawi= 1;
  $allnilsmkir= array();
  $allnilket= array();
  $vr=1;
  while($hex=mysqli_fetch_array($ex)){ 
    $pel=mysqli_query($con,"SELECT *,(SELECT avg(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT avg(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
    $vr=1;
    if(mysqli_num_rows($pel)>0){
        $content.= '<tr><td colspan="6"><b>'.$hex['katmapel'].'</b></td>';
      $content.= '';
      foreach($pel as $hpel){
        require '../view/rumus/nilairapot.php';
        $predikat = predikattambahan(nilairaport($hpel['nilaitugas'],$hpel['nilaiuh'],$hpel['nilaimid'],$hpel['nilaiuas']),$hpel['sl']);
        $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where c_ta='$c_ta'and c_mapel='$hpel[c_mapel]' and predikat = '$predikat' "));
        $content.='<tr class="text-center">';
        $content.='<td>'.$vr.'</td>';
        $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
        $content.='<td>'.$hpel['sl'].'</td>';

        $content.='<td>'.koma(nilairaport($hpel['nilaitugas'],$hpel['nilaiuh'],$hpel['nilaimid'],$hpel['nilaiuas'])).'</td>';

        $content.='<td>'.$predikat.'</td>';
        $content.='<td class="text-left" style="text-align:justify;">'.$deskripsi['des_peng'].'</td>';
        $content.='</tr>';
        $vr++;
        $allnilsmkir[]= nilairaport($hpel['nilaitugas'],$hpel['nilaiuh'],$hpel['nilaimid'],$hpel['nilaiuas']);
        $allnilket[]= $hpel['nilaiket'];
      }
    }
  $romawi++;
  }
  $content.='
  </table>
  <table style="font-size:12px; width: 100%; margin-top: 20px" cellpadding="5">
        <tr>
          <td width="70%"></td>
          <td>
            <div>'.$titimangsa.'</div>
            <div>Wali Kelas,</div>
            <div style="height: 70px"></div>
            <div class="nama">'.$hsis['walas_dapodik'].'</div>
            <div>NIP.</div>
          </td>
        </tr>
    </table>
  </div>
  <!-- akhir page 2 -->
  
  <!-- page 3 -->
  <div style="page-break-after: always;">
  '.header_identitas($hsis['kelas_dapodik'], $sem, $hsis['nama'], $ata['tahun'], $hsis['nisn'], $hsis['nis']).'
    <table class="nilai" style="font-size:12px; width: 100%">
      <tr class="text-center" style="font-weight: bold">
        <td width="2%" rowspan="2">NO</td>
        <td rowspan="2" width="18%">Mata Pelajaran</td>
        <td rowspan="2" width="2%">KKM</td>
        <td colspan="3">Keterampilan</td>
      </tr>
      <tr class="text-center" style="font-weight: bold">
        <td width="3%">Nilai</td>
        <td width="5%">Predikat</td>
        <td>Deskripsi</td>
      </tr>';
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $romawi= 1;
  $allnilsmkir= array();
  $allnilket= array();
  $vr=1;
  while($hex=mysqli_fetch_array($ex)){ 
    $pel=mysqli_query($con,"SELECT *,(SELECT sum(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT sum(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
    $vr=1;
    if(mysqli_num_rows($pel)>0){
       $content.= '<tr><td colspan="6"><b>'.$hex['katmapel'].'</b></td>';
        
      $content.= '';
      foreach($pel as $hpel){
        require '../view/rumus/nilairapot.php';
        $predikat = predikattambahan($hpel['nilaiket'],$hpel['sl']);
        $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where c_ta='$c_ta'and c_mapel='$hpel[c_mapel]' and predikat = '$predikat'"));
        $content.='<tr class="text-center">';
        $content.='<td>'.$vr.'</td>';
        $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
        $content.='<td><b>'.$hpel['sl'].'</b></td>';
        $content.='<td>'.koma($hpel['nilaiket']).'</td>';
        $content.='<td>'.$predikat.'</td>';
        $content.='<td class="text-left" style="text-align:justify;">'.$deskripsi['des_ket'].'</td>';
        $content.='</tr>';
        $vr++;
        $allnilsmkir[]= $nilsmkir;
        $allnilket[]= $hpel['nilaiket'];
      }
    }
  $romawi++;
  }

  $content.='
  </table>
  <table style="font-size:12px; width: 100%; margin-top: 20px" >
        <tr>
          <td width="70%"></td>
          <td>
            <div>'.$titimangsa.'</div>
            <div>Wali Kelas,</div>
            <div style="height: 70px"></div>
            <div class="nama">'.$hsis['walas_dapodik'].'</div>
            <div>NIP.</div>
          </td>
        </tr>
    </table>
  </div>
  <!-- akhir page 3 -->
  ';
  $content.='
  <div style="page-break-after: always;">
  '.header_identitas($hsis['kelas_dapodik'], $sem, $hsis['nama'], $ata['tahun'], $hsis['nisn'], $hsis['nis']).'
   <b style="font-size: 12px;">C. EKSTRAKURIKULER</b><br>
    <table class="nilai" style="font-size:11px; width: 100%">';
      $extra= mysqli_query($con,"SELECT * FROM nilaiextra left join extra on(nilaiextra.c_extra=extra.c_extra) where c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_ta='$c_ta'");
      if($extra==null){
        $content.= '<tr><td>-</td></tr>';
      }
      else{
        $content.= '
        <tr class="text-center" style="font-weight: bold">
          <td width="2%">No</td>
          <td width="30%">Kegiatan Ekstrakurikuler</td>
          <td width="10%">Nilai</td><td>Keterangan</td>
        </tr>';
        $no= 1;
        while($hextra= mysqli_fetch_array($extra)){
          $content.= '
          <tr>
            <td class="text-center">'.$no.'</td><td>'.$hextra['extra'].'</td><td class="text-center">'.$hextra['nilai'].'</td><td>'.$hextra['deskripsi'].'</td>
          </tr>';
        $no++; }
      }
    $content.= '
    </table>
    <br>
    <b style="font-size: 12px;">D. PRESTASI</b><br>
    <table class="nilai" style="font-size:11px; width: 100%">
        <tr class="text-center" style="font-weight: bold">
          <td width="2%">No</td>
          <td width="30%">Prestasi</td>
          <td>Keterangan</td>
        </tr>
        <tr>
            <td>1</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td">3</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    ';
    $setra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' limit 1 "));
    $content.='
    <br><b style="font-size: 12px;">F. KETIDAKHADIRAN</b><br>
    <table class="nilai" style="font-size:11px; width: 100%;">
      <tr>
        <td width="35%">SAKIT (S)</td>
        <td>'.$setra['s'].' hari</td>
      </tr>
      <tr>
        <td width="35%">IZIN (I)</td>
        <td>'.$setra['i'].' hari</td>
      </tr>
      <tr>
        <td width="35%">ALFA (A)</td>
        <td>'.$setra['a'].' hari</td>
      </tr>';
      $content.='
    </table>';
    $content.='
    <br><b style="font-size: 12px;">G. CATATAN WALI KELAS</b><br>
    <table class="nilai" style="font-size:11px; width: 100%;">
      <tr>';
      if($setra==NULL){
        $content.= '<td valign="top">-</td>';
      }else{
        $content.= '<td valign="top" height="30">'.$setra['catatan'].'</td>';
      }
      $content.='  
      </tr>
    </table>';
    $content.='
    <br><b style="font-size: 12px;">H. TANGGAPAN ORANGTUA/WALI</b><br>
    <table class="nilai" style="font-size:11px; width: 100%;">
      <tr>
        <td><br><br><br></td> 
      </tr>
    </table>
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
            <div class="nama">'.$hsis['walas_dapodik'].'</div>
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
                <div style="height: 70px"></div>
                <div class="nama">FIKRI RIZKY PRATAMA, S.Pd.</div>
                <div>NIP.</div>
            </td>
        </tr>
    </table>
    </div>';
    $footer = $hsis['kelas_dapodik'].'  |  '.strtoupper($hsis['nama']).'  |  '.$hsis['nisn'];
?>