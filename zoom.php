<?php
    $ID = $_GET['ID'];
?>
<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<?php
    include "koneksi.php";
    $sql=mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID=$ID ");
    while($data=mysqli_fetch_array($sql)){ 
    ?>
<div class="container mt-4">
    <div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-7">
        <a href="gambar/<?=$data['LokasiFile']?>" download>
        <img src="gambar/<?=$data['LokasiFile']?>" alt="..." width= 700px;>
        </a>
        </div>
        <div class="col-md-5">
        <div class="card-body">
            <h5 class="card-title"><?=$data['JudulFoto']?></h5>
            <p class="card-text"><?=$data['DeskripsiFoto']?></p>
            <p class="card-text"><small class="text-body-secondary"><?=$data['TanggalUnggah']?></small></p>
        </div>
            <form action="proses_komentar.php" method="post">
                <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Komentar" aria-describedby="button-addon2" name="IsiKomentar" required>
                    <input type="hidden" class="form-control" name="FotoID" value="<?= $ID ?>">
                    <input type="hidden" class="form-control" name="UserID" value="<?= $_SESSION['UserID'] ?>">
                    <button class="btn btn-outline-secondary" type="submit">kirim</button>
                </div>
                </div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                            <a href="like.php?FotoID=<?= $data['FotoID']?>"><h5 class="bi bi-heart-fill btn btn-danger"></h5></a>

                            </div>
                            <div class="col">
                            <a href="unlike.php?FotoID=<?= $data['FotoID']?>"><h5 class="bi bi-heartbreak btn btn-warning"></h5></a>
                            </div>
                            <div class="col">
                            <a href="dislike.php?FotoID=<?= $data['FotoID']?>"><h5 class="bi bi-hand-thumbs-down-fill btn btn-secondary"></h5></a>
                            </div>
                            <div class="col">
                            <a href="index.php"><h5 class="bi bi-arrow-left-circle btn btn-primary"></h5></a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group">
                    <?php
                        include "koneksi.php";
                        $ID=$_GET['ID'];
                        $sql=mysqli_query($koneksi,"SELECT * from komentarfoto where FotoID=$ID");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                    <li class="list-group-item"><?=$data['IsiKomentar']?></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<?php
    }
?>
</body>

<?php
?>