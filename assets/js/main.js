const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);


// FORMULARIOAK
$("#btn-save").on("click", function () {
    $("#hiddenbutton").click();
});

// filter botoia. Testua badu witdh=500
const $miLEn = $('#filter').val().length;
if ( $miLEn >0 ) {
    $('#filter').width(500);
}
$('#filter').focus(function()
{
    /*to make this flexible, I'm storing the current width in an attribute*/
    $(this).attr('data-default', $(this).width());
    $(this).animate({ width: 500 }, 'slow');
}).blur(function()
{
    /* lookup the original width */
    var w = $(this).attr('data-default');
    $(this).animate({ width: w }, 'slow');
});


$(".btn-delete-trigger").on("click", function () {
    bootbox.confirm("¿Estas seguro?", function ( resp ) {
        if ( resp === true ) {
            $(".form-delete-button").click();
        }
    });
});


$(".alert-dismissible").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").alert('close');
});

$("#cmbPagination").change(function () {
    const reg = $(this).val();
    let url = window.location.href;

    if ( url.indexOf('?')>-1) {
        url = url +"&limit=" + reg;
    } else {
        url = url +"?limit=" + reg;
    }

    window.location = url;

});

$(".chkSelecion").on("change", function () {
    const miid = $(this).val();
    const url = Routing.generate("api_save_selection", { 'table': 'amp', 'id': miid });
    console.log(url);
    $.post(url);

});

$("#clearSelection").on("click", function () {
    const url = Routing.generate("api_clear_selection");
    $.post(url, function (  ) {
        $('.chkSelecion').prop( "checked", false );
    });

});

$("#checkAll").on("change", function () {
    $("input:checkbox.chkSelecion").prop('checked',this.checked).trigger('change');
});
