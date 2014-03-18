<?php
    get_header();
    $cb_full_feature = ot_get_option( 'cb_hp_gridslider', 'cb_full_off' );
    $cb_blog_style = ot_get_option( 'cb_blog_style', 'style-a' );
    $cb_full_feature_cats = ot_get_option( 'cb_gridslider_category', '' );

    if ( $cb_blog_style == 'style-c' ) {

        $cb_blog_width = 'cb-full-width';

    } else {

        //$cb_blog_width = 'cb-standard';
        $cb_blog_width = 'cb-full-width';
    }
?>

<div id="cb-content" class="wrap clearfix">

    <?php
	
	//Top Slider//
	 if ( $cb_full_feature != 'cb_full_off' ) {

        if ( $cb_full_feature == 's-2' ) {
            echo '<div id="main" class="' . $cb_blog_width .' clearfix" role="main">';
            $cb_section = 'b';
        } else {
            $cb_section = 'a';
        }

                    $cb_flipped = $cb_title = $cb_module_style = $cb_offset = $cb_order = $cb_orderby = $cb_filter = $cb_tag_id = $cb_post_ids = NULL;
                    $j = 0;
                    if ( $cb_full_feature_cats == NULL ) {
                         $cb_full_feature_cats = get_all_category_ids();
                    }
                    $cb_cat_id = implode( ',', $cb_full_feature_cats );
                    include( locate_template( 'library/modules/cb-' . $cb_full_feature . '.php' ) );
     } 
	 //Top Slider//
	 ?>

    <?php  if ( $cb_full_feature != 's-2' ) { ?>
        <div id="main" class="<?php echo $cb_blog_width; ?> clearfix <?php if(is_front_page() == true || is_home()) echo'muftah-home-tabs'; ?>" role="main">
        
        	<div class="cb-tabs">
            	<ul>
                	<li class=""><a href="#">Featured</a></li>
            		<li class="current"><a href="#">Most Recent</a></li>
                    <li class=""><a href="#">Popular</a></li>
                </ul>
            	<div class="cb-panes">
                
                    <div class="cb-tab-content" style="display: none;">      
                    <?php get_template_part( 'cat', 'style-a-featured' ); ?>
                    </div>
                    
                    <div class="cb-tab-content" style="display: block;">
                    <?php get_template_part( 'cat', $cb_blog_style ); ?>
                    </div>
                    
                    <div class="cb-tab-content" style="display: none;">
                    <?php get_template_part( 'cat', 'style-a-popular' ); ?>
                    </div>
                    
            	</div>
          	</div>
            
    <?php } ?>

      <?php //get_template_part( 'cat', $cb_blog_style ); ?>
    <div class="muftah-bold-separator"></div>
    <h3 class="muftah-special-collx">Special Collection</h3>

	<?php
	//show special collections
	$args = array(
	'type'                     => 'post',
	'child_of'                 => 3839,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 
); 

	
	$collections = get_categories( $args );
	//print_r($collections);
	echo '<ul class="muftah-special-collx">';
	foreach($collections as $collection):
	$category_link = get_category_link( $collection->term_id );
	//getting the category cover
	$cb_category_ad = get_tax_meta_strip($collection->term_id, 'cb_cat_ad');
	echo '<li class="muftah-special-collx"><div>
	<a href="'.$category_link.'">'. do_shortcode($cb_category_ad) .'</a><br>
	<a href="'.$category_link.'">'. $collection->cat_name.'</a>
	</div></li>';
	endforeach;
	echo '</ul>';
	?>


    </div> <!-- end #main -->

    <?php if ( $cb_blog_style != 'style-c' ) {} //get_sidebar(); } ?>

</div> <!-- end #cb-content -->

<?php get_footer(); ?>