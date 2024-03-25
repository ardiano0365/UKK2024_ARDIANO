<?php
session_start();
if(!isset($_SESSION['userid'])){
  header("location:login.php");
}
?>
<?php
include 'koneksi.php';

if (isset($_GET['fotoid'])) {
  $fotoid = ($_GET["fotoid"]);
  $query = "SELECT * FROM foto WHERE fotoid='$fotoid'";
  $result = mysqli_query($conn, $query);

  if(!$result){
    die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
  }

  $data = mysqli_fetch_assoc($result);

  if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='edit_foto.php';</script>";
  }
} else {
  echo "<script>alert('Masukkan data id.');window.location='edit_foto.php';</script>";
}         
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Edit Foto</title>
  <!-- Tambahkan referensi Bootstrap CSS di bawah ini -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Trebuchet MS', sans-serif;
      background-color: #f8f9fa;
    }

    h1 {
      text-transform: uppercase;
      color: #007bff;
      text-align: center;
      margin-top: 30px;
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

    button {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 14px;
      border: 0px;
      margin-top: 20px;
      cursor: pointer;
    }

    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }

    input {
      padding: 8px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #007bff;
      margin-bottom: 10px;
    }

    img {
      max-width: 120px;
      float: left;
      margin-bottom: 5px;
      margin-right: 10px;
    }

    .base {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background: #fff;
      margin-top: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <h1>Edit <?php echo $data['judulfoto']; ?></h1>
  <ul class="nav justify-content-center">
    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
    <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
  </ul>
  <form action="update_foto.php" method="POST" enctype="multipart/form-data">
    <div class="base">
      <input name="fotoid" value="<?php echo $data['fotoid']; ?>"  hidden />
      <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judulfoto" class="form-control" value="<?php echo $data['judulfoto']; ?>" autofocus="" required="" />
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsifoto" class="form-control" value="<?php echo $data['deskripsifoto']; ?>" autofocus="" required="" />
      </div>
      <div class="form-group">
        <label>Lokasi File</label>
        <img src="gambar/<?php echo $data['lokasifile']; ?>">
        <input type="file" name="lokasifile" class="form-control-file" />
        <small class="form-text text-danger">Abaikan jika tidak merubah gambar produk</small>
      </div>
      <div class="form-group">
        <label>Album</label>
        <select name="albumid" class="form-control">
          <?php
          $userid=$_SESSION['userid'];
          $sql2=mysqli_query($conn,"SELECT * FROM album WHERE userid='$userid'");
          while($data2=mysqli_fetch_array($sql2)){
            ?>
            <option value="<?=$data2['albumid']?>"<?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
            <?php
          }
          ?>  
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
  </form>
</body>
</html>
