<?php ?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <!--<div class="navbar nav_title" style="border: 0;padding-left: 10%;padding-top: 3.0%;background-color: #E6E6E6;padding-bottom: 22%;">-->
        <div class="navbar nav_title" >
            <a href="index.html" ></a></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo $row_usu_info['usuario_foto']?>" alt="" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Seja Bem vindo,</span>
                <h2><?php echo $row_usu_info['usuario_nome'];?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="index.php">Dashboard</a></li>
<!--                            <li><a href="#">Dashboard2</a></li>
                            <li><a href="#">Dashboard3</a></li>-->
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Cadastro</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-graduation-cap"></i> Cursos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="../paginas/treinamentoCadastrar.php">Cadastrar</a></li>
                            <li><a href="../paginas/treinamentosGerenciar.php">Gerenciar</a></li>
                            <li style="display: none;"><a href="../paginas/treinamentosEditar.php">Editar</a></li>
                          </ul>
                    </li>
                    <li><a><i class="fa fa-joomla"></i> Treinamentos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Cadastrar</a></li>
                            <li><a href="#">Gerenciar</a></li>
                          </ul>
                    </li>
                    <li><a><i class="fa fa-cubes"></i> Fornecedores <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="fornecedorCadastrar.php">Cadastrar</a></li>
                            <li><a href="fornecedorGerenciar.php">Gerenciar</a></li>
                            <li style="display: none;"><a href="fornecedoresEditar.php">Editar</a></li>
                            <li><a href="#">Importar</a></li>
                          </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i> Colaboradores <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Cadastrar</a></li>
                            <li><a href="#">Gerenciar</a></li>
                            <li><a href="#">Importar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Configurações">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Tela Cheia">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Bloquer">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Sair" href="../funcoes/loginLogOut.php?logout=1">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
