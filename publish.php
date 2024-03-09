<?php

$FotoID = $_GET['FotoID'];
$publish = $_GET['publish'];

include 'koneksi.php';

if($publish == 1){
mysqli_query($koneksi,"UPDATE foto SET status='1' WHERE FotoID='$FotoID' ");
header("location:foto.php ");
}else{
mysqli_query($koneksi,"UPDATE foto SET status='2' WHERE FotoID='$FotoID' ");
header("location:foto.php ");
}

//echo"<script>window.location.href='foto.php'</script>";

?>