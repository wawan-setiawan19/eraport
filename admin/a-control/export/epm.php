<?php
$kel= mysqli_fetch_array(mysqli_query($con,"SELECT kelas FROM kelas where c_kelas='$_GET[r]' "));
$mapel= mysqli_query($con,"SELECT * FROM mapel where c_mapel='$_GET[q]' "); foreach($mapel as $hmapel);
    require '../../php/PHPExcel.php';
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
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("RINO OKTAVIANTO");
    $objset = $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(35);
    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(0)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(0)->mergeCells('C1:C2');
    $siswa= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[r]' order by nama asc ");
    $aspekuh= mysqli_query($con,"SELECT * FROM aspekuh order by c_aspekuh asc ");
    $s= 'D'; foreach($aspekuh as $haspekuh){
      $objPHPExcel->getActiveSheet(0)->getColumnDimension($s)->setWidth(7);
      $mc[]= $s;
      $s= chr(ord($s)+1);
    }
    $jm= mysqli_num_rows($siswa)+2;
    $juh= mysqli_num_rows($aspekuh)-1;
    $objPHPExcel->getActiveSheet(0)->mergeCells('D1:'.$mc[$juh].'1');
    $objPHPExcel->getActiveSheet(0)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($header)->getFont()->setSize(11);
    $objPHPExcel->getSheet(0)->getStyle('A1:'.$mc[$juh].$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(0); 
    $objget->setTitle('NILAI UH');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','NISN');
    $objset->setCellValue('C1','NAMA SISWA');
    $objset->setCellValue('D1','NILAI ULANGAN HARIAN');
    $sr= 'D'; $uh= 1; 
    foreach($aspekuh as $haspekuh){
      $objset->setCellValue($sr.'2',$uh);
      $sr= chr(ord($sr)+1);
      $uh++;
    }
    $m= '3'; $no= '1';
    foreach($siswa as $hsiswa){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $sr= 'D';
      foreach($aspekuh as $haspekuh){
        $amniluh=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaiuh where c_ta='$c_ta' and c_aspekuh='$haspekuh[c_aspekuh]' and c_siswa='$hsiswa[c_siswa]' and c_kelas='$_GET[r]' and c_mapel='$_GET[q]' "));
        $objset->setCellValue($sr.$m,$amniluh['nilai']);
        $sr= chr(ord($sr)+1);
      }
      $objPHPExcel->getActiveSheet(0)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('D'.$m.':'.$sr.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet 2
    $objPHPExcel->createSheet(1);
    $objset = $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet(1)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(1)->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet(1)->getColumnDimension('C')->setWidth(35);
    $objPHPExcel->getActiveSheet(1)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(1)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(1)->mergeCells('C1:C2');
    $siswa= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[r]' order by nama asc ");
    $aspektug= mysqli_query($con,"SELECT * FROM aspektug order by c_aspektug asc ");
    $s= 'D'; foreach($aspektug as $haspektug){
      $objPHPExcel->getActiveSheet(1)->getColumnDimension($s)->setWidth(7);
      $mc[]= $s;
      $s= chr(ord($s)+1);
    }
    $jm= mysqli_num_rows($siswa)+2;
    $juh= mysqli_num_rows($aspektug)-1;
    $objPHPExcel->getActiveSheet(1)->mergeCells('D1:'.$mc[$juh].'1');
    $objPHPExcel->getActiveSheet(1)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($header)->getFont()->setSize(11);
    $objPHPExcel->getSheet(1)->getStyle('A1:'.$mc[$juh].$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(1); 
    $objget->setTitle('NILAI TUGAS');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','NISN');
    $objset->setCellValue('C1','NAMA SISWA');
    $objset->setCellValue('D1','NILAI TUGAS');
    $sr= 'D'; $uh= 1; 
    foreach($aspektug as $haspektug){
      $objset->setCellValue($sr.'2',$uh);
      $sr= chr(ord($sr)+1);
      $uh++;
    }
    $m= '3'; $no= '1';
    foreach($siswa as $hsiswa){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $sr= 'D';
      foreach($aspektug as $haspektug){
        $nilaitug=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaitugas where c_ta='$c_ta' and c_aspektug='$haspektug[c_aspektug]' and c_siswa='$hsiswa[c_siswa]' and c_kelas='$_GET[r]' and c_mapel='$_GET[q]' "));
        $objset->setCellValue($sr.$m,$nilaitug['nilai']);
        $sr= chr(ord($sr)+1);
      }
      $objPHPExcel->getActiveSheet(1)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(1)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(1)->getStyle('D'.$m.':'.$sr.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet 3
    $objPHPExcel->createSheet(2);
    $objset = $objPHPExcel->setActiveSheetIndex(2);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('C')->setWidth(35);
    $objPHPExcel->getActiveSheet(2)->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet(2)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(2)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(2)->mergeCells('C1:C2');
    $objPHPExcel->getActiveSheet(2)->mergeCells('D1:D2');
    $siswa= mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[r]' and c_mapel='$_GET[q]') as nilaimid FROM siswa where c_kelas='$_GET[r]' order by nama asc ");
    $jm= mysqli_num_rows($siswa)+2;
    $objPHPExcel->getActiveSheet(2)->getStyle('A1:D2')->applyFromArray($header)->getFont()->setSize(11);
    $objPHPExcel->getSheet(2)->getStyle('A1:D'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(2); 
    $objget->setTitle('NILAI MID SEMESTER');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','NISN');
    $objset->setCellValue('C1','NAMA SISWA');
    $objset->setCellValue('D1','NILAI MID');
    $m= '3'; $no= '1';
    foreach($siswa as $hsiswa){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $objset->setCellValue('D'.$m,$hsiswa['nilaimid']);
      $objPHPExcel->getActiveSheet(2)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(2)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(2)->getStyle('D'.$m.':D'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet 3
    $objPHPExcel->createSheet(3);
    $objset = $objPHPExcel->setActiveSheetIndex(3);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('C')->setWidth(35);
    $objPHPExcel->getActiveSheet(3)->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet(3)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(3)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(3)->mergeCells('C1:C2');
    $objPHPExcel->getActiveSheet(3)->mergeCells('D1:D2');
    $siswa= mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[r]' and c_mapel='$_GET[q]') as nilaiuas FROM siswa where c_kelas='$_GET[r]' order by nama asc ");
    $jm= mysqli_num_rows($siswa)+2;
    $objPHPExcel->getActiveSheet(3)->getStyle('A1:D2')->applyFromArray($header)->getFont()->setSize(11);
    $objPHPExcel->getSheet(3)->getStyle('A1:D'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(3); 
    $objget->setTitle('NILAI UAS');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','NISN');
    $objset->setCellValue('C1','NAMA SISWA');
    $objset->setCellValue('D1','NILAI UAS');
    $m= '3'; $no= '1';
    foreach($siswa as $hsiswa){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $objset->setCellValue('D'.$m,$hsiswa['nilaiuas']);
      $objPHPExcel->getActiveSheet(3)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(3)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(3)->getStyle('D'.$m.':D'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet 4
    $objPHPExcel->createSheet(4);
    $objset = $objPHPExcel->setActiveSheetIndex(4);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('C')->setWidth(35);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('E')->setWidth(15);
    $objPHPExcel->getActiveSheet(4)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('C1:C2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('D1:D2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('E1:E2');
    $lsis=mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaimid where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[r]' and c_mapel='$_GET[q]') as nilaimid,(SELECT nilai FROM nilaiuas where c_ta='$c_ta' and c_siswa=siswa.c_siswa and c_kelas='$_GET[r]' and c_mapel='$_GET[q]') as nilaiuas FROM siswa where c_kelas='$_GET[r]' order by nama asc ");
    $jm= mysqli_num_rows($lsis)+2;
    $objPHPExcel->getActiveSheet(4)->getStyle('A1:E2')->applyFromArray($header)->getFont()->setSize(11);
    $objPHPExcel->getSheet(4)->getStyle('A1:E'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(4); 
    $objget->setTitle('NILAI AKHIR');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','NISN');
    $objset->setCellValue('C1','NAMA SISWA');
    $objset->setCellValue('D1','NILAI ASLI');
    $objset->setCellValue('E1','NILAI AKHIR');
    $m= '3'; $no= '1';
    foreach($lsis as $hlsis){
    require '../view/rumus/nilaiexpermapel.php';
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$hlsis['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hlsis['nama']);
      $objset->setCellValue('D'.$m,$nilasli);
      $objset->setCellValue('E'.$m,$nilakhir);
      $objPHPExcel->getActiveSheet(4)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(4)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(4)->getStyle('D'.$m.':E'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    $objset = $objPHPExcel->setActiveSheetIndex(0);
    $filename = $hmapel['mapel'].' '.$kel['kelas'].' '.$ata['tahun'].'(Semester '.$ata['semester'].').xlsx';
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');//sesuaikan headernya 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//ubah nama file saat diunduh
    header('Content-Disposition: attachment;filename='.$filename);//unduh file
    $objWriter->save("php://output");
?>