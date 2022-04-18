<?php
    // Sign Up
    if (isset($_POST['signUpBtn'])) {

        // Atribuição de valores às variáveis
        $arquivo = isset($_FILES['pointLogo']) ? $_FILES['pointLogo'] : null;
        $razaoSocial = isset($_POST['razaoSocial']) ? $_POST['razaoSocial'] : null;
        $nome = isset($_POST['nomeFantasia']) ? $_POST['nomeFantasia'] : null;
        $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
        $ie = isset($_POST['ie']) ? $_POST['ie'] : null;
        $uf = isset($_POST['uniaoFederal']) ? $_POST['uniaoFederal'] : null;
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
        $rua = isset($_POST['rua']) ? $_POST['rua'] : null;
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
        $numero = isset($_POST['numero']) ? $_POST['numero'] : null;
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
        $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
        $responsavel = isset($_POST['nomeResponsavel']) ? $_POST['nomeResponsavel'] : null;
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
        $confirma_senha = isset($_POST['confirmaSenha']) ? $_POST['confirmaSenha'] : null;

        include_once '../../config/connection.php';

        $sql_verification = "SELECT cnpj FROM parceiros WHERE cnpj=:c";
        
        $query_verification = $conn->prepare($sql_verification);
        
        $query_verification->bindParam(":c", $cnpj);
        
        $query_verification->execute();

        $num = $query_verification->rowCount();
        
        if ($num > 0){
            echo "<script> window.location='../login/signup.php?erro=1'; </script>";
        } else {
            /*if ($senha == $confirma_senha){*/
                // Upload da Imagem
                $dir = "../../images/points";
                $tam_max = 1024 * 1024 * 1024;

                $old_name = $arquivo['name'];

                $ext = pathinfo($arquivo['name']);
                $ext = ".".$ext['extension'];

                $new_name = $cnpj.$ext;

                $caminho = $dir . "/" . $new_name;

                if ($arquivo['size'] < $tam_max){
                    if (move_uploaded_file($arquivo['tmp_name'], $caminho)){
                        $senha = md5($senha);
                        $sql = "INSERT INTO parceiros (razao_social,nome_fantasia,cnpj,inscricao_estadual,uniao_federal,cidade,
                        rua,bairro,numero,complemento,cep,email,telefone,responsavel,senha,img_location) VALUES (:razao,:nome,:cnpj,:ie,:uf,:c,:r,:b,:n,
                        :comp,:cep,:e,:tel,:res,:s,:i)";
                        $query = $conn->prepare($sql);
                        $query->bindParam(":razao", $razaoSocial);
                        $query->bindParam(":nome", $nome);
                        $query->bindParam(":cnpj", $cnpj);
                        $query->bindParam(":ie", $ie);
                        $query->bindParam(":uf", $uf);
                        $query->bindParam(":c", $cidade);
                        $query->bindParam(":r", $rua);
                        $query->bindParam(":b", $bairro);
                        $query->bindParam(":n", $numero);
                        $query->bindParam(":comp", $complemento);
                        $query->bindParam(":cep", $cep);
                        $query->bindParam(":e", $email);
                        $query->bindParam(":tel", $telefone);
                        $query->bindParam(":res", $responsavel);
                        $query->bindParam(":s", $senha);
                        $query->bindParam(":i", $caminho);

                        if ($query->execute()){
                            echo "<script> window.location='../points/points.php?cod=verde'; </script>";
                        } else {
                            echo "<script> window.location='../login/signup.php?erro=2'; </script>";
                        }
                    }
                } else {
                    echo "<script> window.location='../login/signup.php?erro=6'; </script>";
                /*}*/
            }
        }
    }
?>