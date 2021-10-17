<?php
/*
通常の投稿詳細
posts single
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
    公開日：<time itemprop="datePublished" content="<?php the_time('Y-m-d'); ?>" class=""><?php the_time('Y-m-d'); ?></time>
    <?php if(get_the_time('Y-m-d') !== get_the_modified_date('Y-m-d')):?>
    更新日時：<time itemprop="datePublished" content="<?php the_modified_date('Y-m-d'); ?>" class=""><?php the_modified_date('Y-m-d'); ?></time>
    <?php endif; ?>
    </p>
    
    
    <?php
      //タグはある場合だけループ出力
      global $post;
      $tags = [];  //タグを入れるの配列の初期化
      if( get_the_tags( $post->ID ) ) {
        echo '<ul class="listTag">';
        foreach ( ( get_the_tags( $post->ID ) ) as $tag ) {
          array_push($tags, $tag->slug);
          echo '<li class="listTag__item '.$tag->slug .'"> '.$tag->name; '.</li>';
        }
        echo '</ul>';
      }
    ?>

    <div class="postContent">
      <?php the_content(); ?>
    </div>

    <p class="text-center">
      <a href="<?php echo esc_url(home_url()); ?>/articles/" class="button button--link">投稿一覧へ戻る</a>
    </p>

  </main>

</div>
<?php get_footer(); ?>
