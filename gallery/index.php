<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #007bff;
            text-align: center;
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

        p {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border: 1px solid #dee2e6;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Halaman Landing</h1>
        <?php
        session_start();
        if(!isset($_SESSION['userid'])){
        ?>
        <ul class="mb-4">
            <li><a href="register.php" class="btn btn-primary">Register</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
        <?php
        } else {
        ?>
        <p>Selamat datang, <b><?=$_SESSION['namalengkap']?></b></p>
        <ul class="mb-4">
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php" class="btn btn-danger">Logout</a></li> 
        </ul>
        <?php
        }
        ?>
        <table class="mb-4">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Uploader</th>
                <th>Jumlah Like</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $sql= mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while ($data=mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td><img src="gambar/<?=$data['lokasifile']?>" alt="Foto" width="150px"></td>
                <td><?=$data['namalengkap']?></td>
                <td>
                    <?php
                    $fotoid=$data['fotoid'];
                    $sql2=mysqli_query($conn,"SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="like.php?fotoid=<?=$data['fotoid']?>" class="btn btn-primary">Like</a>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>" class="btn btn-info">Komentar</a>
                </td>
            </tr>
            <?php   
            }
            ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
