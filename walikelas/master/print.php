<?php session_start(); require '../../php/function.php'; require '../../php/config.php'; if(empty($_SESSION['c_walikelas'])){header('location:'.$base.'login');} $wali=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM walikelas where c_walikelas='$_SESSION[c_walikelas]' ")); $na=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$wali[c_guru]' ")); ?>
<?php
	if($_GET['print']=='totalnilai'){
		require 'p-totalnilai.php';
	}
	else if($_GET['print']=='nilaipelajaran'){
		require 'p-nilaipelajaran.php';
	}
	else if($_GET['print']=='nilaisiswa'){
		require 'p-nilaisiswa.php';
	}
	else if($_GET['print']=='rapot'){
		/*masukkan jumlah nilai ke database*/
		$dsis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[kelas]' order by nama asc "); while($hdsis=mysqli_fetch_array($dsis)){
			$pel=mysqli_query($con,"SELECT * FROM mapel order by mapel asc "); $no=1;
	    while($hpel=mysqli_fetch_array($pel)){
	      //load TIPE nilai
	      $tn=mysqli_query($con,"SELECT * FROM tipenilai order by p asc"); $vr=0;
	      while($htn=mysqli_fetch_array($tn)){
	        $nil=mysqli_fetch_array(mysqli_query($con,"SELECT sum(nilai) as nilai FROM nilai where c_ta='$_GET[ta]' and c_mapel='$hpel[c_mapel]' and c_siswa='$hdsis[c_siswa]' and c_tipenilai='$htn[c_tipenilai]' "));
	        //asli
	        $nilmapasli=$nil['nilai'];
	        $totnilmapasli[] = $nilmapasli;
	        //present
	        $nilmap=number_format($nil['nilai']*($htn['bobot']/100));
	        $totnilmap[] = $nilmap;
	        $vr++;
	      }
	      //asli
	      $nilaimapelasli=array_sum($totnilmapasli);
	      $jumlahasli[]=$nilaimapelasli;
		  	$nilaiasli=array_sum($jumlahasli);
		  	$totnilmapasli=[];
	      //presen
	      $nilaimapel=array_sum($totnilmap);
	      $jumlah[]=$nilaimapel;
		  	$nilaipresen=array_sum($jumlah);
		  	$totnilmap=[];
			}
			/*absensi alpa*/
			$cekab=mysqli_fetch_array(mysqli_query($con,"SELECT * From rapotsiswa where c_ta='$_GET[ta]' and c_kelas='$_GET[kelas]' and c_siswa='$hdsis[c_siswa]' "));
			if($cekab['a']>3){
				$kurang=number_format($nilaipresen*(10/100));
				$akhir=$nilaipresen-$kurang;
			}
			else{
				$akhir=$nilaipresen;
			}
			//cek dulu jumlah nilai rapot
			$cjnr=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jumlahnilra where c_ta='$_GET[ta]' and c_kelas='$_GET[kelas]' and c_siswa='$hdsis[c_siswa]' "));
			if($cjnr==NULL){	
		  	mysqli_query($con,"INSERT INTO jumlahnilra set c_ta='$_GET[ta]',c_kelas='$_GET[kelas]',c_siswa='$hdsis[c_siswa]',nilaiasli='$nilaiasli',nilaipresen='$akhir' ");
		  }
		  else{
		  	mysqli_query($con,"UPDATE jumlahnilra set nilaiasli='$nilaiasli',nilaipresen='$akhir' where c_ta='$_GET[ta]' and c_kelas='$_GET[kelas]' and c_siswa='$hdsis[c_siswa]' ");
		  }
		  $jumlah=[];$jumlahasli=[];
		}
		require 'p-rapot.php';
	}
?>