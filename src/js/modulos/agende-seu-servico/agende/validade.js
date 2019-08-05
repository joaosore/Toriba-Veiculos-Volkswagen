import validate from 'jquery-validation';
import {eventos} from './submit.js'

export function init_validade_formulario_agende()
{
	var INIT = true;
	$("#formulario-agende").validate({
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
			marca_modelo:{
				required:true
			},
			placa:{
				required:true
			},
			mensagem:{
				required:true
			}
		},
		submitHandler: function() {
			if(INIT)
			{
				eventos('next');
				INIT = false;
			}
	    }
	});

	$(document).on('change', '#formulario-agende select', function(){
		if($(this).val().length > 0)
		{
			$(this).find('label.error').hide();
			$(this).removeClass('error');
			$(this).addClass('valid');
		}
	});
}