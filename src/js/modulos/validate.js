import validate from 'jquery-validation';

$("#formulario-flutuante").validate({
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
		},
	},
	messages: {
		nome: "O nome e obrigatório.",
		email: "Digite um email válido.",
		telefone: "Digite um telefone válido.",
		loja: "Selecione uma loja.",
		mensagem: "Digite uma mensagem."
	},
	submitHandler: function() {
	
    }
});