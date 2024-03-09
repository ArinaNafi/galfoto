<?php
include 'koneksi.php';
session_start();

    $FotoID=$_GET['FotoID'];
    $UserID=$_SESSION['UserID'];
    // ceK apakah user sudah pernah like foto ini atau belum
    $sql=mysqli_query($koneksi,"delete from likefoto where FotoID='$FotoID' AND UserID='$UserID'");
        header("Location:index.php");
?>