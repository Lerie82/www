<!-- Services Section -->
    <section id="section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <?php if (get_theme_mod('col_heading','') != '') { ?>
                        <h2 class="section-heading"><?php echo esc_html(get_theme_mod('col_heading')); ?></h2>
                        <?php } else { ?>
                            <h2 class="section-heading"><?php _e('Coaching' ,'doctorsline'); ?></h2>
                        <?php } ?>
                        <?php if (get_theme_mod('col_sub','') != '') { ?>
                            <h3 class="section-subheading text-muted"><?php echo esc_html(get_theme_mod('col_sub','')); ?></h3>
                        <?php } else { ?>
                            <h3 class="section-subheading text-muted"><?php _e('Phasellus elementum odio faucibus diam sollicitudin' ,'doctorsline'); ?></h3>
                        <?php } ?>
                </div>
            </div>
            <div class="row text-center servies">
            
                <div class="col-md-6 th-1">
                <div class="service-deg">
                   <span class="fa-stack fa-4x">
                    <a href="../personal-coaching/">
                        <!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
                        <i class="fa <?php
                        if (get_theme_mod('first_feature_font_icon','') != '') {
                            echo esc_html(get_theme_mod('first_feature_font_icon',''));
                        } else {
                            ?> fa-microphone <?php } ?> fa-stack-1x fa-inverse"></i></a>
                    </span>
                    <?php if (get_theme_mod('first_feature_heading','') != '') { ?>
                                <a href="<?php
                                if (get_theme_mod('first_feature_link','') != '') {
                                    echo esc_url(get_theme_mod('first_feature_link',''));
                                } else {
                                    echo "../personal-coaching/";
                                }
                                ?>"><h4 class="service-heading"><?php echo esc_html(get_theme_mod('first_feature_heading','')); ?></h4></a>
                               <?php } else { ?>
                                <a href="../personal-coaching/"><h4 class="service-heading"><?php _e('Personal Coaching' ,'doctorsline'); ?></h4></a>
                                 <?php } if (get_theme_mod('first_feature_desc','') != '') { ?>
                                <p class="text-muted"><?php echo esc_html(get_theme_mod('first_feature_desc','')); ?></p>
                            <?php } else { ?>
                               <p class="text-muted">
								   <ul>
									   <li>Building Your Confidence</li>
									   <li>Empowerment</li>
									   <li>Getting Things Done (GTD) and Time Management</li>
									   <li>Organizational Skills</li>
									   <li>Long-term planning</li>
									   <li>Short-term planning</li>
									   <li>Going with the flow, letting things be</li>
									   <li>Relationship Coaching</li>
									   <li>Self-Care and Self Love</li>
									   <li>Sexual Health</li>
									   <li>Forgiveness</li>
									   <li>Social Skills</li>
									   <li>Destroy Limiting Beliefs</li>
									   <li>Emotional Oneness</li>
									   <li>Emotional Protection</li>
									   <li>Managing Commitments</li>
								</ul>
								</p>
                            <?php } ?>
                </div>
                </div>
                <div class="col-md-6 th-2">
                <div class="service-deg-2">
                    <span class="fa-stack fa-4x">
                     <a href="../business-coaching/">
                        <!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
                        <i class="fa <?php
                                if (get_theme_mod('second_feature_font_icon','') != '') {
                                    echo esc_html(get_theme_mod('second_feature_font_icon',''));
                                } else {
                                    ?> fa-rocket <?php } ?> fa-stack-1x fa-inverse"></i>
                                    </a>
                    </span>
                    <?php if (get_theme_mod('second_feature_heading','') != '') { ?>
                                <a href="<?php
                                if (get_theme_mod('second_feature_link','') != '') {
                                    echo esc_url(get_theme_mod('second_feature_link',''));
                                } else {
                                    echo "#";
                                }
                                ?>"><h4 class="service-heading"><?php echo esc_html(get_theme_mod('second_feature_heading','')); ?></h4></a>
                               <?php } else { ?>
                                <a href="../business-coaching/"><h4 class="service-heading"><?php _e('Business Coaching' ,'doctorsline'); ?></h4></a>
                                 <?php } if (get_theme_mod('second_feature_desc','') != '') { ?>
                                <p class="text-muted"><?php echo esc_html(get_theme_mod('second_feature_desc','')); ?></p>
                            <?php } else { ?>
                               <p class="text-muted">
								<ul>
								<li>Starting a Business</li>
								<li>Re-branding Your Business</li>
								<li>Bringing Life Back into Your Business</li>
								<li>Expanding Your Business</li>
								<li>Diversity in the Workplace</li>
								<li>Working with different personality types</li>
								<li>Gaining buy-in from employees and peers</li>
								<li>Change management and strategic planning</li>
								<li>Conflict management and Mediation</li>
								<li>Balancing work and family life</li>
								</ul></p>
                            <?php } ?>
                </div>
                </div>
				
                            </div>
        </div>
    </section>