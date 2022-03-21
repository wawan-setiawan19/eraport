<?php
// include '../../../php/config.php';
// if($ata['semester']=='1'){$sem= 'Ganjil';}else if($ata['semester']=='2'){$sem= 'Genap';}
// $kel=mysqli_fetch_array(mysqli_query($con,"SELECT *,(SELECT c_guru from walikelas where c_kelas='$_GET[q]') as c_guru,(SELECT ttdwalikelas from walikelas where c_kelas='$_GET[q]') as ttdwalikelas FROM kelas where c_kelas='$_GET[q]' "));
// $guru= mysqli_fetch_array(mysqli_query($con,"SELECT * from guru where c_guru='$kel[c_guru]' "));
// $smk=mysqli_query($con,"SELECT * FROM jumlahnilra where c_kelas='$kel[c_kelas]' and c_siswa='$_GET[r]' order by nilaipresen desc limit 1 ");//limit 1 dihapus dan diganti desc
// foreach($smk as $akh){$rin[]= $akh['nilaipresen'];} $rin[]= '';
// $peringkat=1; $ar=0;
// $content .= '<title>Rapot '.$hsis['nama'].'</title>';
// $kelas = mysqli_query($con, "SELECT * FROM kelas WHERE c_kelas = '$_GET[q]'");

// $siswa= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' "); foreach($siswa as $hsiswa);
// $kelas= mysqli_query($con,"SELECT *,(SELECT c_guru from walikelas where c_kelas='$_GET[r]')as c_guru FROM kelas where c_kelas='$_GET[r]' "); foreach($kelas as $hkelas);
// $guru= mysqli_query($con,"SELECT * from guru where c_guru='$hkelas[c_guru]' "); foreach($guru as $hguru);
// $kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[r]' "));
// echo $_GET['q'];

// foreach($smk as $akh){
//   $deskripsi_sikap= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_sikap where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' "));
//   $komsi= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kompetensi_sikap where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' "));
//   $sis= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$akh[c_siswa]' "); foreach($sis as $hsis);
//   $csis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walimurid where c_siswa='$hsis[c_siswa]' "));
  
//   $content.='
//   <body style="font-family: verdana, arial, sans-serif;">
//     <div style="page-break-after: always; margin-top:-20px;">';
//     //<center><img class="text-center" src="../kop/kop2.png" style="width:80%;height:100px;"></center>
//     $content.='<h3 class="text-center"></h3>
//     <table style="width:100%; border-bottom: 1px solid #000;">
//       <tr>
//         <td width="10%" class="text-left"><img src="../kop/logokop.png" alt="" style="width:200px;"></td>
//         <td valign="top" style="padding-left: 10px;">
//           <span style="color : #f39c12; font-size: 15px;">YAYASAN AL BAHJAH</span><br>
//           <span style="color : #2ecc71; font-size: 18px; font-weight: bold;">SMP ISLAM QURANI AL BAHJAH</span><br>
//           <span style="font-size: 12px; font-weight: bold">TERAKREDITASI A</span><br>
//           <span style="font-size: 12px; font-weight: bold">NSS : 20.2.02.17.12.010 / NPSN : 69893500</span><br>
//           <span style="font-size: 11px;">Jl. Pangeran Cakrabuana No. 179  Blok Gudang Air Sendang - Sumber - Cirebon 45611 </span><br>
//           <span style="font-size: 11px;">Telp. 0231-8820592 Website :  https://www.smpiqualbahjah1.sch.id</span><br>
//         </td>
//       </tr>
//     </table>
//     <p class="text-center" style="padding-top: 10px;">Laporan Penilaian Hasil Belajar</p>
//     <table width="100%" style="font-size:13px; width: 100%; margin-top: -25px;">
//       <tr>
//         <td width="20%">
//           <p class="text-left">Nama Siswa<br>NISN/NIS<br>Kelas</p>
//         </td>
//         <td>
//           <p class="text-left">
//             : '.$hsis['nama'].'<br>
//             : '.$hsis['nisn'].'<br>
//             : '.$kel['kelas'].'
//           </p>
//         </td>
//         <td width="20%">
//           <p class="text-left">
//           Semester<br>Tahun Pelajaran
//           </p>
//         </td>
//         <td>
//           <p class="text-left">
//             : '.$sem.'<br>
//             : '.$ata['tahun'].'
//           </p>
//         </td>
//       </tr>
//     </table>
//     <b style="font-size: 13px;">A. Sikap</b><br>
//     <table border="1" style="font-size:12px; width: 100%" cellpadding="2">
//         <tr class="text-center">
//           <td width="2%">No</td><td width="30%">Sikap</td><td width="10.5%">Predikat</td><td>Deskripsi</td>
//         </tr>
//           <tr>
//             <td class="text-center">1</td><td>Spiritual</td><td class="text-center">'.$komsi['nilaispi'].'</td><td style="text-align:justify;">'.$komsi['spiritual'].'</td>
//           </tr>
//           <tr>
//             <td class="text-center">2</td><td>Akhlak</td><td class="text-center">'.$komsi['nilaiakh'].'</td><td style="text-align:justify;">'.$komsi['akhlak'].'</td>
//           </tr>
//           <tr>
//             <td class="text-center">3</td><td>Sosial</td><td class="text-center">'.$komsi['nilaisos'].'</td><td style="text-align:justify;">'.$komsi['sosial'].'</td>
//           </tr>
//     </table>
//     <br>
//     <b style="font-size: 13px;">B. Pengetahuan dan Keterampilan</b><br>
//     <table border="1" style="font-size:12px; width: 100%" cellpadding="2">
//       <tr class="text-center">
//         <td width="2%" rowspan="2">NO</td>
//         <td rowspan="2" width="30%">Mata Pelajaran</td>
//         <td rowspan="2" width="2%">KKM</td>
//         <td colspan="3">Pengetahuan</td>
//       </tr>
//       <tr class="text-center">
//         <td width="3%">Angka</td>
//         <td width="5%">Predikat</td>
//         <td>Deskripsi</td>
//       </tr>';
//   $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
//   $romawi= 1;
//   $allnilakhir= array();
//   $allnilket= array();
//   $vr=1;
//   while($hex=mysqli_fetch_array($ex)){ 
//     $pel=mysqli_query($con,"SELECT *,(SELECT sum(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT sum(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
//     // $vr=1;
//     if(mysqli_num_rows($pel)>0){
//       // $content.= '<tr><td class="text-center"><b>'.romawi($romawi).'</b></td><td colspan="5"><b>'.$hex['katmapel'].'</b></td>';
        
//       $content.= '';
//       foreach($pel as $hpel){
//         require '../view/rumus/nilairapot.php';
//         $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_rapot where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel='$hpel[c_mapel]' "));
//         $content.='<tr class="text-center">';
//         $content.='<td>'.$vr.'</td>';
//         $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
//         $content.='<td><b>'.$hpel['sl'].'</b></td>';
//         $content.='<td>'.koma($nilakhir).'</td>';
//         $content.='<td>'.predikattambahan($nilakhir,$hpel['sl']).'</td>';
//         $content.='<td class="text-left" style="text-align:justify;">'.$deskripsi['des_peng'].'</td>';
//         $content.='</tr>';
//         $vr++;
//         $allnilakhir[]= $nilakhir;
//         $allnilket[]= $hpel['nilaiket'];
//       }
//     }
//   $romawi++;
//   }
//   $content.= '<tr class="text-center">
//     <td colspan="3">Rata-Rata</td>
//     <td>'.koma(rata($allnilakhir)).'</td>
//     <td></td>
//     <td></td>
//   </tr>';
//   /*$content.='<tr class="text-center">';
//   $content.='<td colspan="3">Total Nilai</td>';
//   $content.='<td>'.$akh['nilaipresen'].'</td>';
//   if($peringkat<=10){
//     $content.='<td colspan="5">Peringkat '.$peringkat.'</td>';
//   }else{
//     $content.='<td></td>';
//   }
//   $content.='</tr>';
//   $ar2= $ar+1; if($rin[$ar]!=$rin[$ar2]){ $peringkat++; }
//   $ar++;*/
//   $content.='
//   </table> 
//   </div>
//   <div style="page-break-after: always;">
//     <table border="1" style="font-size:12px; width: 100%" cellpadding="2">
//       <tr class="text-center">
//         <td width="2%" rowspan="2">NO</td>
//         <td rowspan="2" width="30%">Mata Pelajaran</td>
//         <td rowspan="2" width="2%">KKM</td>
//         <td colspan="3">Keterampilan</td>
//       </tr>
//       <tr class="text-center">
//         <td width="3%">Angka</td>
//         <td width="5%">Predikat</td>
//         <td>Deskripsi</td>
//       </tr>';
//   $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
//   $romawi= 1;
//   $allnilakhir= array();
//   $allnilket= array();
//   $vr=1;
//   while($hex=mysqli_fetch_array($ex)){ 
//     $pel=mysqli_query($con,"SELECT *,(SELECT sum(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT sum(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
//     // $vr=1;
//     if(mysqli_num_rows($pel)>0){
//       // $content.= '<tr><td class="text-center"><b>'.romawi($romawi).'</b></td><td colspan="5"><b>'.$hex['katmapel'].'</b></td>';
        
//       $content.= '';
//       foreach($pel as $hpel){
//         require '../view/rumus/nilairapot.php';
//         $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_rapot where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel='$hpel[c_mapel]' "));
//         $content.='<tr class="text-center">';
//         $content.='<td>'.$vr.'</td>';
//         $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
//         $content.='<td><b>'.$hpel['sl'].'</b></td>';
//         $content.='<td>'.koma($hpel['nilaiket']).'</td>';
//         $content.='<td>'.predikattambahan($hpel['nilaiket'],$hpel['sl']).'</td>';
//         $content.='<td class="text-left" style="text-align:justify;">'.$deskripsi['des_ket'].'</td>';
//         $content.='</tr>';
//         $vr++;
//         $allnilakhir[]= $nilakhir;
//         $allnilket[]= $hpel['nilaiket'];
//       }
//     }
//   $romawi++;
//   }
//   $content.= '<tr class="text-center">
//     <td colspan="3">Rata-Rata</td>
//     <td>'.koma(rata($allnilket)).'</td>
//     <td></td>
//     <td></td>
//   </tr>';
//   /*$content.='<tr class="text-center">';
//   $content.='<td colspan="3">Total Nilai</td>';
//   $content.='<td>'.$akh['nilaipresen'].'</td>';
//   if($peringkat<=10){
//     $content.='<td colspan="5">Peringkat '.$peringkat.'</td>';
//   }else{
//     $content.='<td></td>';
//   }
//   $content.='</tr>';
//   $ar2= $ar+1; if($rin[$ar]!=$rin[$ar2]){ $peringkat++; }
//   $ar++;*/
//   $content.='
//   </table>
//   </div>';
//   $content.='
//   <div style="page-break-after: always;">
//     <b style="font-size: 13px;">C. Madrasah Diniyah</b><br>
//     <table border="1" style="font-size:11px; width: 100%" cellpadding="2">
//       <tr class="text-center">
//         <td width="2%" rowspan="2">No</td>
//         <td rowspan="2" width="20%">Kitab</td>
//         <td rowspan="2" width="2%">KKM</td>
//         <td colspan="3">Nilai</td>
//       </tr>
//       <tr class="text-center">
//         <td width="3%">Angka</td>
//         <td width="10%">Predikat</td>
//         <td>Keterangan</td>
//       </tr>';
//       $allnilmd= array();
//       $md=mysqli_query($con,"SELECT * FROM mapelmd_kelas left join mapelmd on (mapelmd.id_mapelmd=mapelmd_kelas.id_mapelmd) where c_kelas='$kel[c_kelas]' order by nama_mapelmd asc "); $vr=1;
//       while($hmd=mysqli_fetch_array($md)){
//         $nilmd= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimd where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapelmd='$hmd[id_mapelmd]' "));
//           $allnilmd[]= $nilmd['nilai'];

//           $content.= '
//           <tr>
//             <td class="text-center">'.$vr.'</td>
//             <td>'.$hmd['nama_mapelmd'].'</td>
//             <td class="text-center"><b>'.$hmd['kkm_mapelmd'].'</b></td>
//             <td class="text-center">'.koma($nilmd['nilai']).'</td>
//             <td class="text-center">'.predikattambahan($nilmd['nilai'],$hmd['kkm_mapelmd']).'</td>
//             <td>'.$nilmd['deskripsi'].'</td>
//           </tr>
//           ';
//       $vr++; }
//       $content.= '<tr class="text-center">
//     <td colspan="3">Rata-Rata</td>
//     <td>'.koma(rata($allnilmd)).'</td>
//     <td></td>
//     <td></td>
//   </tr>';
//   $content.='
//   </table>
//     <b style="font-size: 12px;">D. Tahfidzul Quran</b><br>
//     <table border="1" style="font-size:11px; width: 100%" cellpadding="2">
//       <tr class="text-center">
//         <td width="2%">No</td>
//         <td width="20%">Capaian</td>
//         <td width="9.5%">Juz/Jilid</td>
//         <td width="10%">Surat</td>
//         <td width="10%">Ayat/Hal</td>
//         <td>Deskripsi</td>
//       </tr>
//       ';
//       $md=mysqli_query($con,"SELECT * FROM mapeltq_kelas left join mapeltq on (mapeltq.id_mapeltq=mapeltq_kelas.id_mapeltq) where c_kelas='$kel[c_kelas]' order by nama_mapeltq asc "); $vr=1;
//       while($hmd=mysqli_fetch_array($md)){
//         $niltq= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitq where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapeltq='$hmd[id_mapeltq]' "));
//           $content.= '
//           <tr>
//             <td class="text-center">'.$vr.'</td>
//             <td>'.$hmd['nama_mapeltq'].'</td>
//             <td class="text-center">'.$niltq['juz'].'</td>
//             <td class="text-center">'.$niltq['surat'].'</td>
//             <td class="text-center">'.$niltq['ayat'].'</td>
//             <td>'.$niltq['deskripsi'].'</td>
//           </tr>
//           ';
//       $vr++; }
//     $content.='
//   </table>';
//   $content.='
//    <b style="font-size: 12px;">E. Ekstra Kurikuler</b><br>
//     <table border="1" style="font-size:11px; width: 100%" cellpadding="2">';
//       $extra= mysqli_query($con,"SELECT * FROM nilaiextra left join extra on(nilaiextra.c_extra=extra.c_extra) where c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' ");
//       if($extra==null){
//         $content.= '<tr><td>-</td></tr>';
//       }
//       else{
//         $content.= '
//         <tr class="text-center">
//           <td width="2%">No</td><td width="29.5%">Kegiatan Ekstrakurikuler</td><td width="10%">Nilai</td><td>Keterangan</td>
//         </tr>';
//         $no= 1;
//         while($hextra= mysqli_fetch_array($extra)){
//           $content.= '
//           <tr>
//             <td class="text-center">'.$no.'</td><td>'.$hextra['extra'].'</td><td class="text-center">'.$hextra['nilai'].'</td><td>'.$hextra['deskripsi'].'</td>
//           </tr>';
//         $no++; }
//       }
//     $content.= '
//     </table>';
//     $setra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' limit 1 "));
//     $content.='
//     <b style="font-size: 12px;">F. Ketidakhadiran</b><br>
//     <table border="1" style="font-size:11px; width: 100%;" cellpadding="2">
//       <tr class="text-center">
//         <td width="31.5%">SAKIT (S)</td><td width="33%">IZIN (I)</td><td width="33%">ALFA (A)</td>
//       </tr>
//       <tr class="text-center">';
//       if($setra==NULL){
//         $content.= '<td>- Hari</td><td>- Hari</td><td>- Hari</td>';
//       }else{
//         $content.= '<td>'.$setra['s'].' Hari</td><td>'.$setra['i'].' Hari</td><td>'.$setra['a'].' Hari</td>';
//       }
//       $content.='
//       </tr>
//     </table>
//     </div>';
//     $content.='
//     <b style="font-size: 12px;">G. Catatan Wali Kelas</b><br>
//     <table border="1" style="font-size:11px; width: 100%;" cellpadding="2">
//       <tr>';
//       if($setra==NULL){
//         $content.= '<td valign="top">-</td>';
//       }else{
//         $content.= '<td valign="top" height="50">'.$setra['catatan'].'</td>';
//       }
//       $content.='  
//       </tr>
//     </table>';
//     $content.='
//     <b style="font-size: 12px;">H. Catatan Wali Santri/Wali</b><br>
//     <table border="1" style="font-size:11px; width: 100%;" cellpadding="2">
//       <tr>
//         <td><br><br><br><br><br><br></td> 
//       </tr>
//     </table>
//     <br>
//     <table style="width:100%; font-size:13px;">
//       <tr>
//         <td valign="top" width="35%">
//           Orang Tua/ Wali
//           <br><br><br><br>
//           <u><b>('.$csis['nama'].')</b></u>
//         </td>
//         <td valign="top" width="65%" class="text-center">
//         </td>
//       </tr>
//     </table>';
//   $content.=' 
//   ';
//     $content.='
//     <div style="position: absolute;bottom: 0;right: 0;">
//     <p class="text-center" style="font-size: 12px;">Cirebon, '.tgl(date('d-m-Y')).'</p>
//     <table style="width:100%; font-size:13px;">
//       <tr>
//         <td valign="top" width="35%" class="text-center">
//           Wali Grade
//           <br>
//           <img src="../../media/ttd/'.$kel['ttdwaligrade'].'" width="100" height="50">
//           <br>
//           <u><b>'.$kel['waligrade'].'</b></u>
//         </td>
//         <td valign="top" width="30%" class="text-center">
//           Murokib/ah
//           <br>
//           <img src="../../media/ttd/'.$kel['ttdmurokib'].'" width="100" height="50">
//           <br>
//           <u><b>'.$kel['murokib'].'</b></u>
//         </td>
//         <td valign="top" width="35%" class="text-center">
//           Wali Kelas
//           <br>
//           <img src="../../media/ttd/'.$kel['ttdwalikelas'].'" width="100" height="50">
//           <br>
//           <u><b>'.$guru['nama'].'</b></u>
//         </td>
//       </tr>
//     </table>
//     <br>
//     <table style="width:100%; font-size:13px;">
//       <tr>
//         <td valign="top" width="47%" class="text-center">
//           <br>
//           Kepala SMP Islam Qurani Al Bahjah
//           <br>
//           <img src="../../media/ttd/kepsek.jpg" width="100" height="60">
//           <br>
//           <u><b>Fikri Rizky Pratama, S.Pd.</b></u>
//         </td>
//         <td valign="top" width="6%" class="text-center">
//           Mengetahui,
//         </td>
//         <td valign="top" width="47%" class="text-center">
//           <br>
//           Kepala Pondok Al Bahjah
//           <br>
//           <img src="../../media/ttd/ketuapondok.jpg" width="100" height="60">
//           <br>
//           <u><b>Muhammad Subhan, Lc.</b></u>
//         </td>
//       </tr>
//     </table>
//     </div>
//     </div>
//     </body>
//   ';
// }
?>

<?php 
  include '../../../php/config.php';

  $content .= ''
?>

<title>Rapot</title>

   <body style="font-family: verdana, arial, sans-serif;">
     <div style="page-break-after: always; margin-top:-20px;">;
     <center><img class="text-center" src="../kop/kop2.png" style="width:80%;height:100px;"></center>
     <h3 class="text-center"></h3>
     <table style="width:100%; border-bottom: 1px solid #000;">
       <tr>
         <td width="10%" class="text-left"><img src="../kop/logokop.png" alt="" style="width:200px;"></td>
         <td valign="top" style="padding-left: 10px;">
           <span style="color : #f39c12; font-size: 15px;">YAYASAN AL BAHJAH</span><br>
           <span style="color : #2ecc71; font-size: 18px; font-weight: bold;">SMP ISLAM QURANI AL BAHJAH</span><br>
           <span style="font-size: 12px; font-weight: bold">TERAKREDITASI A</span><br>
           <span style="font-size: 12px; font-weight: bold">NSS : 20.2.02.17.12.010 / NPSN : 69893500</span><br>
           <span style="font-size: 11px;">Jl. Pangeran Cakrabuana No. 179  Blok Gudang Air Sendang - Sumber - Cirebon 45611 </span><br>
           <span style="font-size: 11px;">Telp. 0231-8820592 Website :  https:www.smpiqualbahjah1.sch.id</span><br>
         </td>
       </tr>
     </table>
     <p class="text-center" style="padding-top: 10px;">Laporan Penilaian Hasil Belajar</p>
     <table width="100%" style="font-size:13px; width: 100%; margin-top: -25px;">
       <tr>
         <td width="20%">
           <p class="text-left">Nama Siswa<br>NISN/NIS<br>Kelas</p>
         </td>
         <td>
           <p class="text-left">
             : '.$hsis['nama'].'<br>
             : '.$hsis['nisn'].'<br>
             : '.$kel['kelas'].'
           </p>
         </td>
         <td width="20%">
           <p class="text-left">
           Semester<br>Tahun Pelajaran
           </p>
         </td>
         <td>
           <p class="text-left">
             : '.$sem.'<br>
             : '.$ata['tahun'].'
           </p>
         </td>
       </tr>
     </table>
     <b style="font-size: 13px;">A. Sikap</b><br>
     <table border="1" style="font-size:12px; width: 100%" cellpadding="2">
         <tr class="text-center">
           <td width="2%">No</td><td width="30%">Sikap</td><td width="10.5%">Predikat</td><td>Deskripsi</td>
         </tr>
           <tr>
             <td class="text-center">1</td><td>Spiritual</td><td class="text-center">'.$komsi['nilaispi'].'</td><td style="text-align:justify;">'.$komsi['spiritual'].'</td>
           </tr>
           <tr>
             <td class="text-center">2</td><td>Akhlak</td><td class="text-center">'.$komsi['nilaiakh'].'</td><td style="text-align:justify;">'.$komsi['akhlak'].'</td>
           </tr>
           <tr>
             <td class="text-center">3</td><td>Sosial</td><td class="text-center">'.$komsi['nilaisos'].'</td><td style="text-align:justify;">'.$komsi['sosial'].'</td>
           </tr>
     </table>
     <br>
     <b style="font-size: 13px;">B. Pengetahuan dan Keterampilan</b><br>
     <table border="1" style="font-size:12px; width: 100%" cellpadding="2">
       <tr class="text-center">
         <td width="2%" rowspan="2">NO</td>
         <td rowspan="2" width="30%">Mata Pelajaran</td>
         <td rowspan="2" width="2%">KKM</td>
         <td colspan="3">Pengetahuan</td>
       </tr>
       <tr class="text-center">
         <td width="3%">Angka</td>
         <td width="5%">Predikat</td>
         <td>Deskripsi</td>
       </tr>';
   $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
   $romawi= 1;
   $allnilakhir= array();
   $allnilket= array();
   $vr=1;
   while($hex=mysqli_fetch_array($ex)){ 
     $pel=mysqli_query($con,"SELECT *,(SELECT sum(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT sum(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
      $vr=1;
     if(mysqli_num_rows($pel)>0){
        $content.= '<tr><td class="text-center"><b>'.romawi($romawi).'</b></td><td colspan="5"><b>'.$hex['katmapel'].'</b></td>';
        
       $content.= '';
       foreach($pel as $hpel){
         require '../view/rumus/nilairapot.php';
         $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_rapot where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel='$hpel[c_mapel]' "));
         $content.='<tr class="text-center">';
         $content.='<td>'.$vr.'</td>';
         $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
         $content.='<td><b>'.$hpel['sl'].'</b></td>';
         $content.='<td>'.koma($nilakhir).'</td>';
         $content.='<td>'.predikattambahan($nilakhir,$hpel['sl']).'</td>';
         $content.='<td class="text-left" style="text-align:justify;">'.$deskripsi['des_peng'].'</td>';
         $content.='</tr>';
         $vr++;
         $allnilakhir[]= $nilakhir;
         $allnilket[]= $hpel['nilaiket'];
       }
     }
   $romawi++;
   }
   $content.= '<tr class="text-center">
     <td colspan="3">Rata-Rata</td>
     <td>'.koma(rata($allnilakhir)).'</td>
     <td></td>
     <td></td>
   </tr>';
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
   <div style="page-break-after: always;">
     <table border="1" style="font-size:12px; width: 100%" cellpadding="2">
       <tr class="text-center">
         <td width="2%" rowspan="2">NO</td>
         <td rowspan="2" width="30%">Mata Pelajaran</td>
         <td rowspan="2" width="2%">KKM</td>
         <td colspan="3">Keterampilan</td>
       </tr>
       <tr class="text-center">
         <td width="3%">Angka</td>
         <td width="5%">Predikat</td>
         <td>Deskripsi</td>
       </tr>';
   $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
   $romawi= 1;
   $allnilakhir= array();
   $allnilket= array();
   $vr=1;
   while($hex=mysqli_fetch_array($ex)){ 
     $pel=mysqli_query($con,"SELECT *,(SELECT sum(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuh,(SELECT sum(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(SELECT avg(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel=mapel_kelas.c_mapel) as nilaiket,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$kel[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc ");
      $vr=1;
     if(mysqli_num_rows($pel)>0){
        $content.= '<tr><td class="text-center"><b>'.romawi($romawi).'</b></td><td colspan="5"><b>'.$hex['katmapel'].'</b></td>';
        
       $content.= '';
       foreach($pel as $hpel){
         require '../view/rumus/nilairapot.php';
         $deskripsi=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_rapot where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and c_mapel='$hpel[c_mapel]' "));
         $content.='<tr class="text-center">';
         $content.='<td>'.$vr.'</td>';
         $content.='<td class="text-left">'.$hpel['mapel'].'</td>';
         $content.='<td><b>'.$hpel['sl'].'</b></td>';
         $content.='<td>'.koma($hpel['nilaiket']).'</td>';
         $content.='<td>'.predikattambahan($hpel['nilaiket'],$hpel['sl']).'</td>';
         $content.='<td class="text-left" style="text-align:justify;">'.$deskripsi['des_ket'].'</td>';
         $content.='</tr>';
         $vr++;
         $allnilakhir[]= $nilakhir;
         $allnilket[]= $hpel['nilaiket'];
       }
     }
   $romawi++;
   }
   $content.= '<tr class="text-center">
     <td colspan="3">Rata-Rata</td>
     <td>'.koma(rata($allnilket)).'</td>
     <td></td>
     <td></td>
   </tr>';
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
   </div>';
   $content.='
   <div style="page-break-after: always;">
     <b style="font-size: 13px;">C. Madrasah Diniyah</b><br>
     <table border="1" style="font-size:11px; width: 100%" cellpadding="2">
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
         $nilmd= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimd where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapelmd='$hmd[id_mapelmd]' "));
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
   </tr>';
   $content.='
   </table>
     <b style="font-size: 12px;">D. Tahfidzul Quran</b><br>
     <table border="1" style="font-size:11px; width: 100%" cellpadding="2">
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
         $niltq= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitq where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' and id_mapeltq='$hmd[id_mapeltq]' "));
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
    <b style="font-size: 12px;">E. Ekstra Kurikuler</b><br>
     <table border="1" style="font-size:11px; width: 100%" cellpadding="2">';
       $extra= mysqli_query($con,"SELECT * FROM nilaiextra left join extra on(nilaiextra.c_extra=extra.c_extra) where c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' ");
       if($extra==null){
         $content.= '<tr><td>-</td></tr>';
       }
       else{
         $content.= '
         <tr class="text-center">
           <td width="2%">No</td><td width="29.5%">Kegiatan Ekstrakurikuler</td><td width="10%">Nilai</td><td>Keterangan</td>
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
     </table>';
     $setra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_siswa='$akh[c_siswa]' and c_kelas='$kel[c_kelas]' limit 1 "));
     $content.='
     <b style="font-size: 12px;">F. Ketidakhadiran</b><br>
     <table border="1" style="font-size:11px; width: 100%;" cellpadding="2">
       <tr class="text-center">
         <td width="31.5%">SAKIT (S)</td><td width="33%">IZIN (I)</td><td width="33%">ALFA (A)</td>
       </tr>
       <tr class="text-center">';
       if($setra==NULL){
         $content.= '<td>- Hari</td><td>- Hari</td><td>- Hari</td>';
       }else{
         $content.= '<td>'.$setra['s'].' Hari</td><td>'.$setra['i'].' Hari</td><td>'.$setra['a'].' Hari</td>';
       }
       $content.='
       </tr>
     </table>
     </div>';
     $content.='
     <b style="font-size: 12px;">G. Catatan Wali Kelas</b><br>
     <table border="1" style="font-size:11px; width: 100%;" cellpadding="2">
       <tr>';
       if($setra==NULL){
         $content.= '<td valign="top">-</td>';
       }else{
         $content.= '<td valign="top" height="50">'.$setra['catatan'].'</td>';
       }
       $content.='  
       </tr>
     </table>';
     $content.='
     <b style="font-size: 12px;">H. Catatan Wali Santri/Wali</b><br>
     <table border="1" style="font-size:11px; width: 100%;" cellpadding="2">
       <tr>
         <td><br><br><br><br><br><br></td> 
       </tr>
     </table>
     <br>
     <table style="width:100%; font-size:13px;">
       <tr>
         <td valign="top" width="35%">
           Orang Tua/ Wali
           <br><br><br><br>
           <u><b>('.$csis['nama'].')</b></u>
         </td>
         <td valign="top" width="65%" class="text-center">
         </td>
       </tr>
     </table>';
   $content.=' 
   ';
     $content.='
     <div style="position: absolute;bottom: 0;right: 0;">
     <p class="text-center" style="font-size: 12px;">Cirebon, '.tgl(date('d-m-Y')).'</p>
     <table style="width:100%; font-size:13px;">
       <tr>
         <td valign="top" width="35%" class="text-center">
           Wali Grade
           <br>
           <img src="../../media/ttd/'.$kel['ttdwaligrade'].'" width="100" height="50">
           <br>
           <u><b>'.$kel['waligrade'].'</b></u>
         </td>
         <td valign="top" width="30%" class="text-center">
           Murokib/ah
           <br>
           <img src="../../media/ttd/'.$kel['ttdmurokib'].'" width="100" height="50">
           <br>
           <u><b>'.$kel['murokib'].'</b></u>
         </td>
         <td valign="top" width="35%" class="text-center">
           Wali Kelas
           <br>
           <img src="../../media/ttd/'.$kel['ttdwalikelas'].'" width="100" height="50">
           <br>
           <u><b>'.$guru['nama'].'</b></u>
         </td>
       </tr>
     </table>
     <br>
     <table style="width:100%; font-size:13px;">
       <tr>
         <td valign="top" width="47%" class="text-center">
           <br>
           Kepala SMP Islam Qurani Al Bahjah
           <br>
           <img src="../../media/ttd/kepsek.jpg" width="100" height="60">
           <br>
           <u><b>Fikri Rizky Pratama, S.Pd.</b></u>
         </td>
         <td valign="top" width="6%" class="text-center">
           Mengetahui,
         </td>
         <td valign="top" width="47%" class="text-center">
           <br>
           Kepala Pondok Al Bahjah
           <br>
           <img src="../../media/ttd/ketuapondok.jpg" width="100" height="60">
           <br>
           <u><b>Muhammad Subhan, Lc.</b></u>
         </td>
       </tr>
     </table>
     </div>
     </div>
     </body>
   ';