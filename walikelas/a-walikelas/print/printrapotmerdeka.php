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

if($ata['semester']=='1'){$sem= '1';}else if($ata['semester']=='2'){$sem= '2';}
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
        .catatan{
         height: 4em !important;
        }
    </style
  
  </footer>
  <body style="font-family: verdana, arial, sans-serif;">
   <p>'.$PAGE_NUM.'</p>';
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
    $content.='

    
    <!-- page 2 -->
    <div">
    '.header_identitas($kel['kelas'], $sem, $hsis['nama'], $ata['tahun'], $hsis['nisn'], $hsis['nis']).'
    <div style="font-size: 13px; text-align:center; font-weight:bold; text-transform: uppercase;">LAPORAN HASIL BELAJAR</div><br>
    <table style="font-size:12px; width: 100%" class="nilai">
      <tr class="text-center" style="font-weight: bold">
        <td width="2%">NO</td>
        <td width="25%">Mata Pelajaran</td>
        <td width="3%">Nilai AKhir</td>
        <td>Capaian Kompetensi</td>
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
            $NA = bulat(nilairaport($hpel['nilaitugas'],$hpel['nilaiuh'],$hpel['nilaimid'],$hpel['nilaiuas']));
            $predikat = predikattambahan($NA, $hpel['sl']);
            $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where c_ta='$c_ta'and c_mapel='$hpel[c_mapel]' and predikat = '$predikat' "));
            $content.='<tr class="text-center">';
            $content.='<td>'.$vr.'</td>';
            $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
            $content.='<td>'.$NA.'</td>';
            $content.='<td class="text-left" style="text-align:justify;">'.$deskripsi['des_peng'].'</td>';
            $content.='</tr>';
            $vr++;
          }
        }
      $romawi++;
      }

  $content.='
  </table>
  ';
  $content.=$break.'
    <table class="nilai" style="font-size:11px; width: 100%; margin-top: 20px; page-break-before: always;">';
      $extra= mysqli_query($con,"SELECT * FROM nilaiextra left join extra on(nilaiextra.c_extra=extra.c_extra) where c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' and c_ta='$c_ta'");
      if($extra==null){
        $content.= '<tr><td>-</td></tr>';
      }
      else{
        $content.= '
        <tr class="text-center" style="font-weight: bold">
          <td width="2%">No</td>
          <td width="30%">Kegiatan Ekstrakurikuler</td>
          <td width="10%">Predikat</td>
          <td>Keterangan</td>
        </tr>
        ';
        $no= 1;
        while($hextra= mysqli_fetch_array($extra)){
          $content.= '
          <tr>
            <td class="text-center">'.$no.'</td><td>'.$hextra['extra'].'</td><td class="text-center">'.$hextra['nilai'].'</td><td>'.$hextra['deskripsi'].'</td>
          </tr>';
        $no++; }
        if($no<2){
          $content.='
          <tr><td>1</td><td></td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td></td><td></td></tr>
          ';
        }
      }
    $content.= '
    </table>
    ';
    $setra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]' limit 1 "));
    $sakit = $setra['s']??0;
    $izin = $setra['i']??0;
    $alpha = $setra['a']??0;
    $content.='
      <br>
    <table class="nilai" style="font-size:11px; width: 40%;">
      <tr>
        <td width="20%">Sakit</td>
        <td width="20%">'.$sakit.' hari</td>
      </tr>
      <tr>
        <td width="20%">Izin</td>
        <td width="20%">'.$izin.' hari</td>
      </tr>
      <tr>
        <td width="20%">Tanpa Keterangan</td>
        <td width="20%">'.$alpha.' hari</td>
      </tr>';
      $content.='
    </table>';

    $content.='
    <div style="font-size: 12px; margin-top: 10px; margin-bottom: 10px;"><b>Catatan Wali Kelas</b><br></div>
    <table class="nilai" style="font-size:11px; width: 100%;">
      <tr style="min-height: 3em !important">';
      if($setra==NULL){
        $content .= '<td valign="top" class="catatan">-</td>';
      }else{
        $content.= '<td valign="top" class="catatan">'.$setra['catatan'].'</td>';
      }
      $content.='  
      </tr>
    </table>';

    
    if ($ata['semester']=='2') {
      $content.= '
      <table class="nilai" style="font-size:12px; width: 100%; margin-top: 20px;">
        <tr>
          <td>
            <b>Keputusan:</b><br>
            Berdasarkan hasil yang dicapai,'.$hasil_semester.' Peserta didik ditetapkan :<br>
            <b>'.$keputusan.'</b>
          </td>
        <tr>
      </table>';
    }
    $content.='<table style="font-size:12px; width: 100%; margin-top: 30px" cellpadding="5">
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
    $footer = $kel['kelas'].'  |  '.strtoupper($hsis['nama']).'  |  '.$hsis['nisn'];
?>