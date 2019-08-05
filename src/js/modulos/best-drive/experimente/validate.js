import validate from 'jquery-validation';
import {eventos} from './submit.js'

export function init_validade_formulario_best_drive()
{
	$("#formulario-best-drive").validate({
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
			modelo:{
				required:true
			},
		},
		submitHandler: function() {
			eventos('next');
	    }
	});

	$(document).on('change', '#formulario-best-drive select', function(){
		if($(this).val().length > 0)
		{
			$(this).find('label.error').hide();
			$(this).removeClass('error');
			$(this).addClass('valid');
		}
	});
}