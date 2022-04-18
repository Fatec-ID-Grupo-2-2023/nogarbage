<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Garbage | Home</title>

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="../../images/site/Logo_Icon.png"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b1aafff1b9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <!-- HEADER -->
        <header class="header mt-5">
            <div class="container p-4">
                <div class="row justify-content-between">
                    <div class="col-4 col-md-4 col-lg-4">
                        <a href="../../index.php"><img src="../../images/site/Logo.png" class="img-fluid" alt="No Garbage"/></a>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="signatures">
            <div class="container p-4">
                <div class="breadcumbs">
                    <a href="../../index.php"><i class="fas fa-home"></i> Home</a> / Assinaturas de Plano
                </div>
                <div class="title text-center display-5">
                    <p>Escolha um de nossos planos</p>
                </div>
                <div class="row justify-content-center mt-5">
                    <!-- BRONZE -->
                    <div class="card text-center" id="bronze" style="width: 18rem;" data-aos="fade-left" data-aos-duration="3000">
                        <div class="card-body">
                            <h5 class="card-title">BRONZE</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <legend>7 dias</legend>
                                R$ 20,00
                            </li>
                            <li class="list-group-item">
                                <legend>14 dias</legend>
                                R$ 40,00
                            </li>
                            <li class="list-group-item">
                                <legend>21 dias</legend>
                                R$ 60,00
                            </li>
                            <li class="list-group-item">
                                <legend>28 dias</legend>
                                R$ 80,00
                            </li>
                        </ul>
                        <div class="card-body">
                            <i class="fas fa-check"></i> Adição de um cupom de desconto
                            <br>
                            <i class="fas fa-check"></i> Terceiro grupo de destaque
                        </div>
                    </div>
                    <!-- GOLD -->
                    <div class="card text-center" id="gold" style="width: 18rem;" data-aos="fade-down" data-aos-duration="1000">
                        <div class="card-header bg-success border-success text-white">MAIS VANTAJOSO</div>
                        <div class="card-body">
                            <h5 class="card-title">OURO</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <legend>7 dias</legend>
                                R$ 30,00
                            </li>
                            <li class="list-group-item">
                                <legend>14 dias</legend>
                                R$ 60,00
                            </li>
                            <li class="list-group-item">
                                <legend>21 dias</legend>
                                R$ 90,00
                            </li>
                            <li class="list-group-item">
                                <legend>28 dias</legend>
                                R$ 120,00
                            </li>
                        </ul>
                        <div class="card-body">
                            <i class="fas fa-check"></i> Adição de um cupom de desconto
                            <br>
                            <i class="fas fa-check"></i> Primeiro grupo de destaque
                        </div>
                    </div>
                    <!-- SILVER -->
                    <div class="card text-center" id="silver" style="width: 18rem;" data-aos="fade-right" data-aos-duration="3000">
                        <div class="card-body">
                            <h5 class="card-title">PRATA</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <legend>7 dias</legend>
                                R$ 25,00
                            </li>
                            <li class="list-group-item">
                                <legend>14 dias</legend>
                                R$ 50,00
                            </li>
                            <li class="list-group-item">
                                <legend>21 dias</legend>
                                R$ 75,00
                            </li>
                            <li class="list-group-item">
                                <legend>28 dias</legend>
                                R$ 100,00
                            </li>
                        </ul>
                        <div class="card-body">
                            <i class="fas fa-check"></i> Adição de um cupom de desconto
                            <br>
                            <i class="fas fa-check"></i> Segundo grupo de destaque
                        </div>
                    </div>
                </div>
                <blockquote class="blockquote text-center mt-5">
                    <p>Nos contate através de uma das plataformas abaixo para adquirir um plano.</p>
                    <div class="row contact-us">
                        <div class="col-6 col-md-6 col-lg-6">
                            <a href="http://api.whatsapp.com/send?1=pt_BR&phone=5511941170146" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <a href="mailto:caiquepatelliescapeline@gmail.com" target="_blank"><i class="far fa-envelope"></i></a>
                        </div>
                    </div>
                </blockquote>
            </div>
        </main>
    </div> 

    <?php include_once '../components/footer.php' ?>

    <!-- AOS Animate -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script> AOS.init(); </script>
</body>
</html>