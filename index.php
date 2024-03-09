<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Halaman Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="album.php">Album</a>
                    <a class="nav-link" href="foto.php">Foto</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

</head>

<body>
<div class="container mx-auto mt-4">
        <div class="row">
            <?php
            include 'koneksi.php';
            $sql = mysqli_query($koneksi,"SELECT * FROM foto,user WHERE foto.UserID=user.UserID AND status='1' ");
            while($data=mysqli_fetch_array($sql)){
                ?>

        <div class="col-md-3">
            <div class="" style="width: 18rem; ">
            <a href="zoom.php?ID=<?= $data['FotoID'] ?>"><img src="gambar/<?=$data['LokasiFile']?>" class="card-img-top mt-2" width="100px" alt="..."></a>

            <div class="card-body">
                <h5 class="card-title"><?=$data['JudulFoto']?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?=$data['NamaLengkap']?></h6>
            </div>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </div>
</body>
</html>
