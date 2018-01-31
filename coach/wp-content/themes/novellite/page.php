<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>
<?php get_header(); ?>
<?php $layout = novellite_get_layout(); ?>
	
    <div class="row">
    <div class="page-content <?php echo $layout; ?>">
<?php if ( $layout != 'no-sidebar' ) { ?>
    <div class="col-md-9 col-md-push-2">
<?php } else { ?>
    <div class="col-md-12">
<?php } ?>
        <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
		
        </div>
        <?php if ( $layout != 'no-sidebar' ) { ?>
                 <?php } ?>
            </div>
        </div>
        <div class="clear"></div>
		
<?php get_footer(); ?>