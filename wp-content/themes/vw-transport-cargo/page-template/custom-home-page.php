<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_transport_cargo_before_slider' ); ?>

<?php if( get_theme_mod( 'vw_transport_cargo_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_transport_cargo_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $excerpt,30 ) ); ?></p>
              <div class="more-btn">
                <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'vw-transport-cargo' ); ?><i class="fa fa-angle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>

<?php do_action( 'vw_transport_cargo_after_slider' ); ?>

<?php if ( get_theme_mod('vw_transport_cargo_call_text','') != "" | get_theme_mod('vw_transport_cargo_call','') != "" | get_theme_mod('vw_transport_cargo_email_text','') != "" | get_theme_mod('vw_transport_cargo_email','') != "" | get_theme_mod('vw_transport_cargo_time_text','') != "" | get_theme_mod('vw_transport_cargo_time','') != "" ) {?>
<section id="contact_us">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-3">
        <div class="row">
          <?php if ( get_theme_mod('vw_transport_cargo_call_text','') != "" | get_theme_mod('vw_transport_cargo_call','') != "" ) {?>
            <div class="col-lg-2 col-md-3">
              <i class="fas fa-phone"></i>
            </div>
            <div class="col-lg-10 col-md-9">
              <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_call_text','') ); ?></p>
              <p><?php echo esc_html( get_theme_mod('vw_transport_cargo_call','') ); ?></p>
            </div>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-4 col-md-5">
        <div class="row">
          <?php if ( get_theme_mod('vw_transport_cargo_email_text','') != "" | get_theme_mod('vw_transport_cargo_email','') != "" ) {?>
            <div class="col-lg-2 col-md-2">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="col-lg-10 col-md-10">
              <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_email_text','') ); ?></p>
              <p><?php echo esc_html( get_theme_mod('vw_transport_cargo_email','') ); ?></p>
            </div>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="row">
          <?php if ( get_theme_mod('vw_transport_cargo_time_text','') != "" | get_theme_mod('vw_transport_cargo_time','') != "" ) {?>
            <div class="col-lg-2 col-md-3">
              <i class="far fa-clock"></i>
            </div>
            <div class="col-lg-10 col-md-9">
              <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_time_text','') ); ?></p>
              <p><?php echo esc_html( get_theme_mod('vw_transport_cargo_time','') ); ?></p>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php do_action( 'vw_transport_cargo_after_contact' ); ?>

<section id="sec_second" class="container">
  <div class="row m-0">
    <div class="col-lg-5 col-md-5">
      <section id="about">
        <?php $pages = array();
          $mod = absint( get_theme_mod( 'vw_transport_cargo_about_page' ));
          if ( 'page-none-selected' != $mod ) {
            $pages[] = $mod;
          }
          if( !empty($pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  <span>______</span></h3>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $excerpt,15 ) ); ?></p>
                <?php the_post_thumbnail(); ?>
              <?php endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif; wp_reset_postdata() ?>
        <div class="clearfix"></div>
      </section>
    </div>
    <div class="col-lg-7 col-md-7">
      <section id="service-sec">        
        <?php
          $catData =  get_theme_mod('vw_transport_cargo_services','');
          if($catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'vw-transport-cargo'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="row cat_box">
              <div class="col-lg-4 col-md-4">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="col-lg-8 col-md-8">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  <span>______</span></h4>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $excerpt,15 ) ); ?></p>  
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>      
      </section>
    </div>
  </div>
</section>

<?php do_action( 'vw_transport_cargo_after_services' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>