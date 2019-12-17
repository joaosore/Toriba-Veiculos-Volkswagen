import validate from "jquery-validation";
import { getFormulario } from "./submit.js";

export function init_validade_formulario_flutuante() {
  $("#formulario-flutuante").validate({
    rules: {
      nome: {
        required: true
      },
      email: {
        required: true
      },
      telefone: {
        required: true
      },
      loja: {
        required: true
      },
      mensagem: {
        required: true
      }
    },
    messages: {
      nome: "O nome e obrigatório.",
      email: "Digite um email válido.",
      telefone: "Digite um telefone válido.",
      loja: "Selecione uma loja.",
      mensagem: "Digite uma mensagem."
    },
    submitHandler: function() {
      getFormulario();
    }
  });

  $(document).on("change", "#formulario-flutuante select", function() {
    if ($(this).val().length > 0) {
      $("#loja-error").hide();
      $(this).removeClass("error");
      $(this).addClass("valid");
    }
  });
}
