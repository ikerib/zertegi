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


