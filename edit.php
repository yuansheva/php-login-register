<?php
session_start();
require_once 'authenticate.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}


$stmt = $con->prepare('SELECT password, Username, nama, email, photo  FROM accounts WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $Username, $nama, $email, $photo);
$stmt->fetch();
$stmt->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn a {
            text-decoration: none;
            color: white;
        }

        .container {
            border-style: solid;
            border-width: 1px;
            height: 510px;
            padding: 20px;
        }

        .red {
            color: red;
        }

        .tbl {
            padding-right: 20px;
            padding-left: 20px;
        }
    </style>
</head>

<body class="loggedin">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Metabook</a>
            <form class="d-flex">
                <button class="btn"><a href="home.php"><i class="fas fa-home"></i> Home</a></button>
                <button class="btn"><a href="profile.php"><i class="fas fa-user"></i> Profil</a></button>
                <button class="btn"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></button>
            </form>
        </div>
    </nav>
    <div class="content mt-5 mb-5">
        <div class="container rounded shadow">
            <h2>Edit Profile</h2>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="profile" class="form-label">Foto Profil</label>
                    <input class="form-control" name="profile" type="file" id="formFile">
                    <input name="profile" type="hidden" id="formFile" value="<?=$photo?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama<span class="red">*</span></label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $nama ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Username">Username<span class="red">*</span></label>
                    <div class="input-group mb-3 mt-2">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="<?= $Username ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email<span class="red">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $email ?>" required>
                </div>
                <div class="mt-4">
                    <a href="profile.php" class="btn btn-danger tbl">Batal</a>
                    <input type="submit" class="btn btn-success tbl" name="edit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php

if (isset($_FILES['profile'])) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["profile"]["name"]);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
}

if (isset($_POST['edit'])) {
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if($_FILES['profile']['name'] == null){
        $_FILES['profile']['name'] = $photo;
    }

    // Check if image file is a actual image or fake image
    move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);

    mysqli_query($con, "UPDATE accounts SET nama = '$nama', username = '$username', email = '$email', photo = '" . $_FILES['profile']['name'] . "' WHERE id = '$id'") or die(mysqli_error($con));
    $sql = "UPDATE accounts SET nama ='$nama', username = '$username', email = '$email' WHERE id=$id";

    header('Location: profile.php');
}
?>