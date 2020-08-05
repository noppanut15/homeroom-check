<?php
include '../include/config.php';
include '../include/func.php';
$perm = 99;
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title . ' | ' . $school; ?></title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>
    <?php include '../include/session.php'; ?>
    <nav class="navbar navbar-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                โรงเรียนเบญจมราชูทิศ
            </a>
            <small class="navbar-text"><i class="fas fa-user"></i> <?php echo $_SESSION['gender'] .
                '' .
                $_SESSION['name'] .
                '  ' .
                $_SESSION['lastname']; ?> (ผู้ดูแลระบบ)</small>
        </div>
    </nav>