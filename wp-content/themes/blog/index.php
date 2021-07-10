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

    <h1><span>NEWS Page!</span></h1>
    <section>
      <h2 class="heading">
        最新のNEWS
        <span>Latest Posts</span>
      </h2>
      
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
