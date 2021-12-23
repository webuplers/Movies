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
  <div class="row" id="movie-listings">
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
  </div>
</div><br><br>

<?php
get_footer();