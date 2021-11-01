<?php
session_start();
require_once 'authenticate.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$stmt = $con->prepare('SELECT nama FROM accounts WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($nama);
$stmt->fetch();
$stmt->close();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home Page</title>

    <style>
        .btn a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Kelompok 6</a>
            <form class="d-flex">
                <button class="btn"><a href="profile.php"><i class="fas fa-home"></i>Profil</a></button>
                <button class="btn"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></button>
            </form>
        </div>
    </nav>
    <div class="card m-3">
        <div class="card-body">
            Welcome <?= $nama ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>