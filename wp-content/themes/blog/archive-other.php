<?php
/*
other投稿一覧
other archive*/
?>



<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">

    <h1 class="heading-lv2">Other Articles - その他投稿</h1>

    <p class="text">カテゴリー一覧<span class="icon_category"></span></p>
    <ul class="listCat">
      <?php
        // カテゴリを階層維持してlist出力
        $my_tax = 'cat_other';
        $terms = get_terms( $my_tax, array('hide_empty' => true) );
        echo walk_category_tree( $terms, 0 , array(
            'style' => 'list',
            'show_count' => true,
            'hide_empty' => true,
        ));
      ?>
    </ul>


    <section class="articleCard">
      
      <?php
        if( have_posts() ) :
          while ( have_posts() ) :

            echo the_post();
            get_template_part( 'excerpt' ); // 管理しやすいように抜粋記事パーツはまとめておく

          endwhile;
        endif;
      ?>
    </section>

    <?php the_posts_pagination(); ?>

  </main>


</div>
<?php get_footer(); ?>
