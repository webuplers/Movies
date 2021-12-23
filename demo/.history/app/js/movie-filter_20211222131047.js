// Instantiating the global app object
var app = {};
// 
var $ = jQuery.noConflict();
$(document).ready(function(){
    load_all_movie();
})
// Load movies
function load_all_movie(){
    var ajax_url = movie_filter_ajax_params.ajax_url;
    console.log('init');
}

