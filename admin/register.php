<?php
session_start();

if (isset($_SESSION['is_admin'])) {
    header("Location: index.php");
    exit();
}

include("../config.php");
$vead = [];
$teade = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = trim($_POST["first_name"] ?? "");
    $last_name = trim($_POST["last_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $password = $_POST["password"] ?? "";
    $password_confirm = $_POST["password_confirm"] ?? "";

    if ($first_name === "" || $last_name === "" || $email === "" || $password === "") {
        $vead[] = "Palun täida kohustuslikud väljad.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $vead[] = "Email ei ole korrektne.";
    }

    if ($password !== $password_confirm) {
        $vead[] = "Paroolid ei kattu.";
    }

    if (!$vead) {
        $paring = mysqli_prepare($yhendus, "SELECT id FROM users WHERE email = ? LIMIT 1");
        if ($paring) {
            mysqli_stmt_bind_param($paring, "s", $email);
            mysqli_stmt_execute($paring);
            mysqli_stmt_store_result($paring);
            if (mysqli_stmt_num_rows($paring) > 0) {
                $vead[] = "Selle emailiga kasutaja on juba olemas.";
            }
            mysqli_stmt_close($paring);
        }
    }

    if (!$vead) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $paring = mysqli_prepare(
            $yhendus,
            "INSERT INTO users (role, first_name, last_name, email, phone, password_hash) VALUES ('user', ?, ?, ?, ?, ?)"
        );
        if ($paring) {
            mysqli_stmt_bind_param($paring, "sssss", $first_name, $last_name, $email, $phone, $hash);
            if (mysqli_stmt_execute($paring)) {
                $user_id = mysqli_insert_id($yhendus);
                $_SESSION["user_id"] = (int)$user_id;
                $_SESSION["user_email"] = $email;
                $teade = "Kasutaja loodud. Nüüd saad broneerida.";
            } else {
                $vead[] = "Registreerimine ebaõnnestus.";
            }
            mysqli_stmt_close($paring);
        } else {
            $vead[] = "Registreerimine ebaõnnestus.";
        }
    }
}
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registreerimine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Autorent</a>
            <a href="index.php" class="btn btn-outline-secondary btn-sm">Tagasi</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                <h3 class="mb-4">Registreeru</h3>

                <?php if ($vead): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo implode("<br>", $vead); ?>
                    </div>
                <?php endif; ?>

                <?php if ($teade): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $teade; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="border bg-white p-4 rounded-2">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Eesnimi</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Perenimi</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Telefon</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Parool</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Parool uuesti</label>
                        <input type="password" name="password_confirm" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mt-4">Registreeru</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
