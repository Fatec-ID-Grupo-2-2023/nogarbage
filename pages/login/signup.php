<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Garbage | Cadastre seu Ponto</title>

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
                        <a href="../../index.php"><img src="../../images/site/Logo.png" class="img-fluid" alt="No Garbage"/></a>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="sign-up-form">
            <div class="container p-4">
                <div class="breadcumbs">
                    <a href="../../index.php"><i class="fas fa-home"></i> Home</a> / Cadastro de Ponto
                </div>
                <div class="title text-center display-5">
                    <p>Cadastre seu Ponto</p>
                </div>
                <?php
                    $erro = isset($_GET['erro']) ?  $_GET['erro'] : null;

                    switch ($erro){
                        case 1:
                            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:''><use xlink:href='#exclamation-triangle-fill'/></svg>
                                    <div>
                                        CNPJ já cadastrado. Tente novamente!
                                    </div>
                                </div>";
                        break;

                        case 2:
                            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:''><use xlink:href='#exclamation-triangle-fill'/></svg>
                                    <div>
                                        Oops! Algo deu errado!
                                    </div>
                                </div>";
                        break;

                        case 6:
                            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:''><use xlink:href='#exclamation-triangle-fill'/></svg>
                                    <div>
                                        A imagem escolhida é maior que 64MB, por favor escolha outra ou reduza
                                        o tamanho!
                                    </div>
                                </div>";
                        break;
                    }
                ?>
                <form method="post" action="../components/sign_up_validation.php" class="mb-5 needs-validation" enctype="multipart/form-data" novalidate>
                    <!-- Image -->
                    <div class="mb-3">
                        <label for="img" class="form-label"> Imagem do Ponto <span class="text-danger">*</span></label>
                        <input type="file" name="pointLogo" id="img" class="form-control" required>
                        <div id="imgHelp" class="form-text">Insira somente <strong>um</strong> arquivo de no <strong>máximo</strong> 64MB.</div>
                    </div>
                    <!-- Razão Social -->
                    <div class="mb-3">
                        <label for="razaoSocial" class="form-label">Razão Social <span class="text-danger">*</span></label>
                        <input type="text" name="razaoSocial" class="form-control" placeholder="Digite a razão social do estabelecimento" required>
                    </div>
                    <!-- Nome Fantasia -->
                    <div class="mb-3">
                        <label for="nomeFantasia" class="form-label">Nome fantasia <span class="text-danger">*</span></label>
                        <input type="text" name="nomeFantasia" class="form-control" placeholder="Digite o nome fantasia do estabelecimento" required>
                    </div>
                    <!-- CNPJ & Inscrição Estadual -->
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="cnpj" class="form-label">CNPJ <span class="text-danger">*</span></label>
                                <input type="text" name="cnpj" class="form-control" placeholder="Digite o CNPJ do estabelecimento" required>
                                <div id="cnpjHelp" class="form-text">Insira somente números.</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="inscricaoEstadual" class="form-label">Inscrição Estadual <span class="text-danger">*</span></label>
                                <input type="text" name="ie" class="form-control" placeholder="Digite a inscrição estadual do estabelecimento" required>
                                <div id="ieHelp" class="form-text">Insira somente números. Caso seja isento, digite "Isento"</div>
                            </div>
                        </div>
                    </div>
                    <!-- União Federal & Cidade -->
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="uniaoFederal" class="form-label">União Federal (Estado) <span class="text-danger">*</span></label>
                                <select id="states" onchange="populateCities(this.value)" name="uniaoFederal" class="form-select" required></select>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="cidade" class="form-label">Cidade <span class="text-danger">*</span></label>
                                <select id="cities" name="cidade" class="form-select" required></select>
                            </div>
                        </div>
                    </div>
                    <!-- Rua & Bairro -->
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="rua" class="form-label">Rua <span class="text-danger">*</span></label>
                                <input type="text" name="rua" class="form-control" placeholder="Digite a rua do estabelecimento" required>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="bairro" class="form-label">Bairro <span class="text-danger">*</span></label>
                                <input type="text" name="bairro" class="form-control" placeholder="Digite o bairro do estabelecimento" required>
                            </div>
                        </div>
                    </div>
                    <!-- Número & Complemento & CEP -->
                    <div class="row">
                        <div class="col-4 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Número <span class="text-danger">*</span></label>
                                <input type="number" name="numero" class="form-control" placeholder="Digite o número do estabelecimento" required>
                            </div>
                        </div>
                        <div class="col-4 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input type="text" name="complemento" class="form-control" placeholder="Digite o complemento do estabelecimento">
                            </div>
                        </div>
                        <div class="col-4 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP <span class="text-danger">*</span></label>
                                <input type="text" name="cep" class="form-control" placeholder="Digite o CEP do estabelecimento" required>
                                <div id="cepHelp" class="form-text">Insira somente números.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Nome do Responsável & Telefone -->
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="nomeResponsavel" class="form-label">Nome do Responsável</label>
                                <input type="text" name="nomeResponsavel" class="form-control" placeholder="Digite o nome do responsável">
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="telfone" class="form-label">Telefone <span class="text-danger">*</span></label>
                                <input type="tel" name="telefone" class="form-control" placeholder="Digite seu telefone" required>
                            </div>
                        </div>
                    </div>
                   <!-- E-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Digite o e-mail do responsável">
                    </div>
                    <!-- Password -->
                    <!--
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha <span class="text-danger">*</span></label>
                                <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirme sua senha <span class="text-danger">*</span></label>
                                <input type="password" name="confirmaSenha" class="form-control" placeholder="Confirme sua senha" required>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="buttons">
                        <button type="reset" class="btn btn-lg btn-outline-danger">Limpar</button>
                        <button type="submit" name="signUpBtn" class="btn btn-lg btn-outline-success">Submit</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <?php include_once '../components/footer.php' ?>

    <!-- Form Validation JS -->
    <script src="../../assets/js/form_validation.js"></script>

    <!-- States & Cities JS -->
    <script src="../../assets/js/populateDataList.js"></script>
</body>
</html>