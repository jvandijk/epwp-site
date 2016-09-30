<article <?php post_class(); ?>>
  <header>
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
  <div class="entry-content">
    <?php the_post_thumbnail([200, 200]); ?>
    <?php the_content(); ?>
  </div>
  <footer>
    <?php

    // reverse relation lookup
    $sessions = get_posts( array(
      'post_type'  => 'session',
      'meta_query' => array(
        array(
          'key'     => 'speakers',
          'value'   => '"' . get_the_ID() . '"',
          'compare' => 'LIKE'
        )
      )
    ) );

    ?>
    <?php if ( $sessions ): ?>
      <h3>Session(s)</h3>
      <ul>
        <?php foreach ( $sessions as $session ): ?>
          <li>
            <a class="open-session" data-id="<?php echo $session->ID; ?>" href="<?php echo get_permalink( $session->ID ); ?>">
              <?php echo get_the_title( $session->ID ); ?>
            </a>
            <div id="single-speaker-container-<?php echo $session->ID; ?>" />
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </footer>
</article>
