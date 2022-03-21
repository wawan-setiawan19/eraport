<?php
$kel= mysqli_fetch_array(mysqli_query($con,"SELECT kelas FROM kelas where c_kelas='$_GET[r]' "));
$mapel= mysqli_query($con,"SELECT * FROM mapel where c_mapel='$_GET[q]' "); foreach($mapel as $hmapel);
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Asia/Jakarta');

    if (PHP_SAPI == 'cli')
      die('This example should only be run from a Web Browser');

    /** Include PHPExcel */
    require '../../php/PHPExcel/Classes/PHPExcel.php';
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
    $objPHPExcel->getActiveSheet(0)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($headerwar)->getFont()->setSize(11);
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
      $objset->setCellValue('B'.$m,''.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);      
      $objPHPExcel->getActiveSheet(0)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet tugas
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
    $objPHPExcel->getActiveSheet(1)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($headerwar)->getFont()->setSize(11);
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
      $objset->setCellValue('B'.$m,''.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $objPHPExcel->getActiveSheet(1)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(1)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet mid
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
    $objPHPExcel->getActiveSheet(2)->getStyle('A1:D2')->applyFromArray($headerwar)->getFont()->setSize(11);
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
      $objset->setCellValue('B'.$m,''.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $objPHPExcel->getActiveSheet(2)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(2)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet uas
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
    $objPHPExcel->getActiveSheet(3)->getStyle('A1:D2')->applyFromArray($headerwar)->getFont()->setSize(11);
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
      $objset->setCellValue('B'.$m,''.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $objPHPExcel->getActiveSheet(3)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(3)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet keterampilan
    $objPHPExcel->createSheet(4);
    $objset = $objPHPExcel->setActiveSheetIndex(4);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet(4)->getColumnDimension('C')->setWidth(35);
    $objPHPExcel->getActiveSheet(4)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(4)->mergeCells('C1:C2');
    $siswa= mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[r]' order by nama asc ");
    $aspekket= mysqli_query($con,"SELECT * FROM aspekket order by c_aspekket asc ");
    $s= 'D'; foreach($aspekket as $haspekket){
      $objPHPExcel->getActiveSheet(4)->getColumnDimension($s)->setWidth(7);
      $mc[]= $s;
      $s= chr(ord($s)+1);
    }
    $jm= mysqli_num_rows($siswa)+2;
    $juh= mysqli_num_rows($aspekket)-1;
    $objPHPExcel->getActiveSheet(4)->mergeCells('D1:'.$mc[$juh].'1');
    $objPHPExcel->getActiveSheet(4)->getStyle('A1:'.$mc[$juh].'2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(4)->getStyle('A1:'.$mc[$juh].$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(4); 
    $objget->setTitle('KETERAMPILAN');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','NISN');
    $objset->setCellValue('C1','NAMA SISWA');
    $objset->setCellValue('D1','NILAI');
    $sr= 'D'; $uh= 1; 
    foreach($aspekket as $haspekket){
      $objset->setCellValue($sr.'2',$uh);
      $sr= chr(ord($sr)+1);
      $uh++;
    }
    $m= '3'; $no= '1';
    foreach($siswa as $hsiswa){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,''.$hsiswa['nisn']);
      $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
      $objPHPExcel->getActiveSheet(4)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(4)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(4)->getStyle('D'.$m.':'.$sr.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $m++; $no++;
    }
    //sheet deskripsi
    // $objPHPExcel->createSheet(5);
    // $objset = $objPHPExcel->setActiveSheetIndex(5);
    // $objPHPExcel->getActiveSheet(5)->getColumnDimension('A')->setWidth(5);
    // $objPHPExcel->getActiveSheet(5)->getColumnDimension('B')->setWidth(20);
    // $objPHPExcel->getActiveSheet(5)->getColumnDimension('C')->setWidth(35);
    // $objPHPExcel->getActiveSheet(5)->getColumnDimension('D')->setWidth(35);
    // $objPHPExcel->getActiveSheet(5)->getColumnDimension('E')->setWidth(35);
    // $objPHPExcel->getActiveSheet(5)->mergeCells('A1:A2');
    // $objPHPExcel->getActiveSheet(5)->mergeCells('B1:B2');
    // $objPHPExcel->getActiveSheet(5)->mergeCells('C1:C2');
    // $objPHPExcel->getActiveSheet(5)->mergeCells('D1:D2');
    // $objPHPExcel->getActiveSheet(5)->mergeCells('E1:E2');
    
    // $jm= mysqli_num_rows($siswa)+2;
    // $objPHPExcel->getActiveSheet(5)->getStyle('A1:E2')->applyFromArray($headerwar)->getFont()->setSize(11);
    // $objPHPExcel->getSheet(5)->getStyle('A1:E'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    // //bold centeR
    // $objget = $objPHPExcel->getActiveSheet(5); 
    // $objget->setTitle('DESKRIPSI RAPOT');
    // $objset->setCellValue('A1','NO');
    // $objset->setCellValue('B1','NISN');
    // $objset->setCellValue('C1','NAMA SISWA');
    // $objset->setCellValue('D1','DESKRIPSI PENGETAHUAN');
    // $objset->setCellValue('E1','DESKRIPSI KETERAMPILAN');
    // $m= '3'; $no= '1';
    // foreach($siswa as $hsiswa){
    //   $objset->setCellValue('A'.$m,$no);
    //   $objset->setCellValue('B'.$m,''.$hsiswa['nisn']);
    //   $objset->setCellValue('C'.$m,'   '.$hsiswa['nama']);
    //   $objPHPExcel->getActiveSheet(5)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
    //   $objPHPExcel->getActiveSheet(5)->getStyle('B'.$m.':C'.$jm)->applyFromArray($left)->getFont()->setSize(10);
    //   $m++; $no++;
    // }
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