<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'pweb_tgs8';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {

    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

function login($data)
{
    global $con;

    if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {

        $stmt->bind_param('s', $data['username']);
        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();

            if (password_verify($data['password'], $password)) {

                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $data['username'];
                $_SESSION['id'] = $id;

                header('Location: home.php');
            } else {

                echo    "<script>
                         alert('Incorrect username and/or password!');
                        </script>";
            }
        } else {

            echo "<script>
            alert('Incorrect username and/or password!');
           </script>";
        }

        $stmt->close();
    }
}
function registrasi($data)
{
    global $con;

    $nama = stripslashes($data["nama"]);
    $username =  strtolower(stripslashes($data["username"]));
    $email = strtolower($data['email']);
    $password = mysqli_real_escape_string($con, $data['password']);
    $password2 = mysqli_real_escape_string($con, $data['password2']);

    //cek username 
    $result = mysqli_query($con, "SELECT username FROM accounts WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username Telah Di Gunakan');
            </script>";
        return false;
    }

    //cek password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi Password Tidak Sesuai');
            </script>";
        return false;
    }

    //Enkripsi password hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    //koneksi ke database
    mysqli_query($con, "INSERT INTO accounts VALUES('', '$nama', '$username', '$email', '$password', 'guest.png')");

    return mysqli_affected_rows($con);
}
