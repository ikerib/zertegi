import {confirm} from "bootbox";

const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';
import moment from "moment";

moment.locale('eu');

Routing.setRoutingData(routes);

$(document).ready(function () {
    // begiratu eta bilaketa bat den
    // $('#config-demo').daterangepicker({
    //     "autoApply": true
    // }, function(start, end, label) {
    //     console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    // });

    $('#reservation').daterangepicker();

    let empty = true;
    let text2highlight = [];
    $('input[type="text"]').each(function(){
        if($(this).val()!==""){
            let searchTerms=$(this).val().replace(/[|&;$%@"<>()+,*"]/g, "");
            const t = searchTerms.split(/[ ,]+/g);
            console.log(t);
            $.each(t,function (index, value) {
                console.log(value)
                text2highlight.push(value);
            });
            empty =false;
            return false;
        }
    });

    if ( empty === false ) { // datuak ditu beraz bilaketa da

        $('body').highlight(text2highlight);
    }

    $('form').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });

        $(this).find('input[type=submit]').hide();
    });

    $('#btnKnosys2Zertegi').on("click", function () {
        const vZaharra = $('#berrikusi_consultas_berrikusiGaia').val();
        if (vZaharra.length > 0) {
            $('#berrikusi_consultas_gaia').val(vZaharra);
            $('#berrikusi_consultas_berrikusiGaia').val("");
            $('#berrikusi_consultas_berrikusiGaia').text("");
        }
    });

    // $('#form_data').daterangepicker();
    $('#form_data').daterangepicker({
        "autoApply": true,

    }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });

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

$(".btn-delete-trigger").on("click", function () {
    confirm("¿Estas seguro?", function (resp ) {
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
    $.post(url)
        .done(function (data) {
            $('#mySeleccionCount').html("(" + data.count + ")");
        })
        .fail(function (xhr, status, error) {
            alert('Arazo bat egon da selekzioa gordetzerakoan ,jarri harremanetan informatika zerbitzuarekin');
            console.log(xhr);
            console.log(status);
            console.log(error);
        });
});

$("#btnClearSelection").on("click", function () {
    const url = Routing.generate("api_clear_selection");
    $.post(url)
        .done( function (  ) {
            $('.chkSelecion').prop( "checked", false );
            $('#mySeleccionCount').html("");
        })
        .fail(function (xhr, status, error) {
            alert('Arazo bat egon da selekzioa gordetzerakoan ,jarri harremanetan informatika zerbitzuarekin');
            console.log(xhr);
            console.log(status);
            console.log(error);
        })
    ;

});

$("#checkAll").on("change", function () {
    $("input:checkbox.chkSelecion").prop('checked',this.checked).trigger('change');
});
