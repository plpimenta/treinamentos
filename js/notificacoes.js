
function notificacao(titulo,mensagem,tipo,classe){
    
    new PNotify({
          title: titulo,
          text: mensagem,
          type: tipo,
          styling: 'bootstrap3', 
          addclass: classe
      }); 
}