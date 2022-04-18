<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Garbage | Pontos de Coleta</title>

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="../../images/site/Logo_Icon.png"/>

    <!-- Bootstrap v5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b1aafff1b9.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

    <?php
        if (isset($_GET['cod']) == 'verde'){
            echo "
                <script>
                    swal({
                        title: 'Sucesso!',
                        text: 'Cadastro de ponto realizado.',
                        icon: 'success',
                        button: 'Ok',
                    });
                </script>
                ";
        }
    ?>

    <!-- Alert Icons -->
    <?php include_once '../components/alert-icons.php'; ?>

    <div class="container-fluid">
        <!-- HEADER -->
        <header class="header mt-5">
            <div class="container p-4">
                <div class="row justify-content-between">
                    <div class="col-4 col-md-4 col-lg-4">
                        <a href="../../index.php"><img src="../../images/site/Logo.png" class="img-fluid" alt="No Garbage"/></a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="breadcumbs">
                        <a href="../../index.php"><i class="fas fa-home"></i> Home</a> / Points
                    </div>
                </div>
            </div>
        </header>

        <main class="points">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="row">
                            <form method="post" action=""> 
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="mb-3">
                                        <label for="uniaoFederal" class="form-label">União Federal (Estado) <span class="text-danger">*</span></label>
                                        <select id="states" onchange="populateCities(this.value)" name="uniaoFederal" class="form-select" required></select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="mb-3">
                                        <label for="cidade" class="form-label">Cidade <span class="text-danger">*</span></label>
                                        <select id="cities" name="cidade" class="form-select" required></select>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button type="submit" name="filterBtn" class="btn btn-sm btn-outline-primary">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6">
                        <?php include_once '../components/carousel.php'; ?>
                    </div>
                </div>
                <div class="row filter-results mt-5 mb-5">
                    <?php
                        if (isset($_POST['filterBtn'])){
                            $uf = isset($_POST['uniaoFederal']) ? $_POST['uniaoFederal'] : null;
                            $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
                    
                            include_once '../../config/connection.php';
                    
                            $sql = "SELECT * FROM parceiros WHERE uniao_federal=:u AND cidade=:c";
                            
                            $query = $conn->prepare($sql);
                    
                            $query->bindParam(":u", $uf);
                            $query->bindParam(":c", $cidade);
                            
                            $query->execute();
                    
                            $num = $query->rowCount();
                    
                            if ($num > 0){
                                while($row = $query->fetch(PDO::FETCH_OBJ)){
                                echo "
                                <div class='card'>
                                    <img src='" . $row->img_location . "' class='card-img-top' alt='" . $row->razao_social . "'>
                                    <div class='card-body'>
                                        <h5 class='card-title'> " . $row->nome_fantasia . "</h5>
                                        <p class='card-text'> " . $row->cidade . "/" . $row->uniao_federal ." </p>
                                        <p class='card-text'> " . $row->rua . ", " . $row->bairro . "</p>
                                        <p class='card-text'>N° " . $row->numero ."</p>
                                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#pointsDetails" . $row->id . "'>Mais Detalhes</button>
                                    </div>
                                </div>
                                <!-- Points Detais Modal -->
                                <div class='modal fade' id='pointsDetails" . $row->id . "' tabindex='-1' aria-labelledby='exampleModalFullscreenLabel' aria-hidden='true' style='display: none;'>
                                    <div class='modal-dialog modal-fullscreen-sm-down modal-fullscreen-md-down modal-fullscreen-lg-down'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title h4' id='exampleModalFullscreenLabel'>". $row->nome_fantasia . "</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <img src='" . $row->img_location . "' class='img-fluid mb-2' alt='" . $row->razao_social . "'>
                                                <dl>
                                                    <dt> Endereço </dt>
                                                    <dd> " .$row->cidade . "/" . $row->uniao_federal . " </dd>
                                                    <dd> " . $row->rua . ", " . $row->bairro . " </dd>
                                                    <dd> N° " . $row->numero ." </dd>
                                                    <!--<dt> Resíduos Coletados </dt>-->
                                                    <dt class='text-center'> Cupom de Desconto </dt>
                                                    <dd class='text-center'> " . $row->cupom . " </dd>
                                                </dl>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }    
                            } else {
                                echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                    <strong>Erro!</strong> Não há pontos de coleta no local selecionado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                                ";
                            }
                        } else {
                            $sql = "SELECT * FROM parceiros";
                            
                            $query = $conn->prepare($sql);
                            
                            $query->execute();
                    
                            $num = $query->rowCount();
                    
                            if ($num > 0){
                                while($row = $query->fetch(PDO::FETCH_OBJ)){
                                echo "
                                <div class='card'>
                                    <img src='" . $row->img_location . "' class='card-img-top' alt='" . $row->razao_social . "'>
                                    <div class='card-body'>
                                        <h5 class='card-title'> " . $row->nome_fantasia . "</h5>
                                        <p class='card-text'> " . $row->cidade . "/" . $row->uniao_federal ." </p>
                                        <p class='card-text'> " . $row->rua . ", " . $row->bairro . "</p>
                                        <p class='card-text'>N° " . $row->numero ."</p>
                                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#pointsDetails" . $row->id . "'>Mais detalhes</button>
                                    </div>
                                </div>
                                <!-- Points Detais Modal -->
                                <div class='modal fade' id='pointsDetails" . $row->id . "' tabindex='-1' aria-labelledby='exampleModalFullscreenLabel' aria-hidden='true' style='display: none;'>
                                    <div class='modal-dialog modal-fullscreen-sm-down modal-fullscreen-md-down modal-fullscreen-lg-down'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title h4' id='exampleModalFullscreenLabel'>". $row->nome_fantasia . "</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <img src='" . $row->img_location . "' class='img-fluid mb-2' alt='" . $row->razao_social . "'>
                                                <dl>
                                                    <dt> Endereço </dt>
                                                    <dd> " .$row->cidade . "/" . $row->uniao_federal . " </dd>
                                                    <dd> " . $row->rua . ", " . $row->bairro . " </dd>
                                                    <dd> N° " . $row->numero ." </dd>
                                                    <!--<dt> Resíduos Coletados </dt>-->
                                                    <dt class='text-center'> Cupom de Desconto </dt>
                                                    <dd class='text-center'> " . $row->cupom . " </dd>
                                                </dl>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </main>
    </div>

    <?php include_once '../components/footer.php' ?>

    <!-- States & Cities JS -->
    <script src="../../assets/js/populateDataList.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>