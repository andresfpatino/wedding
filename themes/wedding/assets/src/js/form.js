import "select2/dist/css/select2.min.css";
import "select2/dist/js/select2.full";

$(function() {

    $('.invitados').select2({
      placeholder: 'Selecciona tu nombre'
    });
  
    var selectElement = $(".invitados");
    var extraGuestDiv = $(".extra-guest");
    var asistenciaRadios = $("input[name='asistencia']");
    var restrictionsFieldset = $(".restrictions");
    var restrictionsRadios = restrictionsFieldset.find("input[name='restriccion']");
    var indicacionesDiv = $(".indicaciones");
  
    selectElement.on("select2:select", toggleExtraGuest);
    asistenciaRadios.on("change", toggleExtraGuest);
  
    restrictionsRadios.on("change", function() {
        if ($(this).val() === "Si") {
            indicacionesDiv.show();
            indicacionesDiv.find('textarea').attr("required", "required");
        } else {
            indicacionesDiv.hide();
            indicacionesDiv.find('textarea').removeAttr("required");
        }
    });
  
    function toggleExtraGuest() {
        var selectedOption = selectElement.find(":selected");
        var selectedRadio = asistenciaRadios.filter(":checked");
        var dataNameExtraGuest = selectedOption.attr('data-name-extraGuest');

        if (selectedOption.data("additional") === true && selectedRadio.val() === "Asistiré") {
            extraGuestDiv.show();
            extraGuestDiv.find('input[type="radio"]').attr("required", "required");
            $('#nombreInvitadoAdicional').text(dataNameExtraGuest);
        } else {
            extraGuestDiv.hide();
            extraGuestDiv.find('input[type="radio"]').removeAttr("required");
        }
  
        if (selectedRadio.val() === "Asistiré") {
            restrictionsFieldset.show();
            restrictionsFieldset.find('input[type="radio"]').attr("required", "required");
        } else {
            restrictionsFieldset.hide();
            restrictionsFieldset.find('input[type="radio"]').removeAttr("required");
        }
    }
});