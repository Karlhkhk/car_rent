<?php
include("../config.php");

if (isset($_POST['lisa_auto'])) {
    $mark = $_POST['mark'];
    $model = $_POST['model'];
    $engine = $_POST['engine'];
    $fuel = $_POST['fuel'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $transmission = $_POST['transmission']; 
    $seats = $_POST['seats'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $image = "pilt.jpg"; 
    $paring = "INSERT INTO cars (mark, model, engine, fuel, price, image, year, transmission, seats, description, status) 
               VALUES ('$mark', '$model', '$engine', '$fuel', '$price', '$image', '$year', '$transmission', '$seats', '$description', '$status')";
    mysqli_query($yhendus, $paring);
    if 
    
    header("Location: index.php");
    exit(); 
}
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Lisa auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg bg-white border-bottom mb-4 py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="index.php">Autorent admin</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Lisa auto</h3>
            <a href="index.php" class="btn btn-outline-secondary btn-sm">Tagasi</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form method="POST" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mark</label>
                            <input type="text" name="mark" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mudel</label>
                            <input type="text" name="model" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mootor</label>
                            <input type="text" name="engine" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kütus</label>
                            <select name="fuel" class="form-select" required>
                                <option value="" disabled selected>Vali</option>
                                <option value="Bensiin">Bensiin</option>
                                <option value="Diisel">Diisel</option>
                                <option value="Elekter">Elekter</option>
                                <option value="Hübriid">Hübriid</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Aasta</label>
                            <input type="number" name="year" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Käigukast</label>
                            <select name="transmission" class="form-select" required>
                                <option value="" disabled selected>Vali</option>
                                <option value="Automaat">Automaat</option>
                                <option value="Manuaal">Manuaal</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Istmete arv</label>
                            <input type="number" name="seats" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Staatus</label>
                            <select name="status" class="form-select" required>
                                <option value="vaba">Vaba</option>
                                <option value="hoolduses">Hoolduses</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hind (€ / päev)</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Auto pilt</label>
                            <input type="file" name="pilt" class="form-control">
                            <small class="text-muted">Lubatud formaadid JPG, PNG, WEBP.</small>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Kirjeldus</label>
                            <textarea name="description" class="form-control" rows="2" required></textarea>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" name="lisa_auto" class="btn btn-dark">Salvesta</button>
                        <a href="index.php" class="btn btn-outline-secondary">Tühista</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>