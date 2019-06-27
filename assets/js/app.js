import * as bootbox from "bootbox";

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

require('./adminlte');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

// FORMULARIOAK

$("#btn-save").on("click", function () {
    $("#hiddenbutton").click();
});



$('#filter').focus(function()
{
    /*to make this flexible, I'm storing the current width in an attribute*/
    $(this).attr('data-default', $(this).width());
    $(this).animate({ width: 350 }, 'slow');
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
