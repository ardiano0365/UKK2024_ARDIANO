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
    <title>Halaman Album</title>
    
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

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
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

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        input[type="text"], input[type="submit"] {
            padding: 12px;
            margin: 8px 0;
            width: calc(100% - 16px);
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: #007bff;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Halaman Album</h1>
        <p>Selamat datang, <b><?=$_SESSION['namalengkap']?></b></p>
        <ul class="mb-4">
            <li><a href="home.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
        </ul>
        <form action="tambah_album.php" method="post">
            <table>
                <tr>
                    <td>Nama Album</td>
                    <td><input type="text" name="namaalbum"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
        <table class="mb-4">
            <tr>
                <th>ID</th>
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn,"SELECT * FROM album WHERE userid='$userid'");
            while ($data=mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?=$data['albumid']?></td>
                <td><?=$data['namaalbum']?></td>
                <td><?=$data['deskripsi']?></td>
                <td><?=$data['tanggaldibuat']?></td>
                <td>
                    <a href="hapus_album.php?albumid=<?=$data['albumid']?>" class="btn btn-danger">Hapus</a>
                    <a href="edit_album.php?albumid=<?=$data['albumid']?>" class="btn btn-info">Edit</a>
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
