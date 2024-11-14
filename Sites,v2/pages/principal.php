<?php
session_start();


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/painel-principal.css" />
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/" />
    <script
      src="https://kit.fontawesome.com/a9a68e41bd.js"
      crossorigin="anonymous"
    ></script>
    <title>Painel princiapl</title>
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
                    <!-- Conteudo teteu ++ -->
                    <div class="topo">
                        <div class="name">Atividade de vendas</div>
                        <div class="box"> 
                            <div class="atv-v">
                                <div class="info">
                                    <h2>52</h2>
                                    <div class="txt">
                                        <p>Confirmado</p></div>
                                </div>
                                <div class="info">
                                    <h2>49</h2>
                                    <div class="txt">
                                        <p>Sendo feito</p></div>
                                </div>
                                <div class="info">
                                    <h2>32</h2>
                                    <div class="txt">
                                        <p>A caminho</p></div>
                                </div>
                                <div class="info">
                                    <h2>69</h2>
                                    <div class="txt">
                                        <p>Entregue</p></div>
                                </div>
                            </div>
                            <div class="resumo-i">
                                <h3>Resumo de Inventário</h3>
                                <div class="rsm"></div>
                                <div class="rsm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="baixo">
                        <div class="linha1">
                            <div class="dp"></div>
                            <div class="ps"></div>
                        </div>
                        <div class="linha2">
                            <div class="itm"></div>
                            <div class="odv">
                                <div class="venda"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Final conteudo -->
                </div>
            </div>
        </main>
</body>
</html>