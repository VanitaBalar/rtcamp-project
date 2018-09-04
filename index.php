<!DOCTYPE html>
<html>
    <head>
        <title>RT CAMP DEMO THEME</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-grid.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-reboot.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/tab.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/easy-responsive-tabs.css">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    </head>
    <body>
        <?php get_header(); ?>
        <div class="vanislider">
            <div class="container">
                <div class="slide-contain">
                    <div class="banner-slider">
						<?php
							$query = new WP_Query( array( 'post_type' => 'slider' ) );
							$posts = $query->posts;
							foreach($posts as $post) 
							{	
						?>
                        <div class="ban-slide">
                            <div class="slider-info">
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>">
                                <div class="slider-content-holder">
                                    <div class="slider-content">
                                        <h3><?php echo the_title(); ?></h3>
                                        <p><?php echo $post->post_content;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
							}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container spaceupdown">
            <div class="row">
                <div id="verticalTab">
                    <ul class="resp-tabs-list">
						<?php
							$query = new WP_Query( array( 'post_type' => 'page', 'order'=>'ASC' ,'post_parent' => 12) );
							$posts = $query->posts;
							foreach($posts as $post) 
							{	
						?>
                        <li><?php echo the_title();?></li>
						<?php
							}
						?>
                    </ul>
                    <div class="resp-tabs-container">
						<?php
							$query = new WP_Query( array( 'post_type' => 'page', 'order'=>'ASC' ,'post_parent' => 12) );
							$posts = $query->posts;
							foreach($posts as $post) 
							{
						?>
                        <div>
							
                            <div class="row">
								<?php
									$parent_id = get_the_id();
									$query1 = new WP_Query(array( 'posts_per_page' => 3,'post_type' => 'page', 'order'=>'ASC' ,'post_parent' => $parent_id) );
									$posts1 = $query1->posts;
									if(!empty($posts1))
									{
									foreach($posts1 as $post1) 
									{
								?>
                                <div class="col-md-4">
                                    <div class="postimg">
                                        <img src="<?php echo get_the_post_thumbnail_url($post1->ID); ?>" class="img2">
                                        <p class="img2title"><?php echo $post1->post_title;?></p>
                                        <p class="img2desc"><?php echo $post1->post_content;?></p>
                                    </div>
                                </div>
								<?php
									}
									}
								else
								{
									echo 'No Pages Found';
								}
								?>
                            </div>
                        </div>
						
						<?php
							}
						?>
                    </div>
                </div>
            </div>
        </div>
		<?php get_footer(); ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-latest.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/easy-responsive-tabs.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiperRunner.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
        <script>
            $(document).ready(function() {
                $('.banner-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    vertical: true,
                    fade: false,
                    dots: true,
                    autoplay: true,
                    arrows: true,
                    prevArrow: '<button class="slick-prev" aria-label="Previous" type="button"><i class="jcon-left-open-mini"></i></button>',
                    nextArrow: '<button class="slick-next" aria-label="Next" type="button"><i class="jcon-right-open-mini"></i></button>',
                });
             });
        </script>
        <script>
            $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
            }
            });
            $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
            });
            });
        </script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);
            
            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>