<?php $back_to_top = get_theme_mod('novellite_backtotop_disable','0');?>
<input type="hidden" id="back-to-top" value="<?php echo $back_to_top?>"/> 
<div class="outer-footer">
<div class="container">
<div class="footer-widget-area">
        <?php
        /* A sidebar in the footer? Yep. You can can customize
         * your footer with four columns of widgets.
         */
        get_sidebar('footer');
        ?>
		</div>
    </div>
	</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php if (get_theme_mod('footertext','') != '') { ?>
		<span class="copyright"><?php echo esc_html(get_theme_mod('footertext','')); ?></span> 
			<?php } else { ?>
                    <p><?php _e('Created by ', 'novellite'); ?><a href="mailto:ltaylor82619@gmail.com">Lerie Taylor</a> <?php _e("Powered by ", 'novellite'); ?><a href="http://wordpress.org/">WordPress</a></p>
					<?php } ?>
			                </div>
                    </div>
        </div>
    </footer>
	<?php wp_footer(); ?>
</body>
</html>