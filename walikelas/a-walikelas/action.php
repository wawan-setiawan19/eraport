<?php date_default_timezone_set('Asia/Jakarta');
class action{
 function settingrapot($con,$c_ta,$c_kelas,$c_siswa,$s,$i,$a,$catatan,$kelakuan,$kerajinan,$kerapian){
 	$akh=mysqli_query($con,"INSERT INTO rapotsiswa set c_ta='$c_ta',c_kelas='$c_kelas',c_siswa='$c_siswa',s='$s',i='$i',a='$a',catatan='$catatan',kelakuan='$kelakuan',kerajinan='$kerajinan',kerapian='$kerapian' ");
 	session_start();
 	$_SESSION['pesan']='setting';
 	header('location:../../siswa');
 }
 function editsettingrapot($con,$c_ta,$c_kelas,$c_siswa,$s,$i,$a,$catatan,$kelakuan,$kerajinan,$kerapian){
 	$akh=mysqli_query($con,"UPDATE rapotsiswa set s='$s',i='$i',a='$a',catatan='$catatan',kelakuan='$kelakuan',kerajinan='$kerajinan',kerapian='$kerapian' WHERE c_ta='$c_ta' AND c_kelas='$c_kelas' AND c_siswa='$c_siswa' ");
 	session_start();
 	$_SESSION['pesan']='setting';
 	header('location:../../siswa');
 }
 function kirimpesanwalikel($con,$c_walikel,$c_walimur,$pesan,$at,$wg){
    $akh=mysqli_query($con,"INSERT INTO chat set c_walikelas='$c_walikel',c_walimurid='$c_walimur',pesan='$pesan',at='$at',w_g='$wg',sw='n' ");
    header('location:../../pesan/'.$c_walimur.'');
 }
//wali murid
  function inputwalimurid($con,$c_walimurid,$c_siswa,$nama,$username,$password){
    $akh=mysqli_query($con,"INSERT INTO walimurid set c_walimurid='$c_walimurid',c_siswa='$c_siswa',nama='$nama',username='$username',password='$password' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../settingwalimurid/'.$c_siswa.'');
  }
  function editwalimurid($con,$c_orangtua,$c_siswa,$nama,$username,$password){
    $akh=mysqli_query($con,"UPDATE walimurid set c_siswa='$c_siswa',nama='$nama',username='$username',password='$password' where c_walimurid='$c_orangtua' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../settingwalimurid/'.$c_siswa.'');
  }
  //aspek sikap
  function addaspeksikap($con,$c_kelas,$ket){
    $akh=mysqli_query($con,"INSERT INTO aspeksikap set c_kelas='$c_kelas',ket='$ket' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../aspeksikap');
  }
  function editaspeksikap($con,$c_aspeksikap,$c_kelas,$ket){
    $akh=mysqli_query($con,"UPDATE aspeksikap set c_kelas='$c_kelas',ket='$ket' where c_aspeksikap='$c_aspeksikap' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../aspeksikap');
  }
  function hapusaspeksikap($con,$c_aspeksikap){
    $akh=mysqli_query($con,"DELETE from nilaisikap where c_aspeksikap='$c_aspeksikap' ");
    $akh2=mysqli_query($con,"DELETE from aspeksikap where c_aspeksikap='$c_aspeksikap' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../aspeksikap');
  }
  function akumulasi(){
    session_start();
    $_SESSION['pesan']='akumulasi';
    header('location:../../peringkat');
   }
//nilai extra
  function selinputextra($c_siswa){
    session_start();
    $_SESSION['pesan']='selesai';
    header('location:../../nilaiextra/'.$c_siswa.'');
  }
}
?>
