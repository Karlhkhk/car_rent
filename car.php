<?php
session_start();
include("config.php");

$car_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$viga = "";
$teade = "";

$auto = null;
$auto_paring = "SELECT * FROM cars WHERE id = $car_id LIMIT 1";
$auto_valjund = mysqli_query($yhendus, $auto_paring);
if ($auto_valjund && mysqli_num_rows($auto_valjund) > 0) {
  $auto = mysqli_fetch_assoc($auto_valjund);
}

if (isset($_POST['reserveeri']) && $auto) {
  if (!isset($_SESSION['user_id'])) {
    $viga = "Broneerimiseks pead olema sisselogitud kasutajana.";
  } else {
    $algus = $_POST['start_date'];
    $lopp = $_POST['end_date'];

    if (empty($algus) || empty($lopp)) {
      $viga = "Palun sisesta algus ja lõpp kuupäev.";
    } else {
      $algus_aeg = date_create($algus);
      $lopp_aeg = date_create($lopp);

      if (!$algus_aeg || !$lopp_aeg) {
        $viga = "Kuupäev ei ole korrektne.";
      } elseif ($lopp_aeg < $algus_aeg) {
        $viga = "Lõppkuupäev ei saa olla enne alguskuupäeva.";
      } else {
        $paevad = $algus_aeg->diff($lopp_aeg)->days + 1;
        $koguhind = $paevad * (float)$auto['price'];
        $user_id = (int)$_SESSION['user_id'];

        $koguhind_sql = number_format($koguhind, 2, '.', '');
        $lisamine = "INSERT INTO reservations (user_id, car_id, start_date, end_date, total_price, status)
              VALUES ('$user_id', '$car_id', '$algus', '$lopp', '$koguhind_sql', 'pending')";

        if (mysqli_query($yhendus, $lisamine)) {
          $teade = "Broneering lisatud. Koguhind: " . $koguhind_sql . " € (" . $paevad . " päeva).";
        } else {
          $viga = "Broneeringu salvestamine ebaõnnestus.";
        }
      }
    }
  }
}
?>


<!doctype html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auto detail</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Autorent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Avaleht</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Autod</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Hinnad</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontakt</a></li>
      </ul>
      <form class="d-flex" action="index.php" method="GET">
        <input class="form-control form-control-sm me-2" type="search" placeholder="Otsi autot">
        <button class="btn btn-outline-secondary btn-sm" type="submit">Otsi</button>
      </form>
    </div>
  </div>
</nav>
<div class="container my-5">
  <?php if (!$auto): ?>
    <div class="alert alert-danger">Autot ei leitud.</div>
  <?php else: ?>
  <div class="card shadow-sm border-0">
    <div class="row g-0">
      <div class="col-md-6">
        <img src="https://loremflickr.com/900/600/<?php echo $auto['mark']; ?>" class="img-fluid h-100 object-fit-cover rounded-start" alt="Auto pilt">
      </div>

      <div class="col-md-6">
        <div class="card-body p-4 p-lg-5">
          <h3 class="card-title mb-1"><?php echo $auto['mark']; ?> <?php echo $auto['model']; ?></h3>
          <p class="text-muted mb-4"><?php echo $auto['year']; ?> · <?php echo $auto['status']; ?></p>

          <ul class="list-unstyled mb-3">
            <li><strong>Mootor:</strong> <?php echo $auto['engine']; ?></li>
            <li><strong>Kütus:</strong> <?php echo $auto['fuel']; ?></li>
            <li><strong>Käigukast:</strong> <?php echo $auto['transmission']; ?></li>
            <li><strong>Kohad:</strong> <?php echo $auto['seats']; ?></li>
          </ul>

          <p class="mb-4"><?php echo $auto['description']; ?></p>

          <h4 class="mb-4"><?php echo $auto['price']; ?> € / päev</h4>

          <?php if($viga): ?>
            <div class="alert alert-danger py-2"><?php echo $viga; ?></div>
          <?php endif; ?>

          <?php if($teade): ?>
            <div class="alert alert-success py-2"><?php echo $teade; ?></div>
          <?php endif; ?>

          <form method="POST" class="border rounded-2 p-3 bg-light">
            <div class="row g-2">
              <div class="col-12 col-md-6">
                <label class="form-label">Algus</label>
                <input type="date" name="start_date" class="form-control" required>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">Lõpp</label>
                <input type="date" name="end_date" class="form-control" required>
              </div>
            </div>
            <button type="submit" name="reserveeri" class="btn btn-dark w-100 mt-3">Arvuta koguhind ja broneeri</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>