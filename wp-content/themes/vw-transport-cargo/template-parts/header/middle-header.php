<?php
/**
 * The template part for header
 *
 * @package VW Transport Cargo 
 * @subpackage vw_transport_cargo
 * @since VW Transport Cargo 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row m-0">
      <div class="col-lg-4 col-md-4 p-0">
        <?php dynamic_sidebar('social-widget'); ?>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="logo">
          <div class="logo-inner">
            <?php if( has_custom_logo() ){ vw_transport_cargo_the_custom_logo();
              }else{ ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo esc_html($description); ?></p>            
            <?php endif; } ?>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-md-3">
        <div class="top-btn">
          <?php if( get_theme_mod( 'vw_transport_cargo_button_text') != '' || get_theme_mod( 'vw_transport_cargo_button_url' )!= '' ) { ?>
            <a href="<?php echo esc_url(get_theme_mod('vw_transport_cargo_button_url',''));?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_button_text',''));?></a>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-1 col-md-1">
        <div class="search-box">
          <span><i class="fas fa-search"></i></span>
        </div>
      </div>
    </div>
    <div class="serach_outer">
      <div class="closepop"><i class="far fa-window-close"></i></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
    <?php get_template_part( 'template-parts/header/navigation' ); ?>
  </div>
</div>