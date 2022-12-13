<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>

<?php

// require_once '../../../inc/koneksi.php';
// require_once '../../../inc/includepenting.php';
require_once __DIR__ . '/../../../inc/env.php';
require_once __DIR__ . '/../../../inc/koneksi.php';
require_once __DIR__ . '/../../../vendor/autoload.php';


$id_user = $_GET["id_user"];//mengambil data ygdikirim
$query = mysqli_query($con,"Select * from user where id_user = '$id_user'");

while ($row = mysqli_fetch_array($query)) {
    $id_user = $row["id_user"];
    $username = $row["username"];
    $password = $row["password"];
    $email = $row["email"];
    $role = $row["role"];
    $is_active = $row["is_active"];
}
?>

<body>
    <div class="container">
        <form class="mt-5" method="POST" action="update-data.php" >
            <div class="form-group">
                <label for="id_user">Id User</label>
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Kode Barang" value="<?= $id_user?>">
            </div>
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $username?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="password"value="<?= $password?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email"value="<?= $email?>">
            </div>
            <div class="form-group">
                <label for="role">role</label>
                <input type="text" class="form-control" id="role" name="role" placeholder="role"value="<?= $role?>">
            </div>
            <div class="form-group">
                <label for="is_active">Is Active</label>
                <input type="text" class="form-control" id="is_active" name="is_active" placeholder="is active"value="<?= $is_active?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
    </div> 

</body>
</html>