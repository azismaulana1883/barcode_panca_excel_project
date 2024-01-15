<?php
// Fungsi untuk membaca data dari file Excel
function readExcelData($file)
{
    require 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';

    try {
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();

        $data = [];

        // Mulai dari baris kedua karena baris pertama biasanya header
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':T' . $row, NULL, TRUE, FALSE)[0];

            // Memeriksa apakah baris tidak kosong sebelum menambahkannya ke dalam array
            if (!empty(array_filter($rowData))) {
                $data[] = $rowData;
            }
        }

        return $data;
    } catch (Exception $e) {
        return false;
    }
}

// Logika pemrosesan file Excel setelah formulir di-submit
if (isset($_POST['submit'])) {
    // Proses file Excel yang di-upload
    $uploadedFile = $_FILES['excelFile']['tmp_name'];

    // Lakukan pembacaan data dari file Excel dan langsung gunakan untuk label
    $excelData = readExcelData($uploadedFile);

    if ($excelData !== false) {
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Label</title>
            <!-- Tambahkan link CSS dan skrip JavaScript yang diperlukan -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
            <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
            <link rel="stylesheet" href="style.css">
            <style>
                body {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .boxed {
                    width: 2in;
                    margin-bottom: 20px; /* Jarak antara setiap label */
                }

                @media print {
                    body {
                        margin: 0;
                        padding: 0;
                    }

                    .boxed {
                        page-break-before: always;
                        height: 3in;
                        /* Add these lines to ensure no extra space at the bottom of the page */
                        margin-bottom: 0;
                        padding-bottom: 0;
                    }

                    @page {
                        size: 2in 3in;
                        margin: 0; /* Resetting margin for @page */
                    }

                    .barcode {
                        width: 100%;
                        height: 100%;
                        margin-bottom: 10px; /* Jarak antara barcode dan konten di bawahnya */
                    }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <!-- Formulir upload -->
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="excelFile">Upload Excel File:</label>
                    <input type="file" name="excelFile" id="excelFile" accept=".xls, .xlsx">
                    <button type="submit" name="submit">Upload</button>
                </form>

                <!-- Tampilkan label dengan menggunakan data dari Excel -->
                <?php
                foreach ($excelData as $row) {
                ?>
                    <div class="boxed">
                        <h1 class="product-name text-center "><b><?php echo $row[3]; ?></b></h1>
                        <div class="model-lb">
                            <h2 class="product-model">Model: <?php echo $row[2]; ?></h2>
                            <h3 class="product-code"><?php echo $row[5]; ?></h3>
                            <!-- Menambahkan atribut jsbarcode-value dengan kode UPC yang valid -->
                            <svg class="barcode" jsbarcode-format="upc" jsbarcode-value="<?php echo $row[9]; ?>"
                                jsbarcode-textmargin="0" jsbarcode-fontoptions="bold" jsbarcode-width="2" jsbarcode-height="50"
                                jsbarcode-fontSize="20">
                            </svg>
                        </div>
                        <div class="sku-item">
                            <p class="product-sku">SKU : <?php echo $row[11]; ?></p>
                            <p class="product-ukuran">Size : <?php echo $row[6]; ?></p>
                            <p class="product-colour">Colour : <?php echo $row[4]; ?> (<?php echo $row[5]; ?>)</p>
                            <p class="product-msrp">MSRP CAD : <?php echo $row[14]; ?></p>
                            <span class="garis"></span>
                            <div class="qr-container">
                                <div class="information"><?php echo $row[12]; ?></div>
                                <!-- Menambahkan atribut data-value dengan data QR code yang valid -->
                                <div class="qr" data-value="<?php echo $row[13]; ?>"></div>
                                <div class="pono"><?php echo $row[16]; ?></div>
                            </div>
                        </div>
                    </div>
                <?php
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
                            width: 80,
                            height: 80,
                        });
                    } else {
                        console.error("Data QR code tidak valid:", qrData);
                    }
                });
            </script>
        </body>
        </html>
    <?php
    } else {
        echo "Gagal membaca file Excel. Pastikan file valid.";
    }
}
?>
