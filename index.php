<?php
include("config.php");
?>


<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- css -->
    <style>
        .hero-box {
            background-color: #f8f9fa; 
            border-radius: 15px;      
            padding: 50px;            
            border: 1px solid #dee2e6; 
        }
        .hero-img {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 70%;
            height: auto;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Autorent</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Avaleht</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Autod</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hinnad</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kontakt</a></li>
                </ul>

                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Otsi autot">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- Hero -->
    <div class="container my-5">
        <div class="hero-box">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h1 class="display-5 fw-bold mb-3">Rendi auto soodsalt</h1>
                    <p class="lead text-muted">Lai valik usaldusväärseid autosid igaks olukorraks.</p>
                    <button class="btn btn-dark btn-lg mt-3 px-4" type="button">Vaata autosid</button>
                </div>
                <div class="col-md-7">
                     <img src="https://picsum.photos/id/200/1000/500" class="hero-img" alt="Auto pilt">
                </div>
            </div>
            
        </div>
    </div>
<?php
//päring 
$paring = 'SELECT * FROM cars LIMIT 10'; 
$valjund = mysqli_query($yhendus, $paring);
// while($rida = mysqli_fetch_row($valjund)){ 
// }
?>
    <!-- Kaardid -->
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            while ($rida = mysqli_fetch_row($valjund))
            ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm rounded-3">
                    <img src="https://picsum.photos/id/1071/400/250" class="card-img-top rounded-top-3" alt="Auto pilt">
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><h5 class="card-title"><?php echo $rida[1]; ?></h5></div>
                            <div class="col text-end"><i class="bi bi-heart text-muted"></i></div>
                        </div>
                        <p class="col"><h5 class="card-title text-muted fs-6"><?php echo $rida[2]; ?></h5></p>

                        <div class="small">
                            <p class="mb-1 text-secondary"><?php echo $rida[3]; ?></p>
                            <p class="mb-1 text-secondary"><?php echo $rida[4]; ?></p>
                            <p class="fw-bold mt-2 mb-0"><?php echo $rida[5]; ?></p>
                        </div>

                        <a href="#" class="btn btn-dark w-100 mt-3 py-2">Rendi</a>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<div class="container d-flex justify-content-center my-5">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link text-dark bg-light" href="#">Eelmine</a></li>
                <li class="page-item active"><a class="page-link bg-dark border-dark text-white" href="#">1</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">Järgmine</a></li>
            </ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>