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
	<title>Halaman Edit Album</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			font-family: 'Roboto', sans-serif;
			background-color: #f8f9fa;
		}

		h1 {
			text-transform: uppercase;
			color: #007bff;
			text-align: center;
			margin-top: 30px;
		}

		.container {
			max-width: 600px;
			margin: 0 auto;
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

		form {
			margin-top: 20px;
		}

		table {
			width: 100%;
		}

		table, th, td {
			border: 1px solid #dee2e6;
			border-collapse: collapse;
			padding: 8px;
		}

		input[type="text"] {
			width: 100%;
			padding: 8px;
			box-sizing: border-box;
			background: #f8f8f8;
			border: 2px solid #ccc;
			outline-color: #007bff;
			margin-bottom: 10px;
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			padding: 10px;
			text-decoration: none;
			font-size: 14px;
			border: 0px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Halaman Edit Album</h1>
		<p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
		<ul class="nav justify-content-center">
			<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
			<li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
			<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
		</ul>
		<form action="update_album.php" method="post">
			<?php
			include "koneksi.php";
			$albumid=$_GET['albumid'];
			$sql=mysqli_query($conn,"SELECT * FROM album WHERE albumid='$albumid'");
			while($data=mysqli_fetch_array($sql)){
			?>
			<table class="table">
				<tr>
					<td>Nama Album</td>
					<td><input type="text" name="namaalbum" class="form-control" value="<?=$data['namaalbum']?>"></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td><input type="text" name="deskripsi" class="form-control" value="<?=$data['deskripsi']?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-primary" value="Ubah"></td>
				</tr>
			</table>
			<?php
			}
			?>
		</form>
	</div>
</body>
</html>
