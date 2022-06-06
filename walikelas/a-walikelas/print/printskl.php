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

// function header_identitas($kelas, $semester, $nama, $tahun, $nis, $nisn){
//     return '<table style="width:100%; border-bottom: 1px solid #000;">
//     <tr>
//       <td width="10%" class="text-left"><img src="'.$base.'/kop/logokop.png" alt="" style="width:200px;"></td>
//       <td valign="top" style="padding-left: 10px;">
//         <span style="color : #f39c12; font-size: 15px;">YAYASAN AL BAHJAH</span><br>
//         <span style="color : #2ecc71; font-size: 18px; font-weight: bold;">SMP ISLAM QURANI AL BAHJAH</span><br>
//         <span style="font-size: 12px; font-weight: bold">TERAKREDITASI A</span><br>
//         <span style="font-size: 12px; font-weight: bold">NSS : 20.2.02.17.12.010 / NPSN : 69893500</span><br>
//         <span style="font-size: 11px;">Jl. Pangeran Cakrabuana No. 179  Blok Gudang Air Sendang - Sumber - Cirebon 45611 </span><br>
//         <span style="font-size: 11px;">Telp. 0231-8820592 Website :  https://www.smpiqualbahjah1.sch.id</span><br>
//       </td>
//     </tr>
//   </table>
//   <center>421.3/141/SKL/SMPIQu-AB/VI/2022</center>
//     ';
// }

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
  $nilaiijazah= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilai_ijazah where c_ta='$c_ta' and c_siswa='$smk[c_siswa]' and c_kelas='$kel[c_kelas]'"));
  

$predikat_spiritual = predikat_label($komsi['nilaispi']);
$predikat_sosial = predikat_label($komsi['nilaisos']);

  
  $content .= '<title>Surat Keterangan Lulus '.$hsis['nama'].'</title>';
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
        p {
          font-size: 12pt;
        }
    </style
  
  </footer>
  <body style="font-family: verdana, arial, sans-serif;">';
   $content .= '<table style="width:100%; border-bottom: 1px solid #000;">
   <tr>
     <td width="10%" class="text-left"><img src="'.$basewa.'/kop/logokop.png" alt="" style="width:200px;"></td>
     <td valign="top" style="padding-left: 10px;">
       <span style="color : #f39c12; font-size: 15px;">YAYASAN AL BAHJAH</span><br>
       <span style="color : #2ecc71; font-size: 18px; font-weight: bold;">SMP ISLAM QURANI AL BAHJAH</span><br>
       <span style="font-size: 12px; font-weight: bold">TERAKREDITASI A</span><br>
       <span style="font-size: 12px; font-weight: bold">NSS : 20.2.02.17.12.010 / NPSN : 69893500</span><br>
       <span style="font-size: 11px;">Jl. Pangeran Cakrabuana No. 179  Blok Gudang Air Sendang - Sumber - Cirebon 45611 </span><br>
       <span style="font-size: 11px;">Telp. 0231-8820592 Website :  https://www.smpiqualbahjah1.sch.id</span><br>
     </td>
   </tr>
 </table>
 <br>
 <center>No. 421.3/141/SKL/SMPIQu-AB/VI/2022</center>';
   $content .= '<br>';
   $content .= '
        <p>
        Yang bertanda tangan di bawah ini, Kepala SMP Islam Qurani Al Bahjah Cirebon, menerangkan bahwa:
        </p>
   ';
   $content .= '
        <br>
        <table style="font-size: 12pt;">
          <tr>
            <td> Nama Lengkap </td>
            <td> : </td>
            <td>'.$hsis['nama'].'</td>
          <tr>
          <tr>
            <td> Tempat, Tanggal Lahir </td>
            <td> : </td>
            <td>'.$hsis['temlahir'].', '.tgl($hsis['tanglahir']).'</td>
          <tr>
          <tr>
            <td> Nama Orangtua </td>
            <td> : </td>
            <td>'.$csis['nama'].'</td>
          <tr>
          <tr>
            <td> Nomor Induk Siswa </td>
            <td> : </td>
            <td>'.$hsis['nisn'].'</td>
          <tr>
        </table>
        <p>
        Berdasarkan Hasil Rapat Dewan Guru tentang Penentuan Kelulusan serta  mengacu kepada Peraturan Sekertaris Jenderal Kementerian
        Pendidikan, Kebudayaan, Riset, dan Teknologi NO. 3 tahun 2022 tentang Perubahan Atas Peraturan Sekretaris Jenderal Kementerian
        Pendidikan, Kebudayaan, Riset, dan Teknologi NO. 1 tahun 2022, dengan ini peserta didik tersebut di atas dinyatakan :
        </p>
        <center style="font-weight: bold; font-size: 20pt;">LULUS</center>
        <p>dari sekolah menengah pertama dengan rata-rata Ujian Sekolah (Nilai Ijazah) =	<b>'.$nilaiijazah['nilai'].',00</b><br>
        Demikian surat keterangan ini kami buat agar yang berkepentingan dapat mengetahuinya. </p>

        <table style="font-size:12pt; width: 100%;">
        <tr>
            <td width="60%"></td>
            <td>
                <div>Cirebon, 6 Juni 2022</div>
                <div>Kepala Sekolah</div>
                <div style="height: 70px">
                  <img src="'.$base.'media/ttd/kepsek.jpg" height="120" alt="'.$base.'media/ttd/kepsek.jpg">
                </div>
                <div class="nama">FIKRI RIZKY PRATAMA, S.Pd.</div>
                <div>NIP.</div>
            </td>
        </tr>
    </table>
   '
?>