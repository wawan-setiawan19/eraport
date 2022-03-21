<?php
function koma($nilai){
  return number_format($nilai,2);
}
$siswa= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' "); foreach($siswa as $hasiswa);
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Asia/Jakarta');

    if (PHP_SAPI == 'cli')
      die('This example should only be run from a Web Browser');

    /** Include PHPExcel */
    require '../../php/PHPExcel/Classes/PHPExcel.php';
    //require '../../php/desainexcel.php';
     $header= array(
      'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'font' => array(
          'bold' => true,
          'name' => 'Calibri'
      )
    );
    $left= array(
      'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
      ),
      'font' => array(
          'bold' => true,
          'name' => 'Calibri'
      )
    );
    $headerwar= array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'50EBEC')
      ),
      'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'font' => array(
          'bold' => true,
          'name' => 'Calibri'
      )
    );
    $tlulus= array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'ff3030')
      ),
      'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'font' => array(
          'bold' => true,
          'name' => 'Calibri'
      )
    );
    $lulus= array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'4eee94')
      ),
      'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'font' => array(
          'bold' => true,
          'name' => 'Calibri'
      )
    );
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("RINO OKTAVIANTO");
    $objset = $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(35);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(0)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(0)->mergeCells('C1:C2');
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $jkat= 3; $lismap= 4;
  while($hex=mysqli_fetch_array($ex)){
    $mapel= mysqli_query($con,"SELECT *,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$hasiswa[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $loopkatmapel= mysqli_num_rows($mapel);
    $objset->setCellValue('B'.$jkat,'   '.$hex['katmapel']);

    $aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc ");
    $s= 'D'; foreach($aspekuh as $haspekuh){
      $objPHPExcel->getActiveSheet(0)->getColumnDimension($s)->setWidth(7);
      $mc[]= $s;
      $s= chr(ord($s)+1);
    }
    $jm= mysqli_num_rows($mapel)+$jkat;
    $juh= mysqli_num_rows($aspekuh)-1;
    $objPHPExcel->getActiveSheet(0)->mergeCells('D1:'.$mc[$juh].'1');
    $objPHPExcel->getActiveSheet(0)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(0)->getStyle('A1:'.$mc[$juh].$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(0); 
    $objget->setTitle('NILAI UH');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','MATA PELAJARAN');
    $objset->setCellValue('C1','KKM');
    $objset->setCellValue('D1','ULANGAN HARIAN');
    $sr= 'D'; $uh= 1; 
    foreach($aspekuh as $haspekuh){
      $objset->setCellValue($sr.'2',$uh);
      $sr= chr(ord($sr)+1);
      $uh++;
    }
    
    $m= $lismap; $no= '1';
    foreach($mapel as $hmapel){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hmapel['mapel']);
      $objset->setCellValue('C'.$m,$hmapel['sl']);
      $sr= 'D';
      foreach($aspekuh as $haspekuh){
        $amniluh=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel='$hmapel[c_mapel]' "));
        if($amniluh['nilai']==NULL){}else{
          if($amniluh['nilai']>=$hmapel['sl']){
            $objPHPExcel->getActiveSheet(0)->getStyle($sr.$m)->applyFromArray($lulus);
          }
          else{
            $objPHPExcel->getActiveSheet(0)->getStyle($sr.$m)->applyFromArray($tlulus);
          }
        }
        $objset->setCellValue($sr.$m,$amniluh['nilai']);
        $sr= chr(ord($sr)+1);
      }
      $objPHPExcel->getActiveSheet(0)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('B'.$m.':B'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('C'.$m.':'.$sr.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    $lismap = $loopkatmapel+$jkat+2;
    $jkat= $loopkatmapel+$jkat+1;
  }
    //sheet tugas
    $objPHPExcel->createSheet(1);
    $objset = $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet(1)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(1)->getColumnDimension('B')->setWidth(35);
    $objPHPExcel->getActiveSheet(1)->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet(1)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(1)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(1)->mergeCells('C1:C2');
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $jkat= 3; $lismap= 4;
  while($hex=mysqli_fetch_array($ex)){
    $mapel= mysqli_query($con,"SELECT *,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$hasiswa[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $loopkatmapel= mysqli_num_rows($mapel);
    $objset->setCellValue('B'.$jkat,'   '.$hex['katmapel']);

    $aspektug= mysqli_query($con,"SELECT * FROM aspektug order by c_aspektug asc ");
    $s= 'D'; foreach($aspektug as $haspektug){
      $objPHPExcel->getActiveSheet(1)->getColumnDimension($s)->setWidth(7);
      $mc[]= $s;
      $s= chr(ord($s)+1);
    }
    $jm= mysqli_num_rows($mapel)+$jkat;
    $juh= mysqli_num_rows($aspektug)-1;
    $objPHPExcel->getActiveSheet(1)->mergeCells('D1:'.$mc[$juh].'1');
    $objPHPExcel->getActiveSheet(1)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(1)->getStyle('A1:'.$mc[$juh].$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(1); 
    $objget->setTitle('NILAI TUGAS');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','MATA PELAJARAN');
    $objset->setCellValue('C1','KKM');
    $objset->setCellValue('D1','NILAI TUGAS');
    $sr= 'D'; $uh= 1; 
    foreach($aspektug as $haspektug){
      $objset->setCellValue($sr.'2',$uh);
      $sr= chr(ord($sr)+1);
      $uh++;
    }
    $m= $lismap; $no= '1';
    foreach($mapel as $hmapel){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hmapel['mapel']);
      $objset->setCellValue('C'.$m,$hmapel['sl']);
      $sr= 'D';
      foreach($aspektug as $haspektug){
        $nilaitug=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$haspektug[c_aspektug]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel='$hmapel[c_mapel]' "));
        if($nilaitug['nilai']==NULL){}else{
          if($nilaitug['nilai']>=$hmapel['sl']){
            $objPHPExcel->getActiveSheet(1)->getStyle($sr.$m)->applyFromArray($lulus);
          }
          else{
            $objPHPExcel->getActiveSheet(1)->getStyle($sr.$m)->applyFromArray($tlulus);
          }
        }
        $objset->setCellValue($sr.$m,$nilaitug['nilai']);
        $sr= chr(ord($sr)+1);
      }
      $objPHPExcel->getActiveSheet(1)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(1)->getStyle('B'.$m.':B'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(1)->getStyle('C'.$m.':'.$sr.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    $lismap = $loopkatmapel+$jkat+2;
    $jkat= $loopkatmapel+$jkat+1;
  }
    //sheet mid
    $objPHPExcel->createSheet(2);
    $objset = $objPHPExcel->setActiveSheetIndex(2);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('B')->setWidth(35);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet(2)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(2)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(2)->mergeCells('C1:C2');
    $objPHPExcel->getActiveSheet(2)->mergeCells('D1:D2');
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $jkat= 3; $lismap= 4;
  while($hex=mysqli_fetch_array($ex)){
    $mapel= mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$hasiswa[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $loopkatmapel= mysqli_num_rows($mapel);
    $objset->setCellValue('B'.$jkat,'   '.$hex['katmapel']);

    $jm= mysqli_num_rows($mapel)+$jkat;
    $objPHPExcel->getActiveSheet(2)->getStyle('A1:D2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(2)->getStyle('A1:D'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(2); 
    $objget->setTitle('NILAI MID SEMESTER');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','MATA PELAJARAN');
    $objset->setCellValue('C1','KKM');
    $objset->setCellValue('D1','NILAI MID');
    $m= $lismap; $no= '1';
    foreach($mapel as $hmapel){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hmapel['mapel']);
      $objset->setCellValue('C'.$m,$hmapel['sl']);
      if($hmapel['nilaimid']==NULL){}else{
        if($hmapel['nilaimid']>=$hmapel['sl']){
          $objPHPExcel->getActiveSheet(2)->getStyle('D'.$m)->applyFromArray($lulus);
        }
        else{
          $objPHPExcel->getActiveSheet(2)->getStyle('D'.$m)->applyFromArray($tlulus);
        }
      }
      $objset->setCellValue('D'.$m,$hmapel['nilaimid']);
      $objPHPExcel->getActiveSheet(2)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(2)->getStyle('B'.$m.':B'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(2)->getStyle('C'.$m.':D'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    $lismap = $loopkatmapel+$jkat+2;
    $jkat= $loopkatmapel+$jkat+1;
  }
    //sheet uas
    $objPHPExcel->createSheet(3);
    $objset = $objPHPExcel->setActiveSheetIndex(3);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('B')->setWidth(35);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet(3)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(3)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(3)->mergeCells('C1:C2');
    $objPHPExcel->getActiveSheet(3)->mergeCells('D1:D2');
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $jkat= 3; $lismap= 4;
  while($hex=mysqli_fetch_array($ex)){
    $mapel= mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$hasiswa[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $loopkatmapel= mysqli_num_rows($mapel);
    $objset->setCellValue('B'.$jkat,'   '.$hex['katmapel']);

    $jm= mysqli_num_rows($mapel)+$jkat;
    $objPHPExcel->getActiveSheet(3)->getStyle('A1:D2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(3)->getStyle('A1:D'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(3); 
    $objget->setTitle('NILAI UAS');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','MATA PELAJARAN');
    $objset->setCellValue('C1','KKM');
    $objset->setCellValue('D1','NILAI UAS');
    $m= $lismap; $no= '1';
    foreach($mapel as $hmapel){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hmapel['mapel']);
      $objset->setCellValue('C'.$m,$hmapel['sl']);
      if($hmapel['nilaiuas']==NULL){}else{
        if($hmapel['nilaiuas']>=$hmapel['sl']){
          $objPHPExcel->getActiveSheet(3)->getStyle('D'.$m)->applyFromArray($lulus);
        }
        else{
          $objPHPExcel->getActiveSheet(3)->getStyle('D'.$m)->applyFromArray($tlulus);
        }
      }
      $objset->setCellValue('D'.$m,$hmapel['nilaiuas']);
      $objPHPExcel->getActiveSheet(3)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(3)->getStyle('B'.$m.':B'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(3)->getStyle('C'.$m.':D'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    $lismap = $loopkatmapel+$jkat+2;
    $jkat= $loopkatmapel+$jkat+1;
  }
    //sheet nilai akhir
    $objPHPExcel->createSheet(4);
    $objset = $objPHPExcel->setActiveSheetIndex(4);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('B')->setWidth(35);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('E')->setWidth(15);
    $objPHPExcel->getActiveSheet(4)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('C1:C2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('D1:D2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('E1:E2');
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $jkat= 3; $lismap= 4;
  while($hex=mysqli_fetch_array($ex)){
    $pel=mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel=mapel_kelas.c_mapel) as nilaiuas,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$hasiswa[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $loopkatmapel= mysqli_num_rows($pel);
    $objset->setCellValue('B'.$jkat,'   '.$hex['katmapel']);

    $jm= mysqli_num_rows($pel)+$jkat;
    $jm_a= mysqli_num_rows($pel)+$jkat+1;
    $objPHPExcel->getActiveSheet(4)->getStyle('A1:E2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(4)->getStyle('A1:E'.$jm_a)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(4); 
    $objget->setTitle('NILAI AKHIR');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','MATA PELAJARAN');
    $objset->setCellValue('C1','KKM');
    $objset->setCellValue('D1','NILAI ASLI');
    $objset->setCellValue('E1','NILAI AKHIR');
    $m= $lismap; $no= '1';
    foreach($pel as $hpel){
    require '../view/rumus/nilaiexpersiswa.php';
      $nilaiasli[]= $nilasli;
      $nilaiakhir[]= $nilakhir;
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hpel['mapel']);
      $objset->setCellValue('C'.$m,$hpel['sl']);
      if($nilasli==0){}else{$objset->setCellValue('D'.$m,$nilasli);}
      if($nilakhir==0){}else{
        if($nilakhir>=$hpel['sl']){
          $objPHPExcel->getActiveSheet(4)->getStyle('E'.$m)->applyFromArray($lulus);
        }
        else{
          $objPHPExcel->getActiveSheet(4)->getStyle('E'.$m)->applyFromArray($tlulus);
        }
      }
      if($nilakhir==0){}else{$objset->setCellValue('E'.$m,koma($nilakhir));}
      $objPHPExcel->getActiveSheet(4)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(4)->getStyle('B'.$m.':B'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(4)->getStyle('C'.$m.':E'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    $lismap = $loopkatmapel+$jkat+2;
    $jkat= $loopkatmapel+$jkat+1;
  }
    
    $ikiasli= array_sum($nilaiasli);
    $ikiakhir= array_sum($nilaiakhir);
    $objPHPExcel->getActiveSheet(4)->mergeCells('A'.$jm_a.':C'.$jm_a);
    $objPHPExcel->getActiveSheet(4)->getStyle('A'.$jm_a.':E'.$jm_a)->applyFromArray($headerwar)->getFont()->setSize(11);
    $objset->setCellValue('A'.$jm_a,'TOTAL'); $objset->setCellValue('D'.$jm_a,$ikiasli); $objset->setCellValue('E'.$jm_a,$ikiakhir); 
    $nilaiasli=[];
    $nilaiakhir=[];
    //sheet keterampilan
    $objPHPExcel->createSheet(5);
    $objset = $objPHPExcel->setActiveSheetIndex(5);
    $objPHPExcel->getActiveSheet(5)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(5)->getColumnDimension('B')->setWidth(35);
    $objPHPExcel->getActiveSheet(5)->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet(5)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(5)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(5)->mergeCells('C1:C2');
  $ex=mysqli_query($con,"SELECT * FROM kategori_mapel order by posisi asc ");
  $jkat= 3; $lismap= 4;
  while($hex=mysqli_fetch_array($ex)){
    $mapel= mysqli_query($con,"SELECT *,(select mapel from mapel where c_mapel=mapel_kelas.c_mapel) as mapel,(select sl from mapel where c_mapel=mapel_kelas.c_mapel) as sl FROM mapel_kelas where c_kelas='$hasiswa[c_kelas]' and c_katmapel='$hex[c_katmapel]' order by no asc "); $loopkatmapel= mysqli_num_rows($mapel);
    $objset->setCellValue('B'.$jkat,'   '.$hex['katmapel']);

    $aspekket= mysqli_query($con,"SELECT * FROM aspekket order by c_aspekket asc ");
    $s= 'D'; foreach($aspekket as $haspekket){
      $objPHPExcel->getActiveSheet(5)->getColumnDimension($s)->setWidth(7);
      $mc[]= $s;
      $s= chr(ord($s)+1);
    }
    $jm= mysqli_num_rows($mapel)+$jkat;
    $juh= mysqli_num_rows($aspekket)-1;
    $objPHPExcel->getActiveSheet(5)->mergeCells('D1:'.$mc[$juh].'1');
    $objPHPExcel->getActiveSheet(5)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(5)->getStyle('A1:'.$mc[$juh].$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(5); 
    $objget->setTitle('KETERAMPILAN');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','MATA PELAJARAN');
    $objset->setCellValue('C1','KKM');
    $objset->setCellValue('D1','NILAI');
    $sr= 'D'; $uh= 1; 
    foreach($aspekket as $haspekket){
      $objset->setCellValue($sr.'2',$uh);
      $sr= chr(ord($sr)+1);
      $uh++;
    }
    $m= $lismap; $no= '1';
    foreach($mapel as $hmapel){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hmapel['mapel']);
      $objset->setCellValue('C'.$m,$hmapel['sl']);
      $sr= 'D';
      foreach($aspekket as $haspekket){
        $nilaiket=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiket where c_ta='$c_ta' and c_aspekket='$haspekket[c_aspekket]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' and c_mapel='$hmapel[c_mapel]' "));
        if($nilaiket['nilai']==NULL){}else{
          if($nilaiket['nilai']>=$hmapel['sl']){
            $objPHPExcel->getActiveSheet(5)->getStyle($sr.$m)->applyFromArray($lulus);
          }
          else{
            $objPHPExcel->getActiveSheet(5)->getStyle($sr.$m)->applyFromArray($tlulus);
          }
        }
        $objset->setCellValue($sr.$m,$nilaiket['nilai']);
        $sr= chr(ord($sr)+1);
      }
      $objPHPExcel->getActiveSheet(5)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(5)->getStyle('B'.$m.':B'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(5)->getStyle('C'.$m.':'.$sr.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    $lismap = $loopkatmapel+$jkat+2;
    $jkat= $loopkatmapel+$jkat+1;
  }
    $objset = $objPHPExcel->setActiveSheetIndex(0);
    $filename = $hasiswa['nama'].' '.$ata['tahun'].'(Semester '.$ata['semester'].').xlsx';
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');//sesuaikan headernya 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//ubah nama file saat diunduh
    header('Content-Disposition: attachment;filename='.$filename);//unduh file
    $objWriter->save("php://output");
?>