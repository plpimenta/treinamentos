function subMenuTreinamentos(time) {

    // Caso não seja informado o valor time será setado 300
    if (time == null) {
        time = 300;
    }


    var display = document.getElementById('valor-menu-treinamentos').value;

    if (display == "oculto") {
        //-----------------------------------------
        // Exibe submenus
        $("#submenu-treinamentos-itens").show(time);

        //-----------------------------------------
        // Altera valor elemento para exibicao
        document.getElementById('valor-menu-treinamentos').value = "mostrar";
    } else {
        //-----------------------------------------
        // Oculta submenus
        $("#submenu-treinamentos-itens").hide(time);

        //-----------------------------------------
        // Altera valor do elemento para ocultar ul
        document.getElementById('valor-menu-treinamentos').value = "oculto";
    }


}
function subMenuFerramentas() {
    var display = document.getElementById('valor-menu-ferramentas').value;

    if (display == "oculto") {
        //-----------------------------------------
        // Exibe submenus
        $("#submenu-ferramentas-itens").show(300);

        //-----------------------------------------
        // Altera valor elemento para exibicao
        document.getElementById('valor-menu-ferramentas').value = "mostrar";
    } else {
        //-----------------------------------------
        // Oculta submenus
        $("#submenu-ferramentas-itens").hide(300);

        //-----------------------------------------
        // Altera valor do elemento para ocultar ul
        document.getElementById('valor-menu-ferramentas').value = "oculto";
    }


}
function subMenuFornecedores() {
    var display = document.getElementById('valor-menu-fornecedores').value;

    if (display == "oculto") {
        //-----------------------------------------
        // Exibe submenus
        $("#submenu-fornecedores-itens").show(300);

        //-----------------------------------------
        // Altera valor elemento para exibicao
        document.getElementById('valor-menu-fornecedores').value = "mostrar";
    } else {
        //-----------------------------------------
        // Oculta submenus
        $("#submenu-fornecedores-itens").hide(300);

        //-----------------------------------------
        // Altera valor do elemento para ocultar ul
        document.getElementById('valor-menu-fornecedores').value = "oculto";
    }


}
function subMenuColaboradores() {
    var display = document.getElementById('valor-menu-colaboradores').value;

    if (display == "oculto") {
        //-----------------------------------------
        // Exibe submenus
        $("#submenu-colaboradores-itens").show(300);

        //-----------------------------------------
        // Altera valor elemento para exibicao
        document.getElementById('valor-menu-colaboradores').value = "mostrar";
    } else {
        //-----------------------------------------
        // Oculta submenus
        $("#submenu-colaboradores-itens").hide(300);

        //-----------------------------------------
        // Altera valor do elemento para ocultar ul
        document.getElementById('valor-menu-colaboradores').value = "oculto";
    }


}
