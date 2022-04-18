<?php
    session_start();
    if (isset($_SESSION['Logged'])){
        // Continua na página
    } else {
        echo "<script> window.location='../login/signin.php?erro=5'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Garbage | Minha Conta</title>

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="../../images/site/Logo_Icon.png"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b1aafff1b9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <!-- HEADER -->
        <header class="header">
            <div class="container p-4">
                <div class="row justify-content-between">
                    <div class="col-4 col-md-4 col-lg-4">
                        <img src="../../images/site/Logo.png" class="img-fluid" alt="No Garbage"/>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="myaccount">
            <div class="container p-4">
                <div class="breadcumbs">
                    <a href="myaccount.php"><i class="fas fa-home"></i> Home</a> / Minha Conta
                </div>
                <div class="title text-center display-5">
                    <p>Minha Conta</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>