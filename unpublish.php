<?php

$FotoID = $_GET['FotoID'];

include 'koneksi.php';

mysqli_query($koneksi,"UPDATE foto SET status='0' WHERE FotoID='$FotoID'");

echo"<script>window.location.href='foto.php'</script>";

?>