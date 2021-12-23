<?php
/**
 * Template Name: Search Movie Page Template
 * @package WordPress
 * Developed By UP0065
 * Created on 2021-12-22
 * @since Gulp 1.0
*/

	get_header();
	?>
	<div class="jumbotron">
  <div class="container text-center">
    <h1>Movie</h1>  
	<form class="form-inline">
		<input type="text" class="form-control" size="50" value="red" placeholder="Search red, green, blue or yellow" id="keyword">
		<input type="submit" id="searchMovie" value="Search Movie" class="btn-search">
	</form>  
  </div>
</div>

<div class="container">    
  <div class="row movie-listings" id="movie-listings">
	  <!-------------movie listings here--------------->
  </div>
  <div><a href="javascript:void(0);">Load More</a></div>
  <div class="movieLoader"></div>
</div>

<?php
get_footer();