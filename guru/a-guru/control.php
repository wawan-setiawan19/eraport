<?php date_default_timezone_set('Asia/Jakarta'); session_start();
require '../../php/config.php';
$ata=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tahunakademik where status='aktif' ")); $c_ta=$ata['c_ta'];
if(empty($_SESSION['c_guru'])){header('location:'.$base);}
function random($length){
  $data='1234567890AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSstuuUvVwWxXyYyZz';
  $string='';
  for($i=1;$i<=$length;$i++){
    $pos=rand(0,strlen($data)-1);
    $string.=$data{$pos};
  }
  return $string;
}
if(empty($_GET['smkakh']) or empty($_GET['q'])){
	header('location:../../login');
}
else{
	require 'action.php';
	$smk=new action();
	$akh=($_GET['smkakh']);
  if($akh==md5('logout')){ 
    session_destroy();
    session_unset($_SESSION['c_guru']);
    header('location:../../');
  }
//input nilai
  else if($akh==md5('inputnilai')){
    /*ambil tahun akademik yang aktif*/ 
    /*echo 'tahun akademik: '.$c_ta.'<br>';
    echo 'c_tipenilai: '.$_POST['c_tipenilai'].'<br>';
    echo 'c_kelas: '.$_POST['c_kelas'].'<br>';
    echo 'c_mapel: '.$_POST['c_mapel'].'<br>';*/
    $at=date('Y-m-d');$nilai = $_POST['nilsiswa'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilai where c_ta='$c_ta' and c_tipenilai='$_POST[c_tipenilai]' and c_siswa='$hlsis[c_siswa]' and c_mapel='$_POST[c_mapel]' and c_kelas='$_POST[c_kelas]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilai set c_ta='$c_ta',c_tipenilai='$_POST[c_tipenilai]',c_siswa='$hlsis[c_siswa]',c_mapel='$_POST[c_mapel]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilai set c_ta='$c_ta',c_tipenilai='$_POST[c_tipenilai]',c_siswa='$hlsis[c_siswa]',c_mapel='$_POST[c_mapel]',c_kelas='$_POST[c_kelas]',nilai='$nilai[$no]',at='$at' WHERE c_nilai='$cekada[c_nilai]' ");
          }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/'.$_POST['c_tipenilai'].'');
  }
//nilai ulangan harian
  else if($akh==md5('inputnilaiuh')){
    $at=date('Y-m-d');$nilai = $_POST['nilaiuh'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$_POST[c_aspekuh]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaiuh set c_ta='$c_ta',c_aspekuh='$_POST[c_aspekuh]',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaiuh set c_ta='$c_ta',c_aspekuh='$_POST[c_aspekuh]',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' WHERE c_nilaiuh='$cekada[c_nilaiuh]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    $_SESSION['posuh']=$_POST['c_aspekuh'];
    header('location:../../inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/uh');
  }
  else if($akh==md5('setelulanguh')){
    $c_kelas=$_GET['q']; $c_mapel=$_GET['r']; $c_aspekuh=$_GET['v'];
    $setel=mysqli_query($con,"DELETE from nilaiuh where c_ta='$c_ta' and c_aspekuh='$c_aspekuh' and c_kelas='$c_kelas' and c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='ulang';
    $_SESSION['posuh']= $c_aspekuh;
    header('location:'.$basegu.'inputnilai/'.$c_kelas.'/'.$c_mapel.'/uh');
  }
//nilai mid semester
  else if($akh==md5('inputnilaimid')){
    $at=date('Y-m-d');$nilai = $_POST['nilaimid'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimid where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaimid set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaimid set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' WHERE c_nilaimid='$cekada[c_nilaimid]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/mid');
  }
  else if($akh==md5('setelulangmid')){
    $c_kelas=$_GET['q']; $c_mapel=$_GET['r'];
    $setel=mysqli_query($con,"DELETE from nilaimid where c_ta='$c_ta' and c_kelas='$c_kelas' and c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basegu.'inputnilai/'.$c_kelas.'/'.$c_mapel.'/mid');
  }
//nilai uas
  else if($akh==md5('inputnilaiuas')){
    $at=date('Y-m-d');$nilai = $_POST['nilaiuas'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiuas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaiuas set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaiuas set c_ta='$c_ta',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' WHERE c_nilaiuas='$cekada[c_nilaiuas]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/uas');
  }
  else if($akh==md5('setelulanguas')){
    $c_kelas=$_GET['q']; $c_mapel=$_GET['r'];
    $setel=mysqli_query($con,"DELETE from nilaiuas where c_ta='$c_ta' and c_kelas='$c_kelas' and c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basegu.'inputnilai/'.$c_kelas.'/'.$c_mapel.'/uas');
  }
//nilai tugas
  else if($akh==md5('inputnilaitug')){
    $at=date('Y-m-d');$nilai = $_POST['nilaitug'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$_POST[c_aspektug]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaitugas set c_ta='$c_ta',c_aspektug='$_POST[c_aspektug]',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaitugas set c_ta='$c_ta',c_aspektug='$_POST[c_aspektug]',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' WHERE c_nilaitugas='$cekada[c_nilaitugas]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    $_SESSION['postug']= $_POST['c_aspektug'];
    header('location:../../inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/tugas');
  }
  else if($akh==md5('setelulangtug')){
    $c_kelas=$_GET['q']; $c_mapel=$_GET['r']; $c_aspektug=$_GET['v'];
    $setel=mysqli_query($con,"DELETE from nilaitugas where c_ta='$c_ta' and c_aspektug='$c_aspektug' and c_kelas='$c_kelas' and c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='ulang';
    $_SESSION['postug']= $c_aspektug;
    header('location:'.$basegu.'inputnilai/'.$c_kelas.'/'.$c_mapel.'/tugas');
  }
//nilai keterampilan
  else if($akh==md5('inputnilaiket')){
    $at=date('Y-m-d');$nilai = $_POST['nilaiket'];
    $lsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_POST[c_kelas]' order by nama asc "); $no=0; while($hlsis=mysqli_fetch_array($lsis)){
      //disini inputnya
        if($nilai[$no]==0){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiket where c_ta='$c_ta' and c_aspekket='$_POST[c_aspekket]' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO nilaiket set c_ta='$c_ta',c_aspekket='$_POST[c_aspekket]',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' ");
          }else{
             $edit=mysqli_query($con,"UPDATE nilaiket set c_ta='$c_ta',c_aspekket='$_POST[c_aspekket]',c_siswa='$hlsis[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilai[$no]',at='$at' WHERE c_nilaiket='$cekada[c_nilaiket]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    $_SESSION['posket']= $_POST['c_aspekket'];
    header('location:../../inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/keterampilan');
  }
  else if($akh==md5('setelulangket')){
    $c_kelas=$_GET['q']; $c_mapel=$_GET['r']; $c_aspekket=$_GET['v'];
    $setel=mysqli_query($con,"DELETE from nilaiket where c_ta='$c_ta' and c_aspekket='$c_aspekket' and c_kelas='$c_kelas' and c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='ulang';
    $_SESSION['posket']= $c_aspekket;
    header('location:'.$basegu.'inputnilai/'.$c_kelas.'/'.$c_mapel.'/keterampilan');
  }
  else if($akh==md5('setelulang')){
    $c_kelas=$_GET['q']; $c_mapel=$_GET['r']; $c_tipenilai=$_GET['v'];
    $setel=mysqli_query($con,"DELETE from nilai where c_ta='$c_ta' and c_tipenilai='$c_tipenilai' and c_kelas='$c_kelas' and c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basegu.'inputnilai/'.$c_kelas.'/'.$c_mapel.'/'.$c_tipenilai.'');
  }
//deskripsi rapot
  else if($akh==md5('inputdeskripsi')){
    $at=date('Y-m-d');$des_peng = $_POST['des_peng']; $des_ket = $_POST['des_ket']; $predikat = $_POST['predikat'];
    $no=0; while($no < 3){
      //disini inputnya
        if($des_peng[$no]==''){}else{
          $cekada=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_mapel where c_ta='$c_ta' and c_mapel='$_POST[c_mapel]' and predikat='$predikat[$no]' "));
          if($cekada==NULL){
            $input=mysqli_query($con,"INSERT INTO deskripsi_mapel set predikat='$predikat[$no]', c_ta='$c_ta',c_mapel='$_POST[c_mapel]',des_peng='$des_peng[$no]',des_ket='$des_ket[$no]' ");
          }else{
             $edit=mysqli_query($con,"UPDATE deskripsi_mapel set predikat='$predikat[$no]', c_ta='$c_ta',c_mapel='$_POST[c_mapel]',des_peng='$des_peng[$no]',des_ket='$des_ket[$no]' WHERE c_deskripsi='$cekada[c_deskripsi]' ");
          }
        }
        $no++;
    }
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/deskripsirapot');
  }
  else if($akh==md5('setelulangdes')){
    $c_kelas=$_GET['q']; $c_mapel=$_GET['r'];
    $setel=mysqli_query($con,"DELETE from deskripsi_mapel where c_ta='$c_ta' and c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='ulang';
    header('location:'.$basegu.'inputnilai/'.$c_kelas.'/'.$c_mapel.'/deskripsirapot');
  }
//template nilai
  else if($akh==md5('templatenilai')){
    require 'export/templatenilai.php';
  }
  else if($akh==md5('importnilai')){
    require '../../php/PHPExcel/Classes/PHPExcel.php';
    $tmp_name=$_FILES['fileimport']['tmp_name'];
    $name= time().$_FILES['fileimport']['name'];
    $type=$_FILES['fileimport']['type'];
    $loc="../fileimport/$name";
    move_uploaded_file($tmp_name,$loc);
    $inputFileName = $loc;

      try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
      } catch (Exception $e) {
        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
      }
      //nilai uh
      if(isset($_POST['nilaiuh'])){
        $aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc ");
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 3; $row <= $highestRow; $row++) {
          $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
          $nisn= $rowData[0][0];
          $nama= $rowData[0][1];
          $ceksiswa= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where nisn='$nisn' "));
          if($ceksiswa==NULL){
          }else{
            $at= date("Y-m-d");
            $posniluh= 2;
            foreach($aspekuh as $haspekuh){
              $nilaiuhnya= $rowData[0][$posniluh];
              if($nilaiuhnya==NULL){
                //echo 'nilai tidak ada'; echo ',';
              }else{
                if($_POST['c_kelas']==$ceksiswa['c_kelas']){
                  $cekniluh=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$ceksiswa[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
                  if($cekniluh==NULL){
                    $input=mysqli_query($con,"INSERT INTO nilaiuh set c_ta='$c_ta',c_aspekuh='$haspekuh[c_aspekuh]',c_siswa='$ceksiswa[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaiuhnya',at='$at' ");
                  }else{
                    $edit=mysqli_query($con,"UPDATE nilaiuh set c_ta='$c_ta',c_aspekuh='$haspekuh[c_aspekuh]',c_siswa='$ceksiswa[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaiuhnya',at='$at' WHERE c_nilaiuh='$cekniluh[c_nilaiuh]' ");
                  }
                }
              }
              $posniluh++;
            }
          }
        }
      }
      echo '<br>Nilai Tugas<br>';
      //nilai tugas
      if(isset($_POST['nilaitug'])){
        $aspektug= mysqli_query($con,"SELECT * FROM aspektug order by c_aspektug asc ");
        $sheet1 = $objPHPExcel->getSheet(1);
        $highestRow1 = $sheet1->getHighestRow();
        $highestColumn1 = $sheet1->getHighestColumn();
        for ($row1 = 3; $row1 <= $highestRow1; $row1++) {
          $rowData1 = $sheet1->rangeToArray('B' . $row1 . ':' . $highestColumn1 . $row1, NULL, TRUE, FALSE);
          $nisn1= $rowData1[0][0];
          $nama1= $rowData1[0][1];
          $ceksiswa1= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where nisn='$nisn1' "));
          if($ceksiswa1==NULL){
          }else{
            $at1= date("Y-m-d");
            $posniltug= 2;
            foreach($aspektug as $haspektug){
              $nilaitugnya= $rowData1[0][$posniltug];
              if($nilaitugnya==NULL){
              }else{
                if($_POST['c_kelas']==$ceksiswa1['c_kelas']){
                  $cekniltug=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$haspektug[c_aspektug]' and c_siswa='$ceksiswa1[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
                  if($cekniltug==NULL){
                    $input=mysqli_query($con,"INSERT INTO nilaitugas set c_ta='$c_ta',c_aspektug='$haspektug[c_aspektug]',c_siswa='$ceksiswa1[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaitugnya',at='$at1' ");
                  }else{
                     $edit=mysqli_query($con,"UPDATE nilaitugas set c_ta='$c_ta',c_aspektug='$haspektug[c_aspektug]',c_siswa='$ceksiswa1[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaitugnya',at='$at1' WHERE c_nilaitugas='$cekniltug[c_nilaitugas]' ");
                  }
                }
              }
              $posniltug++;
            }
          }
        }
      }
      echo '<br>Nilai MID<br>';
      //nilai MID
      if(isset($_POST['nilaimid'])){
        $sheet2 = $objPHPExcel->getSheet(2);
        $highestRow2 = $sheet2->getHighestRow();
        $highestColumn2 = $sheet2->getHighestColumn();
        for ($row2 = 3; $row2 <= $highestRow2; $row2++) {
          $rowData2 = $sheet2->rangeToArray('B' . $row2 . ':' . $highestColumn2 . $row2, NULL, TRUE, FALSE);
          $nisn2= $rowData2[0][0];
          $nama2= $rowData2[0][1];
          $ceksiswa2= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where nisn='$nisn2' "));
          if($ceksiswa2==NULL){
          }else{
            $nilaimidnya= $rowData2[0][2];
            $at2= date("Y-m-d");
            if($nilaimidnya==NULL){
            }else{
              if($_POST['c_kelas']==$ceksiswa2['c_kelas']){
                $ceknilmid=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaimid where c_ta='$c_ta' and c_siswa='$ceksiswa2[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
                if($ceknilmid==NULL){
                  $input=mysqli_query($con,"INSERT INTO nilaimid set c_ta='$c_ta',c_siswa='$ceksiswa2[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaimidnya',at='$at2' ");
                }else{
                   $edit=mysqli_query($con,"UPDATE nilaimid set c_ta='$c_ta',c_siswa='$ceksiswa2[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaimidnya',at='$at2' WHERE c_nilaimid='$ceknilmid[c_nilaimid]' ");
                }
              }
            }
          }
        }
      }
      echo '<br>Nilai UAS<br>';
      //nilai UAS
      if(isset($_POST['nilaiuas'])){
        $sheet3 = $objPHPExcel->getSheet(3);
        $highestRow3 = $sheet3->getHighestRow();
        $highestColumn3 = $sheet3->getHighestColumn();
        for ($row3 = 3; $row3 <= $highestRow3; $row3++) {
          $rowData3 = $sheet3->rangeToArray('B' . $row3 . ':' . $highestColumn3 . $row3, NULL, TRUE, FALSE);
          $nisn3= $rowData3[0][0];
          $nama3= $rowData3[0][1];
          $ceksiswa3= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where nisn='$nisn3' "));
          if($ceksiswa3==NULL){
          }else{
            $nilaiuasnya= $rowData3[0][2];
            $at3= date("Y-m-d");
            if($nilaiuasnya==NULL){
            }else{
              if($_POST['c_kelas']==$ceksiswa3['c_kelas']){
                $cekniluas=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiuas where c_ta='$c_ta' and c_siswa='$ceksiswa3[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
                if($cekniluas==NULL){
                  $input=mysqli_query($con,"INSERT INTO nilaiuas set c_ta='$c_ta',c_siswa='$ceksiswa3[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaiuasnya',at='$at3' ");
                }else{
                   $edit=mysqli_query($con,"UPDATE nilaiuas set c_ta='$c_ta',c_siswa='$ceksiswa3[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaiuasnya',at='$at3' WHERE c_nilaiuas='$cekniluas[c_nilaiuas]' ");
                }
              }
            }
          }
        }
      }
      echo '<br>Nilai Keterampilan<br>';
      //nilai keterampilan
      if(isset($_POST['nilaiket'])){
        $aspekket= mysqli_query($con,"SELECT * FROM aspekket order by c_aspekket asc ");
        $sheet4 = $objPHPExcel->getSheet(4);
        $highestRow4 = $sheet4->getHighestRow();
        $highestColumn4 = $sheet4->getHighestColumn();
        for ($row4 = 3; $row4 <= $highestRow4; $row4++) {
          $rowData4 = $sheet4->rangeToArray('B' . $row4 . ':' . $highestColumn4 . $row4, NULL, TRUE, FALSE);
          $nisn4= $rowData4[0][0];
          $nama4= $rowData4[0][1];
          $ceksiswa4= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where nisn='$nisn4' "));
          if($ceksiswa4==NULL){
          }else{
            $at4= date("Y-m-d");
            $posnilket= 2;
            foreach($aspekket as $haspekket){
              $nilaitugnya= $rowData4[0][$posnilket];
              if($nilaitugnya==NULL){
              }else{
                $ceknilket=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM nilaiket where c_ta='$c_ta' and c_aspekket='$haspekket[c_aspekket]' and c_siswa='$ceksiswa4[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
                if($ceknilket==NULL){
                  $input=mysqli_query($con,"INSERT INTO nilaiket set c_ta='$c_ta',c_aspekket='$haspekket[c_aspekket]',c_siswa='$ceksiswa4[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaitugnya',at='$at4' ");
                }else{
                   $edit=mysqli_query($con,"UPDATE nilaiket set c_ta='$c_ta',c_aspekket='$haspekket[c_aspekket]',c_siswa='$ceksiswa4[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',nilai='$nilaitugnya',at='$at4' WHERE c_nilaiket='$ceknilket[c_nilaiket]' ");
                }
              }
              $posnilket++;
            }
          }
        }
      }
      echo '<br>DESKRIPSI<br>';
      //nilai UAS
      if(isset($_POST['deskripsi'])){
        $sheet5 = $objPHPExcel->getSheet(5);
        $highestRow5 = $sheet5->getHighestRow();
        $highestColumn5 = $sheet5->getHighestColumn();
        for ($row5 = 3; $row5 <= $highestRow5; $row5++) {
          $rowData5 = $sheet5->rangeToArray('B' . $row5 . ':' . $highestColumn5 . $row5, NULL, TRUE, FALSE);
          $nisn5= $rowData5[0][0];
          $nama5= $rowData5[0][1];
          $ceksiswa5= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where nisn='$nisn5' "));
          if($ceksiswa5==NULL){
          }else{
            $des_peng= $rowData5[0][2]; $des_ket= $rowData5[0][3];
            $at5= date("Y-m-d");
            if($des_peng==''){}else{
              if($_POST['c_kelas']==$ceksiswa5['c_kelas']){
                $cekada2=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_rapot where c_ta='$c_ta' and c_siswa='$ceksiswa5[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
                if($cekada2==NULL){
                  $input=mysqli_query($con,"INSERT INTO deskripsi_rapot set c_ta='$c_ta',c_siswa='$ceksiswa5[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',des_peng='$des_peng' ");
                }else{
                   $edit=mysqli_query($con,"UPDATE deskripsi_rapot set c_ta='$c_ta',c_siswa='$ceksiswa5[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',des_peng='$des_peng' WHERE c_deskripsi='$cekada2[c_deskripsi]' ");
                }
              }
            } 
            if($des_ket==''){}else{
              if($_POST['c_kelas']==$ceksiswa5['c_kelas']){
                $cekada3=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM deskripsi_rapot where c_ta='$c_ta' and c_siswa='$ceksiswa5[c_siswa]' and c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
                if($cekada3==NULL){
                  $input=mysqli_query($con,"INSERT INTO deskripsi_rapot set c_ta='$c_ta',c_siswa='$ceksiswa5[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',des_ket='$des_ket' ");
                }else{
                   $edit=mysqli_query($con,"UPDATE deskripsi_rapot set c_ta='$c_ta',c_siswa='$ceksiswa5[c_siswa]',c_kelas='$_POST[c_kelas]',c_mapel='$_POST[c_mapel]',des_ket='$des_ket' WHERE c_deskripsi='$cekada3[c_deskripsi]' ");
                }
              }
            }
          }
        }
      }
      unlink($loc);
    header('location:'.$basegu.'inputnilai/'.$_POST['c_kelas'].'/'.$_POST['c_mapel'].'/_');
  }
  else{
    session_unset($_SESSION['c_guru']);
    header('location:'.$base);
    //echo "string";
  }
}
?>
