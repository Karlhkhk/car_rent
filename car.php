<?php
include("config.php");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    $paring = 'SELECT * from cars where id=10' 
    $valjund = mysqli_query($yhendus, $paring);
    $rida = mysqli_fetch_row($valjund);
    var_dump($rida)
    ?>

    <!-- autode info -->

    <div class="row">
        <div class="col-sm6-"></div>
        <div class="col-sm6-"></div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>