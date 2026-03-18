<?php
session_start();

if (isset($_SESSION['is_admin'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $sisestatud_kasutaja = $_POST['kasutaja'];
    $sisestatud_parool = $_POST['parool'];

    $oige_kasutaja = "admin";
    $oige_hash = password_hash("parool123", PASSWORD_DEFAULT);

    if ($sisestatud_kasutaja === $oige_kasutaja && password_verify($sisestatud_parool, $oige_hash)) {
        $_SESSION['is_admin'] = true;
        header("Location: index.php");
        exit();
    } else {
        $viga = "Vale kasutaja või parool!";
    }
}
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin sisselogimine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-lg-4">
                
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4 p-md-5">
                        
                        <h3 class="text-center mb-4 fw-bold">Autorent admin</h3>
                        
                        <?php if(isset($viga)): ?>
                            <div class="alert alert-danger py-2" role="alert">
                                <?php echo $viga; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kasutaja</label>
                                <input type="text" name="kasutaja" class="form-control" placeholder="Sisesta kasutajanimi" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Parool</label>
                                <input type="password" name="parool" class="form-control" placeholder="Sisesta parool" required>
                            </div>
                            
                            <button type="submit" name="login" class="btn btn-dark w-100 py-2">Logi sisse</button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="../index.php" class="text-decoration-none text-muted small">&larr; Tagasi avalehele</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>