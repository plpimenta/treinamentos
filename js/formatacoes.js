
function formatarCNPJ(){
    
    var fornecedorCadastrarCnpj = document.getElementById('fornecedorCadastrarCnpj').value;
    
    fornecedorCadastrarCnpj=fornecedorCadastrarCnpj.replace(/\D/g, '').replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1.$2.$3/$4-$5");
    
    document.getElementById('fornecedorCadastrarCnpj').value=fornecedorCadastrarCnpj;
}
function formatarCelular(){
    
    var fornecedorCadastrarCnpj = document.getElementById('fornecedorCadastrarCnpj').value;
    
    fornecedorCadastrarCnpj=fornecedorCadastrarCnpj.replace(/\D/g, '').replace(/^(\d{2})(\d{1})?(\d{4})?(\d{4})?/, "($1) $2 $3-$4-$5");
    
    document.getElementById('fornecedorCadastrarCnpj').value=fornecedorCadastrarCnpj;
}
function formatarFone(){
    
    var fornecedorCadastrarCnpj = document.getElementById('fornecedorCadastrarCnpj').value;
    
    fornecedorCadastrarCnpj=fornecedorCadastrarCnpj.replace(/\D/g, '').replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1.$2.$3/$4-$5");
    
    document.getElementById('fornecedorCadastrarCnpj').value=fornecedorCadastrarCnpj;
}