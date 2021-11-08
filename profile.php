<?php
session_start();
require_once 'authenticate.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}


$stmt = $con->prepare('SELECT password, Username, nama, email, photo FROM accounts WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $Username, $nama, $email, $photo);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .btn a {
            text-decoration: none;
            color: white;
        }

        .profile img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            margin-bottom: 30px;
        }

        button {
            float: right;
            padding: 3px;
            background-color: #808080;
            padding: 0.3rem;
            border-radius: 4px;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #262626;
        }

        td {
            padding: 3px;
        }
    </style>
</head>

<body>
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
    <div class="card m-3">
        <div class="card-body">
            <div>
                <button><a href="edit.php"><i class="fas fa-cog"></i> Edit Profile</a></button>
                <p>Your account details are below :</p>

                <div class="profile text-center">
                    <?php
                    if ($photo == null) {
                        $photo = "guest.png";
                    }
                    ?>
                    <img src="<?= "img/" . $photo ?>">
                </div>

                <p><b>Personal Info</b></p><hr>
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?= $nama ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $Username ?></td>
                    </tr>
                </table>

                <p class="mt-5"><b>Data & Privacy</b></p><hr>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= $email ?></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><?= $password ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>