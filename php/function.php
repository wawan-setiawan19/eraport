<?php 
function rata($arr){
  $filter= array_filter($arr);
  $rata= array_sum($filter)/count($filter);
  if(is_nan($rata)){
    $rata = 0;
  }
  return $rata;
}
function anti_injection($data){
  $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));

  return $filter;

}
function koma($nilai){
  return number_format($nilai,2);
}
function bulat($nilai){
  return number_format($nilai,0);
}
function terbilang($nilai) {
  if($nilai == 100) {
    return 'Seratus';
  } else {
    $satuan = '';
    $puluhan = '';
    $terbilang = '';

    if(intval($nilai / 10) == 1) { $puluhan = 'Se'; }
    if(intval($nilai / 10) == 2) { $puluhan = 'Dua'; }
    if(intval($nilai / 10) == 3) { $puluhan = 'Tiga'; }
    if(intval($nilai / 10) == 4) { $puluhan = 'Empat'; }
    if(intval($nilai / 10) == 5) { $puluhan = 'Lima'; }
    if(intval($nilai / 10) == 6) { $puluhan = 'Enam'; }
    if(intval($nilai / 10) == 7) { $puluhan = 'Tujuh'; }
    if(intval($nilai / 10) == 8) { $puluhan = 'Delapan'; }
    if(intval($nilai / 10) == 9) { $puluhan = 'Sembilan'; }

    if(intval($nilai % 10) == 1) { $satuan = 'satu'; }
    if(intval($nilai % 10) == 2) { $satuan = 'dua'; }
    if(intval($nilai % 10) == 3) { $satuan = 'tiga'; }
    if(intval($nilai % 10) == 4) { $satuan = 'empat'; }
    if(intval($nilai % 10) == 5) { $satuan = 'lima'; }
    if(intval($nilai % 10) == 6) { $satuan = 'enam'; }
    if(intval($nilai % 10) == 7) { $satuan = 'tujuh'; }
    if(intval($nilai % 10) == 8) { $satuan = 'delapan'; }
    if(intval($nilai % 10) == 9) { $satuan = 'sembilan'; }

    $terbilang = $puluhan.' puluh '.$satuan;
    return $terbilang;
  }
}
function predikattambahan($nilai,$sl){
  $interval = (100-$sl)/3;
  if($nilai>0){
    if($nilai >= $sl+(2*$interval)){
      $predikattambahan = 'A';
    }elseif ($nilai >= $sl+$interval && $nilai < $sl+(2*$interval)) {
      $predikattambahan = 'B';
    }elseif ($nilai >= $sl && $nilai < $sl+$interval) {
      $predikattambahan = 'C';
    }else{
      $predikattambahan = 'D';
    }
    return $predikattambahan;
  }
  else{
    $predikattambahan='-';
    return $predikattambahan;
  }
}
function predikat($nilai){
  if($nilai>=92 and $nilai<=100){
    $predikat='A';
  }
  else if($nilai>=82 and $nilai<=91){
    $predikat='B';
  }
  else if($nilai>=70 and $nilai<=81){
    $predikat='C';
  }
  else if($nilai>=41 and $nilai<=69){
    $predikat='D';
  }
  else if($nilai>0 and $nilai<=40){
    $predikat='E';
  }
  else{$predikat='-';}
  return $predikat;
}
function romawi($n){
  $iromawi = array("","I","II","III","IV","V","VI","VII","VIII","IX","X",20=>"XX",30=>"XXX",40=>"XL",50=>"L",
  60=>"LX",70=>"LXX",80=>"LXXX",90=>"XC",100=>"C",200=>"CC",300=>"CCC",400=>"CD",500=>"D",600=>"DC",700=>"DCC",
  800=>"DCCC",900=>"CM",1000=>"M",2000=>"MM",3000=>"MMM");
  if(array_key_exists($n,$iromawi)){
  $hasil = $iromawi[$n];
  }elseif($n >= 11 && $n <= 99){
  $i = $n % 10;
  $hasil = $iromawi[$n-$i] . Romawi($n % 10);
  }elseif($n >= 101 && $n <= 999){
  $i = $n % 100;
  $hasil = $iromawi[$n-$i] . Romawi($n % 100);
  }else{
  $i = $n % 1000;
  $hasil = $iromawi[$n-$i] . Romawi($n % 1000);
  }
  return $hasil;
}
function rp($str){
    $jum = strlen($str);
    $jumtitik = ceil($jum/3);
    $balik = strrev($str);
    
    $awal = 0;
    $akhir = 3;
    for($x=0;$x<$jumtitik;$x++){
      $a[$x] = substr($balik,$awal,$akhir)."."; 
      $awal+=3;
    }
    $hasil = implode($a);
    $hasilakhir = strrev($hasil);
    $hasilakhir = substr($hasilakhir,1,$jum+$jumtitik);
          
    return "".$hasilakhir."";
}
function tgl($date){  
  $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
  $date = strtotime($date);
  $tanggal = date ('j', $date);
  $bulan = $array_bulan[date('n',$date)];
  $tahun = date('Y',$date); 
  $result = $tanggal ." ". $bulan ." ". $tahun;       
  return($result);  
}
function bulan($bulan){
  if($bulan=='01'){$namabulan="Januari";}
  elseif($bulan=='01'){$namabulan="Januari";}
  elseif($bulan=='02'){$namabulan="Februari";}
  elseif($bulan=='03'){$namabulan="Maret";}
  elseif($bulan=='04'){$namabulan="April";}
  elseif($bulan=='05'){$namabulan="Mei";}
  elseif($bulan=='06'){$namabulan="Juni";}
  elseif($bulan=='07'){$namabulan="Juli";}
  elseif($bulan=='08'){$namabulan="Agustus";}
  elseif($bulan=='09'){$namabulan="September";}
  elseif($bulan=='10'){$namabulan="Oktober";}
  elseif($bulan=='11'){$namabulan="November";}
  elseif($bulan=='12'){$namabulan="Desember";}
  return($namabulan);
}
function hari($hari){
  $daftar_hari = array( 'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
  $hariini = date('l', strtotime($hari)); 
  return $daftar_hari[$hariini];
}
function h($h){
  if($h=='1'){$hr='Senin';}
  elseif($h=='2'){$hr='Selasa';}
  elseif($h=='3'){$hr='Rabu';}
  elseif($h=='4'){$hr='Kamis';}
  elseif($h=='5'){$hr='Jumat';}
  elseif($h=='6'){$hr='Sabtu';}
  elseif($h=='7'){$hr='Minggu';}
  return $hr;
}
function l($linku){
  $l=substr(md5($linku), 0,9);
  return $l;
}
?>