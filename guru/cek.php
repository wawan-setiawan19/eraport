<?php
$nilai = $_POST['nilsiswa'];
$jumnilai = count($nilai);
for($ff=0;$ff<$jumnilai;$ff++){
	echo $nilai[$ff].'<br>';
} ?>