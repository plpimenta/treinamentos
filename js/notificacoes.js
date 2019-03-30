function notificacao(from, align, status, mensagem, tempo, icone) {

    if (!status) {
        status = "success";
    }
    if (!tempo) {
        tempo = 400;
    }
    if (!mensagem) {
        mensagem = "Há mensagens disponível no sistema";
    }
    if (!icone) {
        icone = "ti-info";
    }

    $.notify({
        icon: icone,
        message: mensagem,

    }, {
        type: status,
        timer: tempo,
        placement: {
            from: from,
            align: align
        }
    });
}