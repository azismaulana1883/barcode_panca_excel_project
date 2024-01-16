<?php
// Aktifkan session
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["excelFile"]) && $_FILES["excelFile"]["error"] == 0) {
        $allowed_extensions = array("xls", "xlsx");
        $file_extension = pathinfo($_FILES["excelFile"]["name"], PATHINFO_EXTENSION);

        if (in_array($file_extension, $allowed_extensions)) {
            $file_path = $_FILES["excelFile"]["tmp_name"];

            require 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
            require 'PHPExcel-1.8/Classes/PHPExcel.php';

            $objPHPExcel = PHPExcel_IOFactory::load($file_path);
            $worksheet = $objPHPExcel->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();

            $excelData = array();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = array(
                    'Delivery Address' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
                    'SAP#' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
                    'Model Number' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
                    'Model Description' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
                    'Colour Description' => $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
                    'Colour Code' => $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
                    'Size Description' => $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
                    'Country of Origin' => $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
                    'VL Code' => $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
                    'UPC Code' => $worksheet->getCellByColumnAndRow(9, $row)->getValue(),
                    'EAN' => $worksheet->getCellByColumnAndRow(10, $row)->getValue(),
                    'SKU Number' => $worksheet->getCellByColumnAndRow(11, $row)->getValue(),
                    'QR Caption' => $worksheet->getCellByColumnAndRow(12, $row)->getValue(),
                    'QR Data' => $worksheet->getCellByColumnAndRow(13, $row)->getValue(),
                    'MSRP CAD' => $worksheet->getCellByColumnAndRow(14, $row)->getValue(),
                    'MSRP USD' => $worksheet->getCellByColumnAndRow(15, $row)->getValue(),
                    'PO' => $worksheet->getCellByColumnAndRow(16, $row)->getValue(),
                    'QTY PO' => $worksheet->getCellByColumnAndRow(17, $row)->getValue(),
                    'QTY ORDER' => $worksheet->getCellByColumnAndRow(18, $row)->getValue(),
                    'KP' => $worksheet->getCellByColumnAndRow(19, $row)->getValue(),
                    'ALLOWANCE' => $worksheet->getCellByColumnAndRow(20, $row)->getValue(),
                );

                $excelData[] = $rowData;
            }

            // // Debugging info
            // echo "Excel Data:\n";
            // print_r($excelData);

            // Simpan data ke dalam session
            $_SESSION['excel_data'] = $excelData;

            // Pindahkan ke generate.php
            header("Location: generate.php");
            exit();
        } else {
            echo "Ekstensi file tidak valid. Silakan unggah file Excel.";
        }
    } else {
        echo "Terjadi kesalahan dalam proses unggah file. Kode error: " . $_FILES["excelFile"]["error"];
    }
} else {
    echo "Akses langsung tidak diizinkan.";
}
?>
