<?php get_header(); ?>
  <div id="container">
    <section id="content" <?php pinboard_content_class(); ?>>
      <?php if( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <div class="entry">
            <header class="entry-header">
              <<?php pinboard_title_tag( 'post' ); ?> class="entry-title"><?php the_title(); ?></<?php pinboard_title_tag( 'post' ); ?>>
              <?php pinboard_entry_meta(); ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
              <?php if( has_post_format( 'audio' ) ) : ?>
                <p><?php pinboard_post_audio(); ?></p>
              <?php elseif( has_post_format( 'video' ) ) : ?>
                <p><?php pinboard_post_video(); ?></p>
              <?php endif; ?>
              <?php the_content(); ?>
              <div class="clear"></div>
            </div><!-- .entry-content -->
            <footer class="entry-utility">
              <?php wp_link_pages( array( 'before' => '<p class="post-pagination">' . __( 'Pages:', 'pinboard' ), 'after' => '</p>' ) ); ?>
              <?php the_tags( '<div class="entry-tags">', ' ', '</div>' ); ?>
              <?php pinboard_social_bookmarks(); ?>
              <?php pinboard_post_author(); ?>
            </footer><!-- .entry-utility -->
            <?php if ($single) { ?>
            <div class="nextprev">
              <?php if ( get_adjacent_post( $in_same_cat = true, '', $previous = true ) ) : ?>
					  <span class="prev"><?php previous_post_link('%link', '&lsaquo; Previous: %title', true ); ?></span>
              <?php else : ?>
					  <?php $last_post = array_pop( get_boundary_post( $in_same_cat = true, '', $oldest = false ) ); ?>
					  <span class="prev">&lsaquo; <a href="<?php echo get_permalink( $last_post ); ?>">Last: <?php echo $last_post->post_title; ?></a></span>
              <?php endif; ?>
              <?php if ( get_adjacent_post( $in_same_cat = true, '', $previous = false ) ) : ?>
					  <span class="next"><?php next_post_link('%link', 'Next: %title &rsaquo;', true ); ?></span>
              <?php else : ?>
					  <?php $first_post = array_pop( get_boundary_post( $in_same_cat = true, '', $oldest = true ) ); ?>
					  <span class="next"><a href="<?php echo get_permalink( $first_post ); ?>">First: <?php echo $first_post->post_title; ?> &rsaquo;</a></span>
              <?php endif; ?>
            </div>
            <?php } ?>
          </div><!-- .entry -->
          <?php comments_template(); ?>
        </article><!-- .post -->
      <?php else : ?>
        <?php pinboard_404(); ?>
      <?php endif; ?>
    </section><!-- #content -->
    <?php if( ( 'no-sidebars' != pinboard_get_option( 'layout' ) ) && ( 'full-width' != pinboard_get_option( 'layout' ) ) ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>
  </div><!-- #container -->
<?php get_footer(); ?>
