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
    <title>Halaman Foto</title>
    
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

        input[type="text"], input[type="file"], input[type="submit"] {
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

        img {
            max-width: 200px;
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
        <h1 class="mt-5">Halaman Foto</h1>
        <p>Selamat datang, <b><?=$_SESSION['namalengkap']?></b></p>
        <ul class="mb-4">
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
        </ul>
        <form action="tambah_foto.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judulfoto"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsifoto"></td>
                </tr>
                <tr>
                    <td>Lokasi File</td>
                    <td><input type="file" name="lokasifile"></td>
                </tr>
                <tr>
                    <td>Album</td>
                    <td>
                        <select name="albumid" class="form-control">
                            <?php
                            include "koneksi.php";
                            $userid=$_SESSION['userid'];
                            $sql=mysqli_query($conn,"SELECT * FROM album where userid='$userid'");
                            while($data=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
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
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Unggah</th>
                <th>Lokasi File</th>
                <th>Album</th>
                <th>Disukai</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"SELECT * FROM foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while ($data=mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td><?=$data['tanggalunggah']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namaalbum']?></td>
                <td>
                    <?php
                    $fotoid=$data['fotoid'];
                    $sql2=mysqli_query($conn,"SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>            
                <td>
                    <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" class="btn btn-danger">Hapus</a>
                    <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>" class="btn btn-info">Edit</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <!-- Tambahkan referensi Bootstrap JavaScript di bawah ini -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
