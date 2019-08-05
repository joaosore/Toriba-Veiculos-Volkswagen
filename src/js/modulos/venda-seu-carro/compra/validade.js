import validate from 'jquery-validation';
import {eventos, getFormulario} from './submit.js'


export function init_validade_formulario_venda_seu_carro()
{
		var INIT = true;
		$("#formulario-venda-seu-carro").validate({
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
				quilometragem:{
					required:true
				},
				ano:{
					required:true
				},
				portas:{
					required:true
				},
				cambio:{
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
		
	$(document).on('change', '#formulario-venda-seu-carro select', function(){
		if($(this).val().length > 0)
		{
			$(this).find('label.error').hide();
			$(this).removeClass('error');
			$(this).addClass('valid');
		}
	});
}