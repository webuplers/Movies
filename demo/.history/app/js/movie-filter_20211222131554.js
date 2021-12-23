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
    var movieName = $('#').val();
    $.ajax({
        type: 'POST',
        url: ajax_url,
        data: {
            action: 'moviefilter',
            movieName : movieName,
        },
        dataType : 'json', // this data type allows us to receive objects from the server
        beforeSend: function () {
            //Show loader here
            $('#productLoader').fadeIn();
        },
        success: function (data) {
            console.log(data);
        }
    });
}

