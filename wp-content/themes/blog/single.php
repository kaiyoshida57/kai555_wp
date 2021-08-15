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

    <h1 class="heading-lv3">
      <?php the_title(); ?>
    </h1>
    <p class="textTime">
    公開日：<?php the_time('Y-m-d'); ?>
    <?php if(get_the_time('Y-m-d') !== get_the_modified_date('Y-m-d')):?>
    更新日時：<?php the_modified_date('Y-m-d'); ?>
    <?php endif; ?>
    </p>

    <div class="postContent">
      <?php the_content(); ?>
    </div>

    
  </main>

</div>
<?php get_footer(); ?>
