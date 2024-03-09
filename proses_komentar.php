<?php
    include "koneksi.php";
    session_start();
    $FotoID=$_POST['FotoID'];
    $UserID=$_SESSION['UserID'];
    $IsiKomentar=$_POST['IsiKomentar'];
    $TanggalKomentar = date('Y-m-d');

    $sql=mysqli_query($koneksi,"insert into komentarfoto values('','$FotoID','$UserID ','$IsiKomentar','$TanggalKomentar')");

    header("location:zoom.php?ID=$FotoID");
?>




