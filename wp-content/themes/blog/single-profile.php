<?php
/*
プロフィールの投稿詳細
profile single
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
    


    <div class="postContent">
      <?php
        $profile_textarea = post_custom('profile_textarea');
        $img = get_post_meta(get_the_ID(), 'profile_image', true);
        $imgUrl = wp_get_attachment_url($img);
        $profile_feature = post_custom('profile_feature');
      ?>

      <?php if ($img) : ?>
      <figure>
        <?php echo wp_get_attachment_image( $img , 'large' ); ?>
      </figure>
      <?php endif; ?>

      <?php if ($profile_textarea) : ?>
      <p class="txt">
        <?php echo $profile_textarea; ?>
      </p>
      <?php endif; ?>

      <?php if ($profile_feature || $profile_feature) : ?>
      <table class="table">
        <tbody>
          <tr>
            <th>特長</th>
            <td>
              <?php echo $profile_feature; ?>
            </td>
          </tr>
        </tbody>
      </table>
      <?php endif; ?>
      
      
    </div>

    <p class="text">
      <a href="/profile/">プロフィール一覧 へ戻る →</a>
    </p>

  </main>

</div>
<?php get_footer(); ?>
