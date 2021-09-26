<?php
/*
通常の投稿一覧
posts archive
 */
?>
<?php 
$args = array(
  'orderby'            => 'description',
  'order'              => 'ASC',
  'hide_empty'         => true,    //投稿のないタームも取得するかどうか
  'fields'             => 'all',   //戻り値に何を返すか
  'hierarchical'       => true,    //親タームのIDを指定するとその子孫タームを全て返す
); 
$terms = get_tags( $args );
$list_src = "";
?>


<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">

    <h1 class="heading-lv2">Articles - 投稿・お知らせ</h1>

    <p class="text">タグ一覧<span class="icon_tag"></span></p>
    <?php 
    //カテゴリをリンク付きリストで出力
    foreach ( $terms as $t ) {
      $list_src .= '<li class="cat-item"><a href="'. get_term_link($t) .'">'. $t->name .' ('. $t->count .')</a></li>';
    }
    echo '<ul class="listCat">'. $list_src .'</ul>';
    ?>

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
