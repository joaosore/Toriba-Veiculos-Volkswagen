import validate from 'jquery-validation';
import {eventos, getFormulario} from './submit.js'

export function init_validade_formulario_acessorios_e_pecas()
{
	var INIT = true;
	$("#formulario-acessorios-e-pecas").validate({
		rules : {
			nome:{
				required:true
			},
			email:{
				required:true
			},
			telefone:{
				required:true
			},
			loja:{
				required:true
			},
			mensagem:{
				required:true
			}
		},
		submitHandler: function() {
			if(INIT)
			{
				getFormulario();
				INIT = false;
			}
	    }
	});

	$(document).on('change', '#formulario-acessorios-e-pecas select', function(){
		if($(this).val().length > 0)
		{
			$(this).find('label.error').hide();
			$(this).removeClass('error');
			$(this).addClass('valid');
		}
	});
}