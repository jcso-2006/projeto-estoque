<?php
// Credenciais do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estoque";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obter dados do formulário
$firstname = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$passtp = $_POST['con_pass'];




if($pass === $passtp){

    $pass = password_hash($pass,PASSWORD_DEFAULT);



// Preparar e vincular
$stmt = $conn->prepare("INSERT INTO usuarios (firstname,  email, pass) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $email, $pass);

// Executar a consulta
if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
    header("Location: account_created.html");
} else {
    echo "Error: " . $stmt->error;
    header("Location: index.html");//TELA DE ERRo
}
}else {
    //AS SENHAS NÃO CONHECIDEM
    //header("Location: index.html");//TELA DE ERRO DE SENHA OU JS COM SENHA EM VERMELHO

}

// if ($passt === $passtp) {
//     global $pass;
//     $pass = password_hash($passt, PASSWORD_DEFAULT);
// } else {
//     header("Location: index0.html");
// }

// Fechar conexão
$stmt->close();
$conn->close();
?>
