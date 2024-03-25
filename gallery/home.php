<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        p {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: center;
            margin-top: 20px;
        }

        li {
            display: inline-block;
            margin: 0 15px;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #0056b3;
        }

        .icon {
            font-size: 24px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Halaman Home</h1>
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <ul class="mb-4">
            <li><a href="index.php">Home <i class="bi bi-house-door icon"></i></a></li>
            <li><a href="album.php">Album <i class="bi bi-images icon"></i></a></li>
            <li><a href="foto.php">Foto <i class="bi bi-camera icon"></i></a></li>
            <li><a href="logout.php" class="btn btn-danger">Logout <i class="bi bi-box-arrow-right icon"></i></a></li>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
