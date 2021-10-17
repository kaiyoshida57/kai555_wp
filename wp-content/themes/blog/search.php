<?php
/*
404
 */
?>

<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">

    <h2 class="heading-lv2">検索結果 Search Result</h2>

    <?php if (have_posts()): ?>
      <?php
        if (isset($_GET['s']) && empty($_GET['s'])) {
          echo '<p class="text">検索キーワードが未入力です</p>'; // 検索キーワードが未入力の場合のテキストを指定
        } else {
          echo '<p class="text">“'.$_GET['s'] .'”の検索結果：<span class="text-red">'.$wp_query->found_posts .'件</span></p>'; // 検索キーワードと該当件数を表示
        }
      ?>
      <section class="articleCard">
        
      <?php while(have_posts()):

        echo the_post();
        get_template_part( 'excerpt' ); // 管理しやすいように抜粋記事パーツはまとめておく

      endwhile; ?>

    </section>
    <?php else: ?>
      <p class="text">検索されたキーワードにマッチする記事はありませんでした</p>
    <?php endif; ?>
    
  </main>

</div>
<?php get_footer(); ?>
