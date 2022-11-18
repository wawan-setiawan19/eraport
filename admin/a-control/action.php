<?php date_default_timezone_set('Asia/Jakarta');
class action{
//kelas
  function addkelas($con,$c_kelas,$kelas,$waligrade,$ttdwaligrade,$murokib,$ttdmurokib){
    $akh=mysqli_query($con,"INSERT INTO kelas set c_kelas='$c_kelas',kelas='$kelas',waligrade='$waligrade',ttdwaligrade='$ttdwaligrade',murokib='$murokib',ttdmurokib='$ttdmurokib' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../kelas');
  }
  function editkelas($con,$c_kelas,$kelas,$waligrade,$ttdwaligrade,$murokib,$ttdmurokib){
    $akh=mysqli_query($con,"UPDATE kelas set kelas='$kelas',waligrade='$waligrade',ttdwaligrade='$ttdwaligrade',murokib='$murokib',ttdmurokib='$ttdmurokib' where c_kelas='$c_kelas' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../kelas');
  }
//siswa
  function addsiswa($con,$c_siswa,$c_kelas,$nisn,$nama,$jk,$alamat,$tl,$filepath){
    $akh=mysqli_query($con,"INSERT INTO siswa set c_siswa='$c_siswa',c_kelas='$c_kelas',nisn='$nisn',nama='$nama',jk='$jk',temlahir='$alamat',tanglahir='$tl',foto_siswa='$filepath' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addsiswa/'.$c_kelas.'');
  }
  function editsiswa($con,$c_siswa,$nisn,$nama,$jk,$alamat,$tl,$filepath){
    $akh=mysqli_query($con,"UPDATE siswa set nisn='$nisn',nama='$nama',jk='$jk',temlahir='$alamat',tanglahir='$tl',foto_siswa='$filepath' where c_siswa='$c_siswa' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../editsiswa/'.$c_siswa.'');
  }
//guru
  function addguru($con,$c_guru,$nip,$nama,$alamat,$tl,$username,$password){
    $akh=mysqli_query($con,"INSERT INTO guru set c_guru='$c_guru',nip='$nip',nama='$nama',temlahir='$alamat',tanglahir='$tl',username='$username',password='$password' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addguru');
  }
  function editguru($con,$c_guru,$nip,$nama,$alamat,$tl,$username,$password){
    $akh=mysqli_query($con,"UPDATE guru set nip='$nip',nama='$nama',temlahir='$alamat',tanglahir='$tl',username='$username',password='$password' where c_guru='$c_guru' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../editguru/'.$c_guru.'');
  }
//wali murid
  function inputwalimurid($con,$c_walimurid,$c_siswa,$nama,$username,$password){
    $akh=mysqli_query($con,"INSERT INTO walimurid set c_walimurid='$c_walimurid',c_siswa='$c_siswa',nama='$nama',username='$username',password='$password' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../editwalimurid/'.$c_siswa.'');
  }
  function editwalimurid($con,$c_orangtua,$c_siswa,$nama,$username,$password){
    $akh=mysqli_query($con,"UPDATE walimurid set c_siswa='$c_siswa',nama='$nama',username='$username',password='$password' where c_walimurid='$c_orangtua' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../editwalimurid/'.$c_siswa.'');
  }
//katmapel
  function addkatmapel($con,$katmapel,$posisi){
    $akh=mysqli_query($con,"INSERT INTO kategori_mapel set katmapel='$katmapel',posisi='$posisi' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../kategorimapel');
  }
  function editkatmapel($con,$c_katmapel,$katmapel,$posisi){
    $akh=mysqli_query($con,"UPDATE kategori_mapel set katmapel='$katmapel',posisi='$posisi' where c_katmapel='$c_katmapel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../kategorimapel');
  }
//mapel
  function addmapel($con,$c_mapel,$c_katmapel,$mapel,$sl){
    $akh=mysqli_query($con,"INSERT INTO mapel set c_mapel='$c_mapel',c_katmapel='$c_katmapel',mapel='$mapel',sl='$sl' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../mapel/'.$c_katmapel);
  }
  function editmapel($con,$c_mapel,$mapel,$sl){
    $ambil=mysqli_fetch_array(mysqli_query($con,"SELECT * from mapel where c_mapel='$c_mapel' "));
    $akh=mysqli_query($con,"UPDATE mapel set mapel='$mapel',sl='$sl' where c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../mapel/'.$ambil['c_katmapel']);
  }
//guru mapel
   function addgurumapel($con,$c_gurumapel,$c_guru,$c_kelas,$c_mapel){
    $akh=mysqli_query($con,"INSERT INTO gurumapel set c_gurumapel='$c_gurumapel',c_guru='$c_guru',c_kelas='$c_kelas',c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addgurumapel');
  }
  function editgurumapel($con,$c_gurumapel,$c_guru,$c_kelas,$c_mapel){
    $akh=mysqli_query($con,"UPDATE gurumapel set c_guru='$c_guru',c_kelas='$c_kelas',c_mapel='$c_mapel' where c_gurumapel='$c_gurumapel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../addgurumapel/'.$c_gurumapel.'');
  }
//wali kelas
   function addwalikelas($con,$c_walikelas,$c_guru,$c_kelas,$username,$password,$ttdwalikelas){
    $akh=mysqli_query($con,"INSERT INTO walikelas set c_walikelas='$c_walikelas',c_guru='$c_guru',c_kelas='$c_kelas',username='$username',password='$password',ttdwalikelas='$ttdwalikelas' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addwalikelas');
  }
  function editwalikelas($con,$c_walikelas,$c_guru,$c_kelas,$username,$password,$ttdwalikelas){
    $akh=mysqli_query($con,"UPDATE walikelas set c_guru='$c_guru',c_kelas='$c_kelas',username='$username',password='$password',ttdwalikelas='$ttdwalikelas' where c_walikelas='$c_walikelas' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../editwalikelas/'.$c_walikelas.'');
  }
//tahun akademik
  function addta($con,$c_ta,$tahun,$semester, $titimangsa_pts, $titimangsa_rapot){
    $akh=mysqli_query($con,"INSERT INTO tahunakademik set tahun='$tahun',semester='$semester',titimangsa_pts='$titimangsa_pts', titimangsa_rapot='$titimangsa_rapot' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../tahunakademik');
  }
  function editta($con,$c_ta,$tahun,$semester, $titimangsa_pts, $titimangsa_rapot){
    $akh=mysqli_query($con,"UPDATE tahunakademik set tahun='$tahun',semester='$semester',titimangsa_pts='$titimangsa_pts', titimangsa_rapot='$titimangsa_rapot' where c_ta='$c_ta' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../tahunakademik');
  }
  function aktifkan($con,$c_ta){
    $akh=mysqli_query($con,"UPDATE tahunakademik set status='' ");
    $akh2=mysqli_query($con,"UPDATE tahunakademik set status='aktif' where c_ta='$c_ta' ");
    session_start();
    $_SESSION['pesan']='aktif';
    header('location:../../tahunakademik');
  }
//tipe nilai
  function addtipenilai($con,$c_tipenilai,$tipe,$ket,$bobot,$p,$sistem){
    $akh=mysqli_query($con,"INSERT INTO tipenilai set c_tipenilai='$c_tipenilai',tipe='$tipe',ket='$ket',bobot='$bobot',p='$p',sistem='$sistem' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../jenisnilai');
  }
  function edittipenilai($con,$c_tipenilai,$tipe,$ket,$bobot,$p,$sistem){
    $akh=mysqli_query($con,"UPDATE tipenilai set tipe='$tipe',ket='$ket',bobot='$bobot',p='$p',sistem='$sistem' where c_tipenilai='$c_tipenilai' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../jenisnilai');
  }
//aspek keterampilan
  function addaspekket($con,$ket){
    $akh=mysqli_query($con,"INSERT INTO aspekket set ket='$ket' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../aspekket');
  }
  function editaspekket($con,$c_aspekket,$ket){
    $akh=mysqli_query($con,"UPDATE aspekket set ket='$ket' where c_aspekket='$c_aspekket' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../aspekket');
  }
//aspek ulangan harian
  function addaspekuh($con,$ket){
    $akh=mysqli_query($con,"INSERT INTO aspekuh set ket='$ket' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../aspekuh');
  }
  function editaspekuh($con,$c_aspekuh,$ket){
    $akh=mysqli_query($con,"UPDATE aspekuh set ket='$ket' where c_aspekuh='$c_aspekuh' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../aspekuh');
  }
//aspek tugas
  function addaspektug($con,$ket){
    $akh=mysqli_query($con,"INSERT INTO aspektug set ket='$ket' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../aspektug');
  }
  function editaspektug($con,$c_aspektug,$ket){
    $akh=mysqli_query($con,"UPDATE aspektug set ket='$ket' where c_aspektug='$c_aspektug' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../aspektug');
  }
//aplikasi
  function aplikasi($con,$alamat,$kepsek,$nipkepsek,$namasek,$gambar,$dibagi,$berapa,$hapsetaktif){
    $akh=mysqli_query($con,"UPDATE aplikasi set alamat='$alamat',kepsek='$kepsek',nipkepsek='$nipkepsek',namasek='$namasek',logo='$gambar',dibagi='$dibagi',berapa='$berapa',hapsetaktif='$hapsetaktif' where id='1' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../setting');
  }
//backup
  function backup($con,$file){ $at=date('Y-m-d H:i:s');
    $akh=mysqli_query($con,"INSERT INTO backup set at='$at',file='$file' ");
    session_start();
    $_SESSION['pesan']='backup';
    header('location:../../backup');
  }
//extra
  function addextra($con,$c_extra,$extra){
    $akh=mysqli_query($con,"INSERT INTO extra set c_extra='$c_extra',extra='$extra' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../extra');
  }
  function editextra($con,$c_extra,$extra){
    $akh=mysqli_query($con,"UPDATE extra set extra='$extra' where c_extra='$c_extra' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../extra');
  }
//setting guru mapel
  function settinggurumapel($con,$c_gurumapel,$c_guru,$c_mapel,$c_kelas){
    $akh=mysqli_query($con,"INSERT INTO gurumapel set c_gurumapel='$c_gurumapel',c_guru='$c_guru',c_mapel='$c_mapel',c_kelas='$c_kelas' ");
  }
//aspek mapelmd
  function addmapelmd($con,$nama_mapelmd,$kkm_mapelmd){
    $akh=mysqli_query($con,'INSERT INTO mapelmd set nama_mapelmd="'.$nama_mapelmd.'",kkm_mapelmd="'.$kkm_mapelmd.'" ');
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../mapelmd');
  }
  function editmapelmd($con,$id_mapelmd,$nama_mapelmd,$kkm_mapelmd){
    $akh=mysqli_query($con,'UPDATE mapelmd set nama_mapelmd="'.$nama_mapelmd.'",kkm_mapelmd="'.$kkm_mapelmd.'" where id_mapelmd="'.$id_mapelmd.'" ');
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../mapelmd');
  }
//aspek mapeltq
  function addmapeltq($con,$nama_mapeltq){
    $akh=mysqli_query($con,'INSERT INTO mapeltq set nama_mapeltq="'.$nama_mapeltq.'" ');
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../mapeltq');
  }
  function editmapeltq($con,$id_mapeltq,$nama_mapeltq){
    $akh=mysqli_query($con,'UPDATE mapeltq set nama_mapeltq="'.$nama_mapeltq.'" where id_mapeltq="'.$id_mapeltq.'" ');
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../mapeltq');
  }
//fitur hapus disini
  function hapusmapelmd($con,$id_mapelmd){
    $akh=mysqli_query($con,"DELETE from nilaimd where id_mapelmd='$id_mapelmd' ");
    $akh2=mysqli_query($con,"DELETE from mapelmd where id_mapelmd='$id_mapelmd' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../mapelmd');
  }
  function hapusmapeltq($con,$id_mapeltq){
    $akh=mysqli_query($con,"DELETE from nilaitq where id_mapeltq='$id_mapeltq' ");
    $akh2=mysqli_query($con,"DELETE from mapeltq where id_mapeltq='$id_mapeltq' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../mapeltq');
  }
  function hapuskatmapel($con,$c_katmapel){
    $akh=mysqli_query($con,"DELETE from kategori_mapel where c_katmapel='$c_katmapel' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../kategorimapel');
  }
  function hapuswalimurid($con,$c_walimurid){
    $akh=mysqli_query($con,"DELETE FROM walimurid where c_walimurid='$c_walimurid' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../walimurid');
  }
  function hapuswalikelas($con,$c_walikelas){
    $akh=mysqli_query($con,"DELETE FROM walikelas where c_walikelas='$c_walikelas' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../walikelas');
  }
  function hapusguru($con,$c_guru){
    $akh=mysqli_query($con,"DELETE FROM gurumapel where c_guru='$c_guru' "); $akh2=mysqli_query($con,"DELETE FROM walikelas where c_guru='$c_guru' "); $akh3=mysqli_query($con,"DELETE FROM guru where c_guru='$c_guru' ");    
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../guru');
  }
  function hapusgurumapel($con,$c_gurumapel){
    $akh=mysqli_query($con,"DELETE FROM gurumapel where c_gurumapel='$c_gurumapel' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../gurumapel');
  }
  function hapussiswa($con,$c_siswa,$c_kelas){
    $q1= mysqli_query($con,"DELETE FROM nilaiuh where c_siswa='$c_siswa' ");
      $q2= mysqli_query($con,"DELETE FROM nilaitugas where c_siswa='$c_siswa' ");
      $q3= mysqli_query($con,"DELETE FROM nilaimid where c_siswa='$c_siswa' ");
      $q4= mysqli_query($con,"DELETE FROM nilaiuas where c_siswa='$c_siswa' ");
      $q5= mysqli_query($con,"DELETE FROM rapotsiswa where c_siswa='$c_siswa' ");
      $q6= mysqli_query($con,"DELETE FROM jumlahnilra where c_siswa='$c_siswa' ");
      $q7= mysqli_query($con,"DELETE FROM nilaisikap where c_siswa='$c_siswa' ");
      $q8= mysqli_query($con,"DELETE FROM nilaiket where c_siswa='$c_siswa' ");
      $akh4=mysqli_query($con,"DELETE from nilaiextra where c_siswa='$c_siswa' ");
    $akh6=mysqli_query($con,"DELETE from siswa where c_siswa='$c_siswa' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../siswa/'.$c_kelas.'');
  }
  function hapussiswa2($con,$c_siswa){
    $q1= mysqli_query($con,"DELETE FROM nilaiuh where c_siswa='$c_siswa' ");
      $q2= mysqli_query($con,"DELETE FROM nilaitugas where c_siswa='$c_siswa' ");
      $q3= mysqli_query($con,"DELETE FROM nilaimid where c_siswa='$c_siswa' ");
      $q4= mysqli_query($con,"DELETE FROM nilaiuas where c_siswa='$c_siswa' ");
      $q5= mysqli_query($con,"DELETE FROM rapotsiswa where c_siswa='$c_siswa' ");
      $q6= mysqli_query($con,"DELETE FROM jumlahnilra where c_siswa='$c_siswa' ");
      $q7= mysqli_query($con,"DELETE FROM nilaisikap where c_siswa='$c_siswa' ");
      $q8= mysqli_query($con,"DELETE FROM nilaiket where c_siswa='$c_siswa' ");
      $akh4=mysqli_query($con,"DELETE from nilaiextra where c_siswa='$c_siswa' ");
    $akh6=mysqli_query($con,"DELETE from siswa where c_siswa='$c_siswa' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../siswa');
  }
  function hapuskelas($con,$c_kelas){
    //hapus wali murid
    $walm=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$c_kelas' ");while($hwalm=mysqli_fetch_array($walm)){
        mysqli_query($con,"DELETE from walimurid where c_siswa='$hwalm[c_siswa]' ");
        mysqli_query($con,"DELETE from nilaiextra where c_siswa='$hwalm[c_siswa]' ");
    }
    $akh=mysqli_query($con,"DELETE from gurumapel where c_kelas='$c_kelas' ");
    $q1= mysqli_query($con,"DELETE FROM nilaiuh where c_kelas='$c_kelas' ");
      $q2= mysqli_query($con,"DELETE FROM nilaitugas where c_kelas='$c_kelas' ");
      $q3= mysqli_query($con,"DELETE FROM nilaimid where c_kelas='$c_kelas' ");
      $q4= mysqli_query($con,"DELETE FROM nilaiuas where c_kelas='$c_kelas' ");
      $q5= mysqli_query($con,"DELETE FROM rapotsiswa where c_kelas='$c_kelas' ");
      $q6= mysqli_query($con,"DELETE FROM jumlahnilra where c_kelas='$c_kelas' ");
      $q7= mysqli_query($con,"DELETE FROM nilaisikap where c_kelas='$c_kelas' ");
      $q8= mysqli_query($con,"DELETE FROM nilaiket where c_kelas='$c_kelas' ");
      $akh5=mysqli_query($con,"DELETE from siswa where c_kelas='$c_kelas' ");
    $akh6=mysqli_query($con,"DELETE from walikelas where c_kelas='$c_kelas' ");
    $akh7=mysqli_query($con,"DELETE from kelas where c_kelas='$c_kelas' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../kelas');
  }
  function hapusmapel($con,$c_mapel){
    $q1= mysqli_query($con,"DELETE FROM nilaiuh where c_mapel='$c_mapel' ");
      $q2= mysqli_query($con,"DELETE FROM nilaitugas where c_mapel='$c_mapel' ");
      $q3= mysqli_query($con,"DELETE FROM nilaimid where c_mapel='$c_mapel' ");
      $q4= mysqli_query($con,"DELETE FROM nilaiuas where c_mapel='$c_mapel' ");
      $q8= mysqli_query($con,"DELETE FROM nilaiket where c_mapel='$c_mapel' ");
    $akh=mysqli_query($con,"DELETE from gurumapel where c_mapel='$c_mapel' ");
    $akh2=mysqli_query($con,"DELETE from nilai where c_mapel='$c_mapel' ");
    $ambil=mysqli_fetch_array(mysqli_query($con,"SELECT * from mapel where c_mapel='$c_mapel' "));
    $akh3=mysqli_query($con,"DELETE from mapel where c_mapel='$c_mapel' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../mapel/'.$ambil['c_katmapel']);
  }
  function hapustipenilai($con,$c_tipenilai){
    $akh=mysqli_query($con,"DELETE from nilai where c_tipenilai='$c_tipenilai' ");
    $akh2=mysqli_query($con,"DELETE from tipenilai where c_tipenilai='$c_tipenilai' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../jenisnilai');
  }
  function hapusta($con,$c_ta){
    $akh=mysqli_query($con,"DELETE from jumlahnilra where c_ta='$c_ta' ");
    $akh2=mysqli_query($con,"DELETE from rapotsiswa where c_ta='$c_ta' ");
      $q2= mysqli_query($con,"DELETE FROM nilaitugas where c_ta='$c_ta' ");
      $q3= mysqli_query($con,"DELETE FROM nilaimid where c_ta='$c_ta' ");
      $q4= mysqli_query($con,"DELETE FROM nilaiuas where c_ta='$c_ta' ");
      $q8= mysqli_query($con,"DELETE FROM nilaiket where c_ta='$c_ta' ");
      $q9= mysqli_query($con,"DELETE FROM nilaisikap where c_ta='$c_ta' ");
    $akh4=mysqli_query($con,"DELETE from nilaiextra where c_ta='$c_ta' ");
    $akh5=mysqli_query($con,"DELETE from tahunakademik where c_ta='$c_ta' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../tahunakademik');
  }
  function hapusextra($con,$c_extra){
    $akh=mysqli_query($con,"DELETE from nilaiextra where c_extra='$c_extra' ");
    $akh2=mysqli_query($con,"DELETE from extra where c_extra='$c_extra' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../extra');
  }
  function hapusbackup($con,$c_backup){
    $akh=mysqli_query($con,"DELETE FROM backup where c_backup='$c_backup' ");
    header('location:../../backup');
  }
  function hapusaspekuh($con,$c_aspekuh){
    $akh=mysqli_query($con,"DELETE from nilaiuh where c_aspekuh='$c_aspekuh' ");
    $akh2=mysqli_query($con,"DELETE from aspekuh where c_aspekuh='$c_aspekuh' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../aspekuh');
  }
  function hapusaspektug($con,$c_aspektug){
    $akh=mysqli_query($con,"DELETE from nilaitugas where c_aspektug='$c_aspektug' ");
    $akh2=mysqli_query($con,"DELETE from aspektug where c_aspektug='$c_aspektug' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../aspektug');
  }
  function hapusaspekket($con,$c_aspekket){
    $akh=mysqli_query($con,"DELETE from nilaiket where c_aspekket='$c_aspekket' ");
    $akh2=mysqli_query($con,"DELETE from aspekket where c_aspekket='$c_aspekket' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../aspekket');
  }
}
?>
