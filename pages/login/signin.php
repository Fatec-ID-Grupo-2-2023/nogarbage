<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Garbage | Sign In</title>

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

    <!-- Alert Icons -->
    <?php include_once '../components/alert-icons.php'; ?>

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
        <main class="sign-in-form">
            <div class="container p-4">
                <div class="breadcumbs">
                    <a href="../../index.php"><i class="fas fa-home"></i> Home</a> / Sign In
                </div>
                <div class="title text-center display-5">
                    <p>Sign In</p>
                </div>
                <form method="post" action="../components/sign_in_validation.php" class="mb-5 needs-validation" novalidate>
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-4 col-lg-4">
                            <?php
                                if (isset($_GET['cod']) == 'verde'){
                                    echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
                                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                                            <div>
                                                Usuário cadastrado. Faça login!
                                            </div>
                                        </div>";
                                }
                                $erro = isset($_GET['erro']) ?  $_GET['erro'] : null;

                                switch ($erro){
                                    case 3:
                                        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                                                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:''><use xlink:href='#exclamation-triangle-fill'/></svg>
                                                <div>
                                                    Senha incorreta.
                                                </div>
                                            </div>";
                                    break;

                                    case 4:
                                        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                                                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:''><use xlink:href='#exclamation-triangle-fill'/></svg>
                                                <div>
                                                    Usuário incorreto.
                                                </div>
                                            </div>";
                                    break;

                                    case 5:
                                        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                                                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:''><use xlink:href='#exclamation-triangle-fill'/></svg>
                                                <div>
                                                    Faça login primeiro!
                                                </div>
                                            </div>";
                                    break;
                                }     
                            ?>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">CNPJ</label>
                                <input type="text" name="cnpj" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="cnpjHelp" class="form-text">Insira somente números.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Senha</label>
                                <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-4 col-lg-4">
                            <a href="signup.php">Não possui cadastro? Faça já!</a>
                            <div class="buttons">
                                <button type="submit" name="signInBtn" class="btn btn-lg btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>    

    <!-- Form Validation JS -->
    <script src="../../assets/js/form_validation.js"></script>
</body>
</html>