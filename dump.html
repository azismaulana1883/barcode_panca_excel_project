<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Label</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
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
        margin: 0; /* Resetting margin for @page */
    }

    .barcode {
        width: 100%;
        height: 100%;
        margin-bottom: 0; /* Ensure no extra space below barcode */
    }
}

    </style>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <?php
        // Melakukan perulangan melalui data yang diambil dan menghasilkan label
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="row">
                <div class="col-lg-6 boxed">
                    <h1 class="product-name text-center "><b><?php echo $row['model_description']; ?></b></h1>
                    <div class="model-lb">
                        <h2 class="product-model">Model: <?php echo $row['model_number']; ?></h2>
                        <h3 class="product-code"><?php echo $row['sap_code']; ?></h3>
                        <!-- Menambahkan atribut jsbarcode-value dengan kode UPC yang valid -->
                        <svg class="barcode" jsbarcode-format="upc" jsbarcode-value="<?php echo $row['upc_code']; ?>"
                            jsbarcode-textmargin="0" jsbarcode-fontoptions="bold" jsbarcode-width="2" jsbarcode-height="50"
                            jsbarcode-fontSize="20">
                        </svg>
                    </div>
                    <div class="sku-item">
                        <p class="product-sku">SKU : <?php echo $row['sku_number']; ?></p>
                        <p class="product-ukuran">Size : <?php echo $row['size_description']; ?></p>
                        <p class="product-colour">Colour : <?php echo $row['colour_description']; ?> (<?php echo $row['colour_code']; ?>)</p>
                        <p class="product-msrp">MSRP CAD : <?php echo $row['msrp_cad']; ?></p>
                        <span class="garis"></span>
                        <div class="qr-container">
                            <div class="information"><?php echo $row['qr_caption']; ?></div>
                            <!-- Menambahkan atribut data-value dengan data QR code yang valid -->
                            <div class="qr" data-value="<?php echo $row['qr_data']; ?>"></div>
                            <div class="pono"><?php echo $row['pono']; ?></div>
                        </div>
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