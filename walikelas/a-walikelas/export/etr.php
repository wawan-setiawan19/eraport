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
    $extra= mysqli_query($con,"SELECT *,(SELECT nilai FROM nilaiextra where c_ta='$c_ta' and c_extra=extra.c_extra and c_siswa='$_GET[q]' and c_kelas='$_GET[r]') as nilai FROM extra order by extra asc ");
    $jm= mysqli_num_rows($extra)+2;
    $objPHPExcel->getActiveSheet(0)->getStyle('A1:D2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(0)->getStyle('A1:D'.$jm)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //bold centeR
    $objget = $objPHPExcel->getActiveSheet(0); 
    $objget->setTitle('TAMBAHAN RAPOT');
    $objset->setCellValue('A1','NO');
    $objset->setCellValue('B1','EKSTRAKULIKULER');
    $objset->setCellValue('C1','NILAI');
    $objset->setCellValue('D1','PREDIKAT');
    $m= '3'; $no= '1';
    foreach($extra as $hextra){
        if($hextra['nilai']==0){}else{
        $objset->setCellValue('A'.$m,$no);
        $objset->setCellValue('B'.$m,'   '.$hextra['extra']);
        $objset->setCellValue('C'.$m,$hextra['nilai']);
        if($hextra['nilai']>=90 and $hextra['nilai']<=100){
          $predikat='A';
        }
        else if($hextra['nilai']>=80 and $hextra['nilai']<=89){
          $predikat='B+';
        }
        else if($hextra['nilai']>=70 and $hextra['nilai']<=79){
          $predikat='B';
        }
        else if($hextra['nilai']>=41 and $hextra['nilai']<=69){
          $predikat='C';
        }
        else if($hextra['nilai']>0 and $hextra['nilai']<=40){
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
    }
    $setra= mysqli_query($con,"SELECT * FROM rapotsiswa where c_ta='$c_ta' and c_kelas='$_GET[r]' and c_siswa='$_GET[q]' "); foreach($setra as $hsetra);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setWidth(13);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('G')->setWidth(13);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setWidth(13);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setWidth(17);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('J')->setWidth(17);
    $objPHPExcel->getActiveSheet(0)->getColumnDimension('K')->setWidth(17);
    $objPHPExcel->getActiveSheet(0)->mergeCells('F1:H1'); $objPHPExcel->getActiveSheet(0)->mergeCells('I1:K1');
    $objPHPExcel->getActiveSheet(0)->getStyle('F1:K2')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(0)->getStyle('F1:K3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $objset->setCellValue('F1','KETIDAKHADIRAN');
    $objset->setCellValue('F2','SAKIT (S)');
    $objset->setCellValue('G2','IZIN (I)');
    $objset->setCellValue('H2','ALFA (A)');
    $objset->setCellValue('F3',$hsetra['s']);
    $objset->setCellValue('G3',$hsetra['i']);
    $objset->setCellValue('H3',$hsetra['a']);
    $objset->setCellValue('I1','KEPRIBADIAN/KARAKTER');
    $objset->setCellValue('I2','KELAKUAN');
    $objset->setCellValue('J2','KERAJINAN');
    $objset->setCellValue('K2','KERAPIAN');
    $objset->setCellValue('I3',$hsetra['kelakuan']);
    $objset->setCellValue('J3',$hsetra['kerajinan']);
    $objset->setCellValue('K3',$hsetra['kerapian']);
    $objPHPExcel->getActiveSheet(0)->getStyle('F3:K3')->applyFromArray($header)->getFont()->setSize(10);
    $objPHPExcel->getActiveSheet(0)->mergeCells('F6:K6'); $objPHPExcel->getActiveSheet(0)->mergeCells('F7:K9');
    $objPHPExcel->getActiveSheet(0)->getStyle('F6:K6')->applyFromArray($headerwar)->getFont()->setSize(11);
    $objPHPExcel->getSheet(0)->getStyle('F6:K9')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $objset->setCellValue('F6','CATATAN UNTUK WALIMURID');
    $objset->setCellValue('F7',$hsetra['catatan']);
    $objPHPExcel->getActiveSheet(0)->getStyle('F7')->applyFromArray($header)->getFont()->setSize(10);
    

    $objset = $objPHPExcel->setActiveSheetIndex(0);
    $filename = 'Tambahan Rapot '.$hasiswa['nama'].' '.$ata['tahun'].'(Semester '.$ata['semester'].').xlsx';
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');//sesuaikan headernya 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//ubah nama file saat diunduh
    header('Content-Disposition: attachment;filename='.$filename);//unduh file
    $objWriter->save("php://output");
?>