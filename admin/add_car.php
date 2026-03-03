<?php
include("../config.php");

if (isset($_POST['lisa'])) {
    $mark = $_POST['mark'];
    $mudel = $_POST['mudel'];
    $mootor = $_POST['mootor'];
    $kytus = $_POST['kytus'];
    $hind = $_POST['hind'];
    $kirjeldus = $_POST['kirjeldus'];

    $sql = "INSERT INTO cars (mark, mudel, mootor, kytus, hind, kirjeldus) 
            VALUES ('$mark', '$mudel', '$mootor', '$kytus', '$hind', '$kirjeldus')";
    
    if (mysqli_query($yhendus, $sql)) {
        header("Location: index.php");
    }
}
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lisa auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Lisa uus auto</h4>
                        <a href="index.php" class="btn btn-outline-secondary btn-sm">Tagasi</a>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mark</label>
                                    <input type="text" name="mark" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mudel</label>
                                    <input type="text" name="mudel" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mootor</label>
                                    <input type="text" name="mootor" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kütus</label>
                                    <select name="kytus" class="form-select">
                                        <option value="Bensiin">Bensiin</option>
                                        <option value="Diisel">Diisel</option>
                                        <option value="Elekter">Elekter</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hind (€/päev)</label>
                                    <input type="number" name="hind" class="form-control" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Kirjeldus</label>
                                    <textarea name="kirjeldus" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="lisa" class="btn btn-dark w-100">Salvesta auto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>