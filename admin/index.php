<?php
include("../config.php");

if (isset($_GET['kustuta'])) {
    $id = $_GET['kustuta'];
    $kustuta_paring = "DELETE FROM cars WHERE id = $id";
    mysqli_query($yhendus, $kustuta_paring);
    header("Location: index.php");
}

$paring = "SELECT * FROM cars ";
$valjund = mysqli_query($yhendus, $paring);
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Autorent admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
<nav class="navbar navbar-expand-lg bg-white border-bottom mb-4 py-3">
        <div class="container">
            <div class="d-flex align-items-center">
                <a class="navbar-brand fw-bold text-dark me-4" href="index.php">Autorent admin</a>
                
                <div class="navbar-nav flex-row gap-3">
                    <a class="nav-link text-dark fw-bold px-0" href="index.php">Autod</a>
                    <a class="nav-link text-muted px-0" href="#">Reserveeringud</a>
                    <a class="nav-link text-muted px-0" href="#">Kasutajad</a>
                </div>
            </div>
        </div>
    </nav>
   
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <a href="add_car.php" class="btn btn-dark">Lisa auto</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pilt</th>
                    <th>Auto</th>
                    <th>Mootor</th>
                    <th>Kütus</th>
                    <th>Aasta</th>
                    <th>Istmed</th>
                    <th>Staatus</th>
                    <th>Hind</th>
                    <th>Kirjeldus</th>
                    <th>Tegevused</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($rida = mysqli_fetch_row($valjund)){ 
                ?>
                <tr>
                    <td><img src="https://loremflickr.com/100/60/<?php echo $rida[1]; ?>" width="100" alt="pilt"></td>
                    <td><b><?php echo $rida[1]; ?></b>
                    <br><?php echo $rida[2]; ?></td>
                    <td><?php echo $rida[3]; ?></td>
                    <td><?php echo $rida[4]; ?></td>
                    <td><?php echo $rida[7]; ?></td>
                    <td><?php echo $rida[9]; ?></td>
                    <td><?php echo $rida[11]; ?></td>
                    <td><?php echo $rida[5]; ?>€ / päev</td>
                    <td><?php echo $rida[10]; ?></td>
                    
                    <td>
                        <a href="index.php?kustuta=<?php echo $rida[0]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Kas oled kindel, et soovid selle auto kustutada?');">Kustuta</a>
                        <a href="muuda.php?id=<?php echo $rida[0]; ?>" class="btn btn-primary btn-sm">Muuda</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>