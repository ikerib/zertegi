import * as bootbox from "bootbox";

const $ = require('jquery');
require('bootstrap');

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

require('./adminlte');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
