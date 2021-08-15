<?php
/* index, archive-otherでインクルード */
?>
<article id="<?php the_ID(); ?>" class="articleCard__item" <?php echo post_class(); ?>>
  <a href="<?php echo get_permalink(); ?>">
    <?php the_post_thumbnail(); ?>
    <h2 class="articleCard__title"><?php the_title(); ?></h2>
    <p class="articleCard__text"><?php echo get_the_excerpt(); ?></p>
    <time class="articleCard__time"><?php the_time('Y-m-d'); ?></time>
    
    <?php
      if ( is_post_type_archive('post')) {
        // categoryをリンクなしでclass別に出力
        // $categories = get_the_category();
        // if ( $categories ) {
        //   echo '<ul class="listCat">';
        //   foreach ( $categories as $category ) {
        //     echo '<li class="listCat__item '.$category->slug.'">'.$category->name.'</li>';
        //   }
        //   echo '</ul>';
        // }

        //tagを出力。
        $tags = get_the_tags();
        if ( $tags ) {
          echo '<ul class="listTag">';
          foreach ( $tags as $tag ) {
            echo '<li class="listTag__item '.$tag->slug.'">'.$tag->name.'</li>';
          }
          echo '</ul>';
        }
      // otherならtaxonomy出力
      } elseif ( is_post_type_archive('other') ) {
        if ($terms = get_the_terms($post->ID, 'cat_other')) {
          echo '<ul class="listTag">';
          foreach ( $terms as $term ) {
            echo '<li class="listTag__item '.$term->slug.'">'.$term->name.'</li>';
          }
          echo '</ul>';
        }
      }
    ?>

  </a>
</article>
