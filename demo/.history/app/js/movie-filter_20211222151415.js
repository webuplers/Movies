// Instantiating the global app object
var app = {};
// 
var $ = jQuery.noConflict();
$(document).ready(function(){
    var keyword = "red";
    load_all_movie(keyword); // default load red keyword movies
});
$('form.form-inline').on('submit',function(e){
    var keyword = $('#keyword').val(); // get keyword value here
    load_all_movie(keyword);
    return false;
})
// Load movies
function load_all_movie(keyword){
    var ajax_url = movie_filter_ajax_params.ajax_url;    
    $.ajax({
        type: 'POST',
        url: ajax_url,
        data: {
            action: 'moviefilter',
            keyword : keyword,
        },
        dataType : 'json', // this data type allows us to receive objects from the server
        beforeSend: function () {
            //Show loader here
            $('#movieLoader').fadeIn();
        },
        success: function (data) {
            $('#movie-listings').append(data.movies);
            console.log(data.movies);
        }
    });
}

