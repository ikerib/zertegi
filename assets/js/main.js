const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(document).ready(function () {

    // begiratu eta bilaketa bat den
    let empty = true;
    let text2highlight = [];
    $('input[type="text"]').each(function(){
        if($(this).val()!==""){
            const t = $(this).val().replace(/\"/g,'').replace(/\&/g,'');
            text2highlight.push(t);
            empty =false;
            return false;
        }
    });

    if ( empty === false ) { // datuak ditu beraz bilaketa da

        $('body').highlight(text2highlight);
    }

});

// FORMULARIOAK
$("#btn-save").on("click", function () {
    $("#hiddenbutton").click();
});

$("#btnFrmFinderSubmit").on("click", function () {
    $("#frmFinder").submit();
});

$("#btnFrmFinderReset").on("click", function () {
    $(':input', frmFinder).each(function() {

        var type = this.type;

        var tag = this.tagName.toLowerCase(); // normalize case

        // it's ok to reset the value attr of text inputs,

        // password inputs, and textareas

        if (type === 'text' || type === 'password' || tag === 'textarea')

            this.value = "";

        // checkboxes and radios need to have their checked state cleared

        // but should *not* have their 'value' changed

        else if (type === 'checkbox' || type === 'radio')

            this.checked = false;

        // select elements need to have their 'selectedIndex' property set to -1

        // (this works for both single and multiple select elements)

        else if (tag === 'select')

            this.selectedIndex = -1;

    });


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
    const table = $(this).data("table");
    const url = Routing.generate("api_save_selection", { 'table': table, 'id': miid });
    console.log(url);
    $.post(url);

});

$("#btnClearSelection").on("click", function () {
    const url = Routing.generate("api_clear_selection");
    $.post(url, function (  ) {
        $('.chkSelecion').prop( "checked", false );
    });

});

$("#checkAll").on("change", function () {
    $("input:checkbox.chkSelecion").prop('checked',this.checked).trigger('change');
});
