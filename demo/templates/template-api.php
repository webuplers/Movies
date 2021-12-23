<?php
/**
 * Template Name: Search Movie Page Template
 * @package WordPress
 * Developed By UP0065
 * Created on 2021-12-22
 * @since Demo 1.0
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
			<!-------------Movie listings here--------------->
		</div>
		<div class="loadMore">
			<input type="hidden" id="pageno" value=""/>
			<input type="hidden" id="currentpage" value="0"/>
			<span>Load More</span>
		</div>
		<div class="movieLoader">
			<!------Loader here------>
		</div>
	</div>
	<?php
	get_footer();