<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/grupo-itens.css" />
    <link rel="stylesheet" href="../fontawesome-free-6.5.2-web/css/all.css" />
    <script src="https://kit.fontawesome.com/a9a68e41bd.js" crossorigin="anonymous"></script>
    <title>Roupas</title>
</head>
<body>
    <header>
        <div class="header">
            <div id="logo">
                <h2>unolingo</h2>
            </div>
            <div id="divBusca">
                <form action="texte.php" method="post">
                    <input type="text" id="txtBusca"  placeholder="Buscar..."/>
                    <button type="submit" style="display:none;"></button>
                    <i class="fa-solid fa-magnifying-glass search" style="color: #000000;"></i>
                </form>
            </div>
            <div class="icon-top">
                <div><i class="fa-solid fa-bell" style="color: #f6f6f6;"></i></div>
                <div><i class="fa-regular fa-circle-question" style="color: #f6f6f6;"></i></div>
                <div><i class="fa-regular fa-user" style="color: #f6f6f6"></i></div>
            </div>
        </div>
    </header>
    <main>
        <div class="main-container">
            <div class="sidebar">
                <div class="nav-sidebar">
                    <ul>
                        <li class="button"><i class="fa-solid fa-house" style="color: #f6f6f6"></i><a href="../principal.php">Painel Principal</a></li>
                        <li class="button"><i class="fa-regular fa-user" style="color: #f6f6f6"></i><a href="../contato.html">Contato</a></li>
                        <li class="button"><i class="fa-solid fa-basket-shopping" style="color: #f6f6f6"></i><a href="categoria.php">Grupo de Itens</a></li>
                        <li class="button"><i class="fa-solid fa-cart-shopping" style="color: #f6f6f6"></i><a href="ordens_vendas.html">Ordem de Vendas</a></li>
                        <li class="button"><div class="config"><i class="fa-solid fa-gear" style="color: #f6f6f6"></i><a href="gerenciamento.html">Configuração</a></div></li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <div class="content">
                    <div class="container-itens">
                        <div class="box-itens">
                            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estoque";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['produto'])) {
    $produto = $_POST['produto'];
    $stmt = $conn->prepare("SELECT * FROM produto WHERE nome LIKE ?");
    $likeProduto = '%' . $produto . '%';
    $stmt->bind_param("s", $likeProduto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='itens'>";
            // echo "<a href=''><img class='img-item' src='" . htmlspecialchars($row['imagem_url']) . "' alt='" . htmlspecialchars($row['nome_produto']) . "'></a>";
            echo "<ul class='list-itens'>";
            echo "<li>ID°" . htmlspecialchars($row['id_produo']) . "</li>";
            echo "<li>" . htmlspecialchars($row['nome']) . "</li>";
            echo "<li>Marca: " . htmlspecialchars($row['marca']) . "</li>";
            echo "<li>Quantidade: " . htmlspecialchars($row['quantidade']) . "</li>";
            echo "<li>Preço: R$" . htmlspecialchars(number_format($row['preco'], 2, ',', '.')) . "</li>";
            echo "</ul></div>";
        }
    } else {
        echo "<p>Nenhum produto encontrado.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div>
            <p>&copy; 2024 Unolingo. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
