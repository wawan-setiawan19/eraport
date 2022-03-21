<?php
$siswa= mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' "); foreach($siswa as $hasiswa);
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
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("RINO OKTAVIANTO");
    $objset = $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(45);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setWidth(17);
    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:A2');
    $objPHPExcel->getActiveSheet(0)->mergeCells('B1:B2');
    $objPHPExcel->getActiveSheet(0)->mergeCells('C1:C2');
    $objPHPExcel->getActiveSheet(0)->mergeCells('D1:D2');
    $aspeksikap= mysqli_query($con,"SELECT * FROM aspeksikap where c_kelas='$_GET[r]' order by ket asc ");
    $jm= mysqli_num_rows($aspeksikap)+2;
    $objPHPExcel->getActiveSheet(0)->getStyle('A1:D2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(0)->getStyle('A1:D'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(0); 
    $objget->setTitle('NILAI SIKAP SISWA');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','ASPEK SIKAP');
    $objset->setCellValue('C1','NILAI');
    $objset->setCellValue('D1','PREDIKAT');
    $m= '3'; $no= '1';
    foreach($aspeksikap as $haspeksikap){
      $objset->setCellValue('A'.$m,$no);
      $objset->setCellValue('B'.$m,'   '.$haspeksikap['ket']);
      $amnilsik=mysqli_fetch_array(mysqli_query($con,"SELECT nilai FROM nilaisikap where c_ta='$c_ta' and c_aspeksikap='$haspeksikap[c_aspeksikap]' and c_siswa='$_GET[q]' and c_kelas='$_GET[r]' "));
      $objset->setCellValue('C'.$m,$amnilsik['nilai']);
      if($amnilsik['nilai']>=90 and $amnilsik['nilai']<=100){
        $predikat='A';
      }
      else if($amnilsik['nilai']>=80 and $amnilsik['nilai']<=89){
        $predikat='B+';
      }
      else if($amnilsik['nilai']>=70 and $amnilsik['nilai']<=79){
        $predikat='B';
      }
      else if($amnilsik['nilai']>=41 and $amnilsik['nilai']<=69){
        $predikat='C';
      }
      else if($amnilsik['nilai']>0 and $amnilsik['nilai']<=40){
        $predikat='D';
      }
      else{$predikat='-';}
      $objset->setCellValue('D'.$m,'   '.$predikat);
      $objPHPExcel->getActiveSheet(0)->getStyle('A'.$m.':A'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('B'.$m.':B'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('C'.$m.':C'.$jm)->applyFromArray($header)->getFont()->setSize(10);
      $objPHPExcel->getActiveSheet(0)->getStyle('D'.$m.':D'.$jm)->applyFromArray($left)->getFont()->setSize(10);
      $m++; $no++;
    }
    $objset = $objPHPExcel->setActiveSheetIndex(0);
    $filename = 'Nilai Sikap '.$hasiswa['nama'].' '.$ata['tahun'].'(Semester '.$ata['semester'].').xlsx';
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');//sesuaikan headernya 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//ubah nama file saat diunduh
    header('Content-Disposition: attachment;filename='.$filename);//unduh file
    $objWriter->save("php://output");
?>