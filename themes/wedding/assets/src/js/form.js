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
        } else {
            indicacionesDiv.hide();
        }
    });
  
    function toggleExtraGuest() {
        var selectedOption = selectElement.find(":selected");
        var selectedRadio = asistenciaRadios.filter(":checked");
  
        if (selectedOption.data("additional") === true && selectedRadio.val() === "Asistiré") {
            extraGuestDiv.show();
        } else {
            extraGuestDiv.hide();
        }
  
        if (selectedRadio.val() === "Asistiré") {
            restrictionsFieldset.show();
        } else {
            restrictionsFieldset.hide();
        }
    }
});