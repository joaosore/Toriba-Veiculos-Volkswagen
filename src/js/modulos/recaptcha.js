export function startRecaptcha($form) {
  var SITE_KEY = "6Lf5n48UAAAAACQj8K2kBCb7495TzqdjQtwYGi-3";
  switch ($form) {
    case "Formulario-Flutuante":
      $.getScript(
        "https://www.google.com/recaptcha/api.js?render=" + SITE_KEY,
        function(data, textStatus, jqxhr) {
          grecaptcha.ready(function() {
            grecaptcha
              .execute(SITE_KEY, { action: "flutuante" })
              .then(function(token) {
                document.getElementById("g-recaptcha-response").value = token;
              });
          });
        }
      );
      break;
    case "Best-Drive":
      $.getScript(
        "https://www.google.com/recaptcha/api.js?render=" + SITE_KEY,
        function(data, textStatus, jqxhr) {
          grecaptcha.ready(function() {
            grecaptcha
              .execute(SITE_KEY, { action: "bestdrive" })
              .then(function(token) {
                document.getElementById(
                  "g-recaptcha-response-best-drive"
                ).value = token;
              });
          });
        }
      );
      break;
    case "Consorcio":
      $.getScript(
        "https://www.google.com/recaptcha/api.js?render=" + SITE_KEY,
        function(data, textStatus, jqxhr) {
          grecaptcha.ready(function() {
            grecaptcha
              .execute(SITE_KEY, { action: "consorcio" })
              .then(function(token) {
                document.getElementById(
                  "g-recaptcha-response-consorcio"
                ).value = token;
              });
          });
        }
      );
      break;
    case "Venda-seu-carro":
      $.getScript(
        "https://www.google.com/recaptcha/api.js?render=" + SITE_KEY,
        function(data, textStatus, jqxhr) {
          grecaptcha.ready(function() {
            grecaptcha
              .execute(SITE_KEY, { action: "vendaseucarro" })
              .then(function(token) {
                document.getElementById(
                  "g-recaptcha-response-compra-seu-carro"
                ).value = token;
              });
          });
        }
      );
      break;
    case "Agende-seu-servico":
      $.getScript(
        "https://www.google.com/recaptcha/api.js?render=" + SITE_KEY,
        function(data, textStatus, jqxhr) {
          grecaptcha.ready(function() {
            grecaptcha
              .execute(SITE_KEY, { action: "agendeseuservico" })
              .then(function(token) {
                document.getElementById(
                  "g-recaptcha-response-agende"
                ).value = token;
              });
          });
        }
      );
      break;
    case "Acessorios-e-pecas":
      $.getScript(
        "https://www.google.com/recaptcha/api.js?render=" + SITE_KEY,
        function(data, textStatus, jqxhr) {
          grecaptcha.ready(function() {
            grecaptcha
              .execute(SITE_KEY, { action: "acessoriosepecas" })
              .then(function(token) {
                document.getElementById(
                  "g-recaptcha-response-acessorios-e-pecas"
                ).value = token;
              });
          });
        }
      );
      break;
    case "Trabalhe-conosco":
      $.getScript(
        "https://www.google.com/recaptcha/api.js?render=" + SITE_KEY,
        function(data, textStatus, jqxhr) {
          grecaptcha.ready(function() {
            grecaptcha
              .execute(SITE_KEY, { action: "trabalheconosco" })
              .then(function(token) {
                document.getElementById(
                  "g-recaptcha-response-trabalhe-conosco"
                ).value = token;
              });
          });
        }
      );
      break;
  }
}
