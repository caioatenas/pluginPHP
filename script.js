JQuery('#cadastro').on('submit', function(e){
    e.preventDefault();

    jQuery('#messagem_cadastro').html('Carregando...')
    jQuery('#botao_cadastro').hide();

    var form = {
        action: 'criar_conta',
        name: JQuery('#cadastro_name').var(),
        email: JQuery('#cadastro_email').var(),
        senha: JQuery('#cadastro_senha').var(),
    }

    jQuery.ajax({
        type: 'POST',
        url: login_obj.ajax_url,
        data: form,
        success: function (json){
            if(json.status == 2){
                jQuery("#mensagem_cadastro").html("Cadastrado com suceso!");
            }else{
                jQuery("#mensagem_cadastro").html("Erro ao cadastrar usuario.");


            }
        }
    });
});