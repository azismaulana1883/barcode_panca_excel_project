<?php
session_start(); // Tambahkan baris ini untuk memulai session

// Pastikan connection.php sesuai dengan konfigurasi Anda
// include 'connection.php';

// Ambil data yang dikirimkan dari proses.php
$excelData = isset($_SESSION['excel_data']) ? $_SESSION['excel_data'] : array();

// Bersihkan session setelah mengambil data
unset($_SESSION['excel_data']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Label</title>
    <link href="http://localhost/barcode_panca_excel/assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/barcode_panca_excel/assets/js/JsBarcode.all.min.js"></script>
    <script src="http://localhost/barcode_panca_excel/assets/js/qrcode.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        @media print {
            body {
                padding: 0;
                margin: 0;
            }

            .boxed {
                page-break-before: always;
                height: 3in;
                width: 2in;
                /* Add these lines to ensure no extra space at the bottom of the page */
                margin-bottom: 0;
                padding-bottom: 0;
            }

            @page {
                size: 2in 3in;
                margin: 0;
                /* Resetting margin for @page */
            }

            .barcode {
                width: 100%;
                height: 100%;
                margin-bottom: 0;
                /* Ensure no extra space below barcode */
            }
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <?php
        // Melakukan perulangan melalui data yang diambil dan menghasilkan label
        foreach ($excelData as $row) {
            // Pemeriksaan untuk memastikan bahwa data yang diperlukan tidak kosong
            if (!empty($row['Model Description']) && !empty($row['Model Number']) && !empty($row['SAP#']) && !empty($row['UPC Code'])) {
        ?>
                <div class="row">
                    <div class="col-lg-6 boxed border">
                        <h1 class="product-name text-center "><b><?php echo $row['Model Description']; ?></b></h1>
                        <div class="model-lb">
                            <div class="product_brand" style="width: 130px;">
                                <h3 class="product-model">Model: <?php echo $row['Model Number']; ?></h3>
                                <h3 class="product-code"><?php echo $row['SAP#']; ?></h3>
                            </div>
                            <!-- Menambahkan atribut jsbarcode-value dengan kode UPC yang valid -->
                            <svg class="barcode" jsbarcode-format="upc" jsbarcode-value="<?php echo $row['UPC Code']; ?>"
                                jsbarcode-textmargin="0" jsbarcode-fontoptions="bold" jsbarcode-width="2" jsbarcode-height="50"
                                jsbarcode-font="Anomoly"
                                jsbarcode-fontSize="20">
                            </svg>
                        </div>
                        <div class="sku-item">
                            <p class="product-sku">SKU : <?php echo $row['SKU Number']; ?></p>
                            <p class="product-ukuran">Size : <?php echo $row['Size Description']; ?></p>
                            <p class="product-colour">Colour : <?php echo $row['Colour Description']; ?> (<?php echo $row['Colour Code']; ?>)</p>
                            <?php
                            // Periksa apakah msrp_cad memiliki nilai
                            if (!empty($row['MSRP CAD'])) {
                                echo '<p class="product-msrp">MSRP CAD : $' . $row['MSRP CAD'] . '</p>';
                            }

                            // Periksa apakah msrp_usd memiliki nilai
                            if (!empty($row['MSRP USD'])) {
                                echo '<p class="product-msrp">MSRP USD : $' . $row['MSRP USD'] . '</p>';
                            }
                            ?>
                            <span class="garis"></span>
                            <div class="qr-container">
                                <div class="information"><?php echo $row['QR Caption']; ?></div>
                                <!-- Menambahkan atribut data-value dengan data QR code yang valid -->
                                <div class="qr" data-value="<?php echo $row['QR Data']; ?>"></div>
                                <div class="pono">PO<?php echo $row['PO']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <script>
        // Melakukan perulangan melalui semua elemen barcode dan membuat barcode
        var barcodeElements = document.querySelectorAll(".barcode");
        barcodeElements.forEach(function (element) {
            var upcCode = element.getAttribute("jsbarcode-value");

            // Memeriksa apakah upcCode tidak null atau undefined
            if (upcCode) {
                JsBarcode(element, upcCode).init();
            } else {
                console.error("Kode UPC tidak valid:", upcCode);
            }
        });

        // Melakukan perulangan melalui semua elemen QR dan membuat QR code
        var qrElements = document.querySelectorAll(".qr");
        qrElements.forEach(function (element) {
            var qrData = element.getAttribute("data-value");

            // Memeriksa apakah qrData tidak null atau undefined
            if (qrData) {
                var qr = new QRCode(element, {
                    text: qrData,
                    width: 90,
                    height: 90,
                    bold: 100
                });
            } else {
                console.error("Data QR code tidak valid:", qrData);
            }
        });
    </script>
</body>

</html>
