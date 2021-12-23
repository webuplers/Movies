// Instantiating the global app object
var app = {};
// 
var $ = jQuery.noConflict();
$(document).ready(function(){
    var keyword = "red"; // set default keyword
    var pageno = 1; // set default page number
    load_all_movie(keyword,pageno); // default load red keyword movies
});
// on form submit filter movies
$('form.form-inline').on('submit',function(e){
    var keyword = $('#keyword').val(); // get keyword value here
    var pageno = 1; // set default page number
    load_all_movie(keyword,pageno); // pass keyword arg into the function
    return false;
});
// ajax pagination
$('.loadMore a').on('click',function(e){
    e.preventDefault();
    var keyword = $('#keyword').val(); // get keyword value here
    var pageno = $('#currentpage').val();
    console.log
    load_all_movie(keyword,pageno);
});
// Load movies
function load_all_movie(keyword,pageno){
    var ajax_url = movie_filter_ajax_params.ajax_url;    
    $.ajax({
        type: 'POST',
        url: ajax_url,
        data: {
            action: 'moviefilter',
            keyword : keyword,
            pageno  : pageno
        },
        dataType : 'json', // this data type allows us to receive objects from the server
        beforeSend: function () {
            //Show loader here
            $('.movieLoader').fadeIn();
        },
        success: function (data) {
            $('#movie-listings').append(data.movies); // movie listing shows here
            $('#pageno').val(data.page); // get total page 
            $('.movieLoader').fadeOut(); // hide loader here
        }
    });
}

