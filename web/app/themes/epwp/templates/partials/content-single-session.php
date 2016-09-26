<article <?php post_class(); ?>>
  <header>
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <footer>
    <?php
    $when  = new DateTime( get_field( 'date', $post->ID, false ) );
    $start = DateTime::createFromFormat( 'U', get_field( 'start_time', $post->ID, false ) );
    $end   = DateTime::createFromFormat( 'U', get_field( 'end_time', $post->ID, false ) );
    ?>
    <?php
    if ( function_exists( 'get_field' ) ) {
      $speakers = get_field( 'speakers' );

      if ( $speakers ): ?>
        <h3>Speaker(s)</h3>
        <ul>
          <?php foreach ( $speakers as $speakerId ): ?>
            <li>
              <a href="<?php echo get_permalink( $speakerId ); ?>"><?php echo get_the_title( $speakerId ); ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif;
    }
    ?>
    <h3>when <span
        class="tag tag-pill tag-default"><?php echo $when->format( 'F j, Y' ) . ' ' . $start->format( 'H:i' ) . ' - ' . $end->format( 'H:i' ); ?></span>
    </h3>
    <h3>where <span class="tag tag-pill"><?php echo get_the_term_list( $post->ID, 'location', '', ' ' ); ?></span></h3>
  </footer>
</article>
