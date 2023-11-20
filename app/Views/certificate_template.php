<!-- File: app/Views/certificate_template.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        /* Gaya CSS untuk sertifikat */
        body {
            text-align: center;
        }
        img {
            max-width: 100%;
        }
        /* Tambahkan gaya lainnya sesuai kebutuhan */
    </style>
</head>
<body>
    <h1>Congratulations!</h1>
    <p>You have successfully completed the course.</p>
    <img src="<?= base_url('templates/t.png') ?>" alt="Certificate">
    <!-- Gantilah path dengan lokasi sertifikat Anda -->
</body>
</html>
