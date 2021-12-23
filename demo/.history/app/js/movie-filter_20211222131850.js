// Instantiating the global app object
var app = {};
// 
var $ = jQuery.noConflict();
$(document).ready(function(){
    load_all_movie();
});
$('form.form-inline').on('submit',function(e){
    var movieName = $('#keyword').val();
    load_all_movie(movieName);
    return false;
})
// Load movies
function load_all_movie(movieName){
    var ajax_url = movie_filter_ajax_params.ajax_url;    
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
            $('#movieLoader').fadeIn();
        },
        success: function (data) {
            console.log(data);
        }
    });
}

