<?php
session_start();
if (!isset($_SESSION['UserID'])){
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index22.php">Halaman Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php">Foto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</head>
<body>
    <h4>halaman Foto</h4>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>

<hr>
<a href="tambah_foto.php" class="btn btn-info">Tambah</a>
    <table class="table table-striped table-bordered mt-3 ml-2">
        <tr class="fw-bold">
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi Foto</th>
            <th>Tanggal Unggah</th>
            <th>Foto</th>
            <th>ST</th>
            <th>Album</th>
            <th>Jumlah Like</th>
            <th>Jumlah Dislike</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $UserID=$_SESSION['UserID'];
        $sql=mysqli_query($koneksi,"select * from foto,album where foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
            <td><?=$data['FotoID']?></td>
                <td><?=$data['JudulFoto']?></td>
                <td><?=$data['DeskripsiFoto']?></td>
                <td><?=$data['TanggalUnggah']?></td>
                <td>
                    <img src="gambar/<?=$data['LokasiFile']?>" width="150px">
                </td>
                <td>
                  
                  <?php
                  $FotoID=$data['FotoID'];
                  $UserID = $_SESSION['UserID'];
                  $ss = mysqli_query($koneksi,"SELECT * FROM foto WHERE FotoID=$FotoID AND UserID=$UserID");
                  $dd = mysqli_fetch_array($ss);{
                    if($dd['status']== 0) { ?>
                    <span class=""><i><i class="bi bi-eye-slash"></i> Foto Ini bersifat private</i></span>
                    <?php } else if ($dd['status']== 1){ ?>
                      <span class=""><i><i class="bi bi-eye"></i> Foto Ini bersifat dipublish untuk umum</i></span>
                      <?php  } else
                      { ?>
                      <span class=""><i><i class="bi bi-eye"></i> Foto Ini bersifat dipublish untuk anggota</i></span>
                      <?php } }
                  ?>
                </td>

                <td><?=$data['NamaAlbum']?></td>
                <td>
                  <?php
                  $FotoID=$data['FotoID'];
                  $sql2=mysqli_query($koneksi,"SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                  echo mysqli_num_rows($sql2);
                  ?>
                </td>
                <td>
                  <?php
                  $FotoID=$data['FotoID'];
                  $sql2=mysqli_query($koneksi,"SELECT * FROM dislike WHERE FotoID='$FotoID'");
                  echo mysqli_num_rows($sql2);
                  ?>
                </td>
                <td><?=$data['status']?></td>
                <td>
                    <a href="edit_foto.php?FotoID=<?=$data['FotoID'] ?>" class='btn btn-primary'>Edit</a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data')" 
                    href="hapus_foto.php?FotoID=<?=$data['FotoID'] ?>" class='btn btn-danger'>Hapus</a>

                <?php
                include 'koneksi.php';
                $status = mysqli_query($koneksi,"SELECT * FROM foto WHERE FotoID='$FotoID'");
                $unpublish = mysqli_fetch_array($status);{
                if ($unpublish['status'] == 1) {
                  echo '<a href="unpublish.php?FotoID='.$data['FotoID'].'" class="btn btn-warning">unpublish</a>
                  <a href="publish.php?FotoID='.$data['FotoID'].'&publish=2" class="btn btn-info">publish untuk anggota</a>';
                }else if ($unpublish['status'] == 0){
                  echo '<a href="publish.php?FotoID='.$data['FotoID'].'&publish=1" class="btn btn-warning">publish umum</a>
                  <a href="publish.php?FotoID='.$data['FotoID'].'&publish=2" class="btn btn-info">publish untuk anggota</a>';
                }else{
                  echo '<a href="publish.php?FotoID='.$data['FotoID'].'&publish=1" class="btn btn-warning">Publish Umum</a>
                  <a href="unpublish.php?FotoID='.$data['FotoID'].'" class="btn btn-warning">unpublish</a>';
                }
              }
                ?>
                    

            </tr>
      <?php  } ?>
    </table>
</body>
</html>