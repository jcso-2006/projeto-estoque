<?php
// Verifica se os campos foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Credenciais de conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estoque";

    // Estabelece a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se houve erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os dados enviados via POST
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    // Prepara a consulta SQL para obter as credenciais do usuário
    $sql = "SELECT senha FROM estoquistas WHERE email = '$email'";
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Obtém o hash da senha do banco de dados
        $row = $result->fetch_assoc();
        $pass_hash = $row["senha"];

        // Verifica se a senha fornecida pelo usuário corresponde ao hash armazenado
        if (password_verify($pass, $pass_hash)) {
            // Senha correta, redireciona para a página de sucesso
            $sql = "SELECT id_estoquista,email FROM estoquistas WHERE email = '$email'";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();

            session_start();
            $_SESSION['user_id'] = $user['id_estoquista'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_cpf'] = $user['cpf'];
            $_SESSION['user_genero'] = $user['genero'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_idade'] = $user['idade'];
            header("Location: ../principal.php");
            exit();
        } else {
            // Senha incorreta, redireciona para a página de erro
            header("Location: erro1.html");
            exit();
        }
    } else {
        // Usuário não encontrado, redireciona para a página de erro
        header("Location: erro2.html");
        exit();
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    
}
?>
