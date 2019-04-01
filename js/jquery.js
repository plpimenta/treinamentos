$(document).ready(function(){

// EXIBE CARGA HORARIA DA RECICLAGEM    
$("#cursoPossuiReciclagem").change(function(){
    if($(this).val() == "SIM"){
        $("#cursoCargaHorariaReciclagemExibir").show(300);
    }else{
        $("#cursoCargaHorariaReciclagemExibir").hide(300);
    }

});


    
    
});
    

