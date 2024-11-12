<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estoque";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $email = trim($_POST["email"]); // Remove espaços extras
    $pass = trim($_POST["pass"]);

    // Usa prepared statements para maior segurança
    $stmt = $conn->prepare("SELECT id_estoquista, email, senha FROM estoquistas WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $pass_hash = $user["senha"];

        if (password_verify($pass, $pass_hash)) {
            session_start();
            $_SESSION['user_id'] = $user['id_estoquista'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: account_created.html");
            exit();
        } else {
            header("Location: erro1.html");
            exit();
        }
    } else {
        header("Location: erro2.html");
        exit();
    }

    $conn->close();
}
?>
