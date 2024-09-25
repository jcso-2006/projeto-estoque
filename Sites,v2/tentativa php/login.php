<?php
if($_SERVER["RESQUEST_METHOD"] == "POST"){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "teste";

    // Estabele a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_errno){
        die("Erro na conexão com o banco de dados:". $conn->connect_errno);
    }
    
    $user = $_POST["user"];
    $email = $_POST["email"];
    $pass = $_POST["password"];


    $sql = "SELECT pass FROM usuarios WHERE email = '$email' and nome = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtém o hash da senha do banco de dados
        $row = $result->fetch_assoc();
        $pass_hash = $row["pass"];

        // Verifica se a senha fornecida pelo usuário corresponde ao hash armazenado
        if (password_verify($pass, $pass_hash)) {
            // Senha correta, redireciona para a página de sucesso
            $sql = "SELECT id,firstname,lastname,email,birthdate,gender FROM usuarios WHERE email = '$email'";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();

            exit();
        } else {
            // Senha incorreta, redireciona para a página de erro
            header("Location: erro.html");
            exit();
        }
    } else {
        // Usuário não encontrado, redireciona para a página de erro
        header("Location: erro.html");
        exit();
    }

    // Fecha a conexão com o banco de dados
    $conn->close();





}
?>