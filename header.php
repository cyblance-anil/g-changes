<?php
/**
 * Theme Header
 *
 */

global $e404_options;
if($post) {
	$e404_options['post_id'] = $post->ID;
	$e404_options['post_parent'] = $post->post_parent;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?=OF_DIRECTORY?>/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?=OF_DIRECTORY?>/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" media="all" href="<?=OF_DIRECTORY?>/css/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?=OF_DIRECTORY?>/css/jquery.mCustomScrollbar.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?=OF_DIRECTORY?>/css/custom.css"/>



<link rel="profile" href="http://gmpg.org/xfn/11"/>

    
<!--<script src="<?=OF_DIRECTORY?>/js/jquery.bpopup.min.js" type="text/javascript"></script>
    
<script src="<?=OF_DIRECTORY?>/js/owl.carousel.js" type="text/javascript"></script>
    
<script src="<?=OF_DIRECTORY?>/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>-->
    
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
    if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
    wp_head();
?>
</head>

<body>
<?php do_action('after_body'); ?>
<div class="section section_navbar"> 
	<a class="nav_logo" href="<?php echo home_url(); ?>"><img src="<?php echo $e404_options['logo_url']; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" /></a>
		<div class="search">
		<form action="<?php echo home_url(); ?>" method="get">
			<input type="text" name="s" value="" placeholder="Search"/>
			<div class="input-group-btn">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-primary">
						<span class="fa fa-search" aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</form>
	</div>
    
    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'navbar', 'link_before' => '', 'link_after' => '')); ?>

</div>
	
<div id="main_wrapper">
	<div class="custom_wrapper">
	<div id="header">
    <div class="header_wrapper">
	   <div class="leftside" id="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $e404_options['logo_url']; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" /></a>
      </div>
        <div class="header_nav rightside">         
            <div class="menu_social">
				<ul class="social_icon">
                    <li><a href="https://www.facebook.com/georgia4h" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="https://twitter.com/Georgia4H" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.linkedin.com/company/georgia-4-h" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="https://www.flickr.com/photos/georgia4-h/albums" target="_blank"><i class="fa fa-flickr"></i></a></li>
                    <li><a href="https://www.instagram.com/georgia4h/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>				
				<a href="<?php echo home_url(); ?>/calendar"><button class="button calendar">Calendar</button></a>	
				<a href="http://georgia4hfoundation.org/general-donation/" target="_blank"><button class="button doller">DONATE</button></a>
				
            </div>
			<div id="Mobile_nav" class="Mobile_nav">
				<div class="navicon-line top"></div>
				<div class="navicon-line center"></div>
				<div class="navicon-line bottom"></div>
			</div>
        </div>
		
		<div id="navbar"class="header-menu">
			<div class="search">
				<form action="<?php echo home_url(); ?>" method="get">
					<input type="text" name="s" value="" placeholder="Search"/>
					<div class="input-group-btn">
						<div class="btn-group" role="group">
							<button type="submit" class="btn btn-primary">
								<span class="fa fa-search" aria-hidden="true"></span>
							</button>
						</div>
					</div>
				</form>
			</div>
			
			<div class="onscroll-menu">						
				<div class="search-box-onscroll">					
					<img src="<?=OF_DIRECTORY?>/images/search-onscroll.jpg"/>
				</div>
				<form class="Search-from" action="<?php echo home_url(); ?>" method="get">
					<input type="text" name="s" value="" class="form-control pull-left" placeholder="Search...">
				</form>					
				<a href="<?php echo home_url(); ?>/calendar">
					<img src="<?=OF_DIRECTORY?>/images/Calendar-onscroll.jpg"/>
				</a>
				<a target="_blank" href="http://georgia4hfoundation.org/general-donation/">
					<img src="<?=OF_DIRECTORY?>/images/donate-onscroll.jpg"/>
				</a>				
			</div>
				
            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'dy-desktop', 'link_before' => '', 'link_after' => '<span></span>')); ?>
            <?php //wp_nav_menu( array( 'theme_location' => 'max_mega_menu_1', 'link_after' => '<span></span>' ) ); ?>
		</div>
		
    </div>
	<!--<div id="header_nav" class="rightside">
		<?php if(!$e404_options['remove_top_contact_box']) : ?>
		<div id="header_info" class="leftside">
			<?php echo $e404_options['top_contact_box']; ?>
		</div>
		<?php endif; ?>
		<div id="social_icons" class="leftside">
			<?php e404_show_header_social_icons(); ?>
		</div>
		<br class="clear" />
	</div>-->
</div>

<script>
jQuery(function($) {
    jQuery("ul.dy-desktop > li.menu-item-has-children > a").each(function(index) {
        var menuTitle = jQuery(this).html();
        jQuery(this).parent('li').find('ul').eq(0).prepend('<li class="sub-menu-title">'+menuTitle+'</li>');
    });
    
    jQuery( "ul.dy-desktop > li.menu-item-has-children").append('<span></span>')
    jQuery( "ul.dy-desktop > li > a" ).click(function(e) {
        //e.preventDefault();
    });
    
    jQuery( "ul.dy-desktop > li > span" ).click(function() {
        jQuery('ul.dy-desktop .sub-menu').fadeOut();
        var subMenu=  jQuery(this).parents('li').find('ul.sub-menu');	
        if ( jQuery( subMenu ).is( ":hidden" ) ) {
            jQuery(subMenu).fadeIn(function() {
                var windowHi = jQuery(window).height();
                var headerHi = jQuery("#header").innerHeight();
                var SubmenuHi = windowHi - headerHi -20;
                jQuery(".dy-desktop ul.sub-menu").css('max-height',SubmenuHi+'px');
            });
            jQuery( "ul.dy-desktop > li").removeClass('active');
            jQuery(this).parents('li').addClass('active');
        } else {
            jQuery(subMenu).fadeOut();
            jQuery(this).parents('li').removeClass('active');
        }
    });
    jQuery( ".dy-desktop .sub-menu-title span" ).click(function() {
        jQuery("ul.dy-desktop > li").removeClass('active');
        jQuery('.dy-desktop ul.sub-menu').fadeOut();
    });
    jQuery(window).resize(function($) {
        var windowHi = jQuery(window).height();
        var headerHi = jQuery("#header").innerHeight();
        var SubmenuHi = windowHi - headerHi -20;
        jQuery(".dy-desktop ul.sub-menu").css('max-height',SubmenuHi+'px');
    });
	
	
	
	jQuery( "ul.navbar > li.menu-item-has-children").append('<span></span>')
	jQuery( "ul.navbar > li > span" ).click(function() {
        jQuery('ul.navbar .sub-menu').slideUp();
        var subMenu=  jQuery(this).parents('li').find('ul.sub-menu');	
        if ( jQuery( subMenu ).is( ":hidden" ) ) {
            jQuery(subMenu).slideDown(function() {
               // var windowHi = jQuery(window).height();
              //  var headerHi = jQuery("#nav_logo").innerHeight();
              //  var SubmenuHi = windowHi - headerHi -20;
                //jQuery(".navbar ul.sub-menu").css('max-height',SubmenuHi+'px');
            });
            jQuery( "ul.navbar > li").removeClass('active');
            jQuery(this).parents('li').addClass('active');
        } else {
            jQuery(subMenu).slideUp();
            jQuery(this).parents('li').removeClass('active');
        }
    });
	
	function initMenu() {
		jQuery( ".insidepage-menu ul.sub-menu > li.menu-item-has-children > a").append('<span class="dcjq-icon"></span>')
		//jQuery('.insidepage-menu ul.sub-menu > li > ul.sub-menu').hide();
		/*jQuery('.insidepage-menu ul li .sub-menu .menu-item-has-children a').click(function() {
		  var checkElement = $(this).next();
		  if ((checkElement.is('.insidepage-menu .sub-menu')) && (checkElement.is(':hidden'))) {
            //jQuery('.insidepage-menu ul li .sub-menu').slideUp();
            //jQuery('.insidepage-menu ul li .sub-menu li').removeClass("active");
			jQuery(this).addClass("active");
			checkElement.slideDown(165, 'linear');
              
			//$(this).parent().siblings("li").children("a").removeClass("active");
			//$(this).parent().siblings("li").children("a").next(".sub-menu").slideUp(160, 'linear');
			return false;
		  }

		  if(jQuery(this).hasClass("active")) {
			jQuery(this).removeClass("active");
			checkElement.slideUp(160, 'linear');
		  }
		});*/
    
        var allPanels = jQuery('.insidepage-menu ul li .sub-menu .sub-menu').hide();
        var allActive = jQuery('.insidepage-menu ul li .sub-menu a');
        jQuery('.insidepage-menu ul.menu > li > ul.sub-menu > li > a').click(function(event) {
            event.stopPropagation();
        });
        jQuery('.insidepage-menu ul.menu > li > ul.sub-menu > li.current_page_item > .sub-menu').show();
        jQuery('.insidepage-menu ul.menu > li > ul.sub-menu > li.current_page_item > a').addClass("active");
        jQuery('.insidepage-menu ul.menu > li > ul.sub-menu > li.current_page_ancestor > .sub-menu').show();
        jQuery('.insidepage-menu ul.menu > li > ul.sub-menu > li.current_page_ancestor > a').addClass("active");
        
        jQuery('.insidepage-menu ul.menu > li > ul.sub-menu > li > a > .dcjq-icon').click(function() {
            if(jQuery(this).parent('a').hasClass("active")){
                allPanels.slideUp(160, 'linear');
                allActive.removeClass("active");
                return false;
            } else {
                allPanels.slideUp(160, 'linear');
                allActive.removeClass("active");
                if (jQuery('.insidepage-menu ul.menu > li > ul.sub-menu > li > .sub-menu').is(':hidden')) {
                    jQuery(this).parent().addClass("active");
                    jQuery(this).parent().next().slideDown(165, 'linear');
                    return false;

                } else {
                    jQuery(this).parent().removeClass("active");
                    jQuery(this).parent().next().slideUp(160, 'linear');
                }
            }
            
        });
        
	  } // End initMenu()

	  initMenu();
});

</script>
