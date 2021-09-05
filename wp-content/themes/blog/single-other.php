<?php
/*
otherの投稿詳細
other posts single
 */
?>
<?php
?>
<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">

    <h1 class="heading-lv3">
      <?php the_title(); ?>
    </h1>
    <p class="textTime">
    公開日：<?php the_time('Y-m-d'); ?>
    <?php if(get_the_time('Y-m-d') !== get_the_modified_date('Y-m-d')):?>
    更新日時：<?php the_modified_date('Y-m-d'); ?>
    <?php endif; ?>
    </p>
    
    
    <?php
      //カテゴリはある場合だけループ出力
      global $post;
      $slug = [];  //カテゴリを入れるの配列の初期化
      $terms = get_the_terms($post->ID, 'cat_other');
      echo '<ul class="listTag">';
      foreach ( $terms as $term ) {
        echo '<li class="listTag__item '.$term->slug.'">'.$term->name.'</li>';
      }
      echo '</ul>';
    ?>

    <div class="postContent">
      <?php the_content(); ?>
    </div>

    <p class="text">
      <a href="/other/">その他投稿一覧 へ戻る →</a>
    </p>
    
  </main>

</div>
<?php get_footer(); ?>
