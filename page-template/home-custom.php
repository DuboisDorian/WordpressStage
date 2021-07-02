<?php
/**
 * Template Name: Home Custom Page
 */
get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'aagaz_startup_before_slider' ); ?>

  <?php if( get_theme_mod('aagaz_startup_slider_arrows', false) != '' || get_theme_mod('aagaz_startup_enable_disable_slider', false) != ''){ ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('aagaz_startup_slider_speed', 3000)); ?>"> 
        <?php $aagaz_startup_slider_pages = array();
          for ( $count = 0; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'aagaz_startup_slide_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $aagaz_startup_slider_pages[] = $mod;
            }
          }
          if( !empty($aagaz_startup_slider_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $aagaz_startup_slider_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <?php if( get_theme_mod('aagaz_startup_slider_title',true) != ''){ ?>
                  <h1 class="text-uppercase"><?php the_title(); ?></h1>
                <?php } ?>
                <?php if( get_theme_mod('aagaz_startup_slider_content',true) != ''){ ?>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( aagaz_startup_string_limit_words( $excerpt, esc_attr(get_theme_mod('aagaz_startup_slider_excerpt_number','20')))); ?></p>
                <?php } ?>
                <?php if (get_theme_mod( 'aagaz_startup_slider_button',true) != '' || get_theme_mod( 'aagaz_startup_show_hide_slider_button',true) != ''){ ?>
                  <?php if( get_theme_mod('aagaz_startup_slider_button_text','READ MORE') != ''){ ?>
                    <div class ="readbutton mt-3">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('aagaz_startup_slider_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('aagaz_startup_slider_button_text','READ MORE'));?></span></a>
                    </div>
                  <?php } ?>
                <?php } ?>
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
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left py-3 px-lg-4 px-3"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','aagaz-startup' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right py-3 px-lg-4 px-3"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','aagaz-startup' );?></span>
        </a>
      </div> 
      <div class="clearfix"></div>
    </section> 
  <?php }?> 

  <?php do_action( 'aagaz_startup_after_slider' ); ?>

  <?php if( get_theme_mod('aagaz_startup_about_page') != ''){ ?>
    <section id="about" class="py-5">
      <div class="container">
        <?php $aagaz_startup_slider_pages = array();
          $mod = absint( get_theme_mod( 'aagaz_startup_about_page'));
          if ( 'page-none-selected' != $mod ) {
            $aagaz_startup_slider_pages[] = $mod;
          }
        if( !empty($aagaz_startup_slider_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $aagaz_startup_slider_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="about-text p-md-0 p-2">
            <?php if( get_theme_mod('aagaz_startup_title') != ''){ ?>
              <h2 class="p-0 text-uppercase"><?php echo esc_html(get_theme_mod('aagaz_startup_title','')); ?></h2>
              <hr class="my-3 mx-0">
            <?php }?>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <h3 class="text-uppercase"><?php the_title(); ?></h3>
                <?php the_excerpt();  ?>
                <div class ="aboutbtn mt-4">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','aagaz-startup'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','aagaz-startup' );?></span></a>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 mt-md-0 mt-4">
                <div class="abt-image my-4 mx-lg-4">
                  <?php the_post_thumbnail(); ?>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php else : ?>
                <div class="no-postfound"></div>
            <?php endif;
            endif;
            wp_reset_postdata()?>
            <div class="clearfix"></div> 
          </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'aagaz_startup_after_about' ); ?>

  <div class="container text">
    <?php while ( have_posts() ) : the_post();?>
      <?php the_content(); ?>
    <?php endwhile; // End of the loop.
    wp_reset_postdata(); ?>
  </div>
</main>

<?php get_footer(); ?>