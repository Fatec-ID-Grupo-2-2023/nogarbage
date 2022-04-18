<?php
    // Sign Up
    if (isset($_POST['signInBtn'])) {

        session_start();
        
        // Atribuição de valores às variáveis
        $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

        include_once '../../config/connection.php';

        $sql = "SELECT cnpj,senha FROM parceiros WHERE cnpj=:c";
        
        $query = $conn->prepare($sql);
        
        $query->bindParam(":c", $cnpj);
        
        $query->execute();

        $num = $query->rowCount();
        
        if ($num > 0){
            $lin = $query->fetch();
            $senha = md5($senha);
            if ($senha == $lin['senha']){
                $_SESSION['Logged'] = $cnpj;
                echo "<script> window.location='../partners/myaccount.php'; </script>";
            } else {
                echo "<script> window.location='../login/signin.php?erro=3'; </script>";
            }
        } else {
            echo "<script> window.location='../login/signin.php?erro=4'; </script>";
        }
    }
?>