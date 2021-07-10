<article id="<?php the_ID(); ?>" class="article" <?php echo post_class(); ?>>
  <a href="<?php echo get_permalink(); ?>">
    <?php 
      the_title();
      the_excerpt();
    ?>
  </a>
</article>
