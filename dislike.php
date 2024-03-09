<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['UserID'])){
    //Untuk bisa like harus login dulu
    header("Location:index.php");
}else{
    $FotoID=$_GET['FotoID'];
    $UserID=$_SESSION['UserID'];
    // ceK apakah user sudah pernah dislike foto ini atau belum
    $sql=mysqli_query($koneksi,"select * from dislike where FotoID='$FotoID' AND UserID='$UserID'");

    if(mysqli_num_rows($sql)==1){
        //user Sudah Pernah Dislike foto ini
        header("Location:index.php");
    }else{
        $TanggalDislike=date("Y-m-d");
        mysqli_query($koneksi,"insert into dislike values ('','$FotoID','$UserID','$TanggalDislike')");
        header("Location:index.php");
    }
}
?>