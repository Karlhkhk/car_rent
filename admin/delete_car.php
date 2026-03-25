<?php
include("../config.php");

if(isset($_GET["id"])) {

    $kustuta_id = intval($_GET["id"]);

    $sql = "DELETE FROM cars WHERE id = $kustuta_id";
    mysqli_query($yhendus, $sql);
}

header("Location: index.php");
exit();
?>