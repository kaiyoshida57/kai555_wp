<?php
/*
profile投稿一覧
profile archive*/
?>

<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">

    <h1 class="heading-lv2">
      <span class="font-en">Profile</span>
       - 選手プロフィール
    </h1>

    <!-- <p class="text">カテゴリー一覧</p>
    <ul class="listCat">
      <?php
        // カテゴリを階層維持してlist出力
        // $my_tax = 'cat_other';
        // $terms = get_terms( $my_tax, array('hide_empty' => true) );
        // echo walk_category_tree( $terms, 0 , array(
        //     'style' => 'list',
        //     'show_count' => true,
        //     'hide_empty' => true,
        // ));
      ?>
    </ul> -->


    <section class="profileCard">


      <?php
      $args = array(
        'post_type' => 'profile', 
        'posts_per_page' => 6,
        'no_found_rows' => false,  //ページャーを使う時はfalseに。
      );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post();
        ?>
        <article class="profileCard__item">
        <?php
          $profile_textarea = post_custom('profile_textarea');
          $img = get_post_meta(get_the_ID(), 'profile_image', true);
          $imgUrl = wp_get_attachment_url($img);
        ?>

          <a href="<?php the_permalink(); ?>" class="profileCard__link" >
            <h3 class="profileCard__title"><?php the_title(); ?></h3>
            <figure class="profileCard__image">
              <?php echo wp_get_attachment_image( $img , 'thumbnail' ); ?>
            </figure>
            <p class="profileCard__text">
              <?php echo $profile_textarea; ?>
            </p>
          </a>
        </article>

        <?php
            endwhile;
          endif;
          wp_reset_postdata();
        ?>
    </section>
    
  </main>

</div>
<?php get_footer(); ?>
