export function startMask() {
  $(".date").mask("00/00/0000");
  $(".time").mask("00:00:00");
  $(".date_time").mask("00/00/0000 00:00:00");
  $(".cep").mask("00000-000");
  $(".phone").mask("0000-0000");
  $(".phone_with_ddd").mask("(00) 0000-0000");
  $(".phone_us").mask("(000) 000-0000");
  $(".cpf").mask("000.000.000-00", { reverse: true });
  $(".cnpj").mask("00.000.000/0000-00", { reverse: true });
  $(".money").mask("000.000.000.000.000", { reverse: true });
  $(".numero").mask("#.##0", { reverse: true });
  $(".money2").mask("#.##0,00", { reverse: true });

  $(".placa").mask("SSS 9999");
  $(document).on("input", ".placa", function() {
    this.value = this.value.toUpperCase();
  });

  $(".ip_address").mask("0ZZ.0ZZ.0ZZ.0ZZ", {
    translation: {
      Z: {
        pattern: /[0-9]/,
        optional: true
      }
    }
  });
  $(".percent").mask("##0,00%", { reverse: true });

  // Telefone
  var SPMaskBehavior = function(val) {
      return val.replace(/\D/g, "").length <= 10
        ? "(00) 0000-00000"
        : "(00) 0 0000-0000";
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };
  $(".phonemask").mask(SPMaskBehavior, spOptions);
}
startMask();
