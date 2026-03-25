<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: login.php");
    exit();
}

include("../config.php");

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mark = $_POST["mark"];
    $model = $_POST["model"];
    $price = $_POST["price"];

    $sql = "UPDATE cars SET mark=?, model=?, price=? WHERE id=?";
    $stmt = mysqli_prepare($yhendus, $sql);
    mysqli_stmt_bind_param($stmt, "ssdi", $mark, $model, $price, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM cars WHERE id=?";
$stmt = mysqli_prepare($yhendus, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$car = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Muuda autot</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h3>Muuda autot</h3>

<form method="post">

<div class="mb-3">
<label>Mark</label>
<input type="text" name="mark" class="form-control" value="<?php echo $car["mark"]; ?>">
</div>

<div class="mb-3">
<label>Mudel</label>
<input type="text" name="model" class="form-control" value="<?php echo $car["model"]; ?>">
</div>

<div class="mb-3">
<label>Hind</label>
<input type="number" name="price" class="form-control" value="<?php echo $car["price"]; ?>">
</div>

<div class="mb-3">
<label>Mootor</label>
<input type="text" name="mark" class="form-control" value="<?php echo $car["engine"]; ?>">
</div>

<div class="mb-3">
<label>Aasta</label>
<input type="text" name="mark" class="form-control" value="<?php echo $car["year"]; ?>">
</div>

<div class="mb-3">
<label>Käigukast</label>
<input type="text" name="mark" class="form-control" value="<?php echo $car["transmission"]; ?>">
</div>

<button class="btn btn-dark">Salvesta</button>

</form>

</div>

</body>
</html>
