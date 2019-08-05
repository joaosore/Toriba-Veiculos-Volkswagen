import validate from 'jquery-validation';
import {eventos, getFormulario} from './submit.js'

export function init_validade_formulario_trabalhe_conosco()
{
	$("#formulario-trabalhe-conosco").validate({
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
			getFormulario();
	    }
	});

	$(document).on('change', '#formulario-trabalhe-conosco select', function(){
		if($(this).val().length > 0)
		{
			$(this).find('label.error').hide();
			$(this).removeClass('error');
			$(this).addClass('valid');
		}
	});
}