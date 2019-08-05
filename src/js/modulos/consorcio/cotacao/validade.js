import validate from 'jquery-validation';
import {eventos, getFormulario} from './submit.js'

export function init_validade_formulario_consorcio()
{
	var INIT = true;
	$("#formulario-consorcio").validate({
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
			parcelas:{
				required:true
			},
			mensagem:{
				required:true
			},
			loja: {
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

	$(document).on('change', '#formulario-consorcio select', function(){
		if($(this).val().length > 0)
		{
			$(this).find('label.error').hide();
			$(this).removeClass('error');
			$(this).addClass('valid');
		}
	});
}