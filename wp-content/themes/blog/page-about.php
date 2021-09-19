<?php
/*
Template Name: 固定ページabout
*/
?>

<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">


  
    <?php
    if(have_posts()): while(have_posts()): the_post();?>

    <h2 class="heading-lv2"><?php the_title(); ?></h2>

    <div class="inner">

      <p class="text">
        このサイトでは、私のコーディング勉強も兼ねて趣味を題材としたサイトを作成していきます。
        勉強内容を具体的に言うと、WordPressカスタマイズ、JavaScriptなどです。
      </p>
      <p class="text">
        どうせやるなら好きなものを、と思い、普段から私が応援しているサッカークラブのArsenal FCを選びました。<br>
        また、他の趣味のカテゴリーの記事なども紹介していく予定です。
      </p>
      <ul class="list">
        <li class="list_item">
          Arasenal FC
        </li>
      </ul>

    </div><!-- /.innner -->

    <?php endwhile; endif; ?>

  </main>
</div>
<?php get_footer(); ?>
