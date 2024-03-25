<?php
include 'koneksi.php';
session_start();

  $fotoid = $_POST['fotoid'];
  $judulfoto  = $_POST['judulfoto'];
  $deskripsifoto = $_POST['deskripsifoto'];
  $albumid = $_POST['albumid'];
  $lokasifile = $_FILES['lokasifile']['name'];
  
  if($lokasifile != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg','gif');  
    $x = explode('.', $lokasifile); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['lokasifile']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$lokasifile; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
                      
                   $query  = "UPDATE foto SET judulfoto = '$judulfoto', deskripsifoto = '$deskripsifoto', lokasifile = '$nama_gambar_baru', albumid = '$albumid'";
                    $query .= "WHERE fotoid = '$fotoid'";
                    $result = mysqli_query($conn, $query);
                    
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
                    } else {
                      
                      echo "<script>alert('Data berhasil diubah.');window.location='foto.php';</script>";
                    }
              } else {     
              
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='foto.php';</script>";
              }
    } else {
      
      $query  = "UPDATE foto set judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',albumid='$albumid'";
      $query .= "WHERE fotoid = '$fotoid'";
      $result = mysqli_query($conn, $query);
      
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
        
          echo "<script>alert('Data berhasil diubah.');window.location='foto.php';</script>";
      }
    }

 

