<?php
include("../config.php");

// Kustutamise loogika
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($yhendus, "DELETE FROM cars WHERE id=$id");
    header("Location: index.php");
}

$paring = "SELECT * FROM cars";
$valjund = mysqli_query($yhendus, $paring);
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorent admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Autorent admin</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="index.php">Autod</a>
                <a class="nav-link" href="#">Reserveeringud</a>
                <a class="nav-link" href="#">Kasutajad</a>
            </div>
            <a href="../index.php" class="btn btn-outline-secondary btn-sm">Logi välja</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Autod</h2>
            <a href="add_car.php" class="btn btn-dark">Lisa auto</a>
        </div>

        <table class="table table-hover align-middle border">
            <thead class="table-light">
                <tr>
                    <th>Pilt</th>
                    <th>Auto</th>
                    <th>Mootor</th>
                    <th>Kütus</th>
                    <th>Hind</th>
                    <th>Kirjeldus</th>
                    <th class="text-end">Tegevused</th>
                </tr>
            </thead>
            <tbody>
                <?php while($rida = mysqli_fetch_assoc($valjund)) { ?>
                <tr>
                    <td><img src="https://loremflickr.com/100/60/car" class="rounded" alt="auto"></td>
                    <td><strong><?php echo $rida['mark']; ?></strong><br><small class="text-muted"><?php echo $rida['mudel']; ?></small></td>
                    <td><?php echo $rida['mootor']; ?></td>
                    <td><?php echo $rida['kytus']; ?></td>
                    <td><?php echo $rida['hind']; ?> € / päev</td>
                    <td><small><?php echo mb_strimwidth($rida['kirjeldus'], 0, 50, "..."); ?></small></td>
                    <td class="text-end">
                        <a href="edit_car.php?id=<?php echo $rida['id']; ?>" class="btn btn-outline-primary btn-sm">Muuda</a>
                        <a href="index.php?del=<?php echo $rida['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Kas oled kindel?')">Kustuta</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>