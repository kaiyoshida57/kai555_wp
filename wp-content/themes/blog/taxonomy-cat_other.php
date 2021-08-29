<?php
/*
カスタムタクソノミーotherアーカイブ
other taxonomy archive
 */
?>

<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">

    <h1 class="heading-lv2">Other Articles - その他投稿</h1>
    <p class="text">
      <?php
      // アーカイブで現在のターム名を出力させる
      $nowterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      echo $nowterm->name;
      ?>
      の投稿一覧
    </p>
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
