<?php
include("config.php");
session_start();

// if (isset($_SESSION['is_admin'])) {
//     header("Location: index.php");
//     exit();
// }
if(isset($_POST['email']) && isset($_POST['parool'])){
    $email = $_POST['email'];
    $parool = $_POST['parool'];
    if ($email == 'admin' && $parool == 'admin')  {
       
       
    } else {
        echo "ei";
    }

    // echo "tootab";
}
// if (isset($_POST['login'])) {
//     $sisestatud_kasutaja = $_POST['kasutaja'];
//     $sisestatud_parool = $_POST['parool'];

//     $oige_kasutaja = "admin";
//     $oige_hash = password_hash("parool123", PASSWORD_DEFAULT);

//     if ($sisestatud_kasutaja === $oige_kasutaja && password_verify($sisestatud_parool, $oige_hash)) {
//         $_SESSION['is_admin'] = true;
//         header("Location: index.php");
//         exit();
//     } else {
//         $viga = "Vale kasutaja või parool!";
//     }
// }
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin sisselogimine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../index.php">Autorent</a>
            <a href="../index.php" class="btn btn-outline-secondary btn-sm">Tagasi</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <h3 class="mb-4 fw">Admin sisselogimine</h3>

                <?php if(isset($viga)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $viga; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="border bg-white p-4 rounded-2">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Sisesta email" required value="admin@test.ee">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Parool</label>
                        <input type="password" name="parool" class="form-control" placeholder="Sisesta parool" required>
                    </div>

                    <button type="submit" name="login" class="btn btn-dark w-100">Logi sisse</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>