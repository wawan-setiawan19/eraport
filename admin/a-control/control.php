<?php date_default_timezone_set('Asia/Jakarta'); session_start();
if(empty($_SESSION['c_admin'])){header('location:../../');}
function random($length){
  $data='1234567890AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSstuuUvVwWxXyYyZz';
  $string='';
  for($i=1;$i<=$length;$i++){
    $pos=rand(0,strlen($data)-1);
    $string.=$data{$pos};
  }
  return $string;
}
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
    session_unset($_SESSION['c_admin']);
    header('location:../../');
  }
//setting mapel kelas
  else if($akh==md5('settingmapelkelas')){
    $nomor= $_POST['no'];
    $c_kelas=$_POST['c_kelas'];
    $c_katmapel=$_POST['c_katmapel'];
    $c_mapel= $_POST['c_mapel']; $tt=count($c_mapel);
    $q1= mysqli_query($con,"DELETE FROM mapel_kelas where c_kelas='$c_kelas' and c_katmapel='$c_katmapel' ");
    for ($i=0; $i < $tt; $i++) { 
      $in= mysqli_query($con,"INSERT INTO mapel_kelas set c_kelas='$c_kelas',c_mapel='$c_mapel[$i]',c_katmapel='$c_katmapel',no='$nomor[$i]' ");
      //echo $nomor[$i];
    }
    header('location:../../mapelkelas/'.$c_kelas.'');
  }
  else if($akh==md5('settingmapelmd')){
    $c_kelas=$_POST['c_kelas'];
    $id_mapelmd= $_POST['id_mapelmd']; $tt=count($id_mapelmd);
    $q1= mysqli_query($con,"DELETE FROM mapelmd_kelas where c_kelas='$c_kelas' ");
    for ($i=0; $i < $tt; $i++) { 
      $in= mysqli_query($con,"INSERT INTO mapelmd_kelas set c_kelas='$c_kelas',id_mapelmd='$id_mapelmd[$i]' ");
      //echo $nomor[$i];
    }
    header('location:../../mapelkelas/'.$c_kelas.'');
  }
  else if($akh==md5('settingmapeltq')){
    $c_kelas=$_POST['c_kelas'];
    $id_mapeltq= $_POST['id_mapeltq']; $tt=count($id_mapeltq);
    $q1= mysqli_query($con,"DELETE FROM mapeltq_kelas where c_kelas='$c_kelas' ");
    for ($i=0; $i < $tt; $i++) { 
      $in= mysqli_query($con,"INSERT INTO mapeltq_kelas set c_kelas='$c_kelas',id_mapeltq='$id_mapeltq[$i]' ");
      //echo $nomor[$i];
    }
    header('location:../../mapelkelas/'.$c_kelas.'');
  }
//ganti password
  else if($akh==md5('gantipassword')){
    if(isset($_POST['passwordbaru'])){
      $plama=crypt($_POST['passwordlama'],'1427'); $pbaru=crypt($_POST['passwordbaru'],'1427');
      $cek= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin where c_admin='$_SESSION[c_admin]' "));
      if($cek['password']==$plama){
        mysqli_query($con,"UPDATE admin set nama='$_POST[nama]',username='$_POST[username]',password='$pbaru' ");
        echo '<script type="text/javascript">alert("Password Berhasil Diganti");window.location="'.$basead.'";</script>';
      }
      else{
        echo '<script type="text/javascript">alert("Password Awal Tidak Cocok");window.location="'.$basead.'/gantipassword";</script>';
      }
    }
    //echo $_POST['passwordlama'];
    //echo $_POST['passwordbaru'];
  }
//naik kelas
  else if($akh==md5('naikkelas')){
    $c_siswa= $_POST['c_siswa']; $tt= count($c_siswa); $kelasasal= $_POST['kelasasal']; $kelasbaru= $_POST['kelasbaru'];
    for ($i=0; $i < $tt ; $i++) { 
      /*$q0= mysqli_query($con,"DELETE FROM nilaiextra where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q1= mysqli_query($con,"DELETE FROM nilaiuh where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q2= mysqli_query($con,"DELETE FROM nilaitugas where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q3= mysqli_query($con,"DELETE FROM nilaimid where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q4= mysqli_query($con,"DELETE FROM nilaiuas where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q5= mysqli_query($con,"DELETE FROM rapotsiswa where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q6= mysqli_query($con,"DELETE FROM jumlahnilra where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q7= mysqli_query($con,"DELETE FROM nilaisikap where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");
      $q8= mysqli_query($con,"DELETE FROM nilaiket where c_siswa='$c_siswa[$i]' and c_kelas='$kelasasal' ");*/
      $q9= mysqli_query($con,"UPDATE siswa set c_kelas='$kelasbaru' where c_siswa='$c_siswa[$i]' ");
    }
    session_start();
    header('location:../../siswa/'.$kelasbaru.'');
  }
//kelas
  else if($akh==md5('addkelas')){ $c_kelas=random(9);
    $smk->addkelas($con,$c_kelas,$_POST['kelas'],$_POST['waligrade'],$_POST['ttdwaligrade'],$_POST['murokib'],$_POST['ttdmurokib']);
  }
  else if($akh==md5('editkelas')){
    $smk->editkelas($con,$_POST['c_kelas'],$_POST['kelas'],$_POST['waligrade'],$_POST['ttdwaligrade'],$_POST['murokib'],$_POST['ttdmurokib']);
  }
  else if($akh==md5('hapuskelas')){
    $smk->hapuskelas($con,$_GET['q']);
  }
//siswa
  else if($akh==md5('addsiswa')){ $c_siswa=random(9); $tl=date('Y-m-d',strtotime($_POST['tl']));
    //upload foto
    $temp = explode(".", $_FILES["fotosiswa"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["fotosiswa"]["tmp_name"], "../../media/fotosiswa/" . $newfilename);
    $filepath= 'media/fotosiswa/'.$newfilename;

    $smk->addsiswa($con,$c_siswa,$_POST['c_kelas'],$_POST['nisn'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$tl,$filepath);
  }
  else if($akh==md5('editsiswa')){ $tl=date('Y-m-d',strtotime($_POST['tl']));
    //upload foto
    $temp = explode(".", $_FILES["fotosiswa"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["fotosiswa"]["tmp_name"], "../../media/fotosiswa/" . $newfilename);
    $filepath= 'media/fotosiswa/'.$newfilename;
    unlink('../../'.$_POST['fotolama']);
    $smk->editsiswa($con,$_POST['c_siswa'],$_POST['nisn'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$tl,$filepath);
  }
//guru
  else if($akh==md5('addguru')){ $c_guru=random(9); $tl=date('Y-m-d',strtotime($_POST['tl']));
    $smk->addguru($con,$c_guru,$_POST['nip'],$_POST['nama'],$_POST['alamat'],$tl,$_POST['username'],$_POST['password']);
  }
  else if($akh==md5('editguru')){ $tl=date('Y-m-d',strtotime($_POST['tl']));
    $smk->editguru($con,$_POST['c_guru'],$_POST['nip'],$_POST['nama'],$_POST['alamat'],$tl,$_POST['username'],$_POST['password']);
  }
  else if($akh==md5('hapusguru')){
    $dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from guru where c_guru='$_GET[q]' "));
    if($dd['foto']!=NULL){
        unlink('../../guru/'.$dd['foto'].'');
    }
    $smk->hapusguru($con,$_GET['q']);
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
//katmapel
  else if($akh==md5('addkatmapel')){
    $smk->addkatmapel($con,$_POST['katmapel'],$_POST['posisi']);
  }
  else if($akh==md5('editkatmapel')){
    $smk->editkatmapel($con,$_POST['c_katmapel'],$_POST['katmapel'],$_POST['posisi']);
  }
//mapel
  else if($akh==md5('addmapel')){ $c_mapel=random(9);
    $smk->addmapel($con,$c_mapel,$_POST['c_katmapel'],$_POST['mapel'],$_POST['sl']);
  }
  else if($akh==md5('editmapel')){
    $smk->editmapel($con,$_POST['c_mapel'],$_POST['mapel'],$_POST['sl']);
  }
//guru mapel
  else if($akh==md5('addgurumapel')){ $c_gurumapel=random(9);
    $cekdulu=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM gurumapel where c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
    if($cekdulu==NULL){
       $smk->addgurumapel($con,$c_gurumapel,$_POST['c_guru'],$_POST['c_kelas'],$_POST['c_mapel']);
    }
    else{
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:../../addgurumapel');
    }
  }
  else if($akh==md5('editgurumapel')){
    $cekdulu=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM gurumapel where c_kelas='$_POST[c_kelas]' and c_mapel='$_POST[c_mapel]' "));
    if($cekdulu==NULL){
       $smk->editgurumapel($con,$_POST['c_gurumapel'],$_POST['c_guru'],$_POST['c_kelas'],$_POST['c_mapel']);
    }
    else{
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:../../editgurumapel/'.$_POST['c_gurumapel'].'');
    }
  }
//wali kelas
  else if($akh==md5('addwalikelas')){ $c_walikelas=random(9);
    $cekdulu=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walikelas where c_kelas='$_POST[c_kelas]' OR c_guru='$_POST[c_guru]' "));
    if($cekdulu==NULL){
       $smk->addwalikelas($con,$c_walikelas,$_POST['c_guru'],$_POST['c_kelas'],$_POST['username'],$_POST['password'],$_POST['ttdwalikelas']);
    }
    else{
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:../../addwalikelas');
    }
  }
  else if($akh==md5('editwalikelas')){
    /*$cekdulu=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walikelas where c_kelas='$_POST[c_kelas]' and c_guru='$_POST[c_guru]' "));
    if($cekdulu==NULL){
       $smk->editwalikelas($con,$_POST['c_walikelas'],$_POST['c_guru'],$_POST['c_kelas'],$_POST['username'],$_POST['password']);
    }
    else{
      session_start();
      $_SESSION['pesan']='gagal';
      header('location:../../editwalikelas/'.$_POST['c_walikelas'].'');
    }*/
    $smk->editwalikelas($con,$_POST['c_walikelas'],$_POST['c_guru'],$_POST['c_kelas'],$_POST['username'],$_POST['password'],$_POST['ttdwalikelas']);
  }
//tahun akademik
  else if($akh==md5('addta')){ $c_ta=random(9);
    $smk->addta($con,$c_ta,$_POST['tahun'],$_POST['semester'],$_POST['titimangsa_pts'],$_POST['titimangsa_rapot']);
  }
  else if($akh==md5('editta')){
    $smk->editta($con,$_POST['c_ta'],$_POST['tahun'],$_POST['semester'],$_POST['titimangsa_pts'],$_POST['titimangsa_rapot'],$_POST['titimangsa_tahfidz'],$_POST['titimangsa_kelulusan']);
  }
  else if($akh==md5('aktifkan')){
    if($aplikasi['hapsetaktif']=='YES'){
      $amak= mysqli_query($con,"SELECT * FROM tahunakademik where status='aktif' "); foreach($amak as $hamak);
      $q0= mysqli_query($con,"DELETE FROM nilaiextra where c_ta='$hamak[c_ta]' ");
      $q1= mysqli_query($con,"DELETE FROM nilaiuh where c_ta='$hamak[c_ta]' ");
      $q2= mysqli_query($con,"DELETE FROM nilaitugas where c_ta='$hamak[c_ta]' ");
      $q3= mysqli_query($con,"DELETE FROM nilaimid where c_ta='$hamak[c_ta]' ");
      $q4= mysqli_query($con,"DELETE FROM nilaiuas where c_ta='$hamak[c_ta]' ");
      $q5= mysqli_query($con,"DELETE FROM rapotsiswa where c_ta='$hamak[c_ta]' ");
      $q6= mysqli_query($con,"DELETE FROM jumlahnilra where c_ta='$hamak[c_ta]' ");
      $q7= mysqli_query($con,"DELETE FROM nilaisikap where c_ta='$hamak[c_ta]' ");
      $q8= mysqli_query($con,"DELETE FROM nilaiket where c_ta='$hamak[c_ta]' ");
      $smk->aktifkan($con,$_GET['q']);
    }
    else if($aplikasi['hapsetaktif']=='NO'){
      $smk->aktifkan($con,$_GET['q']);
    }
  }
//tipe nilai
  else if($akh==md5('addtipenilai')){ $c_tipenilai=random(9);
    $smk->addtipenilai($con,$c_tipenilai,$_POST['tipe'],$_POST['ket'],$_POST['bobot'],$_POST['p'],$_POST['sistem']);
  }
  else if($akh==md5('edittipenilai')){
    $smk->edittipenilai($con,$_POST['c_tipenilai'],$_POST['tipe'],$_POST['ket'],$_POST['bobot'],$_POST['p'],$_POST['sistem']);
  }
//aspek keterampilan
  else if($akh==md5('addaspekket')){
    $smk->addaspekket($con,$_POST['ket']);
  }
  else if($akh==md5('editaspekket')){
    $smk->editaspekket($con,$_POST['c_aspekket'],$_POST['ket']);
  }
//aspek ulangan harian
  else if($akh==md5('addaspekuh')){
    $smk->addaspekuh($con,$_POST['ket']);
  }
  else if($akh==md5('editaspekuh')){
    $smk->editaspekuh($con,$_POST['c_aspekuh'],$_POST['ket']);
  }
//aspek tugas
  else if($akh==md5('addaspektug')){
    $smk->addaspektug($con,$_POST['ket']);
  }
  else if($akh==md5('editaspektug')){
    $smk->editaspektug($con,$_POST['c_aspektug'],$_POST['ket']);
  }
//aplikasi 
  else if($akh==md5('aplikasi')){
    $dd=mysqli_fetch_array(mysqli_query($con,"SELECT logo from aplikasi where id='1'"));
      if($dd!=NULL)
      {
        unlink('../../'.$dd['logo']);
      }
    $tmp_name=$_FILES['gambar']['tmp_name'];
    $name=$_FILES['gambar']['name'];
    $type=$_FILES['gambar']['type'];
    $loc="../../media/logo/$name";$gambar="media/logo/$name";
    move_uploaded_file($tmp_name,$loc);
    $smk->aplikasi($con,$_POST['alamat'],$_POST['kepsek'],$_POST['nipkepsek'],$_POST['namasek'],$gambar,$_POST['dibagi'],$_POST['berapa'],$_POST['hapsetaktif']);
  }
//kognitif
  else if($akh==md5('kognitif')){
    $tipe= $_POST['tipe']; $persen= $_POST['persen']; $c_tipekognitif= $_POST['c_tipekognitif']; $tt= count($c_tipekognitif);
    for ($i=0; $i < $tt ; $i++) { 
      mysqli_query($con,"UPDATE tipekognitif set tipe='$tipe[$i]',persen='$persen[$i]' where c_tipekognitif='$c_tipekognitif[$i]' ");
    }
    session_start();
    $_SESSION['pesan']='editkog';
    header('location:../../setting');
  }
//backup  
  else if($akh==md5('backupdb')){
    $file='backup_db_eraport-'.date('d-m-Y').'-'.date('H-i-s').'-.sql';
    $smk->backup($con,$file);
    backup_tables($dbhost,$dbuser,$dbpass,$dbname,$file);
    session_start();
    $_SESSION['pesan']='backup';
    header('location:../../backup');
  }
//extra
  else if($akh==md5('addextra')){ $c_extra=random(9);
    $smk->addextra($con,$c_extra,$_POST['extra']);
  }
  else if($akh==md5('editextra')){ $c_extra=random(9);
    $smk->editextra($con,$_POST['c_extra'],$_POST['extra']);
  }
//setting guru mapel
  else if($akh==md5('settinggurumapel')){
    mysqli_query($con,"DELETE FROM gurumapel where c_guru='$_POST[c_guru]' ");
    $m= $_POST['mapel'];$t= count($m);
    for($a=0;$a<$t;$a++){
      $c_gurumapel=random(9); $cm=substr($m[$a], 0,9); $ck=substr($m[$a], 10,9);
      $smk->settinggurumapel($con,$c_gurumapel,$_POST['c_guru'],$cm,$ck);
    }
    session_start();
    $_SESSION['pesan']='berhasil';
    header('location:../../settinggurumapel/'.$_POST['c_guru'].'');
  }
//import siswa
  else if($akh==md5('importsiswa')){
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
      
      $sheet = $objPHPExcel->getSheet(0);
      $highestRow = $sheet->getHighestRow();
      $highestColumn = $sheet->getHighestColumn();
      for ($row = 3; $row <= $highestRow; $row++) {
        $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
        $tangl = date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($rowData[0][4]));
        $c_siswa= random(9);
        $nis = $rowData[0][0];
        $nisn= $rowData[0][1];
        $nama= $rowData[0][2];
        $temlahir= $rowData[0][3];
        $tanglahir= $tangl;
        $jk= $rowData[0][5];
        $kel_dapodik = $rowData[0][6];
        $walas_dapodik = $rowData[0][7];
        $c_kelas= $_POST['c_kelas'];
        $dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from siswa where nisn='$nisn' "));
        if($dd==NULL){
          mysqli_query($con,"INSERT INTO siswa set c_siswa='$c_siswa',nisn='$nisn',nama='$nama',temlahir='$temlahir',tanglahir='$tanglahir',jk='$jk',c_kelas='$c_kelas', nis='$nis', kelas_dapodik='$kel_dapodik', walas_dapodik='$walas_dapodik' ");
        }
        else{
          mysqli_query($con,"UPDATE siswa set nama='$nama',temlahir='$temlahir',tanglahir='$tanglahir',jk='$jk',c_kelas='$c_kelas', nis='$nis', kelas_dapodik='$kel_dapodik', walas_dapodik='$walas_dapodik' where nisn='$nisn' ");
        }
      }
    header('location:'.$basead.'siswa/'.$_POST['c_kelas']);
  }
//aspek mapelmd
  else if($akh==md5('addmapelmd')){
    $smk->addmapelmd($con,$_POST['nama_mapelmd'],$_POST['kkm_mapelmd']);
  }
  else if($akh==md5('editmapelmd')){
    $smk->editmapelmd($con,$_POST['id_mapelmd'],$_POST['nama_mapelmd'],$_POST['kkm_mapelmd']);
  }
//aspek mapeltq
  else if($akh==md5('addmapeltq')){
    $smk->addmapeltq($con,$_POST['nama_mapeltq'],$_POST['kkm_mapeltq']);
  }
  else if($akh==md5('editmapeltq')){
    $smk->editmapeltq($con,$_POST['id_mapeltq'],$_POST['nama_mapeltq'],$_POST['kkm_mapeltq']);
  }
//semua hapus jadi satu
  else if($akh==md5('hapusmapelmd')){
    $smk->hapusmapelmd($con,$_GET['q']);
  }
  else if($akh==md5('hapusmapeltq')){
    $smk->hapusmapeltq($con,$_GET['q']);
  }
  else if($akh==md5('hapuskatmapel')){
    $smk->hapuskatmapel($con,$_GET['q']);
  }
  else if($akh==md5('hapuswalimurid')){
    $smk->hapuswalimurid($con,$_GET['q']);
  }
  else if($akh==md5('hapuswalikelas')){
    $smk->hapuswalikelas($con,$_GET['q']);
  }
  else if($akh==md5('hapusguru')){
    $smk->hapusguru($con,$_GET['q']);
  }
  else if($akh==md5('hapusgurumapel')){
    $smk->hapusgurumapel($con,$_GET['q']);
  }
  else if($akh==md5('hapussiswa')){
    $ck=mysqli_fetch_array(mysqli_query($con,"SELECT * from siswa where c_siswa='$_GET[q]' "));
    $smk->hapussiswa($con,$_GET['q'],$ck['c_kelas']);
  }
  else if($akh==md5('hapussiswa2')){
    $smk->hapussiswa2($con,$_GET['q']);
  }
  else if($akh==md5('hapuskelas')){
    $smk->hapuskelas($con,$_GET['q']);
  }
  else if($akh==md5('hapusmapel')){
    $smk->hapusmapel($con,$_GET['q']);
  }
  else if($akh==md5('hapustipenilai')){
    $smk->hapustipenilai($con,$_GET['q']);
  }
  else if($akh==md5('hapusta')){
    $smk->hapusta($con,$_GET['q']);
  }
  else if($akh==md5('hapusextra')){
    $smk->hapusextra($con,$_GET['q']);
  }
  else if($akh==md5('hapusbackup')){
    $ck=mysqli_fetch_array(mysqli_query($con,"SELECT * from backup where c_backup='$_GET[q]' ")); unlink('../backupdb/'.$ck['file'].'');
    $smk->hapusbackup($con,$_GET['q']);
  }
  else if($akh==md5('hapusaspekuh')){
    $smk->hapusaspekuh($con,$_GET['q']);
  }
  else if($akh==md5('hapusaspektug')){
    $smk->hapusaspektug($con,$_GET['q']);
  }
  else if($akh==md5('hapusaspekket')){
    $smk->hapusaspekket($con,$_GET['q']);
  }
  else{
    session_unset($_SESSION['c_admin']);
    header('location:'.$base);
    //echo "string";
  }
}

function backup_tables($host,$user,$pass,$name,$nama_file,$tables = '*')
{
  //untuk koneksi database
  mysql_connect($host,$user,$pass); mysql_select_db($name);

  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }else{
    //jika hanya table-table tertentu
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //looping dulu ah
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $hitung= mysql_num_rows($result);
    $num_fields = mysql_num_fields($result);
    
    //menyisipkan query drop table untuk nanti hapus table yang lama
    @$return.= 'DROP TABLE '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    $return.= "INSERT INTO ".$table." VALUES\n";
    
      
    for ($i = 1; $i <= $hitung; $i++) 
    {
      
      
      $row = mysql_fetch_row($result);
      $return.='(';
        //menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat. so toy mode : ON
        for($j=0; $j<$num_fields; $j++) 
        {
          //akan menelusuri setiap baris query didalam
          $row[$j] = addslashes($row[$j]);
          $row[$j] = ereg_replace("\n","\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        if($i==$hitung)
        {
          $return.=');';
        }
        else
        {
          $return.="),\n";
        }
      
      }
      
    
    
    $return.="\n\n\n";
  }
  
  //simpan file di folder yang anda tentukan sendiri. kalo saya sech folder "DATA"
  $nama_file;
  
  $handle = fopen('../backupdb/'.$nama_file,'w+');
  fwrite($handle,$return);
  fclose($handle);
}
?>
