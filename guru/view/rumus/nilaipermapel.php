<?php 
$nuh= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nuh from nilaiuh where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
$ntug= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as ntug from nilaitugas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
$nilasli= $nuh['nuh']+$ntug['ntug']+$hlsis['nilaimid']+$hlsis['nilaiuas'];
//nilai akhir ulangan harian
$tkog= mysqli_query($con,"SELECT * FROM tipekognitif order by c_tipekognitif asc "); foreach($tkog as $htkog){
	if($htkog['kognitif']=='uh'){
		if($aplikasi['dibagi']=='YES'){
			$nilakuh= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilakuh from nilaiuh where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
			$nilaiakhiruh= $nilakuh['nilakuh'];
		}
		else{
			if($htkog['tipe']=='rata'){
				$nilakuh= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilakuh from nilaiuh where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhiruh= $nilakuh['nilakuh'];
			}
			else if($htkog['tipe']=='asli'){
				$nilakuh= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilakuh from nilaiuh where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhiruh= $nilakuh['nilakuh'];
			}
			else if($htkog['tipe']=='persen'){
				$nilakuh= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilakuh from nilaiuh where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhiruh= $nilakuh['nilakuh']*($htkog['persen']/100);
			}
		}
	}
	else if($htkog['kognitif']=='tugas'){
		if($aplikasi['dibagi']=='YES'){
			$nilaktug= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilaktug from nilaitugas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
			$nilaiakhirtugas= $nilaktug['nilaktug'];
		}
		else{
			if($htkog['tipe']=='rata'){
				$nilaktug= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilaktug from nilaitugas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhirtugas= $nilaktug['nilaktug'];
			}
			else if($htkog['tipe']=='asli'){
				$nilaktug= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilaktug from nilaitugas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhirtugas= $nilaktug['nilaktug'];
			}
			else if($htkog['tipe']=='persen'){
				$nilaktug= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilaktug from nilaitugas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhirtugas= $nilaktug['nilaktug']*($htkog['persen']/100);
			}
		}
	}
	else if($htkog['kognitif']=='mid'){
		if($aplikasi['dibagi']=='YES'){
			$nilakmid= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilakmid from nilaimid where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
			$nilaiakhirmid= $nilakmid['nilakmid'];
		}
		else{
			if($htkog['tipe']=='rata'){
				$nilakmid= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilakmid from nilaimid where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhirmid= $nilakmid['nilakmid'];
			}
			else if($htkog['tipe']=='asli'){
				$nilakmid= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilakmid from nilaimid where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhirmid= $nilakmid['nilakmid'];
			}
			else if($htkog['tipe']=='persen'){
				$nilakmid= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilakmid from nilaimid where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhirmid= $nilakmid['nilakmid']*($htkog['persen']/100);
			}
		}
	}
	else if($htkog['kognitif']=='uas'){
		if($aplikasi['dibagi']=='YES'){
			$nilakuas= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilakuas from nilaiuas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
			$nilaiakhiruas= $nilakuas['nilakuas'];
		}
		else{
			if($htkog['tipe']=='rata'){
				$nilakuas= mysqli_fetch_array(mysqli_query($con,"SELECT AVG(nilai) as nilakuas from nilaiuas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhiruas= $nilakuas['nilakuas'];
			}
			else if($htkog['tipe']=='asli'){
				$nilakuas= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilakuas from nilaiuas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhiruas= $nilakuas['nilakuas'];
			}
			else if($htkog['tipe']=='persen'){
				$nilakuas= mysqli_fetch_array(mysqli_query($con,"SELECT SUM(nilai) as nilakuas from nilaiuas where c_ta='$c_ta' and c_siswa='$hlsis[c_siswa]' and c_kelas='$_GET[q]' and c_mapel='$_GET[r]' "));
				$nilaiakhiruas= $nilakuas['nilakuas']*($htkog['persen']/100);
			}
		}
	}
}
if($aplikasi['dibagi']=='NO'){
	$nilakhir= $nilaiakhiruh+$nilaiakhirtugas+$nilaiakhirmid+$nilaiakhiruas;
}
else if($aplikasi['dibagi']=='YES'){
	$nilakhir= $nilaiakhiruh+$nilaiakhirtugas+$nilaiakhirmid+$nilaiakhiruas;
}
?>