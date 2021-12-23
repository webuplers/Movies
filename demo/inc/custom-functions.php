<?php
/**
 * Custom Functions
 * @package WordPress
 * Developed By UP0065
 * Created on 2021-12-22
 * @since Demo 1.0
*/
	/***************************
	*** Remove css js version***
	***************************/
	function remove_movie_cssjs_ver( $src ) {
		if( strpos( $src, '?ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
	add_filter( 'style_loader_src', 'remove_movie_cssjs_ver', 10, 2 );
	add_filter( 'script_loader_src', 'remove_movie_cssjs_ver', 10, 2 );
	/***************************************
	*** enqueue all js and css files here***
	***************************************/
	function movie_js_css(){
		// add bootstrap framework
		wp_enqueue_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ));
		// custom style.
		wp_enqueue_style( 'movie-style', get_template_directory_uri() . '/dist/style.css', array(), wp_get_theme()->get( 'Version' ));

		wp_enqueue_script(
			'movie-filter-script',
			get_template_directory_uri() . '/dist/all.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
		// enqueue jquery.
		wp_enqueue_script(
			'jquery',
			'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
		if(is_front_page()):
			// add wordpress ajax
			wp_localize_script( 'movie-filter-script', 'movie_filter_ajax_params', array( 			
				'ajax_url' => admin_url( 'admin-ajax.php' ), // WordPress AJAX
			)); 
			wp_enqueue_script( 'movie-filter-script' );  
		endif;
		// // bootstrap jquery.
		wp_enqueue_script(
			'bootstrap-jquery',
			'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js',
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);

	}
 	add_action( 'wp_enqueue_scripts', 'movie_js_css' );
	/***********************
	 *** Movie filter ajax***
	***********************/
    add_action('wp_ajax_moviefilter', 'fn_movies_filter');
    add_action('wp_ajax_nopriv_moviefilter', 'fn_movies_filter');
		function fn_movies_filter(){
		$query_data = $_REQUEST;
		$keyword = ($query_data['keyword']) ? $query_data['keyword'] : false; // get search keyword
		$pageno = ($query_data['pageno']) ? $query_data['pageno'] : false; // get pageno
		$apiKey = "6f30f377"; // api key
		$api_endpoint = "https://www.omdbapi.com/"; // api endpoint
		$dev_env = false;
		$movieArray = [
		"apikey" => $apiKey,
		"r" => "xml",
		"s" => $keyword,
		"page" => $pageno
		];
		// Build query
		$query = $api_endpoint . '?' . http_build_query($movieArray);
		$movies_xml_data = simplexml_load_file($query);
		$movies_parse_data = json_encode($movies_xml_data);
		$movies_data = json_decode($movies_parse_data, true);
		$no_of_records_per_page = 10;
		$total_rows = $movies_data['@attributes']['totalResults'];
		$total_pages = ceil($total_rows / $no_of_records_per_page);
		ob_start();
		if (! empty($movies_data['result'])) :
			foreach ($movies_data['result'] as $row) :
				$movieData .= "";
				$title = $row['@attributes']['title'];
				$year = $row['@attributes']['year'];
				$imdbID = $row['@attributes']['imdbID'];
				$type = $row['@attributes']['type'];
				$poster = $row['@attributes']['poster'];
				$movieData .= '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 equalHeight">
						<div class="panel panel-primary">
						'.(!empty($title) ? '<div class="panel-heading">'.$title.'</div>' : '').'
						'.(!empty($poster) ? '<div class="panel-body"><figure style="background-image:url('.$poster.');" class="img-responsive"></figure></div>' : '').'
						'.(!empty($year) ? '<div class="panel-footer">'.$year.'</div>' : '').'
						</div>
					</div>';
			endforeach;
		else:
			$movieData .= '<h3>There are no movies...</h3>';
		endif;
		$movieData .= ob_get_contents(); ob_end_clean();
		echo json_encode(array(
			'movies' => $movieData,
			'page' => $total_pages,
			'keyword' => $keyword
		));
		wp_die();
	}