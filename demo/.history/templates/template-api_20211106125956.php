<?php
/**
 * Template Name: Search result
 *
*/
// Load header here
if(isset($_COOKIE['selectioncookie']) && $_COOKIE['selectioncookie'] !="homeowner"):
	get_header('professional');	
else:
	get_header();
endif;
$banner_title = get_field('banner_title');
?>

<section class="help-search">
	<div class="container">
		<?php echo (!empty($banner_title) ? '<h2>'.$banner_title.'</h2>' : '');?>
		<form method="post" id="searchForms">
			<div class="form-group">
				<input type="text" name="keyword" value="<?php echo (!empty($_GET['keyword']) ? $_GET['keyword'] : ''); ?>" />
				<input type="hidden" name="pageid" value="<?php echo get_the_ID(); ?>" />
				<input type="submit" value="submit" />
			</div>
		</form>
	</div>
</section>

<section class="search-result-sec product-features-tab" id="searchResults">
	<div class="container">
		<h3>Search results for ‘<span id="searchKeyword"></span>”</h3>

		<div id="searchTab">
		    <ul class="resp-tabs-list">
		        <li>
		        	<a href="javascript:void(0);" class="bgcl-btn" title=""> 
		        		<span>ALL &nbsp;(<span id="allCount"></span>)</span>
		        	</a>
		        </li>
		        <li>
		        	<a href="javascript:void(0);" class="bgcl-btn" title="">
				        <span>GENERAL &nbsp;(<span id="generalCount"></span>)</span>
				    </a>
				</li>
		        <li>
		        	<a href="javascript:void(0);" class="bgcl-btn" title="">
				        <span>PRODUCTS &nbsp;(<span id="productCount"></span>)</span>
				    </a>
				</li>
		    </ul>
		    <div class="resp-tabs-container">
		        <div id="allSearchResult">
					<!--------Display All search result--------->
		        </div>
		        <div id="generalSearchResult">
		        	<!--------Display General search result--------->
		        </div>
		        <div id="productSearchResult">
		        	<!--------Display Product search result--------->
		        </div>
		    </div>
		</div>	
	</div>
		<figure id="searchLoader" style="display:none;">
			<div class="d-flex align-items-center justify-content-center">
				<img src="<?php echo get_template_directory_uri(); ?>/images/product-loader.svg"  alt="preloader"  />
			</div>
		</figure>
</section>
<?php
// Load Footer
if(isset($_COOKIE['selectioncookie']) && $_COOKIE['selectioncookie'] !="homeowner"):
	get_footer('professional');	
else:
	get_footer();
endif;
?>

