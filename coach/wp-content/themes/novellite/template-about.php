<?php
/*
  Template Name: About Page
 */
?>

<?php get_header();      
// slider template
//get_template_part( 'template/home','slider'); 

    //-- All section loop --
    $section = array('section_about');

        foreach(get_theme_mod('home_sorting',$section) as $value):
        get_template_part( 'template/'.$value); 
        endforeach;
?>
    <div id ="slspeed" sliderspeed="<?php if ((get_theme_mod('second_slider_image') != '') ) { echo true; } else { echo false;  } ?>"></div>
<?php get_footer(); ?>