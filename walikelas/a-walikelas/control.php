<?php

use Dompdf\Dompdf;
use Dompdf\Options;

date_default_timezone_set('Asia/Jakarta'); session_start();
if(empty($_SESSION['c_walikelas'])){header('location:../../');}
function random($length){
  $data='1234567890AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSstuuUvVwWxXyYyZz';
  $string='';
  for($i=1;$i<=$length;$i++){
    $pos=rand(0,strlen($data)-1);
    $string.=$data{$pos};
  }
  return $string;
}
$content= '
<style type="text/css">table {border-spacing: 0;border-collapse: collapse}td,th {padding: 0;}.text-left {text-align: left;}.text-right {text-align: right;}.text-center {text-align: center;}.text-justify {text-align: justify;}.text-nowrap {white-space: nowrap;}.text-lowercase {text-transform: lowercase;}.text-uppercase {text-transform: uppercase;}.text-capitalize {text-transform: capitalize;}.pull-right {float: right !important;}.pull-left {float: left !important;}.lulus{background-color:#4eee94;}.tdklulus{background-color:#ff3030;}.kiri{padding-left: 3px;}.kanan{padding-right: 3px;}
  .btop{ border-top: 1px solid black; }.bbottom{ border-bottom: 1px solid black; }.bleft{ border-left: 1px solid black; }.bright{ border-right: 1px solid black; }.ball{ border: 1px solid black; }
</style>';
require '../../php/config.php';
if(empty($_GET['smkakh']) or empty($_GET['q'])){
	header('location:../../login');
}
else{
	require 'action.php';
	$smk=new action();
	$akh=($_GET['smkakh']);
  if($akh==md5('logout')){ 
    session_destroy();
    //session_unset($_SESSION['c_walikelas']);
    header('location:../../');
  }
//kompetensi sikap
  else if($akh==md5('simpankompetensisikap')){
    $spiritual = $_POST['spiritual'];
    $sosial = $_POST['sosial'];
    $akhlak = $_POST['akhlak'];
    $nilaispi = $_POST['nilaispi'];
    $nilaisos = $_POST['nilaisos'];
    $nilaiakh = $_POST['nilaiakh'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kompetensi_sikap where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO kompetensi_sikap set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',spiritual='$spiritual[$no]',sosial='$sosial[$no]',akhlak='$akhlak[$no]',nilaispi='$nilaispi[$no]',nilaisos='$nilaisos[$no]',nilaiakh='$nilaiakh[$no]' ");
          }else{
             $edit=mysqli_query($con,"UPDATE kompetensi_sikap set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',spiritual='$spiritual[$no]',sosial='$sosial[$no]',akhlak='$akhlak[$no]',nilaispi='$nilaispi[$no]',nilaisos='$nilaisos[$no]',nilaiakh='$nilaiakh[$no]' WHERE c_kompetensi_sikap='$cekada[c_aspek_fisik]' ");
          }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../kompetensisikap');
  }
  else if($akh==md5('ulangkompetensisikap')){
    mysqli_query($con,"DELETE FROM kompetensi_sikap where c_kelas='$_GET[q]' and c_ta='$c_ta' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:../../kompetensisikap');
  }
//tinggi berat badan
  else if($akh==md5('simpanberattinggi')){
    $berats1 = $_POST['berats1'];
    $tinggis1 = $_POST['tinggis1'];
    $berats2 = $_POST['berats2'];
    $tinggis2 = $_POST['tinggis2'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM berattinggi where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO berattinggi set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',berats1='$berats1[$no]',tinggis1='$tinggis1[$no]',berats2='$berats2[$no]',tinggis2='$tinggis2[$no]' ");
          }else{
             $edit=mysqli_query($con,"UPDATE berattinggi set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',berats1='$berats1[$no]',tinggis1='$tinggis1[$no]',berats2='$berats2[$no]',tinggis2='$tinggis2[$no]' WHERE c_berattinggi='$cekada[c_aspek_fisik]' ");
          }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../berattinggi');
  }
  else if($akh==md5('ulangberattinggi')){
    mysqli_query($con,"DELETE FROM berattinggi where c_kelas='$_GET[q]' and c_ta='$c_ta' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:../../berattinggi');
  }
//aspek fisik
  else if($akh==md5('simpanaspekfisik')){
    $penglihatan = $_POST['penglihatan'];
    $pendengaran = $_POST['pendengaran'];
    $gigi = $_POST['gigi'];
    $lainnya = $_POST['lainnya'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM aspek_fisik where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO aspek_fisik set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',penglihatan='$penglihatan[$no]',pendengaran='$pendengaran[$no]',gigi='$gigi[$no]',lainnya='$lainnya[$no]' ");
          }else{
             $edit=mysqli_query($con,"UPDATE aspek_fisik set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',penglihatan='$penglihatan[$no]',pendengaran='$pendengaran[$no]',gigi='$gigi[$no]',lainnya='$lainnya[$no]' WHERE c_aspek_fisik='$cekada[c_aspek_fisik]' ");
          }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../aspekfisik');
  }
  else if($akh==md5('ulangaspekfisik')){
    mysqli_query($con,"DELETE FROM aspek_fisik where c_kelas='$_GET[q]' and c_ta='$c_ta' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:../../aspekfisik');
  }
//prestasi
  else if($akh==md5('addprestasi')){
    mysqli_query($con,"INSERT INTO prestasi set c_siswa='$_POST[c_siswa]',c_extra='$_POST[c_extra]',ket='$_POST[ket]' ");
    header('location:../../prestasi/'.$_POST['c_siswa']);
  }
  else if($akh==md5('hapusprestasi')){
    mysqli_query($con,"DELETE FROM prestasi where c_prestasi='$_GET[q]' ");
    header('location:../../prestasi/'.$_GET['r']);
  }
//pkl
  else if($akh==md5('addpkl')){
    mysqli_query($con,"INSERT INTO pkl set c_siswa='$_POST[c_siswa]',mitradudi='$_POST[mitradudi]',lokasi='$_POST[lokasi]',lama='$_POST[lama]',ket='$_POST[ket]' ");
    header('location:../../pkl/'.$_POST['c_siswa']);
  }
  else if($akh==md5('hapuspkl')){
    mysqli_query($con,"DELETE FROM pkl where c_pkl='$_GET[q]' ");
    header('location:../../pkl/'.$_GET['r']);
  }
//nilai nilaimd
  else if($akh==md5('inputnilaimd')){
    $at=date('Y-m-d');$nilai = $_POST['nilai']; $deskripsi = $_POST['deskripsi'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimd where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' and id_mapelmd='$_POST[id_mapelmd]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaimd set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',id_mapelmd='$_POST[id_mapelmd]',nilai='$nilai[$no]',deskripsi='$deskripsi[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaimd set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',id_mapelmd='$_POST[id_mapelmd]',nilai='$nilai[$no]',deskripsi='$deskripsi[$no]',at='$at' WHERE id_nilaimd='$cekada[id_nilaimd]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../nilaimapelmd/'.$_POST['id_mapelmd'].'?');
  }
  else if($akh==md5('inputnilaiijazah')){
    $nilai = $_POST['nilai'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilai_ijazah where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]'"));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilai_ijazah set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]'");
          }else{
             $edit=mysqli_query($con,"UPDATE nilai_ijazah set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]' WHERE id_nilaiijazah='$cekada[id_nilaiijazah]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    // header('location:'.$basewa);
    header('location:'.$basewa.'/nilaiijazah');
  }
  else if($akh==md5('setelulangmd')){
    $c_kelas=$_GET['q']; $id_mapelmd=$_GET['r'];
    $setel=mysqli_query($con,"DELETE from nilaimd where c_ta='$c_ta' and c_kelas='$c_kelas' and id_mapelmd='$id_mapelmd' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basewa.'nilaimapelmd/'.$id_mapelmd.'?kelas='.$c_kelas);
  }
//nilai nilaitq
  else if($akh==md5('inputnilaitq')){
    $at=date('Y-m-d');$juz = $_POST['juz']; $surat = $_POST['surat']; $ayat = $_POST['ayat']; $deskripsi = $_POST['deskripsi']; $nilai_peta = $_POST['nilai_peta'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($juz[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitq where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' and id_mapeltq='$_POST[id_mapeltq]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaitq set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',id_mapeltq='$_POST[id_mapeltq]',juz='$juz[$no]',surat='$surat[$no]',ayat='$ayat[$no]',deskripsi='$deskripsi[$no]', nilai_peta='$nilai_peta[$no]', at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaitq set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',id_mapeltq='$_POST[id_mapeltq]',juz='$juz[$no]',surat='$surat[$no]',ayat='$ayat[$no]',deskripsi='$deskripsi[$no]', nilai_peta='$nilai_peta[$no]', at='$at' WHERE id_nilaitq='$cekada[id_nilaitq]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../nilaimapeltq/'.$_POST['id_mapeltq'].'?');
  }
  else if($akh==md5('setelulangmd')){
    $c_kelas=$_GET['q']; $id_mapeltq=$_GET['r'];
    $setel=mysqli_query($con,"DELETE from nilaitq where c_ta='$c_ta' and c_kelas='$c_kelas' and id_mapeltq='$id_mapeltq' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basegu.'nilaimapeltq/'.$id_mapeltq.'?');
  }
//deskripsi sikap
  else if($akh==md5('simpandeskripsisikap')){
    $deskripsi = $_POST['deskripsi'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($deskripsi[$no]==''){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_sikap where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO deskripsi_sikap set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',deskripsi='$deskripsi[$no]' ");
          }else{
             $edit=mysqli_query($con,"UPDATE deskripsi_sikap set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',deskripsi='$deskripsi[$no]' WHERE c_deskripsi='$cekada[c_deskripsi]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../deskripsisikap');
  }
  else if($akh==md5('ulangdeskripsisikap')){
    mysqli_query($con,"DELETE FROM deskripsi_sikap where c_kelas='$_GET[q]' and c_ta='$c_ta' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:../../deskripsisikap');
  }
//nilai sikap
  else if($akh==md5('inputnilaisik')){
    $at=date('Y-m-d');$nilai = $_POST['nilaisik'];
    $lsis=mysqli_query($con,"SELECT * FROM aspeksikap where c_kelas='$_POST[c_kelas]' order by ket asc"); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaisikap where c_ta='$c_ta' and c_aspeksikap='$hlsis[c_aspeksikap]' and c_siswa='$_POST[c_siswa]' and c_kelas='$_POST[c_kelas]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaisikap set c_ta='$c_ta',c_aspeksikap='$hlsis[c_aspeksikap]',c_siswa='$_POST[c_siswa]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaisikap set c_ta='$c_ta',c_aspeksikap='$hlsis[c_aspeksikap]',c_siswa='$_POST[c_siswa]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]',at='$at' WHERE c_nilaisikap='$cekada[c_nilaisikap]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../nilaisikap/'.$_POST['c_siswa'].'');
  }
  else if($akh==md5('setelulangsik')){
    $c_siswa=$_GET['q']; $c_kelas=$_GET['r'];
    $setel=mysqli_query($con,"DELETE from nilaisikap where c_ta='$c_ta' and c_siswa='$c_siswa' and c_kelas='$c_kelas' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basewa.'nilaisikap/'.$c_siswa.'');
  }
//nilai extra
  else if($akh==md5('inputnilaiextra')){
    $at=date('Y-m-d');$nilai = $_POST['nilai']; $deskripsi = $_POST['deskripsi'];
    $ex=mysqli_query($con,"SELECT * FROM extra order by extra asc"); $no=0; foreach($ex as $hex){
      //disini inputnya
        if($nilai[$no]==''){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiextra where c_ta='$c_ta' and c_extra='$hex[c_extra]' and c_siswa='$_POST[c_siswa]' and c_kelas='$_POST[c_kelas]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaiextra set c_ta='$c_ta',c_extra='$hex[c_extra]',c_siswa='$_POST[c_siswa]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]',deskripsi='$deskripsi[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaiextra set c_ta='$c_ta',c_extra='$hex[c_extra]',c_siswa='$_POST[c_siswa]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]',deskripsi='$deskripsi[$no]',at='$at' WHERE c_nilaiextra='$cekada[c_nilaiextra]' ");
          }
        }
        $no++;
    }
    $smk->selinputextra($_POST['c_siswa']);
  }
  else if($akh==md5('setelulangextra')){
    $c_siswa=$_GET['q']; $c_kelas=$_GET['r'];
    $setel=mysqli_query($con,"DELETE from nilaiextra where c_ta='$c_ta' and c_siswa='$c_siswa' and c_kelas='$c_kelas' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basewa.'nilaiextra/'.$c_siswa.'');
  }
//rapotsiswa

  else if($akh==md5('settingrapot')){
    $smk->settingrapot($con,$_POST['c_ta'],$_POST['c_kelas'],$_POST['c_siswa'],$_POST['s'],$_POST['i'],$_POST['a'],$_POST['catatan'],$_POST['kelakuan'],$_POST['kerajinan'],$_POST['kerapian']);
  }
  else if($akh==md5('editsettingrapot')){ 
    $smk->editsettingrapot($con,$_POST['c_ta'],$_POST['c_kelas'],$_POST['c_siswa'],$_POST['s'],$_POST['i'],$_POST['a'],$_POST['catatan'],$_POST['kelakuan'],$_POST['kerajinan'],$_POST['kerapian']);
  }
  else if($akh==md5('kirimpesanwalikel')){ $at=date('Y-m-d H:i:s'); $wg='g';
    $smk->kirimpesanwalikel($con,$_SESSION['c_walikelas'],$_GET['q'],$_POST['pesan'],$at,$wg);
  }
  //wali murid
  else if($akh==md5('editwalimurid')){
    $cor=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walimurid where c_siswa='$_POST[c_siswa]' "));
    if($cor==NULL){ $c_walimurid=random(9);
      $smk->inputwalimurid($con,$c_walimurid,$_POST['c_siswa'],$_POST['nama'],$_POST['username'],$_POST['password']);
    }
    else{
      $smk->editwalimurid($con,$_POST['c_walimurid'],$_POST['c_siswa'],$_POST['nama'],$_POST['username'],$_POST['password']);
    }
  }
  //aspek sikap
  else if($akh==md5('addaspeksikap')){
    $smk->addaspeksikap($con,$_POST['c_kelas'],$_POST['ket']);
  }
  else if($akh==md5('editaspeksikap')){
    $smk->editaspeksikap($con,$_POST['c_aspeksikap'],$_POST['c_kelas'],$_POST['ket']);
  }
  else if($akh==md5('hapusaspeksikap')){
    $smk->hapusaspeksikap($con,$_GET['q']);
  }
  //exportpersiswa
  else if($akh==md5('exportpersiswa')){
    require 'export/eps.php';
  }
  //exportpermapel
  else if($akh==md5('exportpermapel')){
    require 'export/epm.php';
  }
  //exportpersikap
  else if($akh==md5('exportpersikap')){
    require 'export/epsikap.php';
  }
  //exporttambahanrapot
  else if($akh==md5('exporttamra')){
    require 'export/etr.php';
  }
  //akumulasinilai
  else if($akh==md5('akumulasinilai')){
    $sis= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc ");
    foreach($sis as $hsis){
      $pel=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiuas,(SELECT count(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiket FROM mapel order by mapel asc "); $no=1;
      foreach($pel as $hpel){
        require '../view/rumus/akumulasi.php';
        $nilaiasli[]= $nilasli;
        $nilaiakhir[]= $nilakhir;
      }
      $ikiasli= array_sum($nilaiasli);
      $ikiakhir= array_sum($nilaiakhir);
      $cekjumnilra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' and c_kelas='$_GET[q]' and c_siswa='$hsis[c_siswa]' "));
      if($cekjumnilra==NULL){
        mysqli_query($con,"INSERT INTO jumlahnilra set c_ta='$c_ta',c_kelas='$_GET[q]',c_siswa='$hsis[c_siswa]',nilaiasli='$ikiasli',nilaipresen='$ikiakhir' ");
      }else{
        mysqli_query($con,"UPDATE jumlahnilra set nilaiasli='$ikiasli',nilaipresen='$ikiakhir' WHERE c_ta='$c_ta' and c_kelas='$_GET[q]' and c_siswa='$hsis[c_siswa]' ");
      }
      //echo $ikiasli.'<br>';
      //echo $ikiakhir.'<br>';
      $nilaiasli=[];
      $nilaiakhir=[];
    }
    $smk->akumulasi();
  }
  //print per siswa
  else if($akh==md5('printsisniluh')){
    require_once("../../php/dompdf/dompdf_config.inc.php"); require '../../php/function.php';
    require 'print/printsisniluh.php';
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4','Portrait');
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream('niai siswa UH.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printsisniltug')){
    require_once("../../php/dompdf/dompdf_config.inc.php"); require '../../php/function.php';
    require 'print/printsisniltug.php';
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4','Portrait');
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream('niai siswa Tugas.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printsisnilmid')){
    require_once("../../php/dompdf/dompdf_config.inc.php"); require '../../php/function.php';
    require 'print/printsisnilmid.php';
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4','Portrait');
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream('niai siswa MID.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printsisniluas')){
    require_once("../../php/dompdf/dompdf_config.inc.php"); require '../../php/function.php';
    require 'print/printsisniluas.php';
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4','Portrait');
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream('niai siswa UAS.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printsisnilket')){
    require_once("../../php/dompdf/dompdf_config.inc.php"); require '../../php/function.php';
    require 'print/printsisnilket.php';
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4','Portrait');
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream('niai siswa Keterampilan.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('totalnilai')){
    require_once("../../php/dompdf/dompdf_config.inc.php"); require '../../php/function.php';
    require 'print/printtotalnilai.php';
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4','Portrait');
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream('Total Nilai Siswa.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printrapot')){
    $sis= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc ");
    foreach($sis as $hsis){
      $pel=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiuas,(SELECT count(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiket FROM mapel order by mapel asc "); $no=1;
      foreach($pel as $hpel){
        require '../view/rumus/akumulasi.php';
        $nilaiasli[]= $nilasli;
        $nilaiakhir[]= $nilakhir;
      }
      $ikiasli= array_sum($nilaiasli);
      $ikiakhir= array_sum($nilaiakhir);
      $cekjumnilra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' and c_kelas='$_GET[q]' and c_siswa='$hsis[c_siswa]' "));
      if($cekjumnilra==NULL){
        mysqli_query($con,"INSERT INTO jumlahnilra set c_ta='$c_ta',c_kelas='$_GET[q]',c_siswa='$hsis[c_siswa]',nilaiasli='$ikiasli',nilaipresen='$ikiakhir' ");
      }else{
       mysqli_query($con,"UPDATE jumlahnilra set nilaiasli='$ikiasli',nilaipresen='$ikiakhir' WHERE c_ta='$c_ta' and c_kelas='$_GET[q]' and c_siswa='$hsis[c_siswa]' ");
      }
      //print rapotnya disini
      $nilaiasli=[];
      $nilaiakhir=[];
    }
    require_once("../../php/dompdf/dompdf_config.inc.php"); require '../../php/function.php';
    require 'print/printtest.php';
    $dompdf = new DOMPDF();
    $customPaper = array(0,0,800,1000);
    $dompdf->set_paper($customPaper);
    $dompdf->load_html($content);
    $dompdf->render();
    $dompdf->stream('Rapot Siswa.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printrapotsiswa')){
    $sis= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' and c_siswa='$_GET[r]' order by nama asc limit 1"); foreach($sis as $hsis);
    foreach($sis as $hsis){
      $pel=mysqli_query($con,"SELECT *,(SELECT count(nilai) FROM nilaiuh where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiuh,(SELECT count(nilai) FROM nilaitugas where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaitugas,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiuas,(SELECT count(nilai) FROM nilaiket where c_ta='$c_ta' and c_siswa='$hsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel=mapel.c_mapel) as nilaiket FROM mapel order by mapel asc "); $no=1;
      foreach($pel as $hpel){
        require '../view/rumus/akumulasi.php';
        $nilaiasli[]= $nilasli;
        $nilaiakhir[]= $nilakhir;
      }
      $ikiasli= array_sum($nilaiasli);
      $ikiakhir= array_sum($nilaiakhir);
      $cekjumnilra= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$c_ta' and c_kelas='$_GET[q]' and c_siswa='$hsis[c_siswa]' "));
      if($cekjumnilra==NULL){
        mysqli_query($con,"INSERT INTO jumlahnilra set c_ta='$c_ta',c_kelas='$_GET[q]',c_siswa='$hsis[c_siswa]',nilaiasli='$ikiasli',nilaipresen='$ikiakhir' ");
      }else{
       mysqli_query($con,"UPDATE jumlahnilra set nilaiasli='$ikiasli',nilaipresen='$ikiakhir' WHERE c_ta='$c_ta' and c_kelas='$_GET[q]' and c_siswa='$hsis[c_siswa]' ");
      }
      //print rapotnya disini
      $nilaiasli=[];
      $nilaiakhir=[];
    }
    // require_once("../../php/dompdf/dompdf_config.inc.php");
    require_once("../../php/dompdf/autoload.inc.php");
    require '../../php/function.php';
    require 'print/printrapotsiswa.php';
    $dompdf = new DOMPDF();
    // $customPaper = array(0,0,800,1000);
    // $dompdf->set_paper($customPaper);
    $paper = 'F4';
    $orientation = 'Portrait';
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($content);
    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->output();
    $dompdf->render();
    $dompdf->stream('Rapot '.$hsis['nama'].'.pdf',array("Attachment"=>0));
    // echo $content;
  }
  else if($akh==md5('printrapotmidsiswa')){
    $sis= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' and c_siswa='$_GET[r]' order by nama asc limit 1"); foreach($sis as $hsis);
    // require_once("../../php/dompdf/dompdf_config.inc.php");
    require_once("../../php/dompdf/autoload.inc.php");
    require '../../php/function.php';
    require 'print/printrapotmidsiswa.php';
    $dompdf = new DOMPDF();
    // $customPaper = array(0,0,800,1000);
    // $dompdf->set_paper($customPaper);
    $paper = 'A4';
    $orientation = 'Portrait';
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($content);
    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->output();
    $dompdf->render();
    $dompdf->stream('Rapot MID '.$hsis['nama'].'.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printrapotdapodik')){
    $sis= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' and c_siswa='$_GET[r]' order by nama asc limit 1"); 
    foreach($sis as $hsis);
    require_once("../../php/dompdf/autoload.inc.php"); 
    // require_once("../../php/dompdf/dompdf_config.inc.php"); 
    require '../../php/function.php';
    require 'print/printrapotdapodik.php';
    $dompdf = new Dompdf();
    // $customPaper = array(0,0,800,1000);
    // $dompdf->set_paper($customPaper);
    $paper = 'A4';
    $orientation = 'Portrait';
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($content);
    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->output();
    $dompdf->render();
    $canvas = $dompdf->get_canvas();
    $font = $dompdf->getFontMetrics();
    $fontItalic = $font->get_font('helvetica', 'italic');
    $color = array(0, 0, 0);
    $w = $canvas->get_width();
    $h = $canvas->get_height();
    $canvas->page_text($w - 100, $h - 30, "Halaman         :  {PAGE_NUM}", $fontItalic, 8, $color);
    $canvas->page_text(30, $h - 30, $footer, $fontItalic, 8, $color);
    // $canvas->page_text(30, $h - 30, $footer, $font, 8, $color);
    $dompdf->stream('Rapot '.$hsis['nama'].'.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printskl')){
    $sis= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' and c_siswa='$_GET[r]' order by nama asc limit 1"); 
    foreach($sis as $hsis);
    require_once("../../php/dompdf/autoload.inc.php"); 
    // require_once("../../php/dompdf/dompdf_config.inc.php"); 
    require '../../php/function.php';
    require 'print/printskl.php';
    $dompdf = new Dompdf();
    // $customPaper = array(0,0,800,1000);
    // $dompdf->set_paper($customPaper);
    $paper = 'A4';
    $orientation = 'Portrait';
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($content);
    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->output();
    $dompdf->render();
    $canvas = $dompdf->get_canvas();
    $font = $dompdf->getFontMetrics();
    $fontItalic = $font->get_font('helvetica', 'italic');
    $color = array(0, 0, 0);
    $w = $canvas->get_width();
    $h = $canvas->get_height();
    $canvas->page_text($w - 100, $h - 30, "Halaman         :  {PAGE_NUM}", $fontItalic, 8, $color);
    $canvas->page_text(30, $h - 30, $footer, $fontItalic, 8, $color);
    // $canvas->page_text(30, $h - 30, $footer, $font, 8, $color);
    $dompdf->stream('Rapot '.$hsis['nama'].'.pdf',array("Attachment"=>0));
  }
  else if($akh==md5('printrapotpts')){
    $sis= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' and c_siswa='$_GET[r]' order by nama asc limit 1"); 
    foreach($sis as $hsis);
    require_once("../../php/dompdf/autoload.inc.php"); 
    // require_once("../../php/dompdf/dompdf_config.inc.php"); 
    require '../../php/function.php';
    require 'print/printrapotpts.php';
    $dompdf = new Dompdf();
    // $customPaper = array(0,0,800,1000);
    // $dompdf->set_paper($customPaper);
    $paper = 'A4';
    $orientation = 'Portrait';
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($content);
    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->output();
    $dompdf->render();
    $canvas = $dompdf->get_canvas();
    $font = $dompdf->getFontMetrics();
    $fontItalic = $font->get_font('helvetica', 'italic');
    $color = array(0, 0, 0);
    $w = $canvas->get_width();
    $h = $canvas->get_height();
    $canvas->page_text($w - 100, $h - 30, "Halaman         :  {PAGE_NUM}", $fontItalic, 8, $color);
    $canvas->page_text(30, $h - 30, $footer, $fontItalic, 8, $color);
    // $canvas->page_text(30, $h - 30, $footer, $font, 8, $color);
    $dompdf->stream('Rapot '.$hsis['nama'].'.pdf',array("Attachment"=>0));
  }
  else{
    session_unset($_SESSION['c_walikelas']);
    header('location:'.$base.'login');
    //echo "string";
  }
}
?>
