<?php
/*
通常の投稿一覧
posts archive
 */
?>

<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">

    <h1 class="heading-lv2">Articles - 投稿・お知らせ</h1>
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
  </main>

</div>
<?php get_footer(); ?>
