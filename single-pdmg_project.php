<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pdmg
 */

get_header();
?>
  <header class="st-header st-style1 st-sticky-menu">
    <div class="st-main-header">
      <div class="container">
        <div class="st-main-header-in">
          <div class="st-site-branding" >
            <a href="#home" class="st-logo-link">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="logo">
            </a>
          </div>
          <div class="st-footer-social">
            <ul class="st-footer-social-btn st-flex st-mp1">
              <li><a href="https://www.facebook.com/mirne.zhittya/"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://www.instagram.com/povernis_do_mirnogo_zhittya/"><i class="fab fa-instagram"></i></a></li>
              <li><a href="tel:0637029797"><i class="fas fa-phone"></i></a></li>
              <li><a href="mailto:ngo.RPL@gmail.com"><i class="fas fa-envelope"></i></a></li>
            </ul>
          </div>
          <div class="st-nav-wrap st-fade-down">
            <div class="st-nav-toggle st-style1">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <nav class="st-nav st-desktop-nav">
				<ul class="st-nav-list onepage-nav">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="smooth-scroll">Головна</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#project' ) ); ?>" class="smooth-scroll">Проєкти</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#service' ) ); ?>" class="smooth-scroll">Послуги</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#team' ) ); ?>" class="smooth-scroll">Команда</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#blog' ) ); ?>" class="smooth-scroll">Новини</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="smooth-scroll">Контакти</a></li>
				</ul> 
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>


	<div class="st-blog-wrap st-section" id="blog">
		<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
			<article class="post">
				<header class="entry-header">
					<div class="post-details-wrap-outer">
					</div><!-- .post-details-wrap-outer -->
				</header><!-- .entry-header -->
				<div class="entry-content">
				<h1><?php the_title();?></h1>
					<p><?php the_content();?></p>
				</div>
			</article>
			</div>
		</div>
		</div>
	</div>


<?php
get_footer();
?>
