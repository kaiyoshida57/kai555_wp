<?php
/*
top page
 */
?>

<?php get_header(); ?>

<div class="wrapper">

  <?php get_sidebar(); ?>

  <main class="main" role="main">
    <div class="intro">
      <figure class="intro__character">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/common/images/img_saurus.png" alt="dinosaur" width="200" height="">
        <figcaption class="intro__character__caption">
          <strong>管理人</strong>
        </figcaption>
      </figure>

      <section class="intro__box">
        <!-- <h1 class="heading-lv1"><span>ようこそ</span></h1> -->
        <p class="text">
          こんにちは!<br>
          ここは私のコーディング勉強を兼ねた趣味のブログです。良かったらご覧ください。
        </p>
        <p class="text">
          特に、私が好きなイングランドのサッカークラブ
          <strong class="text-l">
            <a href="https://www.arsenal.com/" rel="noopener">Arsenal FC</a>
          </strong>
          を紹介していきます。
        </p>
        <p class="note">
          当サイトの環境について：<br>
          ブラウザはIEは非対応となっておりますので、Chrome,Firefox,Safariなどで閲覧ください。
        </p>
      </section>
    </div>
    <!-- /.top-intro -->

    <section class="section-guidance">
      <h2 class="heading-lv2">サイト案内</h2>

      <div class="card">

      <article class="card__item">
          <a href="<?php echo esc_url(home_url()); ?>/articles/" class="card__link">
            <figure class="card__image">
              <h3 class="card__title">Articles - 投稿・お知らせ</h3>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/common/images/img_card_02.jpg" alt="arsenal articles" width="" height="320">
            </figure>
            
            <p class="card__text">Arsenalやサイト更新情報の投稿です。</p>
          </a>
        </article>

        <article class="card__item">
          <a href="<?php echo esc_url(home_url()); ?>/other/" class="card__link">
            <figure class="card__image">
              <h3 class="card__title">Other Articles - その他投稿</h3>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/common/images/img_card_04.jpg" alt="other" width="" height="320">
            </figure>
            <p class="card__text">Arsenalのその他投稿についての投稿です。</p>
          </a>
        </article>

        <article class="card__item">
          <a href="<?php echo esc_url(home_url()); ?>/about/" class="card__link">
            <figure class="card__image">
              <h3 class="card__title">About - 当サイトについて</h3>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/common/images/img_card_01.jpg" alt="about a Arsenal" width="" height="320">
            </figure>
            
            <p class="card__text">当サイトの説明、そしてArsenalについての紹介です。</p>
          </a>
        </article>

        <article class="card__item">
          <a href="<?php echo esc_url(home_url()); ?>/profile/" class="card__link">
            <figure class="card__image">
              <h3 class="card__title">Profile - 選手紹介</h3>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/common/images/img_card_03.jpg" alt="選手紹介" width="" height="320">
            </figure>
            <p class="card__text">Arsenalの選手やスタッフの紹介です。</p>
          </a>
        </article>

      </div>

    </section>


      <hr>
      <hr>
      画像など
      <hr>
      <hr>
      選手スライダーなど、一覧リンク
      <hr>
    
  </main>

</div>
<?php get_footer(); ?>
