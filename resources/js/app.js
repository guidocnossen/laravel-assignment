window.$ = window.jQuery = require('jquery');

//include bootstrap
require('bootstrap');

//include local plugin packages

//own plugins

require('./plugins/dbk-subselect'); 

$(document).ready(function () {

	// load in modules

	require('./modules/global'); 

});