<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estoque";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}



$stmt = $conn->prepare("
    SELECT p.nome AS produto_nome, pd.id_produto, pd.local_entrega
    FROM produto p
    INNER JOIN pedidos pd ON p.id_produto = pd.id_produto");
$stmt->execute();
$result = $stmt->get_result();

  // if ($result->num_rows > 0) {
  //     while ($row = $result->fetch_assoc()) {
  //         echo "<div class='itens'>";
  //         echo "<ul class='list-itens'>";
  //         // Usando 'p' para a tabela 'produto' e 'pd' para a tabela 'pedido'
  //         echo "<li>ID Produto: " . htmlspecialchars($row['id_produto']) . "</li>";
  //         echo "<li>Nome: " . htmlspecialchars($row['nome']) . "</li>";
  //         echo "<li>Endereço: " . htmlspecialchars($row['endereco']) . "</li>";
  //         echo "</ul></div>";
  //     }
  // } else {
  //     echo "<p>Nenhum produto encontrado.</p>";
  // }

  

    $stmt->close();


$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ordem-vendas.css" />
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/" />
    <script
      src="https://kit.fontawesome.com/a9a68e41bd.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <div class="header">
        <a href="index.html">
          <div id="logo">
           <h2>unolingo</h2>
          </div>
          </a>
        <div id="divBusca">
          <form action="categorias-pages/texte.php" method="post">
            <input type="text" id="txtBusca" placeholder="Buscar..." name="produto" />
            <i
              class="fa-solid fa-magnifying-glass search"
              style="color: #000000"
            ></i>
            </form>
        </div>
        <div class="icon-top">
          <a href="">
            <div class="boxin">
              <i class="fa-solid fa-bell icon"></i>
            </div>
          </a>
          <a href="ajuda.html">
            <div class="boxin">
              <i class="fa-regular fa-circle-question icon"></i>
            </div>
          </a>
          <a href="user.html">
            <div class="boxin">
              <i class="fa-regular fa-user icon"></i>
            </div>
          </a>
        </div>
      </div>
    </header>
    <main>
      <div class="main-container">
        <!-- Inicio SideBar -->
        <div class="sidebar">
          <div class="nav-sidebar">
            <ul class="nav">
              <li class="button">
                <a href="index.html">
                  <i class="fa-solid fa-house" style="color: #f6f6f6"></i>
                  Painel Principal
                </a>
              </li>
              <li class="button">
                <a href="contato.html">
                  <i class="fa-regular fa-user" style="color: #f6f6f6"></i>
                  Contato
                </a>
              </li>
              <li class="button">
                <a href="categorias.html">
                  <i
                    class="fa-solid fa-basket-shopping"
                    style="color: #f6f6f6"
                  ></i>
                  Grupo de Itens
                </a>
              </li>
              <li class="button">
                <a href="ordens_vendas.html">
                  <i
                    class="fa-solid fa-cart-shopping"
                    style="color: #f6f6f6"
                  ></i>
                  Ordem de Vendas
                </a>
              </li>
              <li class="button">
                <a href="gerenciamento.html">
                  <i class="fa-solid fa-gear" style="color: #f6f6f6"></i>
                  Configuração
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Final Sidebar -->
        <!-- Inicio Conteudo -->
        <div class="main-content">
          <div class="parte-branca">
            <div class="nomes">
              <div><b>ID produtos</b></div>
              <div><b>Itens</b></div>
              <div><b>Endereço</b></div>
            </div>
            <div class="box-inside"><?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<div class='retangulo'>"; // Início do container principal

                // Div 1: Exibe o nome do produto
                echo "<div class='ret_1'>";
                echo "<p>" . htmlspecialchars($row['id_produto']) . "</p>"; // Usando a chave correta 'produto_nome'
                echo "</div>";
        
                // Div 2: Exibe o endereço de entrega
                echo "<div class='ret_2'>";
                echo "<p> " . htmlspecialchars($row['produto_nome']) . "</p>"; // Chave 'local_entrega' já está correta
                echo "</div>";
        
                // Div 3: Exibe o ID do produto
                echo "<div class='ret_3'>";
                echo "<p>" . htmlspecialchars($row['local_entrega']) . "</p>"; // Chave 'id_produto' já está correta
                echo "</div>";
        
                echo "</div>"; // Fim do container principal
                }
            }
                        
?>          
            </div>
          </div>
        </div>
        <!-- Final conteudo -->
      </div>
    </main>
    <footer>
      <div></div>
    </footer>
  </body>
</html>
