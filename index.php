<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Unggah File Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="text-center">Unggah File Excel</h1>
                <form action="proses.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="excelFile" class="form-label">Pilih File Excel</label>
                        <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah dan Proses</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
