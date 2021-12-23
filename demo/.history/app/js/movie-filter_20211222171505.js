// Instantiating the global app object
var app = {};
// 
var $ = jQuery.noConflict();
$(document).ready(function(){
    var keyword = "red"; // set default keyword
    load_all_movie(keyword); // default load red keyword movies
});
$('form.form-inline').on('submit',function(e){
    var keyword = $('#keyword').val(); // get keyword value here
    load_all_movie(keyword); // pass keyword arg into the function
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
        dataType : 'html', // this data type allows us to receive objects from the server
        beforeSend: function () {
            //Show loader here
            $('#movieLoader').fadeIn();
        },
        success: function (data) {
            $('#movie-listings').html(data); // movie listing shows here 
            $('#movieLoader').fadeOut(); // hide loader here
        }
    });
}

