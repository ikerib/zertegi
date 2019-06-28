import * as bootbox from "bootbox";

const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);


$(document).ready(function() {

    $('.deleteBtn').click(function () {

        const itemId = $(this).data('id');
        const deleteUrl = $(this).data("delete-url");
        const token = $(this).data("token");
        const that = $(this);


        bootbox.confirm("Seguru zaude?", function ( result ) {
            if ( result === true ) {

                $.ajax({

                    url: deleteUrl,
                    data: {_method: 'delete', _token :token},
                    // data: {_method: 'DELETE'},
                    method: 'DELETE',
                    success: function ( data, response ) {
                        if ( response === 'ok' ) {
                            console.log(data);
                        }
                        $(that).closest("tr").addClass("highlight");
                        $(that).closest("tr").fadeOut(1600, "linear", function (  ) {
                            $(this).remove();
                        } );
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                        console.log("HORROR!!!");
                        console.log("status");
                        console.log(status);
                        console.log("request");
                        console.log(request);
                        console.log("error");
                        console.log(error);
                    },
                });


            }
        });


    });

    $(".form-delete-button").on("click", function (e) {
        console.log("click click");
        e.preventDefault();

        bootbox.confirm("¿Estas seguro?", function ( resp ) {
            if ( resp === true) {
                $(this).closest("form").submit();
            }
        });
    });

    $(".btn-delete-trigger").on("click", function () {
        console.log("ITEN AL DIK KLIK EO ZEOZE EO ZE LETXE!");
        $(".form-delete-button").click();
    });


});
