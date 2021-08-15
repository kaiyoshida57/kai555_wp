<article id="<?php the_ID(); ?>" class="articleCard__item" <?php echo post_class(); ?>>
  <a href="<?php echo get_permalink(); ?>">
    <?php the_post_thumbnail(); ?>
    <h2 class="articleCard__title"><?php the_title(); ?></h2>
    <p class="articleCard__text"><?php echo get_the_excerpt(); ?></p>
    <time class="articleCard__time"><?php the_time('Y-m-d'); ?></time>

  </a>
</article>
